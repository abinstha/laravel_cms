@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Restore</th>
                        <th>Delete</th>
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
                                    <a href="{{route('post.restore', ['id' => $post->id])}}" class="btn btn-sm btn-success">
                                        Restore
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center font-italic">No Trashed Posts!!!</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection