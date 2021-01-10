@extends('layouts.admin_layout')
@section('title')
Raw Material Stock Out
@stop
@section('Page')
Raw Material Stock Out
@stop
@section('content')
       <div class="box-body table-responsive">
          <form action="http://smzint.com/sylcoffee/Admin_panel/main_details_sales_report" method="post">
            <table class="table table-bordered">
              <tr>
                <td><input type="text" name="start" class="form-control date" value="" placeholder="Date From"></td>
                <th>-</th>
                <td><input type="text" name="end" class="form-control date" value="" placeholder="Date To"></td>
                <td><input type="submit" class="btn btn-block btn-primary" value="Search"></td>
              </tr>
            </table>
          </form>
          <table id="example1" class="table table-bordered table-striped" border="1">
            <thead style="background-color: #79a0e0">
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Invoice ID</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="itembody">
                              <tr>
                  <td>1</td>
                  <td>2020-09-15</td>
                  <td>000004
</td>
                  <td style="text-align: right;">0.00/-</td>
                  <td style="text-align: right;">211,965.00/-</td>
                  <td>
                    <a href="" class="btn btn-xs btn-primary">View</a></td>
                  </tr>
                                <tr>
                  <td>2</td>
                  <td>2020-09-15</td>
                  <td>000003
</td>
                  <td style="text-align: right;">0.00/-</td>
                  <td style="text-align: right;">114,810.00/-</td>
                  <td>
                    <a href="" class="btn btn-xs btn-primary">View</a></td>
                  </tr>
                                <tr>
                  <td>3</td>
                  <td>2020-09-05</td>
                  <td>000002
</td>
                  <td style="text-align: right;">0.00/-</td>
                  <td style="text-align: right;">67,340.00/-</td>
                  <td>
                    <a href="" class="btn btn-xs btn-primary">View</a></td>
                  </tr>
                                <tr>
                  <td>4</td>
                  <td>2020-09-05</td>
                  <td>000001
</td>
                  <td style="text-align: right;">0.00/-</td>
                  <td style="text-align: right;">76,540.00/-</td>
                  <td>
                    <a href="" class="btn btn-xs btn-primary">View</a></td>
                  </tr>
                    </tbody>
            </table>
          </div>  
@stop