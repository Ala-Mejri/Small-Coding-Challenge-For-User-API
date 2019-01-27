@extends('layouts.app')

@section('content')
<div class=" col-xs-12">
    @foreach($users as $user)
    <div class="card mb-1">
        <div class="card-body row py-3">
            <div class="col-md-1 col-sm-2 text-center">
                <img width="50" src="{{$user->profileImg}}">
            </div> 
            <div class="col-md-9 col-sm-7">
                <h5 class="mb-2 text-black">{{$user->givenName." ".$user->familyName}}</h5>
                <div style="color: lightslategray;" class=""><i class="fa fa-{{$user->sex}}"></i> {{$user->sex}}<span class="px-2">-</span><i class="fa fa-envelope"></i> {{$user->email}}</div>

            </div>
            <div class="col-md-2 col-sm-3 pt-2 text-center">
                <a href="{{route("user.show",[$user->id])}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                <a href="{{route("user.edit",[$user->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                <form style="display: inline;" action="{{route("user.delete",$user->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-xs-12 my-5 text-center">
        {{ $users->links() }}
    </div>

</div>
@endsection
