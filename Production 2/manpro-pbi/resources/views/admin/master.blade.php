<html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Admin</title>
<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href={{asset('css/styles.css')}}>
<link rel="stylesheet" href={{asset('css/creative.css')}}>
<link rel="stylesheet" href={{asset('css/bootstrap.min.css')}}>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<!-- jQuery -->
<script src="/js/jquery.js"></script>
</head>

<body>
<div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
        <br/>
              <li class="sidebar-brand">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  style="font-size:20px">
            <span class="glyphicon glyphicon-off" aria-hidden="true"> Hi,userAdmin</span>

          </a>
              </li>
      <br/><br/><br/>
              <li>
                  <a href="{{ route('data_program') }}" id="article">Program</a>
              </li>
              <li>
                  <a href="{{ route('data_publikasi') }}" id="publish">Publikasi</a>
              </li>
              <li>
                  <a href="{{ route('data_dosen') }}" id="user">Data Dosen</a>
              </li>
      <br/><br/>
      <li>
          <a href="{{ url('admin/logout') }}">LOG OUT</a>
      </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

  <!-- Header -->
  </br>

  <!-- Page Content -->
      @yield('content')
      <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


<!-- jQuery -->
<script src={{asset('js/jquery.js')}}></script>

<!-- Bootstrap Core JavaScript -->
<script src={{asset('js/bootstrap.min.js')}}></script>

<!-- Menu Toggle Script -->
<script>

$(document).ready(function(){
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });

  $("#publish-content").hide();
  $("#user-content").hide();

  $("#article").click(function(){
    $("#article-content").show();
    $("#publish-content").hide();
    $("#user-content").hide();
  });

  $("#publish").click(function(){
    $("#article-content").hide();
    $("#publish-content").show();
    $("#user-content").hide();
  });

  $("#user").click(function(){
    $("#article-content").hide();
    $("#publish-content").hide();
    $("#user-content").show();
  });
 });
</script>

</body>
</html>
