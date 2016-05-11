@extends('layouts.app')
@section('content')
<div class="all-news">
  <script type="text/javascript">

    //alert("{!! Lang::get('publication.engl') !!}");
    $("a[id='indo']").prop("href",  "/id/publikasi" );
    $("a[id='engl']").prop("href",  "/en/publikasi" );

  </script>
  <?php $ctr =0; ?>
  @foreach($pubs as $content)
    @if($ctr%2 == 0)
      <section class="bg-primary">
    @else
      <section>
    @endif
      <div class="container">
        <div class="row hide-on-small-only valign-wrapper">
          <div class="col-md-6">
            <div class="mockup jarak-kiri">
              <img class="responsive-img" src="/img/portfolio/1.jpg" style="width: 100%; height: 100%" alt="Discover mockup">
            </div>
          </div>
          <div></div>
          <div class="col-md-6 offset-m2 valign jarak-kanan">
            <h2>{{$content->title}}</h2>
            <p>{{$content->shortDesc}}</p>

              @if($ctr%2 == 0)
                <a href=" {{url('/publikasi', $content->slug) }}" class="btn btn-default btn-xl wow tada col-xs-6 col-centered col-min">{{ Lang::get('publication.baca') }}</a>
              @else
               <a href=" {{url('/publikasi', $content->slug) }}" class="btn btn-primary btn-xl wow tada col-xs-6 col-centered col-min">{{ Lang::get('publication.baca') }}</a>
              @endif

            </div>

          </div>


      </div>
    </section>
    <?php $ctr++; ?>
  @endforeach
</div>
@endsection
