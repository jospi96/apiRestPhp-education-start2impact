<?php

class Course
{

    public function get_course()
    {

        if (
            isset($_GET['type']['name'])
            or isset($_GET['type']['places_available'])
            or isset($_GET['type']['subjects_id'])
        ) {

            $course = App::get('database')
                ->get_all_filters_course(
                    'courses_with_subjects',

                    isset($_GET['type']['name']) ?
                    $_GET['type']['name'] : '',

                    isset($_GET['type']['places_available']) ?
                    $_GET['type']['places_available'] : null,

                    isset($_GET['type']['subjects_id']) ?
                    $_GET['type']['subjects_id'] : null
                );

        } else {

            $course = App::get('database')
                ->get_course('courses_with_subjects');

        }
        if (!empty($course)) {
            $response = new response('200', $course);
            return $response;

        }

        $response = new response('204', $course);
        return $response;

    }

    public function create_course()
    {

        $data = json_decode(file_get_contents('php://input'), true);
        if (empty($data)) {
            $response_code = 400;
            $response = new response($response_code, []);
            return $response;
        }

        for (
            $i = 0;
            $i < count($data);
            $i++
        ) {
            if (
                empty($data[$i]['name'])
                || empty($data[$i]['places_available'])
                || empty($data[$i]['subjects'])
            ) {

                $response = new response(422, []);
                return $response;

            }

            $course = App::get('database')->
                create_course(
                'courses',
                [
                    'name' => $data[$i]['name'],
                    'places_available' => $data[$i]['places_available'],
                ]
            );

            if (!$course['stm']) {
                $response = new response('500', []);
                return $response;

            }
            foreach ($data[$i]['subjects'] as $subject) {
                $conn = App::get('database')->insert_subject_course(
                    'courses_subjects',
                    [
                        'id_course' => $course['last_ins_id'],
                        'id_subject' => $subject,
                    ]
                );
            }

        }

    }

    public function delete()
    {

        $data = json_decode(file_get_contents('php://input'), true);
        if (empty($data)) {
            $response_code = 400;
            $response = new response($response_code, []);
            return $response;
        }

        foreach ($data as $datas) {
            if (!isset($datas['id'])) {
                $response = new response(422, []);
                return $response;
            }

            $query = App::get('database')
                ->delete(
                    'courses',
                    [
                        'id' => $datas['id'],
                    ]
                );

            if ($query) {
                $response = new response('204', []);
                return $response;
            }
            $response = new response('500', []);
            return $response;

        }
    }

    public function update_course()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (empty($data)) {
            $response = new response('400', []);
            return $response;
        }

        for ($i = 0; $i < count($data); $i++) {

            if (
                empty($data[$i]['name'])
                || empty($data[$i]['places_available'])
                || empty($data[$i]['subjects'])
                || empty($data[$i]['id'])
            ) {
                $response = new response('400', []);
                return $response;

            }

            $query = App::get('database')->update_course(
                'courses',
                [
                    'id' => $data[$i]['id'],
                    'name' => $data[$i]['name'],
                    'places_available' => $data[$i]['places_available'],

                ]
            );

            if (!$query) {
                $response = new response('500', []);
                return $response;
            }
            $fetch_sub = App::get('database')
                ->get_subjects_course(
                    'courses_subjects',
                    ['id_course' => $data[$i]['id']],
                    'id_subject'
                );

            if (!$fetch_sub) {
                $response = new response(400, $data[$i]);
                return $response;
            }

            $subjects = $fetch_sub->fetchAll();
            $temp = [];
            foreach ($subjects as $subject) {
                array_push($temp, $subject['id_subjects']);
            }

            $to_add_matery = array_diff($data[$i]['subjects'], $temp);
            $to_remove_matery = array_diff($temp, $data[$i]['subjects']);
            $insert = true;
            $delete = true;
            if (!empty($to_add_matery)) {

                foreach ($data[$i]['subjects'] as $subject) {
                    $insert = App::get('database')
                        ->insert_subject_course(
                            'courses_subjects',
                            [
                                'id_course' => $data[$i]['id'],
                                'id_subject' => $subject,
                            ]
                        );

                }
            }
            if (!empty($to_remove_matery)) {
                foreach ($data[$i]['subjects'] as $subject) {
                    $delete = App::get('database')
                        ->delete(
                            'courses_subjects',
                            ['id_course' => $data[$i]['id']],
                            ['id_course' => $subject['id']]
                        );
                }
            }
            if (!$insert || !$delete) {
                $response = new response(400, $data[$i]);
                return $response;

            }
        }
        $response = new response(204, []);
        return $response;

    }

}
?>