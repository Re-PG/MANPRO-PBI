@extends('layouts.app').
@section('content')
<style media="screen">
  .white-bg{
    background:#ffffff;
    color: #000000;
  }
  .placholder{
    width: 40%;
  }
</style>
<script type="text/javascript">

  $("a[id='indo']").prop("href",  "/id/program/{{ $prog->id }}" );
  $("a[id='engl']").prop("href",  "/en/program/{{ $prog->id }}" );

</script>
<div class="all-news">
      <section class="bg">

      <div class="container">
        <div class="row hide-on-small-only valign-wrapper">
          <div class="col-md-6">
            <div class="mockup jarak-kiri">
                <img class="responsive-img" src=" {{ asset('/uploads/img/program/'.$prog->image ) }}" style="width: 100%; height: 100%" alt="No Image">
            </div>
          </div>
          <div><h1>Program</h1></div>
          <div class="col-md-6 offset-m2 valign jarak-kanan">
            <h2>{{$prog->judul}}</h2>
            <h4> Deskripsi : </h4>
            <div class="white-bg">
              <p>{{$prog->deskripsi}}</p>
            </div>
            </div>
          </div>
          <!--   <div>
          <a href="#" class="btn btn-default btn-xl wow tada col-xs-6 col-centered col-min">Read ...</a>
        </div> -->


      </div>
    </section>
</div>
@endsection
