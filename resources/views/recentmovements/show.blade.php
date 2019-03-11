@extends('layouts.app')

@section('title')
	Print Recent Movements
@endsection

@section('body')

<section class="vbox bg-white">
    <header class="header b-b b-light hidden-print">
        <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Print</button>
        <p></p>
    </header>
    <section class="scrollable wrapper" id="print">
        <div class="row">
            <div class="col-xs-6">
                <h2 style="margin-top: 0px">MAEOS <b>KEOPS</b></h2>
                <p>Beytepe Campus, 06800 <br>
                    Çankaya / Ankara<br>
                    TURKEY <br>
                    (0312) 305 50 00
                </p>
            </div>
            <div class="col-xs-6 text-right">
                <h4></h4>
            </div>
        </div>
        <div class="well m-t" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-xs-6">
                    <strong>TO:</strong>
                    <h4>{{ $recentmovements->place }}</h4>
                    <b>Restaurant: </b>
                    {{ $recentmovements->restaurant->name }}
                    {{ $recentmovements->restaurant->city }}
                    {{ $recentmovements->restaurant->district }}
                    {{ $recentmovements->restaurant->phone }}
                    {{ $recentmovements->restaurant->product_id }}
                </div>
                <div class="col-xs-6 text-right">
                    <p class="h4">#{{ $recentmovements->id }}</p>

                    <p class="m-t m-b">Recentmovements ID: <strong>#4</strong></p>
                </div>
            </div>
        </div>
        <div class="line"></div>

        <div class="row">
            <div class="col-xs-8">
                <p style="text-align: justify;"><i> BeytepeYemek.com </i></p><br><br>

                <p>BY ALISAR SANCAR</p>
            </div>
        </div>
    </section>
</section>

@endsection