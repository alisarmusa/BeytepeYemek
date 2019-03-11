@extends('layouts.app')

@section('title')
    Edit Product
@endsection


@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Update a Product</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Update Product
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::model($product, array('method'=>'PATCH','route' => array('product.update', $product->id))) !!}
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Product Name</label>
                        {!! Form::text('product_name', '', ['placeholder'=>'Enter product name', 'class'=>'form-control input-lg','required']) !!}
                    </div>
                    <div class="form-group">
                    <label>Product Name</label>
                    {!! Form::text('product_type', '', ['placeholder'=>'Enter product type', 'class'=>'form-control input-lg','required']) !!}
                </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        {!! Form::number('price', '', ['placeholder'=>'Enter product price', 'class'=>'form-control input-lg','required']) !!}
                    </div>
                    <div class="form-group">
                        <label>Product Details</label>
                        {!! Form::textarea('product_details', '', ['placeholder'=>'Enter product details', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="line line-dashed line-lg pull-in"></div>
                    {!! Form::submit('Update', [ 'class'=>'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection