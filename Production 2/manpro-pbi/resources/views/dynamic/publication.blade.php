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

  $("a[id='indo']").prop("href",  "/id/publikasi/{{ $pub->slug }}" );
  $("a[id='engl']").prop("href",  "/en/publikasi/{{ $pub->slug}}" );

</script>
<div class="all-news">
      <section class="bg">

      <div class="container">
        <div class="row hide-on-small-only valign-wrapper">
          <div class="col-md-6">
            <div class="mockup jarak-kiri">
              @if(!strcmp($pub->imgMime, 'no image'))
                <img class="responsive-img placholder" src=" {{ asset('img/document_placeholder.png') }}" style="width: 100%; height: 100%" alt="No Image">
              @else
                <img class="responsive-img" src=" {{ asset('/uploads/img/publikasi/'.$pub->slug.'.'.$pub->imgMime) }}" style="width: 100%; height: 100%" alt="No Image">
              @endif
            </div>
          </div>
          <div><h1>Publikasi</h1></div>
          <div class="col-md-6 offset-m2 valign jarak-kanan">
            <h2>{{$pub->title}}</h2>
            <h4> Ditulis Oleh: </h4>
            <ul>
                @foreach($pub->authors as $key)
                    <li>{{ $key->name }}</li>
                @endforeach
            </ul>
            <h4> Abstrak : </h4>
            <div class="white-bg">
              <p>{{$pub->abstract}}</p>
            </div>
                <a class="button button-primary" href="{!! route('download_publikasi',$pub->slug) !!}"> download</a>
            </div>
          </div>
          <!--   <div>
          <a href="#" class="btn btn-default btn-xl wow tada col-xs-6 col-centered col-min">Read ...</a>
        </div> -->


      </div>
    </section>
</div>
@endsection
