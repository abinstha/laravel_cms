@extends('layouts.app')

@include('admin.includes.errors')
@section('content')
    <div class="card">
        <div class="card-header">
            Update Post: {{$category->name}}
        </div>
        <div class="card-body">
            <form action="{{route('category.update', ['id' => $category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection