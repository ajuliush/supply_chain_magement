@extends('layouts.admin_layout')
@section('title')
Raw Material Stock Out
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
<div class="box">
  <div class="row" style="padding: 5px">
    <div class="box">
      <div class="box">
        <div class="box-body">
        <table class="table table-bordered table-striped" border="1">
            <tbody id="itembody">
              <tr>
                <th width="200">Available Stock</th>
                 <?php $alert=App\Models\Raw_material::where('id',$p_id)->get('stock_alert');
                          $stk_alt=json_decode($alert[0]->stock_alert);

                          
                           ?>
                <td class="<?php if($avl_stk<=$stk_alt[0]){ echo "btn-danger";} elseif($avl_stk<=$stk_alt[1] ){ echo "btn-warning";} else{ echo "btn-success"; } ?>" style=" text-align: center;">{{$avl_stk}}</td>
              </tbody>
            </table>
            <div class="col-md-12 table-responsive">
              <form action="{{url('/raw_report/search/'.$p_id)}}" method="post">
                @csrf

                <table class="table table-bordered">
                  <tr>
                    <td>
                      <input type="text" autocomplete="off" name="start" class="form-control date" value="" placeholder="Date From"></td>
                      <th>-</th>
                      <td><input type="text" autocomplete="off" name="end" class="form-control date" value="" placeholder="Date To"></td>
                      <td><input type="submit" class="btn btn-block btn-primary" value="Search"></td>
                    </tr>
                  </table>
                </form>
                <table class="table table-bordered table-striped">
                  <thead class="bg-primary">
                    <tr>
                      <th>Date</th>
                      <th>Opening Stock</th>
                      <th>Stock In</th>
                      <th>Stock Out</th>
                      <th>Wastage</th>
                      <th>Closing Stock</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $start=$s_date;
                        $Date1 = $e_date;
                      $date = new DateTime($Date1);
                      $date->add(new DateInterval('P1D')); // P1D means a period of 1 day
                      $ee_date = $date->format('Y-m-d');
                    $end=$ee_date;
                    $realStart = new DateTime($start);
                    $realEnd = new DateTime($end);
                    $interval = new DateInterval('P1D');
                    $period = new DatePeriod($realStart, $interval, $realEnd);
                    $d=array();
                    foreach ($period as $key => $value) {
                      array_push($d, $value->format('Y-m-d'));
                    } ?>
                    <?php 
                    $stk_cls=0;
                     foreach ($d as $date) {?>
                      <tr>
                        <td><?php echo  $date;?></td>

                        <?php 

                        $t_stk_in=App\Models\StockIn::where('raw_material_id',$p_id)->where('created_at','<',$date)->sum('quantity');
//echo "<pre>"; var_dump($t_stk_in); 
                        $t_stk_out=App\Models\StockOut::where('raw_material_id',$p_id)->where('created_at','<',$date)->sum('quantity');
                        $t_stk_wtg=App\Models\Raw_wastage::where('raw_material_id',$p_id)->where('created_at','<',$date)->sum('quantity'); 
                        $opening=$t_stk_in-$t_stk_out-$t_stk_wtg;

                        $today_stk_in=App\Models\StockIn::where('raw_material_id',$p_id)->where('created_at','like','%'.$date.'%')->sum('quantity');
//echo "<pre>"; var_dump($t_stk_in); 
                        $today_stk_out=App\Models\StockOut::where('raw_material_id',$p_id)->where('created_at','like','%'.$date.'%')->sum('quantity');
                        $today_stk_wtg=App\Models\Raw_wastage::where('raw_material_id',$p_id)->where('created_at','like','%'.$date.'%')->sum('quantity'); 

                        $opening=$t_stk_in-$t_stk_out-$t_stk_wtg;
                        ?>
                         
                           <?php   $closing=$opening+$today_stk_in-$today_stk_wtg-$today_stk_out;  ?>
                        <td class="<?php if($opening<=$stk_alt[0]){ echo "btn-danger";} elseif($opening<=$stk_alt[1] ){ echo "btn-warning";} else{ echo "btn-success"; } ?>">{{$opening}}</td>

                        <td>{{$today_stk_in}}</td>
                        <td>{{$today_stk_out}}</td>
                        <td>{{$today_stk_wtg}}</td>

                        <td class="<?php if($closing<=$stk_alt[0]){ echo "btn-danger";} elseif($closing<=$stk_alt[1]){ echo "btn-warning";} else{ echo "btn-success"; } ?>"><?php  echo $closing  ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    @stop