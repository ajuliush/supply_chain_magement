<aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <li class="active"><a href=""><i class="fa fa-circle-o"></i>
            Dashboard </a></li>
            <li class="treeview ">
              <a href="#">
                <i class="fa fa-clone"></i> <span>Raw Material</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/raw/new')}}"><i class="fa fa-user"></i>Add Material</a></li>
                <li><a href="{{url('/raw/list')}}"><i class="fa fa-user"></i>Material List</a></li>

                <li><a href="{{url('/stock_in/add')}}"><i class="fa fa-user"></i>Purchase</a></li>
                 <li><a href="{{url('/stock_in/stock_in_list')}}"><i class="fa fa-user"></i>Purchase Invoice</a></li>

                <li><a href="{{url('/out/add_stock')}}"><i class="fa fa-user"></i>Add Stock Out </a></li>
                <li><a href="{{url('/out/stock_out_invoice_list')}}"><i class="fa fa-user"></i>Stock Out Invoice</a></li>

                
                <li><a href="{{url('/raw_report/stock_report')}}"><i class="fa fa-user"></i>Raw Material Reports</a></li>

              </ul>
            </li>  

              <li class="treeview ">
              <a href="#">
                <i class="fa fa-clone"></i> <span>Sales Report</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/sales_rpt/summery_rpt')}}"><i class="fa fa-user"></i>Summery Report</a></li>
                <li><a href="{{url('/sales_rpt/details_rpt')}}"><i class="fa fa-user"></i>Details Report</a></li>
                
                <li><a href="{{url('/sales_rpt/depo_wise')}}"><i class="fa fa-user"></i>Depo Wise </a></li>
                <li><a href="{{url('/sales_rpt/customer_wise')}}"><i class="fa fa-user"></i>Customer Wise</a></li>
                <li><a href="{{url('/sales_rpt/sales_man_wise')}}"><i class="fa fa-user"></i>Sales Man Wisw</a></li>
                

              </ul>
            </li> 
            <li class="treeview ">
              <a href="#">
                <i class="fa fa-clone"></i> <span>Payment</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('/payment/raw_payment')}}"><i class="fa fa-user"></i>Purchase Payment</a></li>
                              
               
                

              </ul>
            </li> 
          </ul>
        </section>
      </aside>