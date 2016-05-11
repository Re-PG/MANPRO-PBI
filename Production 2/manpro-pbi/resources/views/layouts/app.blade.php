<!DOCTYPE html>
<html lang="en">
<head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>{{ Lang::get('Home.title') }}</title>

      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">

      <!-- Custom Fonts -->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css" type="text/css">

      <!-- Plugin CSS -->
      <link rel="stylesheet" href="/css/animate.min.css" type="text/css">

      <!-- Custom CSS -->
      <link rel="stylesheet" href="/css/creative.css" type="text/css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body id="app-layout">
    {{-- <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav> --}}

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll" href="#page-top"><img src="img/logo-01.png" width="250px" style="margin-top: -50px"></a> -->
                <a class="navbar-brand page-scroll" href="#page-top"><img src="/img/header.png" width="30px" id="logo_header">{!! Lang::get('publication.shorttitle') !!}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                        <a class="page-scroll" href="{{route('home')}}">{!! Lang::get('home.home') !!}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{route('home')}}">{!! Lang::get('home.visiMisi') !!}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{route('home')}}">{!! Lang::get('home.profil') !!}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{route('home')}}">{!! Lang::get('home.program') !!}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('home') }}">{!! Lang::get('home.publikasi') !!}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ route('home') }}">{!! Lang::get('home.kontak') !!}</a>
                    </li>
                    <li>
                      <a class="navbar-brand page-scroll" href="" id='indo'><img src="/img/Flag_of_Indonesia.svg.png" width="30px" id="logo_bendera"></a>
                    </li>
                    <li>
                        <a class="navbar-brand page-scroll" href="" id='engl'><img src="/img/uk-flag.jpg" width="30px" height="20px" id="logo_bendera"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    @yield('title')
    @yield('content')
    {{-- <section id="contact" >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading">{!! Lang::get('home.kontak') !!}</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section> --}}

    <footer class="page-footer tambahan">
		<div class="container">
			<div class="row tambahan">
				<div class="col-md-6 kiri col-lg-6 col-lg-offset-2" id="bagian-kiri">
					<div class="row">
						<div class="col s3" >
							<a href="/"><img alt="UKDW" class="logo-footer" src="/img/logo_ukdw.png"></a>
						</div>
					</div>
					<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
				</div>
				<div class="col-md-6 kanan nav_bawah col-lg-6" id="bagian-kanan">
					<h5>
            <strong>{!! Lang::get('home.title2') !!}</strong>
          </h5>
					<ul>
		              <li>
		                  <a class="page-scroll" href="#page-top">{!! Lang::get('home.home') !!}</a>
		              </li>
		              <li>
		                  <a class="page-scroll" href="#visi-misi">{!! Lang::get('home.visiMisi') !!}</a>
		              </li>
		              <li>
		                  <a class="page-scroll" href="#lect-profile">{!! Lang::get('home.profil') !!}</a>
		              </li>
		              <li>
		                  <a class="page-scroll" href="#program_pelatihan">{!! Lang::get('home.program') !!}</a>
		              </li>
		              <li>
		                  <a class="page-scroll" href="#portfolio">{!! Lang::get('home.publikasi') !!}</a>
		              </li>
		              <li>
		                  <a class="page-scroll" href="#contact">{!! Lang::get('home.kontak') !!}</a>
		              </li>
					</ul>
				</div>
			</div>
		</div>

	</footer>
  <div class="footer-copyright bottom">
    <div class="container it_kiri">© 2016 Re-PG.<span class="it_kanan">IT Project Management</span></div>
  </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
