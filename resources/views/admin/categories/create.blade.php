@extends('layouts.app')


@section('content')
@include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create New Category
        </div>
        <div class="card-body">
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Submit Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection