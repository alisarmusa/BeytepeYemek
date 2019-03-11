@extends('layouts.app')

@section('title')
    All Orders
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Workset</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Orders Data</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Orders Data
                <button onClick ="$('#table').tableExport({type:'pdf',escape:'false',pdfFontSize:12,separator: ','});" class="btn btn-default btn-xs pull-right">PDF</i></button>
                <button onClick ="$('#table').tableExport({type:'csv',escape:'false'});" class="btn btn-default btn-xs pull-right">CSV</button>
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <button onClick ="$('#table').tableExport({type:'sql',escape:'false',tableName:'orders'});" class="btn btn-default btn-xs pull-right">SQL</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>
            <div class="table-responsive">
                <table class="table table-striped m-b-none" data-ride="datatables" id="table">
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Name</th>
                            <th width="">Phone</th>
                            <th width="">Address</th>
                            <th width="">Delivery Date</th>
                            <th width="">Product</th>
                            <th width="">Price</th>
                            <th width="">Quantity</th>
                            <th width="">Total</th>
                            <th width="">Payment Option</th>
                            <th width="">Status</th>
                            <th width="150px">Buttons</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order )
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->delivery_date }}</td>
                                <td>{{ $order->product->product_name }}</td>
                                <td>{{ $order->product->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->product->price * $order->quantity }}</td>
                                <td>{{ $order->payment_option }}</td>
                                @if($order->order_status == 'Confirm')
                                    <td class="text-white bg-dark"><b style="border: 1px solid; padding: 1px 5px">{{ $order->order_status }}</b></td>
                                @elseif($order->order_status == 'Ready')
                                    <td class="text-warning"><b style="border: 1px solid; padding: 2px 5px">{{ $order->order_status }}</b></td>
                                @elseif($order->order_status == 'Send')
                                    <td class=""><b style="border: 1px solid blue; padding: 2px 5px; color:blue">{{ $order->order_status }}</b></td>
                                @elseif($order->order_status == 'Delivered')
                                    <td class="text-success"><b style="border: 1px solid; padding: 2px 5px">{{ $order->order_status }}</b></td>
                                @elseif($order->order_status == 'Returned')
                                    <td class="text-danger"><b style="border: 1px solid; padding: 2px 5px">{{ $order->order_status }}</b></td>
                                @elseif($order->order_status == 'Cancelled')
                                    <td class="text-dark"><b style="border: 1px solid; padding: 2px 5px">{{ $order->order_status }}</b></td>
                                @endif
                                <td>
                                    {{ Form::open(['route' => ['order.destroy', $order->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Are you sure you want to delete this?')" ><i class="fa fa-trash-o"></i></button>
                                    {{ Form::close() }}
                                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-print"></i></a>
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