@extends('layouts.app')

@section('content')
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>This is work is still in progress !</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card mb-3">
            <div class="card-body py-3">
                <h5 class="mb-3 text-black">I. User Interface</h5>
                <div>This is the graphical version of the application</div>
                <div>Available for authenticated users only</div>
                <div>(For now authenticated users are able to edit and delete all other users)</div>
                <div class="font-weight-bold mt-2">You can Login with:</div>
                <div>Email: ala@example.com</div>
                <div>Password: pw-123456</div>
                <hr>
                <div class="font-weight-bold"><i class="fa fa-dot-circle pr-2"></i>You can login with any user you create through the API (if you don't specify a password the default one will be: 123456)</div>
                <hr>
                <a href="{{route("user.index")}}" class="btn btn-info float-right"><i class="fa fa-play"></i> GO !</a>
            </div>
        </div>
        
        <div class="card mb-3">
            <div class="card-body py-3">
                <h5 class="mb-3 text-black">II. User API</h5>
                <div>This is the API version of the application (JSON)</div>
                <div>Available for anyone</div>
                <hr>
                <div class="font-weight-bold">Examples:</div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="font-weight-bold mt-2">Index:</div>
                        <div>URL: api/user</div>
                        <div>Request: GET</div>
                        <div>Response: 200</div>
                    </div>

                    <div class="col-md-6">
                        <div class="font-weight-bold mt-2">Show:</div>
                        <div>URL: api/user/{id}</div>
                        <div>Request: GET</div>
                        <div>Response: 200</div>
                    </div>

                    <div class="col-md-6">
                        <div class="font-weight-bold mt-2">Create:</div>
                        <div>URL: api/user/store</div>
                        <div>Request: POST</div>
                        <div>Response: 201</div>
                    </div>

                    <div class="col-md-6">
                        <div class="font-weight-bold mt-2">Update:</div>
                        <div>URL: api/user/{id}/update</div>
                        <div>Request: PUT</div>
                        <div>Response: 200</div>
                    </div>

                    <div class="col-md-6">
                        <div class="font-weight-bold mt-2">Delete:</div>
                        <div>URL: api/user/{id}/delete</div>
                        <div>Request: DELETE</div>
                        <div>Response: 204</div>
                    </div>
                </div>
                <hr>
                <div class="font-weight-bold"><i class="fa fa-dot-circle pr-2"></i>Fileds Rules:</div>
                <div class="pl-2">-givenName: "Required", "min:3", "max:30", "letters underscore dash (no numbers)"</div>
                <div class="pl-2">-familyName: "Required", "min:3", "max:30", "letters underscore dash (no numbers)"</div>
                <div class="pl-2">-email: "Required", "email format", "unique"</div>
                <div class="pl-2">-password: "Optional", "min:6", "max:100", "default:123456"</div>
                <hr>
                <div class="font-weight-bold"><i class="fa fa-dot-circle pr-2"></i>Format Type: JSON</div>
                <div class="font-weight-bold"><i class="fa fa-dot-circle pr-2"></i>The API has been tested with Postman</div>
                <div class="font-weight-bold"><i class="fa fa-dot-circle pr-2"></i>Important: Make Sure To select "x-www-url-form-urlencoded" in The Body of Postamn for PUT Request </div>
                <hr>
                <a href="{{route("api.user.index")}}" class="btn btn-info float-right"><i class="fa fa-play"></i> GO !</a>
            </div>
        </div>
        
        <div class="card mb-3">
            <div class="card-body py-3">
                <h5 class="mb-3 text-black">III. API Example (Postamn)</h5>
                <div><span class="font-weight-bold">Request:</span> PUT</div> 
                <div><span class="font-weight-bold">Response:</span> 200</div>
                <div><span class="font-weight-bold">Url:</span> https://ala.tn/HolidayExtras/public/index.php/api/user/15/update</div>
                <br>
                <img style="max-height: 100%;max-width: 100%;" src="{{asset("img/example/example-put.png")}}">  
            </div>
        </div>
    </div>
</div>
@endsection
