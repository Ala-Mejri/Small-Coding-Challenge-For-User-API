<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

    use ValidationTrait;

    /**
     * User Request validation.
     *
     * @var array
     */
    const VALIDATOR = [
        "givenName" => "required|min:3|max:30|regex:/^[A-Za-z\s-_]+$/",
        "familyName" => "required|min:3|max:30|regex:/^[A-Za-z\s-_]+$/",
        "email" => "required|email|unique:users",
        "password" => "required|min:6|max:100"
    ];
    const modelName = "user";

    /**
      |------------------------------------------------------------
      | INDEX:: Return All Users (20/page)
      |------------------------------------------------------------
     */
    public function index() {
        $users = User::paginate(20);
        return view("user.index", compact("users"));
    }

    /**
      |------------------------------------------------------------
      | SHOW:: Return One User By ID
      |------------------------------------------------------------
     */
    public function show($id) {
        $user = User::find($id);
        if ($user) {
            return view("user.show", compact("user"));
        } else {
            abort(404);
        }
    }

    /**
      |------------------------------------------------------------
      | EDIT:: Redirect to edit user page if the user exist
      |------------------------------------------------------------
     */
    public function edit($id) {
        $user = User::find($id);
        if ($user) {
            return view("user.edit", compact("user"));
        } else {
            abort(404);
        }
    }

    /**
      |------------------------------------------------------------
      | CREATE:: Redirect to create user page
      |------------------------------------------------------------
     */
    public function create() {
        return view("user.create");
    }

    /**
      |------------------------------------------------------------
      | store:: Validate and Create a New User
      |------------------------------------------------------------
     */
    public function store(Request $request) {
        $this->validate($request, $this->validationArray("store"));
        $user = User::create($request->all());
        Session::flash('message', "User has been created successfully!");
        return redirect()->route("user.show", $user->id);
    }

    /**
      |------------------------------------------------------------
      | UPDATE:: Validate and Update An Existing User
      |------------------------------------------------------------
     */
    public function update(Request $request, $id) {
        $user = User::find($id);
        if ($user) {
            $this->validate($request, $this->validationArray("update", $id));
            $user->update($request->all());
            Session::flash('message', "User has been updated successfully !");
            return redirect()->route("user.show", $id);
        } else {
            abort(404);
        }
    }

    /**
      |------------------------------------------------------------
      | DELETE:: Delete An Exiting User
      |------------------------------------------------------------
     */
    public function delete($id) {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route("user.index");
        } else {
            abort(404);
        }
    }

}
