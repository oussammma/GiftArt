@extends('layouts.app')
@section('cmdStyle')
    <style>
        .content-table {
            border-collapse: collapse;
            /* margin: 25px 0; */
            font-size: 0.8em;
            min-width: 100%;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .content-table thead tr {
            background: linear-gradient(to left, #3A3845, #C69B7B);
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
            text-align: center;
        }

        .content-table td {
            font-weight: 600;
            cursor: pointer;
        }

        .content-table .tr:hover {
            background: #EEEEEE;
        }

        .content-table td img {
            border-radius: 50%;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        /* .content-table tbody tr:nth-of-type(even) {
                                                background-color: #f3f3f3;
                                                color: #C69B7B;
                                            } */

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #C69B7B;
        }

        .content-table tbody tr button {
            font-size: 12px;
            transition: all 0.2s ease-in-out;
        }

        .content-table tbody tr .DeleteBtn i {
            color: red;
        }

        .content-table tbody tr button:hover {
            border-radius: 20px;
        }

        .etat {
            border-radius: 10px;
            font-weight: 500;
        }

        .img {
            position: relative;
            /* background: #06FF00; */
        }

        .img .img-content {
            /* background: red; */
            margin: 0 auto;
            width: 100%;
            position: relative;
        }

        .img .img-content img {
            border-radius: 10px;
        }

        .img .img-content .span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 25%;
            padding: 20px 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.01), rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8), #000);
            font-weight: 600;
            font-size: 24px;
            text-transform: capitalize;
            border-radius: 0 0 10px 10px;
            overflow: hidden;
            transition: all .3s ease-in-out;
        }

        .img .img-content .span #description {
            font-weight: 400;
            opacity: 0;
            transition: all .3s ease-in-out;
            padding: 0 30px;
        }
        .img .img-content .span .span-info{
            width: 100%;
            padding: 0 20px;
        }
        .img .img-content .span .span-info span:nth-child(2) {
            background: linear-gradient(to left top, #0F4C75, #3282B8);
            border-radius: 5px;
            right: 0;
            top : 0 
        }
        .img .img-content .span .span-info span:nth-child(1) {
            top: 0;
            left: 0;
            width: 70%;
            line-height: 25px;
        }
        .img .img-content:hover .span {
            height: auto;
        }
        .img .img-content:hover .span #description{
            opacity: 1;
            padding-bottom: 20px;
        }

        .modal-content {
            -webkit-border-radius: 20px !important;
            -moz-border-radius: 20px !important;
            border-radius: 20px !important;
            -webkit-border: 20px !important;
            -moz-border: 20px !important;
            border: 20px !important;
        }

        .modal-body .info .info-inner label {
            display: block;
            font-weight: 500;
            margin: 5px;
        }

        .modal-body .info {
            margin-bottom: 10px;
        }

        .modal-body .info .info-inner {
            margin-right: 10px;
        }

        .modal-body .info span,
        .modal-body .info p {
            background: #FDF6F0;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 10px;
        }
        .modal-body .info.total span {
            background: linear-gradient(to left top, #0F4C75, #3282B8);
        }

    </style>
@endsection
@section('title')
    <title>Commandes</title>
@endsection
@section('content')
    @extends('Admin.navbar')
@section('navcontent')
    <div class="container">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt rounded-3"></i>
                    <span class="text">Satatistiques</span>
                </div>
                <div class="boxes justify-content-around">
                    <div class="box" style="background: #06FF00">
                        <i class="uil uil-check"></i>
                        <span class="text">Commandes valider</span>
                        <span class="number">{{ count($cmd_V) }}</span>
                    </div>
                    <div class="box">
                        <i class="uil uil-clock"></i>
                        <span class="text">Commandes en cours</span>
                        <span class="number">{{ count($cmd_En) }}</span>
                    </div>
                    <div class="box" style="background: #FF1700">
                        <i class="uil uil-ban"></i>
                        <span class="text">Commandes refuser</span>
                        <span class="number">{{ count($cmd_R) }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <i class="uil uil-gift rounded-3"></i>
                        <span class="text">Liste des commandes</span>
                    </div>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Telephone</th>
                                <th>Ville</th>
                                <th>Quantité</th>
                                <th>Date</th>
                                <th>Temps</th>
                                <th>Etats</th>
                                <th>Totales(DH)</th>
                                <th>Refuser</th>
                                <th>Valider</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cmds as $cmd)
                                <tr class="tr">
                                    <td hidden>{{ $cmd->cmdid }}</td>
                                    <td hidden>{{ $cmd->img }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal"><img
                                            src="{{ asset($cmd->img) }}" alt="" width="70px"></td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->nom }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->prenom }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->tel }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->ville }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->qty }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->date }}</td>
                                    <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->time }}</td>
                                    @if ($cmd->status == 'valider')
                                        <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span style="background: #06FF00" class="text-light px-2 etat">Valider</span>
                                        </td>
                                    @elseif($cmd->status == 'refus')
                                        <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span style="background: #FF1700" class="text-light px-2 etat">Refuser</span>
                                        </td>
                                    @else
                                        <td class="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <span class="text-light bg-primary px-2 etat">En cours</span>
                                        </td>
                                    @endif
                                    <td id="showDetais" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ $cmd->qty * $cmd->price }} DH</td>
                                    <td hidden>{{ $cmd->address }}</td>
                                    <td hidden>{{ $cmd->detais }}</td>
                                    <td hidden>{{ $cmd->name }}</td>
                                    <td hidden>{{ $cmd->price }}</td>
                                    <td hidden>{{ $cmd->description }}</td>
                                    <td><a href="{{ route('cmd.refuser', $cmd->cmdid) }}"><button
                                                class="btn btn-danger">Refuser</button></td></a>
                                    <td><a href="{{ route('cmd.valider', $cmd->cmdid) }}"><button
                                                class="btn btn-success">Valider</button></td></a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detais commande <span id="etat"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-4">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-6">
                                        <div class="info d-flex justify-content-start">
                                            <div class="info-inner">
                                                <label>Nom et prénom</label>
                                                <span id="nom"></span>
                                            </div>
                                            <div class="info-inner">
                                                <label>Telephone</label>
                                                <span id="tel"></span>
                                            </div>
                                        </div>
                                        <div class="info d-flex justify-content-start" style="margin-bottom: 20px;">
                                            <div class="info-inner">
                                                <label>Ville</label>
                                                <span id="ville"></span>
                                            </div>
                                            <div class="info-inner">
                                                <label>La date</label>
                                                <span id="date"></span>
                                            </div>
                                            <div class="info-inner">
                                                <label>Le temp</label>
                                                <span id="time"></span>
                                            </div>
                                        </div>
                                        <div class="info">
                                            <div class="info-inner">
                                                <label>Address</label>
                                                <p id="address"></p>
                                            </div>
                                        </div>
                                        <div class="info" style="margin-bottom: 40px;">
                                            <div class="info-inner">
                                                <label>Detais de commande</label>
                                                <p id="detais"></p>
                                            </div>
                                        </div>
                                        <div class="info total d-flex align-items-center justify-content-between">
                                            <h6 id="qty" class="me-3 mt-2"></h6>
                                            <div>
                                                <h6 class="d-inline me-1">Totale :</h6>
                                                <span id="total" class="text-light"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 img">
                                        <div class="img-content">
                                            <img src="" alt="" id="img" width="100%">
                                            <div class="span d-flex flex-column">
                                                <div class="span-info d-flex align-items-center justify-content-between">
                                                    <span id="produit" class="text-light"></span>
                                                    <span id="prix" class="text-light px-2 fs-5"></span>
                                                </div>
                                                <div id="description" class="text-light fs-6 mt-3"></div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- <span id="produit"></span>
                                        <img src="" alt="" id="img" width="90%"> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('.showDetais').on('click', function() {
            $tr = $(this).closest('tr')
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log($.trim(data[10]))
            $('#nom').text(data[3] + ' ' + data[4])
            // $('#prenom').text(data[4])
            $('#tel').text(data[5])
            $('#ville').text(data[6])
            $('#qty').text('Quantité :' + data[7])
            $('#date').text(data[8])
            $('#time').text(data[9])
            if($.trim(data[10]) == 'valider') {
                $('#etat').text(data[10])
                // $('#etat').css('background-color', '#06FF00')
            }
            $('#total').text(data[11])
            $('#address').text(data[13])
            $('#detais').text(data[12])
            $('#produit').text(data[14])
            $('#prix').text(data[15] + ' DH')
            $('#description').text(data[16])
            $('#img').attr('src', data[1])
        })
    })
</script>
@endsection
