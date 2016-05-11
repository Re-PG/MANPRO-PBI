<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{!! Lang::get('home.title') !!}</title>

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
    <link rel="stylesheet" href="/css/">

    <!-- css Nivo slider-->
    <link rel="stylesheet" href="/css/nivo-slider.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/css/default.css" type="text/css" media = "screen">
    <link rel="stylesheet" href="/css/style.css" type="text/css" media="screen">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Slider -->
    <link rel="stylesheet" href="/css/default.css" media="screen" title="no title" charset="utf-8">
    <script type="text/javascript" src="/js/jquery.nivo.slider.js"></script>
    <script type="text/javascript" src="/js/jquery.nivo.slider.pack.js"></script>

    {{-- <script type="text/javascript">
    (function ($) {
        $(document).ready(function() {
          if (typeof window.location.hash !== 'undefined') {
            $("html, body").animate({ scrollTop: $({{ $scroll }}).offset().top }, 1000);
          }
        });
    })(jQuery);
    /*
      id isi page :
      header : 'welcome'
      visi misi : 'visi-misi'
      profil : 'lect-profile'
      program : 'program-pelatihan'
      publikasi :'portfolio'
    */
    </script> --}}
</head>

<body id="page-top">
  @if(Auth::user()){
    {{Auth::logout()}}
  }
  @endif

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
                <a class="navbar-brand page-scroll" href="#page-top"><img src="/img/header.png" width="30px" id="logo_header">{!! Lang::get('home.shorttitle') !!}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
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
                    <li>
                      <a class="navbar-brand page-scroll" href="/id/home"><img src="/img/Flag_of_Indonesia.svg.png" width="30px" id="logo_bendera"></a>
                    </li>
                    <li>
                        <a class="navbar-brand page-scroll" href="/en/home"><img src="/img/uk-flag.jpg" width="30px" height="20px" id="logo_bendera"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <nav id="mainNav2" class="navbar navbar-default">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right" >
              <li>
                  <a class="page-scroll" href="#">Logout</a>
              </li>

          </ul>
      </div>
    </nav>

    <header id="welcome">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>{!! Lang::get('home.welcome') !!}</h1>
                <hr>
                <p>{!! Lang::get('home.title2') !!}</p>
                <a href="#visi-misi" class="btn btn-primary btn-xl page-scroll">{!! Lang::get('home.selanjutnya') !!}</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="visi-misi">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">{!! Lang::get('home.visiMisi') !!}</h2>
                    <hr class="light">
                    <p class="text-faded">{!! Lang::get('home.visi') !!}</p>
                    <p class="text-faded">{!! Lang::get('home.misi') !!}</p>
                    <br>
                    <!-- <hr class="light"> -->
                    <a href="#contact" class="page-scroll btn btn-default btn-xl">{!! Lang::get('home.join') !!}</a>
                </div>
            </div>
        </div>
    </section>

    <section id="lect-profile">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">{!! Lang::get('home.profile') !!}</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($Dosens as $dosen)
                  <div class="col-lg-3 col-md-6 text-center">
                      <div class="service-box">
                          <i class="fa fa-4x wow bounceIn text-primary">
                          	<img class="img-profil img-circle" src="
                              @if(!strcmp($dosen->image , 'no image'))
                                  {{ asset('/img/placeholder.png') }}
                              @else
                                  {{ asset('/uploads/img/dosen/'.$dosen->image)}}
                              @endif"/>
                          </i>
                          <h3>{{ $dosen->nama }}</h3>
                          <p class="text-muted">{{ $dosen->profile }}</p>
                      </div>
                  </div>

                @endforeach
                {{-- <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn text-primary">
                        	<img class="img-profil img-circle" src="/img/profil2.jpg">
                        </i>
                        <h3>Dosen 2</h3>
                        <p class="text-muted">Profil singkat bla bla bla</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn text-primary">
                        	<img class="img-profil img-circle" src="/img/profil3.jpg">
                        </i>
                        <h3>Dosen 3</h3>
                        <p class="text-muted">Profil singkat bla bla bla</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x wow bounceIn text-primary">
                        	<img class="img-profil img-circle" src="/img/profil1.jpg">
                        </i>
                        <h3>Dosen 4</h3>
                        <p class="text-muted">Profil singkat bla bla bla</p>
                    </div>
                </div> --}}
            </div>
            <div class="container text-center" style="padding-top: 8%">
              <hr class="primary">
                <a href="#" class="btn btn-primary btn-xl wow tada">Lihat Selengkapnya</a>
            </div>
            <!-- btn btn-default btn-xl wow tada -->
        </div>
    </section>

    <section id="program_pelatihan">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">{!! Lang::get('home.programtraining') !!}</h2>
                    <hr class="primary">

                      <div id="wrapper" style="height: 50%; width: 120% ; margin-left: -10%">
                        <div class="slider-wrapper theme-default">
                            <div id="slidder" class="nivoSlider">
                                <a href="">
                                  <img src="/img/IECC.jpg" alt="" title="Intensive English Conversation Class TOEFL"/>
                                </a>

                                <a href="">
                                  <img src="/img/Culture_Event.jpg" alt="" title="Culture_Event">
                                </a>

                                <a href="">
                                  <img src="/img/ICE.jpg" alt="" title="Introduction to College English"/>
                                </a>

                                <a href="English Corner">
                                  <img src="/img/English_Corner.jpg" alt="" title="English Corner Program">
                                </a>
                            </div>
                            <div id="htmlcaption" class="nivo-html-caption">
                            </div>
                        </div>
                        <script type="text/javascript">
                        jQuery(document).ready(function($) {
                              $('#slidder').nivoSlider();
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding bg-dark" id="portfolio">
    	<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="padding-top: 10%;">{!! Lang::get('home.publikasi') !!}</h2>
                    <hr class="primary" style="padding-bottom: 4%;">
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Judul Publikasi
                                </div>
                                <div class="project-name">
                                    Deskripsi singkat
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                              <div class="project-category text-faded">
                                  Judul Publikasi
                              </div>
                              <div class="project-name">
                                  Deskripsi singkat
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                              <div class="project-category text-faded">
                                  Judul Publikasi
                              </div>
                              <div class="project-name">
                                  Deskripsi singkat
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                              <div class="project-category text-faded">
                                  Judul Publikasi
                              </div>
                              <div class="project-name">
                                  Deskripsi singkat
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                              <div class="project-category text-faded">
                                  Judul Publikasi
                              </div>
                              <div class="project-name">
                                  Deskripsi singkat
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="#" class="portfolio-box">
                        <img src="/img/placeholder/placeholder1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                              <div class="project-category text-faded">
                                  Judul Publikasi
                              </div>
                              <div class="project-name">
                                  Deskripsi singkat
                              </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <div class="bg-dark container text-center col-md-4" style="width:100%; height:auto; padding-top:5%; padding-bottom: 5%">
            <div class="call-to-action">
                <!-- <h2>Want to see all the news?</h2> -->
                <a href="{!! route('home_publikasi')!!}" class="btn btn-default btn-xl wow tada">{!! Lang::get('home.selengkapnya') !!}</a>
            </div>
        </div>
    </section>

    <!-- <aside class="bg-dark"> -->

    <!-- </aside> -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center" style="margin-top: 12%">
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
    </section>


    <footer class="page-footer" style="background-color: #F05F40;">
		<div class="container">
			<div class="row tambahan">
				<div class="col-md-6 kiri col-lg-4 col-lg-offset-2 text-center">
					<div class="row">
						<div class="col s3" >
							<a href="/"><img alt="UKDW" class="logo-footer" src="/img/logo_ukdw.png"></a>
						</div>
					</div>
					<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h5>
				</div>
				<div class="col-md-6 kanan nav_bawah col-lg-4 text-center">
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

  <div class="footer-copyright">
    <div class="container">© 2016 Re-PG.<span class="it_kanan">IT Project Management</span></div>
  </div>

	</footer>


    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/js/jquery.easing.min.js"></script>
    <script src="/js/jquery.fittext.js"></script>
    <script src="/js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/creative.js"></script>

</body>

</html>
