@extends('layouts.app')
@section('icon')
    <link rel="icon" href="https://img.icons8.com/doodle/48/undefined/gift.png" type="image/x-icon">
@endsection
@section('catStyle')
    <style>
        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 700px;
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

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
            color: #C69B7B;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #C69B7B;
        }

        .content-table tbody tr button {
            border: none;
            background: none;
            font-size: 23px;
            transition: transform .2s ease-in-out;
            color: #FF8D29;
        }

        .content-table tbody tr .DeleteBtn i {
            color: red;
        }

        .content-table tbody tr button:hover {
            transform: scale(1.1);
        }

        .header i {
            background: #C69B7B;
            padding: 3px 8px;
        }

        .header span {
            margin-left: 10px;
            font-weight: 500;
        }

        .form-input {
            margin-bottom: 15px;
        }

        .form-input label {
            font-weight: 600;
            margin: 5px;
        }

        .form-input input {
            height: 5vh;
            padding-left: 10px;
            padding-right: 10px;
            font-weight: 500;
            border: none;
            outline: none;
            border: 1px solid #3A3845;
            background: #FFF6EA;
        }

        .form-btn button {
            background: linear-gradient(to left, #3A3845, #C69B7B);
            border: none;
            height: 5vh;
            transition: all .2s linear;
        }

        .form-btn button:hover {
            letter-spacing: 1px;
            font-weight: 500;
            box-shadow: 5px 1px 3px 1px rgba(0, 0, 0, 0.7);
        }

        .modal-dialog {
            background: #fff;
        }

    </style>
@endsection
@section('title')
    <title>Categories</title>
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

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="text">Totale categories</span>
                        <span class="number">{{ $cats->count() }}</span>
                    </div>
                    {{-- <div class="box box2">
                        <i class="uil uil-smile-dizzy"></i>
                        <span class="text">Meilleure categorie</span>
                        <span class="number">20,120</span>
                    </div> --}}
                    {{-- <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row justify-content-between pt-5">
            <div class="col-4 d-flex justify-content-start form">
                <form action="{{ route('cat.store') }}" method="POST">
                    @csrf
                    <div class="form-item">
                        <div class="header fs-4">
                            <i class="uil uil-plus text-light rounded-3"></i>
                            <span>Nouvelle categorie</span>
                        </div>
                        <div class="pt-4">
                            <div class="form-input">
                                <label for="cat_name" class="d-block">Libellé :</label>
                                <input class="w-100 rounded-3" type="t id=" cat_name" name="name">
                            </div>
                        </div>
                        <div class="form-btn">
                            <button type="submit" class="text-light w-50 rounded-3">Ajouter</button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-8 d-flex justify-content-center">
                <div class="flex-column">
                    <div class="header fs-4">
                        <i class="uil uil-clipboard-notes text-light rounded-3"></i>
                        <span>Liste</span>
                    </div>
                    <table class="content-table">
                        <thead>
                            <th>#</th>
                            <th>Libellé</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </thead>
                        <tbody>
                            @foreach ($cats as $key => $cat)
                                <tr>
                                    <td>{{ $key = $key + 1 }}</td>
                                    <td hidden>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td><button type="button" class="EditeBtn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="uil uil-edit"></i>
                                        </button></td>
                                    <td><a href="{{ route('cat.delete', $cat->id) }}" class="DeleteBtn"><button><i
                                                    class="uil uil-trash-alt"></i></button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog rounded-3">
            <div class="modal-content">
                <form method="POST" action="{{ route('cat.update') }}">
                    @csrf
                    <div class="modal-header header">
                        <i class="uil uil-pen rounded-3 text-light p-2 fs-5"></i>
                        <h5 class="modal-title mx-3" id="exampleModalLabel">Change le libellé</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="px-3 py-4">
                        <input type="hidden" id="cat_id" name="id">
                        <div class="form-input">
                            <label for="cat_name" class="d-block">Nouvelle libellé :</label>
                            <input class="rounded-3 w-100" type="text" id="cat_nameM" name="name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fermer</button>
                        <button class="btn btn-success" type="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function() {
        $('.EditeBtn').on('click', function() {
            $tr = $(this).closest('tr')
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            // console.log(data)
            $('#cat_id').val(data[1])
            $('#cat_nameM').val(data[2])
        })
        $('.DeleteBtn').on('click', function(e) {
            e.preventDefault();
            var link = $(this).attr('href')
            Swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Annuler',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprime-le!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    //  Swal.fire(
                    //     'Deleted!',
                    //     'Your file has been deleted.',
                    //     'success'
                    // )
                }
            })
        })
    })
</script>
@endsection
