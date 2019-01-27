<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\JsonHelperTrait;
use App\Traits\ValidationTrait;

class UserAPIController extends Controller {

    use ValidationTrait,
        JsonHelperTrait;

    /**
     * User Request validation.
     *
     * @var array
     */
    const VALIDATOR = [
        "givenName" => "required|min:3|max:30|regex:/^[A-Za-z\s-_]+$/",
        "familyName" => "required|min:3|max:30|regex:/^[A-Za-z\s-_]+$/",
        "email" => "required|email|unique:users",
        "password" => "nullable|min:6|max:100"
    ];
    const modelName = "user";

    /**
      |------------------------------------------------------------
      | INDEX:: Return All Users
      | Return JSON
      |------------------------------------------------------------
     */
    public function index() {
        $data = User::all();
        return $this->modelDataToJson(200, $data);
    }

    /**
      |------------------------------------------------------------
      | SHOW:: Return One User
      | Return JSON
      |------------------------------------------------------------
     */
    public function show($id) {
        $data = User::find($id);
        if ($data) {
            return $this->modelDataToJson(200, $data);
        } else {
            return $this->modelDataToJson(404, $data);
        }
    }

    /**
      |------------------------------------------------------------
      | CREATE:: Validate and Create a New User
      | Return JSON
      |------------------------------------------------------------
     */
    public function store(Request $request) {
        $validation = Validator::make($request->all(), $this->validationArray("store"));
        if ($validation->fails()) {
            $errors = $validation->errors();
            return $this->modelDataToJson(400, null, null, $errors);
        }

        $data = User::create($request->all());
        if ($data) {
            return $this->modelDataToJson(201, $data);
        } else {
            return $this->modelDataToJson(404, $data);
        }
    }

    /**
      |------------------------------------------------------------
      | UPDATE:: Validate and Update An Existing User
      | Return JSON 
      |------------------------------------------------------------
     */
    public function update(Request $request, $id) {
        $validation = Validator::make($request->all(), $this->validationArray("update", $id));
        if ($validation->fails()) {
            $errors = $validation->errors();
            return $this->modelDataToJson(400, null, null, $errors);
        }

        $data = User::find($id);
        if ($data) {
            $data->update($request->all());
            return $this->modelDataToJson(200, $data);
        } else {
            return $this->modelDataToJson(404, $data);
        }
    }

    /**
      |------------------------------------------------------------
      | DELETE:: Delete An Exiting User
      | Return JSON
      |------------------------------------------------------------
     */
    public function delete($id) {
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return $this->modelDataToJson(202, null);
        } else {
            return $this->modelDataToJson(404, null);
        }
    }

}
