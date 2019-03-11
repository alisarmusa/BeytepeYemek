@extends('layouts.app')

@section('title')
    Add Recent Movements
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Add Recent Movements</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Add Recent Movements
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'recentmovements.store')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Place</label>
                            {!! Form::text('place', '', ['placeholder'=>'Enter Place', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
                        </div>
                    </div>

                        <div class="form-group">
                            <label>Restaurant ID</label>
                            {!! Form::select('restaurant_id', $restaurant, null, ['id'=>'restaurant_id', 'class'=>'form-control m-b input-lg','required']) !!}
                        </div>

                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Create', [ 'class'=>'btn btn-default']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection