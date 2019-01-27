<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

/**
  |--------------------------------------------------------------------------
  |  Home
  |--------------------------------------------------------------------------
 */
Route::get('/', function () {
    return view('home');
});

/**
  |--------------------------------------------------------------------------
  |  Auth
  |--------------------------------------------------------------------------
 */
Auth::routes();

/**
  |--------------------------------------------------------------------------
  |  Dashboard
  |--------------------------------------------------------------------------
 */
Route::group(["namespace" => "Dashboard", "prefix" => "dashboard", "as" => "dashboard.", "middleware" => ["auth"]], function () {
    Route::get("/profile", "ProfileController@profile")->name('profile');
});
/**
  |--------------------------------------------------------------------------
  |  User
  |--------------------------------------------------------------------------
 */
Route::group(["namespace" => "User", "prefix" => "user", "as" => "user.", "middleware" => ["xss.protection", "auth"]], function () {
    Route::get("/", "UserController@index")->name("index");
    Route::get("/create", "UserController@create")->name("create");
    Route::post("/store", "UserController@store")->name("store");
    Route::get("/{id}", "UserController@show")->name("show");
    Route::get("/{id}/edit", "UserController@edit")->name("edit");
    Route::any("/{id}/update", "UserController@update")->name("update");
    Route::delete("/{id}/delete", "UserController@delete")->name("delete");
});
