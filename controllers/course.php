<?php

class Course {

    function get_course() {

        $course = App::get( 'database' )->get_course( 'courses_with_subjects' );
        if ( !empty( $course ) ) {
            $response = new response( '200', $course );
        } else {
            $response = new response( '204', $course );

        }
    }

    function create_course() {

        $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
        if ( empty( $data ) ) {
            $response_code = 400;
            $response = new response( $response_code, [] );
        } else {
            for ( $i = 0; $i<count( $data );
            $i++ ) {
                If( empty( $data[ $i ][ 'name' ] ) || empty( $data[ $i ][ 'places_available' ] )
                || empty( $data[ $i ][ 'subjects' ] ) ) {

                    $response = new response( 422, [] );

                } else {
                    $course =  App::get( 'database' )->
                    create_course( 'courses',
                    [
                        'name'=>$data[ $i ][ 'name' ],
                        'places_available'=>$data[ $i ][ 'places_available' ]
                    ] );

                    if ( !$course[ 'stm' ] ) {
                        $response = new response( '500', [] );
                    } else {
                        foreach ( $data[ $i ][ 'subjects' ] as $subject ) {
                            $conn =  App::get( 'database' )->insert_subject_course(
                                'courses_subjects', [
                                    'id_course'=>$course[ 'last_ins_id' ],
                                    'id_subject'=>$subject
                                ] );
                            }
                        }

                    }
                }
            }
        }

        function delete() {

            $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
            if ( empty( $data ) ) {
                $response_code = 400;
                $response = new response( $response_code, [] );
            } else {

                foreach ( $data as $datas ) {
                    if ( !isset( $datas[ 'id' ] ) ) {

                        $response = new response( 422, [] );

                    } else {

                        $query =  App::get( 'database' )->delete(
                            'courses', [
                                'id'=>$datas[ 'id' ]
                            ]
                        );

                    }
                    if ( $query ) {
                        $response = new response( '204', [] );
                    } else
                    $response = new response( '500', [] );

                    die();
                }
            }
        }

        function update_course() {
            $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
            if ( empty( $data ) ) {
                $response = new response( '400', [] );
            } else {

                for ( $i = 0; $i<count( $data );
                $i++ ) {

                    If( empty( $data[ $i ][ 'name' ] )
                    || empty( $data[ $i ][ 'places_available' ] )
                    || empty( $data[ $i ][ 'subjects' ] )
                    || empty( $data[ $i ][ 'id' ] ) ) {
                        $response = new response( '400', [] );
                    } else {

                        $query =  App::get( 'database' )->update_course( 'courses', [
                            'id'=>$data[ $i ][ 'id' ],
                            'name'=>$data[ $i ][ 'name' ],
                            'places_available'=>$data[ $i ][ 'places_available' ]

                        ] );
                        if ( $query ) {
                            $fetch_sub =  App::get( 'database' )->get_subjects_course( 'courses_subjects',
                            [ 'id_course'=>$data[ $i ][ 'id' ] ],
                            'id_subject' );
                            if ( $fetch_sub ) {
                                $subjects = $fetch_sub->fetchAll();
                                $temp = [];
                                foreach ( $subjects as $subject ) {
                                    array_push( $temp, $subject[ 'id_subjects' ] );
                                }

                                $to_add_matery = array_diff( $data[ $i ][ 'subjects' ], $temp );
                                $to_remove_matery = array_diff( $temp,  $data[ $i ][ 'subjects' ] );
                                $insert = true;
                                $delete = true;
                                if ( !empty( $to_add_matery ) ) {

                                    foreach ( $data[ $i ][ 'subjects' ] as $subject ) {
                                        $insert =  App::get( 'database' )->insert_subject_course(
                                            'courses_subjects', [
                                                'id_course'=>$data[ $i ][ 'id' ],
                                                'id_subject'=>$subject
                                            ] );

                                        }
                                    }
                                    if ( !empty( $to_remove_matery ) ) {
                                        foreach ( $data[ $i ][ 'subjects' ] as $subject ) {
                                            $delete = App::get( 'database' )->delete( 'courses_subjects',
                                            [ 'id_course'=>$data[ $i ][ 'id' ] ],
                                            [ 'id_course'=>$subject[ 'id' ] ] );
                                        }
                                    }
                                    if ( ! $insert || !$delete ) {
                                        $response = new response( 400, $data[ $i ] );

                                    } else {
                                        $response = new response( 204, [] );

                                    }

                                } else {
                                    $response = new response( 400, $data[ $i ] );
                                }
                            }
                        }

                    }
                }
            }

        }

        ?>