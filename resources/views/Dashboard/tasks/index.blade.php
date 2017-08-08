@extends('layouts.app')
@section('title','Tasks')

@section('content')
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="row">
                	<div class="col-sm-6">All Tasks</div>
                	<div class="col-sm-6">
                		<a href="/tasks/create" class="pull-right"><i class="fa fa-plus" aria-hidden="true"> Task</i></a>
                	</div>
                </div>
                </div>

                <div class="panel-body">
                    @if($tasks->count())
                    <div class="table-responsive">
                    	<table class="table table-hover table-bordered">
                    		<thead>
                    			<tr>
                    				<th>SN</th>
                    				<th>Title</th>
                    				<th>Body</th>
                    				<th>Status</th>
                    				<th>Created Date</th>
                    				<th>Updated Date</th>
                    				<th colspan="2">Action</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			@foreach($tasks as $task)
                    			  <tr>
                    				<td>{{ $counts++ }}</td>
                    				<td><a href="/tasks/{{ $task->id }}">{{ str_limit($task->title, 25)}}</a></td>
                    				<td>{{ str_limit($task->body, 50) }}</td>
                    				<td>
                    					@if($task->status == false)
                                            <form action="/tasks/{{$task->id}}/complete-status" method="POST" role="form">
                                          
                                                {{ csrf_field() }}
                    					        

                                            	<button type="submit" class="btn btn-link">InComplete</button>
                                            </form>
                    					@else
                                           <form action="/tasks/{{$task->id}}/complete-status" method="POST" role="form">
                                          
                                                {{ csrf_field() }}
                                           
    					     
                                            	<button type="submit" class="btn btn-link">Complete</button>
                                            </form>
                    					@endif
                    				</td>
                    				<td>{{ $task->created_at->diffForHumans() }}</td>
                    				<td>{{ $task->updated_at->diffForHumans() }}</td>

                    				<td><a href="/tasks/{{ $task->id }}/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
                    				</a>
                    				<td>
                    					<form action="/tasks/{{ $task->id }}" method="POST" role="form">
                    					{{ csrf_field() }}
                    					{{ method_field('DELETE') }}
                    				<button type="submit" class="btn btn-link"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    					</form>
                    				</td>
                    			  </tr>
                    			@endforeach
                    		</tbody>
                    	</table>
                    </div>
                    @else
                   <div class="alert alert-info">
                   	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                   	<strong>No data has been Added.</strong>
                   </div>
                    @endif
                   {{ $tasks->links() }}
                </div>
            </div>
@endsection
