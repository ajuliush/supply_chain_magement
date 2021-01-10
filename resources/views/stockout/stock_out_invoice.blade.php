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
					<th>Data</th>
					<th>InvoiceID</th>
					<th>Discount</th>
					<th>Total</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $i=1; ?>
				@forelse($data as $d)
				<tr>
					<td>{{$i++}}</td>
					<td>{{date('Y-m-d', strtotime($d->created_at))}}</td>
					<td>{{$d->invoiceID}}</td>
					<td>{{$d->discount}}</td>
					<?php $total=App\Models\StockOut::where('invoiceID',$d->invoiceID)->sum('total'); ?>
					<td>{{$total}}</td>
					
					<td>
						<a href="{{url('/out/print/'.$d->invoiceID)}}" class="btn btn-xs btn-primary">View</a> |
						<a href="{{url('/out/edit/'.$d->invoiceID)}}" class="btn btn-xs btn-success">Edit</a> | 
						<a class="btn btn-xs btn-danger" href="{{ url('/out/delete/'.$d->invoiceID) }}"
                      onclick="event.preventDefault();
                      document.getElementById('delete-form{{$d->invoiceID}}').submit();">
                      {{ __('Delete') }}
                    </a>

                    <form id="delete-form{{$d->invoiceID}}" action="{{ url('/out/delete/'.$d->invoiceID) }}" method="POST" class="d-none">
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
