@extends('layouts.app')

@section('title')
    All Restaurants
@endsection

@section('body')

    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="active">Workset</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Restaurants Data</h3>
            </div>
            <section class="panel panel-default">
                <header class="panel-heading">
                    All Restaurants Data
                    <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
                    <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                    <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                    <button onClick ="$('#table').tableExport({type:'sql',escape:'false',tableName:'restaurants'});" class="btn btn-default btn-xs pull-right">SQL</i></button>
                    <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                </header>
                <div class="table-responsive">
                    <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                        <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Name</th>
                            <th width="">Account</th>
                            <th width="">City</th>
                            <th width="">District</th>
                            <th width="">Phone</th>
                            <th width="">Product</th>

                            <th width="150px">Buttons</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($restaurants as $restaurant )
                            <tr>
                                <td>{{ $restaurant->id }}</td>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ $restaurant->account }}</td>
                                <td>{{ $restaurant->city }}</td>
                                <td>{{ $restaurant->district }}</td>
                                <td>{{ $restaurant->phone }}</td>
                                <td>{{ $restaurant->product->product_name }}</td>

                                <td>
                                    {{ Form::open(['route' => ['restaurant.destroy', $restaurant->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>
                                    {{ Form::close() }}
                                    <a href="{{ route('restaurant.edit',$restaurant->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('restaurant.show',$restaurant->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </section>
    </section>

@endsection