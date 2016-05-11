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
      <h1 class="glyphicon glyphicon-duplicate"> Data Publikasi </h1>
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
              <div class="panel-heading">Konfirmasi Penghapusan Publikasi</div>
              <div class="panel-body">
                <div class="col-sm-8">
                  <div class="form-group">
                    <h4>Judul</h4>
                      {{$data->title}}
                      <h4>Abstrak</h4>
                      <p>
                        {{ str_limit($data->abstract,100, ' ...') }}

                      </p>
                      <h4>Penulis</h4>
                      <ul>
                        @foreach($data->authors as $auths)
                          <li> {{ $auths->name }}</li>
                        @endforeach
                      </ul>

                    <img src="
                    @if(!strcmp($data->imgMime , 'no image'))
                      {{ asset('/img/document_placeholder.png') }}
                    @else
                      {{ asset('/uploads/img/publikasi/'.$data->slug.'.'.$data->imgMime) }}
                    @endif" alt="" class="fotodosen"/>
                    {!! Form::open([ 'route' => ['destroy_publikasi', $data->id ]]) !!}
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
