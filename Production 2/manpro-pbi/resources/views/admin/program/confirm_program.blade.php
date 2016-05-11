@extends('admin.master')

@section('content')
<style media="screen">
.fotodosen{
  padding: 1px;
  height: 300px;
  width: 300px;
}
.hidden{
  display: none;
}
.show{
  display: inline;
}
}
</style>
<div id="article-content">
  <nav class="navbar-inverse">
    <div class="container">
      <h1 class="glyphicon glyphicon-duplicate"> DataDosen </h1>
      <br/><br/>
    </div>
  </nav>
  @if(Session::has('success'))
    <div class="alert-box success">
      <h2>{!! Session::get('success') !!}</h2>
    </div>
  @endif

  @include('partials.alert.errors')
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
        <div class="panel panel-default">
          <div class="col-md-10">
            <div class="panel panel-default">
              <div class="panel-heading">Konfirmasi Penghapusan Dosen</div>
              <div class="panel-body">
                <div class="col-sm-8">
                  <div class="form-group">
                    <img src="
                    @if(!strcmp($data->image , 'no image'))
                      {{ asset('/img/placeholder.png') }}
                    @else
                      {{ asset('/uploads/img/publikasi/'.$data->image)}}
                    @endif" alt="" class="fotodosen"/>
                    {!! Form::open([ 'route' => ['destroy_dosen', $data->id ]]) !!}
                    {!! Form::submit('Hapus', ['class' => 'btn btn-red']) !!}
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  @endsection
