@extends('layouts.app')
@section('cltStyle')
    <style>
        .avatar {
            width: 100px;
            height: 100px;
            background: #fff;
            margin: 0 auto;
            border-radius: 50%;
            padding-top: 7px;
        }
        .avatar i {
            font-size: 80px;
        }
        .avatar,
        .card span {
            margin-bottom: 10px;
        }
        .card h6 {
            font-size: 30px;
            font-weight: 600;
        }
        .card {
            background: linear-gradient(to left top, #DAE5D0, #EDE6DB);
            box-shadow:  1px 2px 8px 2px rgba(0,0,0,0.5);
        }
    </style>
@endsection
@section('title')
    <title>Clients</title>
@endsection
@section('content')
    @extends('Admin.navbar')
@section('navcontent')
    <div class="container">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt rounded-3"></i>
                    <span class="text">Top Clients</span>
                </div>
            </div>
            <div class="row justify-content-start px-5">
                @foreach ($clts as $clt)
                <div class="card col-2 text-center py-4 my-4 mx-3">
                    <div class="avatar">
                        <i class="uil uil-user"></i>
                    </div>
                    <span>{{ $clt->prenom }}  {{ $clt->nom }}</span>
                    <h6 class="text-primary">{{ $clt->total }}</h6>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@endsection