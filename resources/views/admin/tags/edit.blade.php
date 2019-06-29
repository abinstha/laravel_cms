@extends('layouts.app')


@section('content')
@include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Update Tag: {{$tag->tag}}
        </div>
        <div class="card-body">
            <form action="{{route('tag.update', $tag->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="tag" value="{{$tag->tag}}" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection