@extends('layouts.admin_layout')
@section('title')
Raw Material Stock Out
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
<div class="box">
	<div class="box-body">
		<p style="font-size: 36px;" class="text-success text-center"> {{Session::get('msg')}}</p>
		<form action="{{url('/out/store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" id="inc" value="0" name="">
		<table class="table table-bordered" id="tbl">

			
			<thead>
			<tr>
				<th colspan="4">
				<select class="form-control" name="select" onchange="get_info(this.value)">
				<option>Select Product</option>

				@forelse($data as $d)
				
				<option value="{{$d->raw_material_id}}">{{$d->raw_mat->name}}</option>
				@empty
				<p>No data found!</p>
				@endforelse
			
		</th>
			@error('select')
			<span class="text-danger">{{$message}}</span>
				@enderror
			</select>
			<th colspan="6">
				<input type="text" name="created_at" class="form-control date" value="<?php echo date('Y-m-d')?>" >
				@error('date')
			<span class="text-danger">{{$message}}</span>
					@enderror
			</th>
			</tr>
			<tr>
				
				<th>SL</th>
				<th>Product</th>
				<th>Batch</th>
				<th>Stock</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
			</tr>
	
			</thead>
			<tbody id="body">
			
				</tbody>
				<tfoot>
				<tr>
					<th colspan="5" class="text-right">Sub Total</th>
					<td colspan="1"><input type="text" readonly="" name="" id="sub"></td>
					
				</tr>
				<tr>
					<th colspan="5" class="text-right">Discount</th>
					<td colspan="1">
						<input type="text" name="discount" autocomplete="off" onkeyup="dis_calculate()" id="d" value="0">
						
					</td>
					
				</tr>
				<tr>
					<th colspan="5" class="text-right">Total</th>
					<td colspan="1"><input type="text" name="" readonly="" id="to"></td>
					
				</tr>

			<tr>
				
				<td colspan="7" > <input type="submit" class="btn btn-block btn-primary" value="Save"> </td>
			</tr>
			</tfoot>
		</table>
		</form>
		</div>
	</div>
<script>

  function get_info(id){
      var i=(parseInt($('#inc').val()))+1
    $('#inc').val(i)
 
      $.ajax({
        url: "{{url('/out/get_info/')}}/"+id, 
        type: 'GET',  
        dataType: "json",
         
        success: function(data){
        	var ht='<tr id="r_'+i+'">'
       
         ht+='<td>'+i+'</td>'
          ht+='<input type="hidden" name="raw_material_id[]" class="form-control" value="'+data.item.id+'" id="">'
          ht+='<td><input type="hidden" name="unit[]" class="form-control" value="'+data.item.unit+'"><input type="text" readonly class="form-control" value="'+data.item.name+'"></td>'
          
          ht+='<td> <select class="form-control" id="batch_id" name="batchID[]" onchange="get_batch('+data.item.id+',this.value,'+i+')" > <option>Choose</option>' 
          data.batch.forEach(function(obj){
          	ht+='<option value="'+obj.batchID+'">'+obj.batchID+' </option>'
          })  
          ht+='</select> </td>'
          ht+='<td><input type="text" readonly id="qq_'+i+'" class="form-control " name="" ></td>'
          ht+='<td><input type="text" readonly name="price[]" onkeyup="calculate('+i+')"  id="p_'+i+'" class="form-control"  ></td>'

          ht+='<td><input type="text" name="quantity[]"  onkeyup="calculate('+i+')"  id="q_'+i+'" class="form-control"  ></td>'

          
            ht+='<td><input type="text" name="total[]" id="t_'+i+'" class="form-control tt" ></td>'
          
           ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove('+i+')">-</a></td>'

          ht+='</tr>';
          $('#body').append(ht)
        }
      });
}    
    
function remove(id){
	
  $('#r_'+id).remove()
  var tt=0;
  $('.tt').each(function(){
    tt+=parseFloat($(this).val())
  })
   $('#sub').val(tt)
  var d=parseFloat($('#d').val())
  var discounted=(tt*d)/100
  $('#to').val(tt-discounted)
  var ii=0
  $('table tbody tr td:first-child').each(function() {
    $(this).html(++ii)
  });
  $('#inc').val(ii)
}

function calculate(id) {
  var price=parseFloat($('#p_'+id).val())
  var qty=parseFloat($('#q_'+id).val())
  var stk=parseFloat($('#qq_'+id).val())
    if(qty>stk){alert('Quantity must be less or equal Stock')
  	$('#q_'+id).val(stk)
}
  var total=price*qty
  $('#t_'+id).val(total)
  var tt=0;
  $('.tt').each(function(){
    tt+=parseFloat($(this).val())
  })
  $('#sub').val(tt)
  var d=parseFloat($('#d').val())
  var discounted=(tt*d)/100
  $('#to').val(tt-discounted)

}
function dis_calculate () {
  var tt=parseFloat($('#sub').val())

  var d=parseFloat($('#d').val())
  var discounted=(tt*d)/100
  $('#to').val(tt-discounted)
}
function get_batch(id,batchID,i){
		 $.ajax({
        url: "{{url('/out/get_batch/')}}/"+id+'/'+batchID, 
        type: 'GET',  
        dataType: "json",
        success: function(data){
        	console.log(data);
        	$('#p_'+i).val(data.p)
        	$('#qq_'+i).val(data.s)
        }
        });
}
</script> 
	@stop
	

