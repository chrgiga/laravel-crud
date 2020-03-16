@extends('layouts.layout')
@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Department details</h3>
                </div>
                <div class="panel-body">
                    <ul class="list">
                        <li><strong>Department name:</strong> {{$department->name}}</li>
                        <li><strong>Description:</strong> {{$department->description}}</li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-2 col-md-offset-5">
                            <a href="{{ route('departments.index') }}"
                               class="btn btn-info btn-block" >Go to departments list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
