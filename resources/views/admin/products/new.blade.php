@extends('layouts.app')

@section('titel', 'Nieuw product')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Nieuw product toevoegen</div>
                    <div class="panel-body" >
                        <form method="POST" action="/admin/product/save" class="form-horizontal" enctype="multipart/form-data" role="form">
                            {!! csrf_field() !!}
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Naam</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Product titel" class="form-control input-md" required="" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Omschrijving</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="textarea" name="description" placeholder="Een omschrijving van product" value>{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="price">Prijs</label>
                                    <div class="col-md-9">
                                        <input id="price" name="price" type="text" placeholder="Product Prijs" class="form-control input-md" required="" value="{{ $product->price }}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="imageurl">Afbeeldings url</label>
                                    <div class="col-md-9">
                                        <input id="imageurl" name="imageurl" type="text" placeholder="URL van afbeelding" class="form-control input-md" value="{{ $product->imageurl }}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="submit"></label>
                                    <div class="col-md-9">
                                        <button id="submit" name="submit" class="btn btn-primary">Opslaan
                                        </button>
                                    </div>
                                </div>

                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
