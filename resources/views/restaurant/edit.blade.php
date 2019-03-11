@extends('layouts.app')

@section('title')
    Edit Restaurant
@endsection


@section('body')

    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Workset</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Update a Restaurant</h3>
            </div>
            <section class="panel panel-default">
                <header class="panel-heading">
                    Update Restaurant
                    <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                </header>

                <div class="panel-body">
                    {!! Form::model($restaurant, array('method'=>'PATCH','route' => array('restaurant.update', $restaurant->id))) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name</label>
                            {!! Form::text('name', null, ['placeholder'=>'Enter full name', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Account</label>
                            {!! Form::text('account', null, ['placeholder'=>'Enter account', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            {!! Form::text('city', null, ['placeholder'=>'Enter city', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            {!! Form::text('district', null, ['placeholder'=>'Enter district', 'class'=>'form-control input-lg','required']) !!}
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            {!! Form::text('phone', null, ['placeholder'=>'Enter phone', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>Product ID</label>
                            {!! Form::select('product_id', $product, null, ['id'=>'product_id', 'class'=>'form-control m-b input-lg','required']) !!}
                        </div>

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