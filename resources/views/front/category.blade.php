<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/front_asset/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('public/front_asset/css/modern-business.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Start Bootstrap</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php $menu=Session::get('menu'); ?>
          @foreach($category as $c)
          <li class="nav-item">
            <a class="nav-link @if($menu==$c->id) active @endif" href="{{url('/category/'.$c->id)}}">{{$c->name}}</a>
          </li>
          @endforeach
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Welcome to Modern Business</h1>

    <!-- Portfolio Section -->
    <h2>{{$cat->name}}</h2>

    <div class="row">
      @forelse($cat->news as $n)
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="{{url('/details/'.$n->id)}}"><img class="card-img-top" src="{{asset('uploads/'.$n->photo)}}" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{url('/details/'.$n->id)}}">{{$n->headline}}</a>
            </h4>
            <p class="card-text">{{ \Illuminate\Support\Str::limit($n->details, 50, $end='...') }}</p>
          </div>
        </div>
      </div>
      @empty
<h2>No Item Found!</h2>
@endforelse
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2>Modern Business Features</h2>
        <p>The Modern Business template by Start Bootstrap includes:</p>
        <ul>
          <li>
            <strong>Bootstrap v4</strong>
          </li>
          <li>jQuery</li>
          <li>Font Awesome</li>
          <li>Working contact form with validation</li>
          <li>Unstyled page elements for easy customization</li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
      </div>
      <div class="col-lg-6">
        <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('public/front_asset/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/front_asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
