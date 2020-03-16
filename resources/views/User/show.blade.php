@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">User details</h3>
                </div>
                <div class="panel-body">
                    <ul class="list">
                        <li><strong>User name:</strong> {{$user->name}}</li>
                        <li><strong>Email:</strong> {{$user->email}}</li>
                        <li><strong>Work position:</strong>: {{$user->work_position}}</li>
                        <li><strong>Work functions:</strong> {{$user->work_functions}}</li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <a href="{{ route('users.index') }}"
                               class="btn btn-info btn-block" >Go to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
