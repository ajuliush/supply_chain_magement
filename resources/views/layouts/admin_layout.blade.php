<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | @yield('title') </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('admin_file/admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin_file/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin_file/admin/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin_file/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin_file/admin/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/jquery-ui-1.11.4/jquery-ui.css')}}">

    <!-- chosen css start -->
    <link rel="stylesheet" href="{{asset('admin_file/admin/plugins/chosen/docsupport/prism.css')}}">
    <link rel="stylesheet" href="{{asset('admin_file/admin/plugins/chosen/chosen.css')}}">
    <!-- chosen css end -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="" class="logo">
          <span class="logo-mini"><b>Admin</b></span>
          <span class="logo-lg"><b>Admin Panel</b></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li><a href="" target="_blank"><i class="fa fa-globe"></i></a></li>
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('admin_file/admin/dist/img/avatar5.png')}}" class="user-image"
                  alt="User Image">
                  <span class="hidden-xs">
                    {{ Auth::user()->name }}
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="{{asset('admin_file/admin/dist/img/avatar5.png')}}"
                    class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-4 text-center">
                      </div>
                      <div class="col-xs-4 text-center">
                      </div>
                      <div class="col-xs-4 text-center">
                      </div>
                    </div>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                      <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    @include('admin.leftmenu')
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            @yield('page')
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">@yield('page')</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
           @yield('content')
          </div>
        </section>
      </div>
    </section>
  </div>

  <footer class="main-footer">
    
    <strong>Copyright &copy; <?php echo date("Y")?> - <?php echo date('Y', strtotime('+1 years'))?> <a href="http://prantiksoft.com/">PRANTIK-SOFT</a>.</strong> All rights
    reserved.
  </footer>
  <script src="{{asset('admin_file/admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{asset('admin_file/admin/bootstrap/js/bootstrap.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{asset('admin_file/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <!-- SlimScroll -->
  <!-- AdminLTE App -->
  <script src="{{asset('admin_file/admin/dist/js/app.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('admin_file/admin/dist/js/demo.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/jquery-ui-1.11.4/jquery-ui.js')}}"></script>
  <script src="{{asset('admin_file/ckeditor/ckeditor.js')}}"></script>
  <!-- page script -->
  <!-- chosen script start -->
  <script src="{{asset('admin_file/admin/plugins/chosen/chosen.jquery.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin_file/admin/plugins/chosen/docsupport/prism.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{asset('admin_file/admin/plugins/chosen/docsupport/init.js')}}" type="text/javascript" charset="utf-8"></script>

  <!-- chosen script end -->
  <script>
  $( function() {
    $( ".date" ).datepicker( {dateFormat:"yy-mm-dd"});
  } );
  </script>
  <script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    
  });

  </script>
  <script>
  </body>
  </html>