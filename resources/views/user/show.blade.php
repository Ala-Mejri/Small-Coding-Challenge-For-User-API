@extends('layouts.app')

@section('content')
<div class="col-xs-12">
    <div class="card mb-1">
        <div class="card-body row py-3">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <img width="150" src="{{$user->profileImg}}">
            </div> 
            <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                <h5 class="mb-2 text-black">{{$user->givenName." ".$user->familyName}}</h5>
                <div class="mb-3" style="color: lightslategray;"><i class="fa fa-{{$user->sex}}"></i> {{$user->sex}}<span class="px-2">-</span><i class="fa fa-envelope"></i> {{$user->email}}</div>
                <hr>
                <a href="{{route("user.edit",[$user->id])}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                <form style="display: inline;" action="{{route("user.delete",$user->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
