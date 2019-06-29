@extends('layouts.app')


@section('content')
@if (count($errors) > 0)
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger">
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
    <div class="card">
        <div class="card-header">
            Edit Post: {{$post->title}}
        </div>
        <div class="card-body">
            <form action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" value="{{$post->author}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" id="image" name="image" value="{{$post->image}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select id="category" name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                @if($post->category->id == $category->id)
                                    selected
                                @endif
                            >{{$category->name}}</option>
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Tags</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label for=""><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach ($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                                >{{$tag->tag}}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea rows="5" cols="5" id="content" name="content" class="form-control">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection