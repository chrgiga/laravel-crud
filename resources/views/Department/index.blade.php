@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="pull-left"><h3>Departments list</h3></div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="{{ route('departments.create') }}" class="btn btn-info" >Add department</a>
                    </div>
                </div>
                <div class="table-container">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        @if($departments->count())
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->description}}</td>
                                    <td>
                                        <a class="btn btn-success btn-xs btn-group" href="{{action('DepartmentController@show', $department->id)}}" >
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        <a class="btn btn-primary btn-xs btn-group" href="{{action('DepartmentController@edit', $department->id)}}" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </a>

                                        <form action="{{action('DepartmentController@destroy', $department->id)}}"
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
                                <td colspan="8">Not departments found !!</td>
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
