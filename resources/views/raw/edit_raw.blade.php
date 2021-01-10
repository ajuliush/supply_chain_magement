@extends('layouts.admin_layout')
@section('title')
Raw Material List
@stop
@section('Page')
Raw Material List
@stop
@section('content')
<div class="box">
	<div class="box-body">
		<span class="text-success"> {{Session::get('msg')}}</span>
		<form action="{{url('/raw/update/'.$data->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value ="patch">
			@csrf
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<td>
					<input type="text" value="{{$data->name}}"  class="form-control" name="name">
					@error('name')
<span class="text-danger">{{$name}}</span>
					@enderror
				</td>
				<th>Unit</th>
				<td>
					<input type="text"  value="{{$data->unit}}"class="form-control" name="unit">
					@error('unit')
<span class="text-danger">{{$name}}</span>
					@enderror
				</td>
			</tr>
			<tr>
				<th>Description</th>
				<td>
					<textarea class="form-control" name="description">{{$data->description}}</textarea>
					@error('')
<span class="text-danger">{{$description}}</span>
					@enderror
				</td>
				<th>Stock Alert</th>
				<td>
					<input type="text" value="{{$data->stock_alert}}" class="form-control" name="stock_alert">
					@error('unit')
<span class="text-danger">{{$stock_alert}}</span>
					@enderror
				</td>
			</tr>
			<tr>
				
				<td colspan="4" > <input type="submit" class="btn btn-block btn-primary" value="Save"> </td>
			</tr>
		</table>
		</form>
		</div>
	</div>
	@stop