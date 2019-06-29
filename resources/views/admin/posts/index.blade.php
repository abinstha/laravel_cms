@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Published Posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Trash</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{$post->image}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-info btn-sm">
                                        Edit
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('posts.trash', ['id' => $post->id])}}" class="btn btn-danger btn-sm">
                                        Trash
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center font-italic">No Published Posts!!!</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection