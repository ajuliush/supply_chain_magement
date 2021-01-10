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
    <form action="{{url('/stock_in/delete/'.$stockin[0]->invoiceID)}}" method="post" enctype="multipart/form-data">
      @csrf
      
    <table class="table table-bordered" id="tbl">

      
      <thead>
      <tr>
        <th colspan="3">
        <select class="form-control" onchange="get_info(this.value)">
        <option>Select Product</option>
        @forelse($raw_name as $d)
        
        <option value="{{$d->id}}">{{$d->name}}</option>
        @empty
        <p>No data found!</p>
        @endforelse
        @error('name')
      <span class="text-danger">{{$message}}</span>
        @enderror
      </select>
    </th>
    <th colspan="3">
        <select class="form-control" name="supplierID" >
       
        @forelse($people as $d)
        
        <option value="{{$d->id}}"  <?php if($stockin[0]->supplierID==$d->id){echo 'selected';} ?>>{{$d->name}}</option>
        @empty
        <p>No data found!</p>
        @endforelse
        @error('name')
      <span class="text-danger">{{$message}}</span>
        @enderror
      </select>
    </th>
      <th colspan="2">
        <input type="text" name="created_at" class="form-control date" value="<?php echo date('Y-m-d');?>">
        @error('date')
      <span class="text-danger">{{$message}}</span>
          @enderror
      </th>
      </tr>
      <tr>
        
        <th>SL</th>
        <th>Product</th>
        <th>Batch</th>
        <th>Unit</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th></th>
      </tr>
  
      </thead>
      <tbody  id="body">
        <?php $i=0;  $subtotal=0;  ?>

      @foreach($stockin as $s)
      <?php ++$i;  $subtotal+= $s->total ?>
      <tr id="r_<?php echo  $i ?>">
      
         <td >{{$i}}
         
        <input type="hidden" name="raw_material_id[]" class="form-control" value="{{$s->raw_material_id}}" id="">

          <td>

            

            
<input type="text" readonly class="form-control" value="{{$s->raw_mat->name}}">
          </td>
          
          <td> 
            
<input type="text" name="batchID[]" class="form-control" value="{{$s->batchID}}">

        
      </td>
          <td>
            <input type="text" readonly id="qq_{{$i}}" class="form-control " name="unit[]" value="{{$s->raw_mat->unit}}">
          </td>
          <td>
            <input type="text"  name="price[]" onkeyup="calculate(<?php echo  $i ?>)"  id="p_{{$i}}" class="form-control" value="{{$s->price}}"  >
          </td>

          <td>
            <input type="text" name="quantity[]" onkeyup="calculate(<?php echo  $i ?>)"  id="q_{{$i}}" class="form-control" value="{{$s->quantity}}" >
          </td>

          
            <td>
              <input type="text" readonly name="total[]" id="t_<?php echo  $i ?>" class="form-control tt" value="{{$s->total}}" >
            </td>
          
           <td>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove(<?php echo  $i ?>)">-</a>
           </td>

          </tr>

      @endforeach

      <input type="hidden" id="inc" value="<?php echo $i ?>" name="">
        </tbody>
        <tfoot>
        <tr>
          <th colspan="6" class="text-right">Sub Total</th>
          <td colspan="1"><input type="text" readonly="" name="" value="{{$subtotal}}" id="sub"></td>
          
        </tr>
        <tr>
          <th colspan="6" class="text-right">Discount</th>
          <td colspan="1">
            <input type="text" name="discount" autocomplete="off" onkeyup="dis_calculate()" id="d" value="0">
            
          </td>
          
        </tr>
        <tr>
          <th colspan="6" class="text-right">Total</th>
          <td colspan="1"><input type="text" name="" readonly="" value="0" id="to"></td>
          
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
    var di = parseFloat($('#w').val())
    
      var i =(parseInt($('#inc').val()))+1
    $('#inc').val(i)
 
      $.ajax({
        url: "{{url('/out/get_info/')}}/"+id, 
        type: 'GET',  
        dataType: "json",
         
        success: function(data){
console.log(data)
          var ht='<tr id="r_'+i+'">'
      
         ht+='<td>'+i+'</td>'
          ht+='<input type="hidden" name="raw_material_id[]" class="form-control" value="'+data.item.id+'" id="">'
          ht+='<td><input type="hidden" name="unit[]" class="form-control" value="'+data.item.unit+'"><input type="text" readonly class="form-control" value="'+data.item.name+'"></td>'
          
          ht+='<td> <input type="text" name="batchID[]" class="form-control" value="" id=""></td>'
          ht+='<td><input type="text" readonly value="'+data.item.unit+'" id="qq_'+i+'" class="form-control " name="unit[]" ></td>'
          ht+='<td><input type="text"  name="price[]" onkeyup="calculate('+i+')"  id="p_'+i+'" class="form-control"  ></td>'

          ht+='<td><input type="text" name="quantity[]" onkeyup="calculate('+i+')"  id="q_'+i+'" class="form-control"  ></td>'

          
            ht+='<td><input type="text" name="total[]" id="t_'+i+'" class="form-control tt" value="0" ></td>'
          
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
  console.log(tt)
}
function dis_calculate() {
  
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
          calculate(i)
        }
        });
}
</script> 
  @stop
  

