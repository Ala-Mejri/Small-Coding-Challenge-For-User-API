<?php

namespace App\Traits;

trait JsonHelperTrait {
    

    /**
      |------------------------------------------------------------
      | HELPER:: Return The "Json Data" Based On The Response Value
      |------------------------------------------------------------
     */
    function modelDataToJson($response, $data = null, $modelName = null, $errors = null) {
        $data = $this->convertEmptyAndNullToArray($data);
        switch ($response) {
            case 200:
                if (is_array($data) && count($data) === 0) {
                    return response()->json(["response" => $response, "data" => $data, "message" => $this->modelMSG_Empty($modelName)],$response);
                } else {
                    return response()->json(["response" => $response, "data" => $data, "message" => $this->modelMSG_Success($modelName)],$response);
                }
            case 201:
                return response()->json(["response" => $response, "data" => $data, "message" => $this->modelMSG_Created($modelName)],$response);
            case 202:
                return response()->json(["response" => $response, "data" => $data, "message" => $this->modelMSG_Accepted($modelName)],$response);
            case 400:
                return response()->json(["response" => $response, "data" => $data, "message" => $errors],$response);
            case 404:
                return response()->json(["response" => $response, "data" => $data, "message" => $this->modelMSG_NotFound($modelName)],$response);
            default:
                return response()->json(["response" => 500, "data" => $data, "message" => $this->modelMSG_ServerError($modelName)],$response);
        }
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Convert Empty & Null To An "Empty Array"
      |------------------------------------------------------------
     */
    function convertEmptyAndNullToArray($data) {
        if (is_null($data) || empty($data)) {
            $data = [];
        }
        return $data;
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Message For "Success"
      |------------------------------------------------------------
     */
    function modelMSG_Success() {
        return ucwords("the requested " . static::modelName . " data was returned successfully!");
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "Empty Model"
      |------------------------------------------------------------
     */
    function modelMSG_Empty() {
        return ucwords("the " . static::modelName . " list is empty !");
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "Empty Model"
      |------------------------------------------------------------
     */
    function modelMSG_Created() {
        return ucwords("the " . static::modelName . " was created successfully !");
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "NoContent"
      |------------------------------------------------------------
     */
    function modelMSG_Accepted() {
        return ucwords("action was accepted for the requested " . static::modelName . " !");
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "Not Found Model"
      |------------------------------------------------------------
     */
    function modelMSG_NotFound() {
        return ucwords("the " . static::modelName . " that you are looking for can't be found !");
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "Custom Error"
      |------------------------------------------------------------
     */
    function modelMSG_Error($errors) {
        return $errors;
    }

    /**
      |------------------------------------------------------------
      | HELPER:: Return Error Message For "500 Server Error"
      |------------------------------------------------------------
     */
    function modelMSG_ServerError() {
        return ucwords("an unknown error concerning the " . static::modelName . " data has occurred. please try again later or contact our customer service");
    }
}
