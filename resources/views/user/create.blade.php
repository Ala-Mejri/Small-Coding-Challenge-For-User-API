@extends('layouts.app')

@section('content')
<div class="col-xs-12">
    <div class="card row">
        <form class="col-lg-10 offset-lg-1 col-xs-12 p-4" action="{{route("user.store")}}" method="post">
            <h2 class="text-info mb-5">Create New User</h2>

            @csrf
            <div class="form-group row">
                <label for="givenName" class="col-md-2 col-form-label">Given Name</label>
                <div class="col-md-10">
                    <input name="givenName" type="givenName" class="form-control" id="givenName" placeholder="Given Name" value="{{ old('givenName') }}" required autofocus>
                    @if ($errors->has('givenName'))
                    <div class="text-danger" role="alert">
                        <strong>{{ $errors->first('givenName') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="familyName" class="col-md-2 col-form-label">Family Name</label>
                <div class="col-md-10">
                    <input name="familyName" type="familyName" class="form-control" id="familyName" placeholder="Given Name" value="{{ old('familyName') }}" required autofocus>
                    @if ($errors->has('email'))
                    <div class="text-danger" role="alert">
                        <strong>{{ $errors->first('familyName') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="sex" class="col-md-2 col-form-label">Sex</label>
                <div class="col-md-10">
                    <select name="sex" id="sex" class="form-control">
                        <option @if(old('sex') == "male") selected @endif value="male">Male</option>
                        <option @if(old('sex') == "female") selected @endif value="female">Female</option>
                    </select>
                    @if($errors->has('sex'))
                    <div class="text-danger" role="alert">
                        <strong>{{ $errors->first('sex') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email</label>
                <div class="col-md-10">
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <div class="text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label">Password</label>
                <div class="col-md-10">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="{{ old('password') }}" required autofocus>
                    @if ($errors->has('password'))
                    <div class="text-danger" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-xs btn-success float-right mx-2"><i class="fa fa-edit"></i> Create</button>
                <a href="{{URL::previous()}}" class="btn btn-xs btn-danger float-right"><i class="fa fa-edit"></i> Back</a>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
