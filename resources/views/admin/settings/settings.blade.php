@extends('layouts.app')


@section('content')
@include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Edit Blog Settings
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" id="name" name="site_name" value="{{$settings->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                <input type="text" id="address" name="address" value="{{$settings->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Number</label>
                    <input type="text" id="contact_email" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Update Site Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection