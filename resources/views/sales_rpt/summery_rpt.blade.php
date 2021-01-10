@extends('layouts.admin_layout')
@section('title')
Raw Material Stock Out
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
<div class="col-md-12 table-responsive">
    <form action="{{url('/sales_rpt/by_search/')}}" method="post">
        @csrf

        <table class="table table-bordered">
          <tr>
            <td>
              <input type="text" name="start" autocomplete="off" class="form-control date" value="" placeholder="Date From"></td>
              <th>-</th>
              <td><input type="text" name="end" autocomplete="off" class="form-control date" value="" placeholder="Date To"></td>
              <td><input type="submit" class="btn btn-block btn-primary" value="Search"></td>
          </tr>
      </table>
  </form>
</div>
<div>
	<canvas id="myChart"></canvas>

	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

	<script type="text/javascript">var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        <?php  
        $realStart = new DateTime($s);
        $realEnd = new DateTime($e);
        $interval = new DateInterval('P1M');
        $period = new DatePeriod($realStart, $interval, $realEnd);
        $d=array();
        foreach ($period as $dt) {
            array_push($d, $dt->format('M-Y')); } ?>

            labels: <?php echo json_encode($d); ?>,
            datasets: [{
              label: 'Sales Report',

              borderColor: 'rgb(255, 99, 132)',
              <?php $dd=array();
              foreach ($data as $k) {
                array_push($dd,$k->total); } 

                ?>
                data:<?php echo json_encode($dd); ?>

            }]

        },

    // Configuration options go here
    options: {}
});</script>
</div>
<div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped" border="1">
            <thead style="background-color: #79a0e0">
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Subtotal</th>
                <th>Discount</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="itembody">
              @foreach($data as  $d)
             <?php $i=0;
              $dd=strtotime($d->created_at);
              $date=date('Y-m-d',$dd);?>
              
              
                              <tr>
                  <td style="text-align: center;">{{++$i}}</td>
                  <td style="text-align: center;">{{$date}}</td>
                  <td style="text-align: right;">/-</td>
                  <td style="text-align: right;">{{$d->discount}}/-</td>
                  <td style="text-align: right;">/-</td> 
                                </tr>
                                @endforeach
                  
                              </tbody>
            </table>
          </div>
        </div>
      </div>
@stop