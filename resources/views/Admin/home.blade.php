@extends('layouts.app')
@section('dashStyle')
    <style>
        .form-body a {
            text-decoration: none;
        }

        .form-body .form-img img {
            border-radius: 50%;
        }

        .form-body .form-info h6 {
            font-size: 18px;
            color: #1B1A17;
        }

        .form-body .form-info i {
            font-size: 16px;
            color: #73777B;
        }

        .form-body .form-info span {
            color: #73777B;
            font-size: 14px;
        }

        .form-body .right {
            color: #1B1A17;
        }

        .form-body .form-item {
            transition: all 0.2s ease-in-out;
        }

        .form-body a:hover .form-item {
            transform: translate(10px);
        }

        .form-header span {
            font-size: 16px;
            font-weight: 600;
            padding-left: 10px;
            position: relative;
        }
        .form-header span::before {
            content: '';
            width: 10px;
            height: 10px;
            background: #4E9F3D;
            border-radius: 50%;
            position: absolute;
            right: -20px;
            top: 28%;
        }

    </style>
@endsection
@section('title')
    <title>Accueil</title>
@endsection
@section('content')
    @extends('Admin.navbar')
@section('navcontent')
    <div class="container">
        <div class="dash-content">
            <div class="overview mb-4">
                <div class="title mb-5">
                    <i class="uil uil-tachometer-fast-alt rounded-3"></i>
                    <span class="text">Statistiques</span>
                </div>

                <div class="boxes justify-content-around" style="margin-top: -30px;">
                    <div class="box" style="background: #00FFAB; width: 320px;">
                        <i class="uil uil-dollar-alt"></i>
                        <span class="text">Revenu</span>
                        @foreach ($revenu as $rev)
                            <span class="number">{{ $rev->prix }} DH</span>
                        @endforeach
                    </div>
                    <div class="box box3" style="width: 250px">
                        <i class="uil uil-gift"></i>
                        <span class="text">Totales Commandes</span>
                        <span class="number">{{ count($cmd) }}</span>
                    </div>
                    <div class="box box2" style="width: 220px">
                        <i class="uil uil-user"></i>
                        <span class="text">Totales Clients</span>
                        <span class="number">{{ $total_Client }}</span>
                    </div>
                    <div style="width: 400px;">
                        {{ $chart->container() }}
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-8 pt-3 bg-light rounded shadow" style="height: 330px">
                    <div class="d-flex flex-column">
                        <div>
                            {{ $chart1->container() }}
                        </div>
                        <div class="mt-4">
                            <div class="row justify-content-between">
                                <div class="col-6">
                                    <div class=" p-4 bg-light shadow rounded">
                                        {{ $chart2->container() }}
                                    </div>
                                </div>
                                <div class="col-6 p-4 bg-light shadow rounded">
                                        {{ $chart3->container() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="bg-light w-100 rounded shadow">
                        <div class="form-header p-3 border-bottom">
                            <span>Commandes en cours</span>
                        </div>
                        <div class="form-body">
                            @foreach ($new_cmd as $item)
                                <a href="{{ route('detais.index', $item->cmdid) }}">
                                    <div class="form-item d-flex align-items-center p-3">
                                        <div class="form-img">
                                            <img src="{{ asset($item->img) }}" alt="" width="80px">
                                        </div>
                                        <div class="form-info ms-3 flex-fill">
                                            <h6>{{ $item->name }}</h6>
                                            <div class="info-name">
                                                <div class="d-block">
                                                    <i class="uil uil-user"></i>
                                                    <span>{{ $item->nom }} {{ $item->prenom }}</span>
                                                </div>
                                                <div class="d-block">
                                                    <i class="uil uil-phone"></i>
                                                    <span>{{ $item->tel }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fs-4 right">
                                            <i class="uil uil-angle-right-b"></i>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection
<script src="{{ $chart->cdn() }}"></script>
<script src="{{ $chart1->cdn() }}"></script>
<script src="{{ $chart2->cdn() }}"></script>
<script src="{{ $chart3->cdn() }}"></script>
{{ $chart->script() }}
{{ $chart1->script() }}
{{ $chart2->script() }}
{{ $chart3->script() }}
@endsection
