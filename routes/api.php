<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */


/**
  |--------------------------------------------------------------------------
  |  User
  |--------------------------------------------------------------------------
 */
Route::group(["namespace" => "User", "prefix" => "user", "as" => "api.user.", "middleware" => "xss.protection"], function () {
    Route::get("/", "UserAPIController@index")->name("index");
    Route::get("/{id}", "UserAPIController@show")->name("show");
    Route::post("/store", "UserAPIController@store")->name("store");
    Route::put("/{id}/update", "UserAPIController@update")->name("update");
    Route::delete("/{id}/delete", "UserAPIController@delete")->name("delete");
});
