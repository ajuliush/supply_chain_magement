@extends('layouts.admin_layout')
@section('title')
Invoice Details
@stop
@section('Page')
Invoice Details
@stop
@section('content')
<span > <a href="{{url('out/print/')}}" class="btn btn-info ">Print</a></span>

<div class="box">
	<div class="box-body">
		<p style="font-size: 36px;" class="text-success text-center"> {{Session::get('msg')}}</p>
 
		<div class="col-md-6 col-sm-6 col-xs-6">
                    <h3>COMPANY NAME</h3>
                    <b>Street Address<br>
                    City: --------- , Zip: -------<br>
                    Email: ---------------------<br>
                    Phone: --------------------</b>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">  
                    <h1 style="float: right;"><b>INVOICE</b></h1>
                    <table class="table table-bordered">
                      <thead style="background-color: #79a0e0; ">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                      <tr>
                        <td style="text-align: center;">{{$data[0]->invoiceID}}</td>
                        <td style="text-align: center;">{{date('Y-m-d', strtotime($data[0]->created_at))}}</td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <table class="table table-bordered">
                      <thead style="background-color: #79a0e0; ">
                      <tr>
                        <th style="text-align: left;">BILL TO</th>

                      </tr>
                    </thead>
                      <tr>
                        <td>
                          <b>Name:&nbsp; {{$data[0]->people->name}}<br>
                            Street Address:&nbsp; {{$data[0]->people->address}} <br>
                            Email:&nbsp; {{$data[0]->people->email}} <br>
                            Phone:&nbsp; {{$data[0]->people->phone}} </b>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6"></div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Product List</h3>
                    <table class="table table-bordered table-striped" border="1">
                    <tbody>
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Batch ID</th>
                          <th>Product</th>
                          <th>Unit</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <?php $sub_total=0; $total=0; $i=0;  ?>
                      
                      @foreach($data as $d)
                    @php 
                    $sub_total += $d->total  ; $total= ($sub_total*$d->discount)/100 ; 
                    @endphp
                          <tr>
                          <td>{{++$i}}</td>
                          <td>{{$d->batchID}}</td>
                          <td>{{$d->raw_mat->name}}</td>
                          <td>{{$d->raw_mat->unit}}</td>
                          <td style="text-align: right;">{{$d->price}}/-</td>
                          <td style="text-align: right;">{{$d->quantity}}</td>
                          <td style="text-align: right;">{{$d->total}}/-</td>
                        </tr>
                           @endforeach                  
                                              </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="6" style="text-align: right;">Sub Total</th>
                          <th style="text-align: right;">{{$sub_total}}/-</th>
                        </tr>
                        <tr>
                          <th colspan="6" style="text-align: right;">Discount</th>
                          <th style="text-align: right;">{{$d->discount}}/-</th>
                        </tr>
                        <tr>
                          <th colspan="6" style="text-align: right;">Total </th>
                          <th style="text-align: right;">{{$sub_total-$total}}/-</th>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
                      <p>In you have any question about this invoice, please contact <br>
                      [Name, Phone, email@email.com]
                      </p>
                    </div>
		
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
          ht+='<input type="hidden" name="itemID[]" class="form-control" value="'+data.item.rawID+'" id="">'
          ht+='<td><input type="hidden" name="unit[]" class="form-control" value="'+data.item.unit+'"><input type="text" readonly class="form-control" value="'+data.item.name+'"></td>'
          
          ht+='<td> <select class="form-control" id="batch_id" name="batchID[]" onchange="get_batch('+data.item.rawID+',this.value,'+i+')" > <option>Choose</option>' 
          data.batch.forEach(function(obj){
          	ht+='<option value="'+obj.batchID+'">'+obj.batchID+' </option>'
          })  
          ht+='</select> </td>'
          ht+='<td><input type="text" readonly id="qq_'+i+'" class="form-control tt" name="" ></td>'
          ht+='<td><input type="text" readonly name="price[]" onkeyup="calculate('+i+')"  id="p_'+i+'" class="form-control"  ></td>'

          ht+='<td><input type="text" name="quantity[]" onkeyup="calculate('+i+')"  id="q_'+i+'" class="form-control"  ></td>'

          
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
function get_batch(rawID,batchID,i){
		 $.ajax({
        url: "{{url('/out/get_batch/')}}/"+rawID+'/'+batchID, 
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
	

