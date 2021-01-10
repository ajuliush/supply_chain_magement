@extends('layouts.admin_layout')
@section('title')
Raw Material Stock Out
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
<table id="example1" class="table table-bordered table-striped" border="1">
	<thead style="background-color: #69bdd2">
		<tr>
			<th>SL</th>
			<th>Name</th>
			<th>Description</th>
			<th>Available Stock</th>
		</tr>
	</thead>
	<tbody id="itembody">
		<?php $i=0; ?>
		@foreach($data as $d)
		<tr>
			<td>{{++$i}}</td>
			<td> <a href="{{url('/raw_report/single_stockout/'.$d->id)}}">{{$d->name}}</a> </td>
			<td>{{$d->description}}</td>
			<?php $t_stk_in=App\Models\StockIn::where('raw_material_id',$d->id)->sum('quantity');
			$t_stk_out=App\Models\StockOut::where('raw_material_id',$d->id)->sum('quantity');
			$t_stk_wtg=App\Models\Raw_wastage::where('raw_material_id',$d->id)->sum('quantity');
			$t_stk_rtn=App\Models\Raw_material_return::where('raw_material_id',$d->id)->sum('quantity');

			$total=($t_stk_in-$t_stk_out)-$t_stk_wtg+$t_stk_rtn;
		 $color= $d->stock_alert;
		 $color_2=json_decode($color);

			 ?>
			<td class="<?php if($color_2[0]<$total){echo 'btn-success';} elseif($color_2[1]<$total){echo 'btn-warning ';} elseif($color_2[2]>$total) {echo 'btn-danger';}; ?>">{{$total}} {{$d->unit}} </td>
			
		</tr>
		@endforeach
			</tbody>
			</table>
			@stop