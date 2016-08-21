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
                    <div class="panel-heading">
                        <div class="panel-title">Bewerk Product</div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin_product_save') }}" class="form-horizontal"
                              enctype="multipart/form-data" role="form">
                            {!! csrf_field() !!}
                            @if(isset($product->id))
                                <input type="hidden" name="id" value="{{ $product->id }}">
                            @endif
                            <fieldset>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name">Naam</label>
                                    <div class="col-md-9">
                                        <input id="name" name="name" type="text" placeholder="Product titel"
                                               class="form-control input-md" required="" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="textarea">Omschrijving</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="textarea" name="description"
                                                  placeholder="Een omschrijving van product"
                                                  value>{{$product->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="price">Prijs</label>
                                    <div class="col-md-9">
                                        <input id="price" name="price" type="text" placeholder="Product Prijs"
                                               class="form-control input-md" required="" value="{{ $product->price }}">

                                    </div>
                                </div>

                                @foreach($properties as $property)
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="price">
                                            {{ \App\Property::find($property->propertyID)->name }}
                                        </label>
                                        <div class="col-md-9">
                                            <input id="property[{{ $property->propertyID }}]"
                                                   name="property[{{ $property->propertyID }}]" type="text"
                                                   placeholder="Product Prijs"
                                                   class="form-control input-md" value="{{ $property->value }}">

                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <div class="col-md-3 control-label">
                                        {!! Form::label('category', 'Categorie') !!}
                                    </div>
                                    <div class="col-md-9">
                                        {!! Form::select('category', $categories, null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-3 control-label">
                                        {!! Form::label('image', 'Extra afbeeldingen toevoegen') !!}
                                    </div>
                                    <div class="col-md-9">
                                        {!! Form::file('images[]', array('multiple' => true)) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-3">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Verwijderen afbeeldingen <br><small>Vink de te verwijderen afbeeldingen af. </small></div>
                                        <ul class="list-group">
                                            @foreach($product->productImages()->get() as $image)
                                                <li class="list-group-item">
                                                    <img src="/uploads/img/{{ $image->imagePath }}" alt="" width="45px">
                                                    <div class="material-switch pull-right">
                                                        <input id="images[]" name="images[]" type="checkbox"
                                                               value="{{ $image->imagePath }}" checked/>
                                                        <label for="images[]" class="label-default"></label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
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
