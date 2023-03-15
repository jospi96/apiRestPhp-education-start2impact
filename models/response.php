<?php

class response {
    public $response;
    public $error;
    protected $message;

    function __construct( $status, $body, $error = '' ) {
        $this->message = [
            'status' =>$status,
            'message'=>$this->set_message( $status ),
            'error'=>$error

        ];

        header( 'Content-Type:application/json' );
        header( 'Request:'.$_SERVER[ 'REQUEST_URI' ] );
        header( 'method:'.$_SERVER[ 'REQUEST_METHOD' ] );
        header( 'details:'.stripslashes(
            json_encode( $this->message ) ) );
            header( 'body:'.json_encode( $body ) );
            http_response_code( $status );
            echo stripslashes( json_encode( headers_list () ) );

        }

        function set_message( $status ) {

            switch ( $status ) {
                case '200':
                return'OK. Everything worked as expected';

                case '201':
                return'A resource was successfully 
            created in response to a POST request.
            The Location header contains the URL pointing to the
            newly created resource.';

                case '204':
                return  '';

                case  '400':
                return "Bad request. This could be caused by 
various actions by the user,
such as providing invalid JSON 
data in the request body etc";

                case '404':
                return 'The requested resource does not exist';

                case  '422':
                return 'Data validation failed';

                case '503':
                return "Internal server error. 
                        This could be caused by internal program errors.";

            }

        }
    }

    ?>