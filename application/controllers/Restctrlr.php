<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . 'libraries/REST_Controller.php');
class Restctrlr extends REST_Controller {
    private $tok = 'Bearer test';
function __construct() {
    parent::__construct();

    }
    private function verihead($header)
    {
        
        $token = $header['Authorization'];
        //return $token;
        if($this->tok == $token){
            return true;
        }else{
            return false;
        }
    }

    public function index_get(){
        /*$this->response([
            'status' => false,
            'message' => $this->input->request_headers()
        ], 404);
        return;*/
        $headers = $this->input->request_headers();
        if(!$this->verihead($headers)){
            $this->response( [
                'status' => false,
                'message' => 'No estas autorizado '
            ], 404 );
        }else{
            $users = [
                ['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
                ['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
            ];
            $id = $this->get( 'id' );
            $id = $_GET["id"];
            if(!empty($id)){
                if ( $users )
                {
                    // Set the response and exit
                    $this->response( [$users,$headers,$id], 200 );
                }
                else
                {
                    // Set the response and exit
                    $this->response( [
                        'status' => false,
                        'message' => 'No users were found 1'
                    ], 404 );
                }
            }else{
                if ( array_key_exists( $id, $users ) )
                {
                    $this->response( $users[$id], 200 );
                }
                else
                {
                    $this->response( [
                        'status' => false,
                        'message' => 'No such user found 2',
                        'id'    => $id
                    ], 404 );
                }
            }
        }
    }
}
/** End of file Restctrlr.php **/
?>