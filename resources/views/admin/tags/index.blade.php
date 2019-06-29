@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tag Name</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    </form>
                    @if ($tags->count() > 0)
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->tag}}</td>
                                <td>
                                    <a href="{{route('tag.edit', ['id' => $tag->id])}}" class="btn btn-info btn-xs edit-tag">
                                        Edit
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center font-italic">No tags yet!!!</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection