@extends('admin.master')

@section('content')
<style media="screen">
  .fotodosen{
    padding: 1px;
    height: 200px;
    width: 200px;
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
              <div class="panel-heading">Edit Dosen</div>
              <div class="panel-body">
                <div class="col-sm-8">
                  {!! Form::open([ 'route' => ['update_dosen', $data->id ], 'files' => 'true']) !!}

                  <div class="form-group">
                    {!! Form::label('nama', 'Nama:', ['class' => 'control-label']) !!}
                    {!! Form::text('nama', $data->nama , ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                    {!! Form::label('jabatan', 'Jabatan:', ['class' => 'control-label']) !!}
                    {!! Form::text('jabatan', $data->jabatan, ['class' => 'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('profile', 'Profile:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('profile', $data->profile, ['class' => 'form-control']) !!}
                  </div>

                  <div class="form-group">
                    <img src="
                    @if(!strcmp($data->image , 'no image'))
                      {{ asset('/img/placeholder.png') }}
                    @else
                      {{ asset('/uploads/img/dosen/'.$data->image)}}
                    @endif" alt="" class="fotodosen"/>
                    <script type="text/javascript">
                    function toggler() {
                      $("#changeimg").toggle();
                      if( $("#changeImage").val() === 'false'){
                        $("#changeImage").val('true');
                      }else{
                        $("#changeImage").val('false');
                      }
                    }
                    </script>
                  </div>
                  <a class="btn btn-primary" onclick="toggler()" role="button" >Change Image: </a>
                  <div class="form-group" id="changeimg">
                    {!! Form::label('image', 'Choose file: ', ['class' => 'control-label']) !!}
                    {!! Form::hidden('changeImage', 'true', ['id'=>'changeImage'])!!}
                    {!! Form::file('image') !!}
                  </div>
                  <script type="text/javascript">
                    toggler();
                  </script>
                  <br/>
                  <br/>
                  {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}

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
