@extends('layouts.app')
@section('last_head')
<title>{{ config('app.name', 'Laravel') }} - {{$curso->titulo}}  </title>
@endsection
@extends('layouts.navbar')

@section('content')

<section class="image1 cid-rArXFY2Iib" id="image01-8">
    <div class="container"></div>
</section>

<section class="content2 cid-rArXFNF7KR" id="content02-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 md-pb">
                <h1 class="mbr-section-title align-left mbr-bold mbr-black pb-5 mbr-fonts-style display-2" style="text-align: center;color:#8cac40;">{{ strtoupper($curso->titulo) }}</h1>
                <img src="{{ $curso->foto }}" alt="" style="margin-right: auto; margin-left: auto;">
                <h5 class="item-title mbr-fonts-style display-4" style="font-size:16px; text-align: right"><em>{{ strftime("%B %e, %Y", strtotime($post->created_at)) }}</em></h5>
            </div>

            <div class="col-lg-12 display-7" style="margin-top: 4rem;">
                {{ $curso->texto }}
            </div>
        </div>
    </div>
</section>

@endsection
