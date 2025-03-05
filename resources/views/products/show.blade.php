@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="row">
                 <div class="col-lg-12 margin-tb">
                     <div class="pull-left">
                         <h2> Show Product</h2>

                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $product->name_product }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Price:</strong>
                        {{  'Rp ' . number_format($product->price, 0, ",", ".") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
