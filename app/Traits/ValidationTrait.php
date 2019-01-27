<?php

namespace App\Traits;

trait ValidationTrait {

    /**
      |------------------------------------------------------------
      | Return the validation array based on the given method
      |------------------------------------------------------------
     */
    public function validationArray($method, $id = null) {
        if ($method == "store") {
            return static::VALIDATOR;
        } elseif ($method == "update") {
            return array_merge(static::VALIDATOR, [
                "email" => "required|email|unique:users,email," . $id,
                "password" => "nullable|min:6|max:100"
            ]);
        }
    }

}
