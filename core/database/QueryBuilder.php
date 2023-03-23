<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function get_course(
        $table, $name, $place, $subjects
    ) {
        $linkName = '';
        $linkSubjects = '';
        $linkPlace = '';
        $where = "";
        /** paramater check */
        if ($name != '') {
            $colum = 'name';
            $linkName .= " {$colum} like '%{$name}%'";
            $where = " where ";
            if ($place != null || $subjects != null) {
                $linkPlace .= ' AND';
            }
        }
        if ($place != null) {
            $colum = 'places_available';
            $place = explode('%', $place);
            $linkPlace .= " {$colum}{$this->operator($place[0])}{$place[1]}";
            $where = " where ";
            if ($subjects != null) {
                $linkSubjects .= ' AND';
            }
        }

        if ($subjects != null) {
            $colum = 'subjects_id';
            $subjects = explode('%', $subjects);
            $linkSubjects .= " {$colum}={$subjects[0]}";
            $where = " where ";
            foreach ($subjects as $key => $value) {

                if ($key > 0) {

                    $linkSubjects .= " OR {$colum}={$value}";
                }

            }
        }

        $query = sprintf("SELECT * FROM %s %s %s %s  ",
            $table, $where, $linkName, $linkPlace, $linkSubjects
        );
        try {
            $stmt = $this->pdo->prepare($query);

            // execute query
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                return $stmt->fetchAll();
            }
        } catch (Exception $e) {
            return false;
        }

    }

    public function create_course($table, $data)
    {
        $query = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );
        try {
            $stmt = $this->pdo->prepare($query);

            $excution = [
                'stm' => $stmt->execute($data),
                'last_ins_id' => $this->pdo->lastInsertId(),
            ];
            return $excution;
        } catch (Exception $e) {
            return false;
        }

    }

    public function insert_subject_course($table, $data)
    {

        $query = sprintf(
            'INSERT IGNORE INTO %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    public function delete($table, $data)
    {
        $query = sprintf(
            'Delete from %s where %s = %s ',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    public function update_course($table, $data)
    {

        $query = sprintf(
            "UPDATE %s  set %s=%s , %s=%s where  %s=%s",
            $table,
            array_keys($data)[1],
            ':' . array_keys($data)[1],
            array_keys($data)[2],
            ':' . array_keys($data)[2],
            array_keys($data)[0],
            ':' . array_keys($data)[0]
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function get_subjects_course($table, $data, $column)
    {
        $query = sprintf(
            'select   %s from  %s where  %s= %s',
            $column,
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $a = $stmt->execute($data);
        } catch (Exception $e) {
            return false;
        }

        return $stmt;

    }

    public function delete_subjects_course($table, $data)
    {

        $query = sprintf(
            "Delete from %s where   %s= %s and   %s= %s",
            $table,
            array_keys($data)[1],
            ':' . array_keys($data)[1],
            array_keys($data)[0],
            ':' . array_keys($data)[0]
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $a = $stmt->execute($data);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    public function get_all_subject($table)
    {

        $query =
            sprintf(
            'SELECT * FROM %s',
            $table,
        );

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            return false;
        }
    }

    public function create_subject($table, $data)
    {
        $query = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $a = $stmt->execute($data);

            return true;

        } catch (Exception $e) {

            return false;
        }

    }

    public function update_subject($table, $data)
    {

        $query = sprintf(
            'UPDATE %s  set %s=%s where  %s=%s',
            $table,
            array_keys($data)[1],
            ':' . array_keys($data)[1],
            array_keys($data)[0],
            ':' . array_keys($data)[0]
        );
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (Exception $e) {
            return false;
        }

    }
    public function operator($op)
    {
        switch ($op) {
            case '=':
			return '=';
            case 'gt':
			return '>';

            case 'lt':
			return '<';

            case 'gte':
			return '>=';

            case 'lte':
			return '<=';
            default:
			return "=";

        }

    }
}
?>
