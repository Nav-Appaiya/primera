@extends('layouts.master')

@section('titel', $product->name)
@section('description', wordwrap($product->description, 500))
@section('breadcrumbs', Breadcrumbs::render('product.show', $product))

@push('meta')
    {{--<!-- for Facebook -->--}}
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:type" content="company" />
    @if($product->productimages()->exists())
        <meta property="og:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
    @endif

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
    @if($product->productimages()->exists())
        <meta name="twitter:image" content="{{route('homepage')}}/images/product/{{$product->productimages()->first()->imagePath}}" />
    @endif
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="gallery">
                    <div class="panel-body">

                        <div class="slider-for" style="width: 100%; ">
                            @if($product->productimages()->exists())
                                @foreach($product->productimages()->get() as $image)
                                    <div class="featured">
                                        <img src="/images/product/{{$image->imagePath}}" class="img-responsive">
                                    </div>
                                @endforeach
                            @else
                                <div class="featured">
                                    <img src="http://placehold.it/350x150&text=Slide+Two" class="img-responsive">
                                </div>
                            @endif
                        </div>

                        <div class="slider-nav">
                            @if($product->productimages()->exists())
                                @foreach($product->productimages()->get() as $image)
                                    <div class="featured">
                                        <img src="/images/product/{{$image->imagePath}}" class="img-responsive">
                                    </div>
                                @endforeach
                            @else
                                <div class="featured">
                                    <img src="http://placehold.it/350x150&text=Slide+Two" class="img-responsive">
                                </div>
                            @endif
                        </div>
                         {{--@if($product->productimages()->exists())--}}
                            {{--@foreach($product->productimages()->get() as $image) --}}
                                {{--<div class="featured">--}}
                                    {{--<img src="/images/product/{{$image->imagePath}}">--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@else--}}
                            {{--<img width="100%" src="/images/dummy.jpsg">--}}
                        {{--@endif--}}
                    </div>
                    {{--<div class="panel-footer">--}}
                        {{--<div class="thumbnails">--}}
                            {{--<img src="/images/product/{{$image->imagePath}}" class="selected-img">--}}
                            {{--<img src="http://placehold.it/350x150&text=Slide+Two">--}}
                            {{--<img src="http://placehold.it/350x150&text=Slide+Three">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                <!-- accordion toepassen waar je wilt! -->
                    <button type="button" class="-acc-total-w " data-toggle="collapse" data-target="#col">
                        <div class="pull-right">+</div>
                        <div class="pull-left">Uitklappen</div>
                    </button>
                    <div id="col" class="collapse -acc-total-p">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <button type="button" class="-acc-total-w " data-toggle="collapse" data-target="#col2">
                        <div class="pull-right">+</div>
                        <div class="pull-left">Uitklappen</div>
                    </button>
                    <div id="col2" class="collapse -acc-total-p">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <!-- einde accordion -->
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

@endsection



@push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <script>
            $(document).ready(function(){

                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 6,
                    slidesToScroll: 2,
                    asNavFor: '.slider-for',
                    dots: true,
                    centerMode: true,
                    focusOnSelect: true
                });
            });
        </script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.css"/>
@endpush