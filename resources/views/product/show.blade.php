@extends('layouts.master')

@section('titel', $product->name)
@section('description', wordwrap($product->description, 500))
@section('breadcrumbs', Breadcrumbs::render('product.show', $product))

@push('meta')
    {{--<!-- for Facebook -->--}}
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:type" content="company" />
    <meta property="og:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:description" content="{{$product->description}}" />

    <meta property="article:section" content="{{$product->name}}" />
    <meta property="article:published_time" content="{{$product->created_at}}" />
    <meta property="article:modified_time" content="{{$product->updated_at}}" />
    {{--<!-- for Twitter -->--}}
    <meta name="twitter:card" content="product" />
    <meta name="twitter:title" content="{{$product->name}}" />
    <meta name="twitter:description" content="{{$product->description}}" />
    <meta name="twitter:url" content="{{Request::url()}}" />
    <meta name="twitter:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
            <div class="gallery">
                <div class="panel-body">
                     @if($product->productimages()->exists())
                        @foreach($product->productimages()->get() as $image) 
                            <div class="featured">
                                <img src="/images/product/{{$image->imagePath}}">
                            </div>
                        @endforeach
                    @else
                        <img width="100%" src="/images/dummy.jpsg">
                    @endif
                </div>
                <div class="panel-footer">
                    <div class="thumbnails">
                        <img src="/images/product/{{$image->imagePath}}" class="selected-img">
                        <img src="http://placehold.it/350x150&text=Slide+Two">
                        <img src="http://placehold.it/350x150&text=Slide+Three">
                    </div>
                </div>
                </div>
            </div>
<div class="panel panel-default">
                <div class="panel-body">

            <h3>reviews</h3>
            @foreach($product->review as $review)
                <div class="well">
                    <span>Naam: {{$review->user->voornaam}}</span><span class="pull-right">Rating: {{$review->rating}}</span><br><br>
                    <p>Beschrijving: <br>{{$review->description}}</p>
                </div>

            @endforeach
            </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1 style="">{{$product->name}}</h1>
                    <br>
                    @if($product->discount == 0)
                        <b style="font-size: 20px;">&euro;{{ number_format($product->price, 2) }}</b>
                    @else
                        <span style="text-decoration:line-through;">&euro;{{ $product->price }}</span>
                        <b style="font-size: 20px;">&euro;{{ number_format( $product->price - $product->discount, 2) }}</b>
                    @endif
                    <br>
                    <br>

                    {!! Form::model($product, array('route' => 'cart.add', 'method' => 'post')) !!}
                        <label>Aantal</label>
                        <select id="qty" class="form-control" name="qty" >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>

                        @if($product->property()->first()->detail_id)
                            <div class="form-group {{$errors->has('product_id') ? ' has-error' : ''}}">
                                <label for="detail" style="{{ $errors->has('product_id') ? ' color: #A94442' : '' }}">{{$product->property()->first()->detail->type}}</label>
                                @if($product->property()->first()->detail->type)
                                    <select id="product_id" class="form-control" name="product_id" >
                                        <option value="">Maak uw keuzen.</option>
                                        @foreach($product->property as $property)
                                            @if($property->stock < 1)
                                                <option value="{{$property->id}}" disabled>{{$property->detail->value}}  -  <small>uitverkocht</small></option>
                                            @else
                                                <option value="{{$property->id}}">{{$property->detail->value}}  -  <small>op voorraad</small></option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @else
                            <input type="hidden" value="{{$product->property()->first()->serialNumber}}" name="serialcode">
                        @endif

                        <button class="col-md-12 btn btn-lg btn-primary" style="background: #3270B4; border-radius: 1px !important;" type="submit">
                            <i class="fa fa-plus" style="margin-right: 20px;" aria-hidden="true"></i>
                            Toevoegen aan winkelwagen
                        </button>
                        <br>
                        <br>
                        <br>
                        <br>
                    {{ Form::close() }}

                    <label>beschrijving</label><br />
                    {!! nl2br($product->description) !!}

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                <h3>Andere aanbiedingen</h3>
                <br>
            </div>
        </div>

    </div>



    {{--TODO antoine dit moet in css--}}
    <style>
        .art-title {
            color: #231f20;
            font-size: 20px;
            font-weight: 700;
        }

        .artist-data {
            width: 100%;
            padding-bottom: 25px;
        }

        .artst-pic {
            width: 33%;
            position: relative;
        }

        .artst-pic span a {
            color: #fff;
            font-size: 16px;
            display: none;
        }

        .artst-pic span.artst-like {
            position: absolute;
            left: 11%;
            bottom: 10px;
        }

        .artst-pic span.artst-share {
            position: absolute;
            left: 46%;
            bottom: 10px;
        }

        .artst-pic span.artst-plus {
            position: absolute;
            right: 9%;
            bottom: 10px;
        }

        .artst-prfle {
            width: 63%;
        }

        .artst-prfle span.artst-sub {
            font-size: 15px;
            color: #bbb;
            float: left;
            width: 100%;
            font-weight: normal;
            padding: 5px 0;
        }

        .artst-prfle span.artst-sub span.byname {
            font-weight: 700;
            color: #aaa;
        }

        .artst-prfle span.artst-sub span.daysago {
            float: right;
            font-size: 12px;
        }

        .counter-tab {
            float: left;
            width: 100%;
            padding-top: 45px;
        }

        .counter-tab div {
            float: left;
            width: 33%;
            color: #aaa;
            font-size: 12px;
        }

        .bot-links {
            float: left;
            width: 100%;
            padding-top: 10px;
        }

        .bot-links a {
            display: inline-block;
            padding: 5px;
            background: #ccc;
            font-size: 12px;
            margin-bottom: 5px;
            color: #9c9c9c;
            text-decoration: none;
        }

        span.play-icon {
            position: absolute;
            left: 31%;
            top: 32%;
            display: none;
        }

        .artst-pic:hover img.play-icon, .artst-pic:hover span a {
            display: block;
        }
</style>
<style type="text/css">
    .gallery {
}
.gallery .featured img {
  width: 100%;
}
.gallery .thumbnails {
  padding-top: 3%;
}
.gallery .thumbnails img:nth-child(2) {
  margin-left: 2%;
  margin-right: 2%;
}
.gallery .thumbnails img {
  width: 31%;
  cursor: pointer;
  height: 85px;
}
.gallery .selected-img {
  border: 3px solid red;
  background-color: rgba(0, 0, 0, 0.7);
}

</style>
<script type="text/javascript">
    $('.thumbnails img').click(function() {
  // if not already selected then
  if(!$(this).hasClass('selected-img')) {
    $('.thumbnails img').removeClass('selected-img');
    $(this).addClass('selected-img');
    $(".featured img").fadeOut(0);
    $('.featured img').attr('src', $(this).attr('src')).fadeIn(1000);
  }
});
</script>
@endsection