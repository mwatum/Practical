@extends('layouts.app')
@section('title','Add Task')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                	<div class="col-sm-6">Add Task</div>
                	<div class="col-sm-6">
                		<a href="/tasks" class="pull-right">All Tasks</a>
                	</div>
                </div>
                </div>

                <div class="panel-body">
 <form method="POST" action="/tasks" role="form" class="form-horizontal">

 {{ csrf_field() }}

  @include('Dashboard.tasks._form')

 

<div class="form-group">
	<div class="col-sm-2 col-sm-offset-2">
		<button type="submit" class="btn btn-primary form-control">Add Task</button>
	</div>
</div>
</form>
                </div>
            </div>
            </div>
@endsection
