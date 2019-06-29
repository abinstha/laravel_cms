@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>User</th>
                        <th>Permissions</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->count() > 0)
                        @foreach ($users as $user)
                            <tr>
                                <td><img src="{{asset($user->profile->avatar)}}" alt="{{$user->title}}" width="90px" height="50px"></td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @if ($user->admin)
                                        <a href="{{route('user.not_admin', ['id' => $user->id])}}" class="btn btn-sm btn-info">Remove Permissions</a>
                                    @else
                                        <a href="{{route('user.admin', ['id' => $user->id])}}" class="btn btn-sm btn-success">Make Admin</a>
                                    @endif
                                </td>
                                <td>
                                    @if (Auth::id() !== $user->id)
                                    <a href="{{route('user.delete', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center font-italic">No Users!!!</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection