@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error!</strong> Review the required fields.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit user</h3>
                </div>
                <div class="panel-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('users.update',$user->id) }}"  role="form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control input-sm"
                                               placeholder="User name"
                                               value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text"
                                               name="email"
                                               id="email"
                                               class="form-control input-sm"
                                               placeholder="User email"
                                               value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text"
                                               name="work_position"
                                               id="work_position"
                                               class="form-control input-sm"
                                               placeholder="Work position"
                                               value="{{$user->work_position}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <textarea name="work_functions"
                                                  class="form-control input-sm"
                                                  placeholder="Work functions">{{$user->work_functions}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"
                                           value="Update"
                                           class="btn btn-success btn-block">
                                    <a href="{{ route('users.index') }}"
                                       class="btn btn-info btn-block" >Go back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
