<?php

class subjects {

    function get_all_subjects() {

        $subjects = App::get( 'database' )->get_all_subject( 'subjects' );
        if ( !empty( $subjects ) ) {
            $response = new response( '200', $subjects );
        } else {
            $response = new response( '404', $subjects );

        }
    }

    function create_subjects() {
        $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
        $data_err = [];
        if ( empty( $data ) ) {
            $response = new response( '422', [] );
        } else {
            for ( $i = 0; $i<count( $data );
            $i++ ) {

                if ( !isset( $data[ $i ][ 'name_subject' ] ) ) {
                    $response = new response( '422', $data[ $i ] );
                    die();

                } else {
                    $subjects = App::get( 'database' )->create_subject( 'subjects',
                    [ 'name_subject'=>$data[ $i ][ 'name_subject' ] ] );

                    if ( !$subjects ) {
                        array_push( $data_err, $data[ $i ] );
                    }

                }
            }
            if ( !empty( $data_err ) ) {
                $response = new response( 422, $data_err );
            } else {
                $response = new response( 204, [] );
            }

        }
    }

    function update_subjects() {
        $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
        $data_err = [];
        if ( empty( $data ) ) {
            $response = new response( '422', [] );
        } else {
            for ( $i = 0; $i<count( $data );
            $i++ ) {

                if ( !isset( $data[ $i ][ 'name_subject' ] )
                || !isset( $data[ $i ][ 'id' ] ) ) {
                    $response = new response( '422', $data[ $i ] );
                    die();

                } else {
                    $subjects = App::get( 'database' )->update_subject( 'subjects',
                    [
                        'id'=>$data[ $i ][ 'id' ],
                        'name_subject'=>$data[ $i ][ 'name_subject' ] ] );

                        if ( !$subjects ) {
                            array_push( $data_err, $data[ $i ] );
                        }

                    }
                }
                if ( !empty( $data_err ) ) {
                    $response = new response( 422, $data_err );
                } else {
                    $response = new response( 204, [] );
                }

            }
        }

        function delete() {

            $data = json_decode ( file_get_contents ( 'php://input' ), true ) ;
            if ( empty( $data ) ) {
                $response_code = 400;
                $response = new response( $response_code, [] );
                die();
            }

            foreach ( $data as $datas ) {
                if ( !isset( $datas[ 'id' ] ) ) {

                    $response = new response( 422, [] );

                } else {

                    $query =  App::get( 'database' )->delete(
                        'subjects', [
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

