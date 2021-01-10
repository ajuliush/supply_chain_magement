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
	
		<table class="table table-bordered" id="example1">

				<p class="text-center text-success" style="font-size: 36px">{{Session::get('msg')}}</p>
				<p class="text-center text-danger" style="font-size: 36px">{{Session::get('msg1')}}</p>
			<thead>
				<tr class="bg-primary">
					<th>SL</th>
					<th>Name</th>
					<th>Unit</th>
					<th>Description</th>
					<th>Stock Alert</th>
					<th>Deleted</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@forelse($data as $d)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$d->name}}</td>
					<td>{{$d->unit}}</td>
					<td>{{$d->description}}</td>
					<td >{{preg_replace('/[^0-9]/','  ',$d->stock_alert)}}</td>
					<td>{{$d->deleted}}</td>
					<td>
						<a href="{{url('/raw/edit/'.$d->id)}}" class="btn btn-xs btn-primary">Edit</a> | 
						<a class="btn btn-xs btn-danger" href="{{ url('/raw/delete/'.$d->id) }}"
                      onclick="event.preventDefault();
                      document.getElementById('delete-form{{$d->id}}').submit();">
                      {{ __('Delete') }}
                    </a>

                    <form id="delete-form{{$d->id}}" action="{{ url('/raw/delete/'.$d->id) }}" method="POST" class="d-none">
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
