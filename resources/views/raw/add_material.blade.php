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
		<p style="font-size: 36px;" class="text-success text-center"> {{Session::get('msg')}}</p>
		<form action="{{url('/raw/store')}}" method="post" enctype="multipart/form-data">
			@csrf
		<table class="table table-bordered">
			<tr>
				<th>Name</th>
				<td>
					<input type="text" class="form-control" name="name">
					@error('name')
			<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
				<th>Unit</th>
				<td>
					<input type="text" class="form-control" name="unit">
					@error('unit')
<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
			</tr>
			<tr>
				<th>Description</th>
				<td>
					<textarea class="form-control" name="description"></textarea>
					@error('description')
<span class="text-danger">{{$message}}</span>
					@enderror
				</td>
				<th>Stock Alert</th>
				<td>
					<div class="container-fluid row">
                    <div class="form-group col-md-4 row">
                      <label style="background: #f44641; width: 100%; color: #f44641">.</label>
                      <input type="text" name="stock_alert[]" value="" class="form-control">
                    </div>
                    <div class="form-group col-md-4 ">
                      <label style="background: #f4a941; width: 100%; color: #f4a941">.</label>
                      <input type="text" name="stock_alert[]" value="" class="form-control">
                    </div>
                    <div class="form-group col-md-4 ">
                      <label style="background: #cbf442; width: 100%; color: #cbf442">.</label>
                      <input type="text" name="stock_alert[]" value="" class="form-control">
                    </div>
                  </div>
                  @error('stock_alert')
<span class="text-danger">{{$message}}</span>
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