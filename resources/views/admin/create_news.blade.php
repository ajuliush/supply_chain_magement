@extends('layouts.admin_layout')
@section('title')
Create News 
@stop
@section('page')
Create News 
@stop
@section('content')
<div class="box">
	<div class="box-body">
		<form action="{{url('/news')}}" method="post" enctype="multipart/form-data">
			@csrf
		<table class="table table-bordered">
			<tr>
				<th>Headline</th>
				<td>
					<input type="text" class="form-control" name="headline">
					@error('headline')
<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
				<th>Photo</th>
				<td>
					<input type="file" class="form-control" name="photo">
				</td>
			</tr>
			<tr>
				<th>Details</th>
				<td>
					<textarea class="form-control" name="details"></textarea>
					@error('details')
<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
			</tr>
			<tr>
				<th>Category</th>
				<td>
					<select name="category_id" class="form-control">
						<option value="">Select Category</option>
						@foreach($cat as $c)
						<option value="{{$c->id}}">{{$c->name}}</option>
						@endforeach
					</select>
					@error('category_id')
<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
				<td colspan="2" > <input type="submit" class="btn btn-block btn-primary" value="Save"> </td>
			</tr>
		</table>
		</form>
		</div>
	</div>
	@stop