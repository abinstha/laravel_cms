@extends('layouts.app')


@section('content')
@include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create New User
        </div>
        <div class="card-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="email" id="email" value="{{$user->email}}"name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" id="avatar" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facbook Profile</label>
                    <input type="text" id="facebook" value="{{$user->profile->facebook}}" name="facebook" class="form-control">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter Profile</label>
                    <input type="text" id="twitter" name="twitter" value="{{$user->profile->twitter}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube Profile</label>
                    <input type="text" id="youtube" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Submit User</button>
                </div>
            </form>
        </div>
    </div>
@endsection