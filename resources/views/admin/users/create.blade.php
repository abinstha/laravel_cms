@extends('layouts.app')


@section('content')
@include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create New User
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Submit User</button>
                </div>
            </form>
        </div>
    </div>
@endsection