@extends('layouts.app')
@section('catproStyle')
    <style>
        .header a {
            font-size: 25px;
            color: #fff;
            background: linear-gradient(to left, #3A3845, #C69B7B);
            border-radius: 50%;
            padding: 7px 7px;
            position: absolute;
            transition: all 0.2s;
        }

        .header a:hover {
            transform: translateX(-5px);
            color: #fff;
        }

        .content-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 90%;
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
        .form-input {
            margin-bottom: 15px;
        }

        .form-input label {
            font-weight: 600;
            margin: 5px;
        }

        .form-input input,
        .form-input textarea {
            padding: 5px 10px;
            font-weight: 500;
            border: none;
            outline: none;
            border: 1px solid #3A3845;
            background: #FFF6EA;
        }

        .form-input input {
            height: 5vh;
        }

        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            box-shadow: none;
            border: 0 !important;
            background: #FFF6EA;
            background-image: none;
            flex: 1;
            padding: 0 .5em;
            color: #000;
            cursor: pointer;
            font-size: 1em;
            font-family: 'Open Sans', sans-serif;
        }

        select::-ms-expand {
            display: none;
        }

        .select {
            position: relative;
            display: flex;
            width: 100%;
            height: 3em;
            line-height: 3;
            background: #C69B7B;
            overflow: hidden;
            border-radius: .25em;
            border: 1px solid #3A3845;
        }

        .select::after {
            content: '\25BC';
            position: absolute;
            top: 0;
            right: 0;
            padding: 0 1em;
            background: #C69B7B;
            cursor: pointer;
            pointer-events: none;
            color: #fff;
            transition: .25s all ease;
        }

        .select:hover::after {
            color: #000;
        }

        .btn-warning {
            position: relative;
            padding: 11px 16px;
            font-size: 15px;
            line-height: 1.5;
            border-radius: 3px;
            color: #fff;
            background-color: #ffc100;
            border: 0;
            transition: 0.2s;
            overflow: hidden;
        }

        .btn-warning input[type="file"] {
            cursor: pointer;
            position: absolute;
            left: 0%;
            top: 0%;
            transform: scale(3);
            opacity: 0;
        }

        .btn-warning:hover {
            background-color: #d9a400;
        }

    </style>
@endsection
@section('content')
    @extends('Admin.navbar')
