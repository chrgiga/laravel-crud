@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-left"><h3>Users list</h3></div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="{{ route('users.create') }}" class="btn btn-info" >Add user</a>
                    </div>
                </div>
                <div class="table-container">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Work position</th>
                            <th>Work functions</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        @if($users->count())
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->work_position}}</td>
                                    <td>{{$user->work_functions}}</td>
                                    <td>
                                        <a class="btn btn-success btn-xs btn-group" href="{{action('UserController@show', $user->id)}}" >
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-primary btn-xs btn-group" href="{{action('UserController@edit', $user->id)}}" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>

                                        <form action="{{action('UserController@destroy', $user->id)}}"
                                              method="post"
                                              class="btn-group">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">

                                            <button class="btn btn-danger btn-xs" type="submit">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">Not users found !!</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
