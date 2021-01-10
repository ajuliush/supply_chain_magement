@extends('layouts.admin_layout')
@section('title')
    Add Raw Material
@stop
@section('Page')
    Add Raw Material
@stop
@section('content')
    <div class="box">
        <div class="box-body">
            <p>{{Session::get('msg')}}</p>
        <form action="{{url('stock_in/save')}}" method="post" enctype="multipart/form-data">
        @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">
                                 <select class="form-control chosen" name="supplierID">
                                    <option>Select Supplier</option>
                                    @foreach($stk as $data)
                                    <option value="{{$data->peopleID}}">{{$data->name}}</option>
                                @endforeach
                                </select>
                            </th>
                            <th colspan="3">
                                <select class="form-control chosen" autofocus tabindex="1"
                                    onchange="get_product_info(this.value)"  id="tt" name="raw_material_id[]">
                                    <option>Select Products</option>
                                    @foreach($raw as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                @endforeach
                                </select>
                            </th>
                            <th colspan="2">
                                <input type="text" name="created_at" class="form-control date" value="<?php echo date('Y-m-d');?>" autocomplete="off" >
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
                            <th>
                                <input type="hidden" id="sl" value="0">
                                <input type="hidden" id="tab" value="0">
                            </th>
                        </tr>
                    </thead>
                    <tbody id="body">

                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" style="text-align: right">Sub Total</th>
                            <td><input type="text" name="total[]" readonly class="form-control" id="sub"></td>
                        </tr>
                        <tr>
                            <th colspan="6" style="text-align: right">Discount</th>
                            <td><input type="text" name="discount" tabindex="100" onkeyup="calculate(this.value)"
                                    class="form-control" id="d" value="0"></td>
                        </tr>
                        <tr>
                            <th colspan="6" style="text-align: right">Total</th>
                            <td><input type="text"  readonly class="form-control" id="total"></td>
                        </tr>
                        <tr>
                            <td colspan="7"><input type="submit" class="btn btn-block btn-primary" value="Save"></td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            {{ Session::get('msg') }}
        </div>
    </div>


<script>
      var i=0;
        function get_product_info(id) {
         
          $.ajax({
            url: "{{url('/stock_in/get_info')}}/"+id, 
            type: 'GET',  
            dataType: "json",
            success: function(data){
                    var ht='<tr id="r_'+i+'">'
                 
                    ht+='<td>'+i+'</td>'
                    ht+='<input type="hidden" name="raw_material_id[]" class="form-control" value="'+data.item.id+'" id="">'
                    ht+='<input type="hidden" name="itemID[]" class="form-control" value="'+data.item.id+'">'

                    ht+='<th><input readonly type="text" class="form-control" value="'+data.item.name+'"></th>'

                    ht+='<th><input name="batchID[]" type="text" class="form-control" value="" ></th>'

                    ht+='<th><input readonly type="text" class="form-control" value="'+data.item.unit+'"></th>'
          
                    ht+='<td><input name="price[]" type="text" onkeyup="calculate('+i+')"  id="p_'+i+'" class="form-control"  value=""></td>'
          
                    ht+='<td><input name="quantity[]" type="text" onkeyup="calculate('+i+')"  id="q_'+i+'" class="form-control"  value=""></td>'
          
                    ht+='<td><input name="total[]" readonly type="text" id="t_'+i+'" class="form-control tt" value=""></td>'
                    
                    ht+='<td><a href="javascript:void(0)" class="btn btn-sm btn-danger"  onclick="remove('+i+'); calculate();">-</a></td>'
          
                    ht+='</tr>';
                    $('#body').append(ht)
                  }
                });
                i++
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
            
          }
          
          function calculate(id) {
            var price=parseFloat($('#p_'+id).val())
            var qty=parseFloat($('#q_'+id).val())
            var total=price*qty
            console.log(total)
            $('#t_'+id).val(total)
            var tt=0;
            $('.tt').each(function(){
              tt+=parseFloat($(this).val())
            })
            $('#sub').val(tt)
            var d=parseFloat($('#d').val())
            var discounted=(tt*d)/100
            $('#total').val(tt-discounted)
          }
          </script> 
@stop
@php
@endphp