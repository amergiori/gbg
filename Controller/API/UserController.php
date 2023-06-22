<?php

class UserController extends BaseController {
    protected $error = null;
    public function getList() {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        parse_str($_SERVER['QUERY_STRING'], $arrQueryStringParams);
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new Users();
                $email = '';
                if (isset($arrQueryStringParams['email']) && $arrQueryStringParams['email']) {
                    $email = $arrQueryStringParams['email'];
                }
                $arrUsers = $userModel->getList($email);
                $responseData = json_encode($arrUsers);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK', 'Access-Control-Allow-Origin: *')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader, 'Access-Control-Allow-Origin: *')
            );
        }
    }

    public function deleteUser() {
        $json_params = file_get_contents("php://input");
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                $id = '';
                if (strlen($json_params) > 0) {
                    $decoded_params = json_decode($json_params);
                }
                $id = $decoded_params->id;
                $userModel = new Users();
                $responseMsg = $userModel->deleteUser($id);
                return json_encode($responseMsg);
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
    }

    public function insertUser() {
        $json_params = file_get_contents("php://input");
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (strtoupper($requestMethod) == 'POST') {
            try {
                if (strlen($json_params) > 0) {
                    $decoded_params = json_decode($json_params);
                }
                $userModel = new Users();
                // Todo: validate inputs;
                $responseMsg = $userModel->insert($decoded_params);
                return json_encode($responseMsg);
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
    }
    
    public function setError($error) {
        $this->error = $error;
    }

}