@section('navcontent')
    <div class="container mt-5">
        <div class="dash-content">
            <div class="overview">
                <div class="header">
                    <a href="{{ route('pro.index') }}"><i class="uil uil-arrow-left"></i></a>
                </div>
                <div class="title ms-5 pt-5">
                    <i class="uil uil-tachometer-fast-alt rounded-3"></i>
                    <span class="text">Satatistiques</span>
                </div>

                <div class="boxes ms-5 me-5">
                    <div class="box box1">
                        @if ($pros->count() > 0)
                        <i class="uil uil-smile"></i>
                        @else
                        <i class="uil uil-angry"></i>
                        @endif
                        <span class="text">Totale produits</span>
                        <span class="number">{{ $pros->count() }}</span>
                    </div>
                    <div class="box box2">
                        @if ($pros->count() > 0)
                            <i class="uil uil-check-circle"></i>
                        @else
                            <i class="uil uil-times-circle"></i>
                        @endif
                        <span class="text">Libelle de categorie</span>
                        <span class="number">{{ $name }}</span>
                    </div>

                </div>
            </div>
            @if ($pros->count() > 0)
                <table class="content-table my-3 ms-5">
                    <thead>
                        <th>Photo</th>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th style="width: 10%;">Prix (DH)</th>
                        <th>Categories</th>
                        <th>Edite</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($pros as $key => $pro)
                            <tr>
                                <td hidden>{{ $pro->img }}</td>
                                <td hidden>{{ $pro->id }}</td>
                                <td hidden>{{ $key = $key + 1 }}</td>
                                <td><img src="{{ asset($pro->img) }}" alt="" width="100px"></td>
                                <td>{{ $pro->name }}</td>
                                <td>{{ $pro->description }}</td>
                                <td>{{ $pro->price }} DH</td>
                                <td>{{ $pro->categorie }}</td>
                                <td><a href="#"><button type="button" class="EditeBtn" data-bs-toggle="modal"
                                            data-bs-target="#modifierModal">
                                            <i class="uil uil-edit"></i>
                                        </button></a></td>
                                <td><a href="{{ route('pro.delete', $pro->id) }}" class="DeleteBtn"><button><i
                                                class="uil uil-trash-alt"></i></button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <div class="d-flex align-items-center ms-5 mt-5">
                        <i class="uil uil-exclamation-triangle fs-3 text-danger"></i>
                        <div class="ms-2">il n'ya pas des produits dans cette categorie!!!</div>
                    </div>
                    
            @endif
        </div>

        <!--Modal Modifier -->
        <div class="modal fade" id="modifierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('pro.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_img" id="old_img">
                        <input type="hidden" name="id_M" id="id_M">
                        <div class="modal-header header">
                            <i class="uil uil-pen rounded-3 text-light p-2 fs-5"></i>
                            <h5 class="modal-title mx-3" id="exampleModalLabel">Modifier un produit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="px-3 py-4">
                            <div class="form-input">
                                <label for="name_M">Libelle</label>
                                <input type="text" class="rounded-3 w-100" id="name_M" name="name_M">
                            </div>
                            <div class="form-input">
                                <label for="prix_M">Prix</label>
                                <input type="number" class="rounded-3 w-100" id="prix_M" name="prix_M">
                            </div>
                            <div class="form-input">
                                <label for="Description_M">Description</label>
                                <textarea rows="4" type="text" class="rounded-3 w-100" id="Description_M" name="Description_M"></textarea>
                            </div>
                            <div class="form-input">
                                <label for="categorie_M">Categorie</label>
                                <div class="select">
                                    <select name="categorie_M" id="categorie_M" class="rounded-3 w-100" required>
                                        <option value="" selected disabled>choisir la catégorie</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-input d-flex align-items-center justify-content-around pt-3">
                                {{-- <label for="img_M">Photo</label>
                                <input type="file" class="rounded-3 w-100" id="img_M" name="img_M"> --}}
                                <div class="upload">
                                    <button type = "button" class = "btn-warning">
                                      <i class = "fa fa-upload me-3"></i>Choisi l'image
                                      <input type="file" id="img_M" name="img_M">
                                    </button>
                                </div>
                                <div class="form-input">
                                    <img id="showImg" src="{{ url('upload/no_image.jpg') }}" alt=""
                                        style="width: 100px; height: 100px">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <!--Modal Modifier -->
        <div class="modal fade" id="modifierModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('pro.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_img" id="old_img">
                        <input type="hidden" name="id_M" id="id_M">
                        <div class="modal-header header">
                            {{-- <i class="uil uil-pen rounded-3 text-light p-2 fs-5"></i> --}}
                            <h5 class="modal-title mx-3" id="exampleModalLabel">Modifier un produit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="px-3 py-4">
                            <div class="form-input">
                                <label for="name_M">Libelle</label>
                                <input type="text" class="rounded-3 w-100" id="name_M" name="name_M">
                            </div>
                            <div class="form-input">
                                <label for="prix_M">Prix</label>
                                <input type="number" class="rounded-3 w-100" id="prix_M" name="prix_M">
                            </div>
                            <div class="form-input">
                                <label for="Description_M">Description</label>
                                <textarea rows="4" type="text" class="rounded-3 w-100" id="Description_M" name="Description_M"></textarea>
                            </div>
                            <div class="form-input">
                                <label for="categorie_M">Categorie</label>
                                <div class="select">
                                    <select name="categorie_M" id="categorie_M" class="rounded-3 w-100" required>
                                        <option value="" selected disabled>choisir la catégorie</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-input d-flex align-items-center justify-content-around pt-3">
                                <div class="upload">
                                    <button type = "button" class = "btn-warning">
                                      <i class = "fa fa-upload me-3"></i>Choisi l'image
                                      <input type="file" id="img_MC" name="img_M">
                                    </button>
                                </div>
                                <div class="form-input">
                                    <img id="showImg_MC" src="{{ url('upload/no_image.jpg') }}" alt=""
                                        style="width: 100px; height: 100px">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
<script>
    $(document).ready(function() {
        $('.DeleteBtn').on('click', function(e) {
            e.preventDefault();
            var link = $(this).attr('href')
            Swal.fire({
                title: 'Es-tu sûr?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Annuler',
                confirmButtonText: 'Oui, supprime-le!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
        $('.EditeBtn').on('click', function() {
            $tr = $(this).closest('tr')
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data[0])
            $('#name_M').val(data[4])
            $('#prix_M').val(parseInt(data[6]))
            $('#Description_M').val(data[5])
            $('#categorie_M').val(data[7])
            $('#old_img').val(data[0])
            $('#id_M').val(data[1])
            $('#showImg_MC').attr('src', data[0])
        })
        // $('#img_MC').change(function(e) {
        //     var reader = new FileReader()
        //     reader.onload = function(e) {
        //         $('#showImg_MC').attr('src', e.target.result);
        //     }
        //     reader.readAsDataURL(e.target.files['0'])
        // })
    })
</script>
@endsection
