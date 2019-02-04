<?php

namespace App\Helpers;

class ResponseHelper {
    public function successWithData($input) {
        $meta = array(
            'code' => 200,
            'message' => 'Success',
            'error' => false
        );
        $data = $input;
        $response = array(
            "meta" => $meta,
            "data" => $data
        );
        return $response;
    }
    public function successWithMetaData($meta_input, $data_input) {
        $response = array(
            "meta" => $meta_input,
            "data" => $data_input
        );
        return $response;
    }
    public function successWithoutData($msg) {
        $meta = array(
            'code' => 200,
            'message' => $msg,
            'error' => false
        );
        $response = array(
            "meta" => $meta,
        );
        return $response;
    }
    public function errorVerifyEmail() {
        $meta = array(
            'code' => 204,
            'message' => 'Please Verify Your Email',
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorAccountSuspended() {
        $meta = array(
            'code' => 205,
            'message' => 'Your Account Has Ben Suspended',
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorSomething() {
        $meta = array(
            'code' => 400,
            'message' => 'Something Error',
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorCredentials() {
        $meta = array(
            'code' => 206,
            'message' => 'Invalid Credentials',
            'error' => false
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorCustom($code, $msg) {
        $meta = array(
            'code' => $code,
            'message' => $msg,
            'error' => true
        );
        $response = array(
            "meta" => $meta
        );
        return $response;
    }
    public function errorWithInfo($code, $input) {
        $meta = array(
            'code' => $code,
            'message' => 'Error',
            'error' => true
        );
        $data = $input;
        $response = array(
            "meta" => $meta,
            "Error" => $data
        );
        return $response;
    }
}
