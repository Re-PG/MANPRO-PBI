@extends('admin.master')

@section('content')
<style media="screen">
  .fotodosen{
    padding: 1px;
    height: 100px;
    width: 100px;
  }
</style>
<div id="article-content">
  <nav class="navbar-inverse">
       <div class="container">
          <h1 class="glyphicon glyphicon-duplicate"> Data Program </h1>
      <br/><br/>
       </div>
  </nav>
  @if(Session::has('success'))
    <div class="alert alert-success">
        <h2>{!! Session::get('success') !!}</h2>
    </div>
  @endif

  @if($errors->any())
      <div class="alert alert-danger">
          @foreach($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
  @endif

  <div id="page-content-wrapper">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
              </div>
          </div>
      </div>
  </div>
</div>
  <div id="page-content-wrapper">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-10" >
                <div class="panel panel-default" id="daftarProg">
                    <div class="panel-heading">Daftar Program</div>
                    <div class="panel-body">
                      <table class="table">
                        @foreach($data as $program)

                        <tr>

                          <th>Judul Program</th>
                          <th>Deskripsi</th>
                          <th>Foto</th>
                          <th>Akses</th>
                          <th></th>
                        </tr>
                        <tr>
                          <td>
                            {{$program->judul}}
                          </td>
                          <td>
                            {{$program->deskripsi}}
                          </td>

                          <td>
                            <img src="{{ asset('/uploads/img/program/'.$program->image) }}" alt="" class="fotodosen"/>
                          </td>
                          <td>
                            <a href="{!! route('edit_dosen', $datadosen->id ) !!}" class="btn btn-success" role="button">Edit</a>
                            <a href="{!! route('delete_dosen', $datadosen->id )!!}" class="btn btn-danger" role="button">Hapus</a>
                          </td>


                        </tr>
                        @endforeach
                      </table>
                    </div>
                  </div>
                  <div class="btn_tambahProg">
                    <a href="#" class="btn btn-success" role="button">Tambah Program</a>
                  </div>
                      <div class="col-md-10" id= "form_tambahProg">
                          <div class="panel panel-default">
                            <div class="panel-heading">Tambah Program</div>
                              <div class="panel-body">
                                <div class="col-sm-8">

                                {!! Form::open(['route' => 'tambah_dosen', 'files' => 'true']) !!}
                                <div class="form-group">
                                    {!! Form::label('judul', 'Nama:', ['class' => 'control-label']) !!}
                                    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('profile', 'Profile:', ['class' => 'control-label']) !!}
                                    {!! Form::textarea('profile', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('image', 'Image: (Max Size 1 MB)', ['class' => 'control-label']) !!}
                                    {!! Form::file('image') !!}
                                </div>

                                {!! Form::submit('Tambah', ['class' => 'btn btn-primary']) !!}

                                {!! Form::close() !!}
                               </div>
                              </div>
                         </div>
                       </div>

                 </div>
          </div>
      </div>
  </div>
</div>

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

    $("#form_tambahProg").hide();

  $(".btn_tambahProg").click(function(){
    @if(Session::has('success'))
      $("#sukses").hide();
    @endif
    $("#form_tambahProg").show();
    $(".btn_tambahProg").hide();
    $("#daftarProg").hide();
  });

 });
</script>

@if($errors->any())
  <script type="text/javascript">
  $("#form_tambahProg").show();
  $(".btn_tambahProg").hide();
  $("#daftarProg").hide();
  </script>
@endif

@endsection
