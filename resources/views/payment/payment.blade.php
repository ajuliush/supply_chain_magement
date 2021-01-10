@extends('layouts.admin_layout')
@section('title')
Payment
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
<div class="row" style="padding: 5px">
        <div class="box">
          <div class="box">
            <div class="box-body">
              <div class="col-md-12" style="color: #79a0e0">
              </div>

<div class="row">
		<div class="col-sm-4 table-responsive ">
			
			<table class="table ">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">Supplier Name</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center" >
							<select class="form-control">
								<option>Selecet Supplier</option>
								@foreach($supplier as $supp)
								<option>{{$supp->people->name}}</option>
								@endforeach
							</select>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-4 table-responsive">
			
			<table class="table ">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">Invoice Number</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">6345134145</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-sm-4 table-responsive">
			
			<table class="table ">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">Total Amount</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">TK. 5845/-</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


	<div class="row">
		<div class="col-sm-4 table-responsive">
			
			<table class="table ">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">Payment Date</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" class="form-control date text-center" value="<?php echo date('Y-m-d') ?>"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-8 table-responsive">
			
			<table class="table ">
				<thead class="bg-primary">
					<tr>
						<th class="text-center">Payment Type</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center"><select name="" class="form-control">
							<option value="">Cash</option>
							<option value="">Bank</option>
							<option value="">Mobile banki</option>

						</select></td>
					</tr>
				</tbody>
			</table>
		</div>	
	</div>
              
            </div>
          </div>
        </div>
      </div>

			@stop