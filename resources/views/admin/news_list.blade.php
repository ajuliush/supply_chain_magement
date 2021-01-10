@extends('layouts.admin_layout')
@section('title')
News List
@stop
@section('page')
News List
@stop
@section('content')
<div class="box">
	<div class="box-body">
		<table class="table table-bordered" id="example1">
			<thead>
				<tr class="bg-primary">
					<th>Headline</th>
					<th>Category</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse($data as $d)
				<tr>
					<td>{{$d->headline}}</td>
					<td>{{$d->category->name}}</td>
					<td>
						<a href="{{url('/news/'.$d->id)}}" class="btn btn-xs btn-success">Details</a> | 
						<a href="{{url('/news/'.$d->id.'/edit')}}" class="btn btn-xs btn-primary">Edit</a> | 
						<a class="btn btn-xs btn-danger" href="{{ url('/news/'.$d->id) }}"
                      onclick="event.preventDefault();
                      document.getElementById('delete-form').submit();">
                      {{ __('Delete') }}
                    </a>

                    <form id="delete-form" action="{{ url('/news/'.$d->id) }}" method="POST" class="d-none">
                    	<input type="hidden" name="_method" value="DELETE">
                      @csrf
                    </form>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="3">No item found!</td>
				</tr>
				@endforelse
			</tbody>
		</table>
		{{Session::get('msg')}}
		</div>
	</div>
	@stop