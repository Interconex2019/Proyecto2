@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                <div id="charge-message" class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif
    @foreach($products->chunk(3) as $productChunk)
        <div class="row">
            @foreach($productChunk as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                        <div class="caption">
						@if($product->stock == 0) 
							<span class="badge badge-warning">Agotado</span>
						@else
						    <span class="badge badge-primary">Cantidad:{{ $product->stock }}</span>
						@endif
						
						
                            <h3>{{ $product->title }}</h3>
                            <p class="description">
                            {{ $product->description }}
                            </p>
                            <div class="clearfix">
                                <div class="pull-left price">${{ $product->price }}</div>
						@if($product->stock != 0)
							
					
				
						        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}"
                                   class="btn btn-success pull-right" role="button">Agregar</a>
						@endif
						
           
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection