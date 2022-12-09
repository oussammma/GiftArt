@extends('layouts.userApp')
@extends('user.cherchNav')
@extends('user.userNavbar')
<style>
    .image img {
        border-radius: 10px;
    }

    .pro-info .cat {
        color: var(--spanish-gray);
        margin-bottom: 20px;
        display: block;
    }

    .pro-info h3 {
        font-weight: 700;
        margin-bottom: 20px;
        display: block;
    }

    .pro-info .price {
        font-weight: 600;
        font-size: 25px;
        color: var(--salmon-pink);
        margin-bottom: 20px;
        display: block;
    }

    .pro-info .qty-info {
        margin-bottom: 60px;
    }

    .pro-info .qty-info input {
        width: 100px;
        border: 1px solid var(--spanish-gray);
        border-radius: 7px;
        font-size: 16px;
        padding: 3px 15px;
    }

    .pro-info .qty-info a {
        background: var(--spanish-gray);
        color: var(--davys-gray);
        text-decoration: none;
        padding: 5px 15px;
        font-weight: 600;
        margin-left: 15px;
        border-radius: 7px;
        display: inline-block;
        transition: all var(--transition-timing);
    }

    .pro-info .qty-info .commander {
        background: var(--salmon-pink);
        color: var(--white);
    }

    .pro-info .qty-info .ajouter:hover {
        color: var(--white);
        transform: scale(0.95);
    }

    .pro-info .qty-info .commander:hover {
        transform: scale(0.95);
    }

    .pro-info .pro-detais span {
        color: var(--eerie-black);
        font-weight: 700;
        display: block;
        margin-bottom: 15px;
    }

    .modal-content {
        -webkit-border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        border-radius: 20px !important;
        -webkit-border: 20px !important;
        -moz-border: 20px !important;
        border: 20px !important;
        padding: 20px;
    }

    .modal-content .close {
        position: absolute;
        right: 0px;
        top: 5px;
        outline: none;
        border: none;
        background: none;
        font-size: 30px;
        cursor: pointer;
        z-index: 10;
        transition: all var(--transition-timing);
    }

    .modal-content .close:hover {
        transform: scale(1.1);
    }

    .modal-content .modal-body .cmd-info {
        margin-bottom: 30px;
        position: relative;
    }

    .modal-content .modal-body .cmd-info label {
        display: block;
        margin: 5px;
        font-weight: 600;
    }
    .modal-content .modal-body .cmd-info input,
    .modal-content .modal-body .cmd-info select,
    .modal-content .modal-body .cmd-info textarea {
        background: #F9F9F9;
        border: 1px solid var(--spanish-gray);
        border-radius: 8px;
        width: 300px;
        padding: 4px 15px;
    }
    .modal-content .modal-body .cmd-info input[type='text'],
    .modal-content .modal-body .cmd-info input[type='number'] {
        padding-right: 40px;
    }

    .modal-content .modal-body .cmd-info i {
        position: absolute;
        right: 19.5%;
        top: 59%;
        font-size: 20px;
        font-weight: 600;
    }
    .modal-content .footer {
        padding: 0 20px;
    }
    .modal-content .footer button {
        border: none;
        background: var(--sonic-silver);
        color: var(--white);
        padding: 4px 15px;
        border-radius: 8px;
        font-weight: 600;
        transition: all var(--transition-timing);
    }
    .modal-content .footer button.valider {
        background: #14C38E;
    }
    .modal-content .footer button:hover {
        transform: scale(0.95);
    }
    .modal-content .footer span {font-weight: 600;}

</style>
@section('userContent')
    <div class="container">
        @foreach ($pros_dts as $item)
            <div class="row">
                <div class="col-5 text-end image">
                    <img src="{{ asset($item->img) }}" alt="" width="450px">
                </div>
                <div class="col-7 text-start pro-info">
                    <span hidden id="id_pro">{{ $item->id }}</span>
                    <span class="cat">{{ $item->categorie }}</span>
                    <h3>{{ $item->name }}</h3>
                    <span class="price" id="price">{{ $item->price }} DH</span>
                    <div class="qty-info">
                        <input type="number" value="1" id="qty_pro" min="1" max="5">
                        <a href="#" class="ajouter">Ajouter au panier <i class="uil uil-shopping-cart-alt"></i></a>
                        <a href="#" class="commander" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Commander</a>
                    </div>
                    <div class="pro-detais">
                        <span>Produit détails</span>
                        <p class="w-75 ps-3">{{ $item->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('proDts.store') }}" method="POST">
                        <button class="close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="uil uil-times-circle"></i></button>
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <input type="hidden" name="id" id="id_pro_cmd">
                                    <input type="hidden" name="qty" id="qty_pro_cmd">
                                    <div class="cmd-info">
                                        <label for="nom">Nom</label>
                                        <input type="text" name="nom" id="nom" required>
                                        <i class="uil uil-user"></i>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="nom">Prénom</label>
                                        <input type="text" name="prenom" id="prenom" required>
                                        <i class="uil uil-user"></i>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="tel">Téléphone</label>
                                        <input type="number" name="tel" id="tel" required>
                                        <i class="uil uil-mobile-android"></i>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="date">Date</label>
                                        <input type="date" name="date" id="date" required>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="nom">Temps</label>
                                        <input type="time" name="time" id="time" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="cmd-info">
                                        <label for="ville">Ville</label>
                                        <select name="ville" id="ville" required>
                                            <option disabled selected>Choisir ville</option>
                                            @foreach ($villes as $ville)
                                                <option value="{{ $ville->id }}">{{ $ville->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="address">Adresse</label>
                                        <textarea name="detais" id="" cols="30" rows="2" required></textarea>
                                    </div>
                                    <div class="cmd-info">
                                        <label for="detais">Détails</label>
                                        <textarea name="address" id="" cols="30" rows="4" required></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row footer">
                            <div class="col-3">
                                <button type="button" data-bs-dismiss="modal">Annuler</button>
                            </div>
                            <div class="col-9 text-end">
                                <span id="afficher_qty_cmd"></span>
                                <span id="totale_cmd" class="mx-4"></span>
                                <button type="submit" class="valider">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('user.footer')


        <script>
            $(document).ready(function() {
                $('.commander').on('click', function() {
                    var id = $('#id_pro').text();
                    $('#id_pro_cmd').val(id)
                    var qty = $('#qty_pro').val();
                    $('#qty_pro_cmd').val(qty)
                    $('#afficher_qty_cmd').text('Quantité:  ' + qty)
                    var price = $('#price').text();
                    var totale = parseInt(price) * parseInt(qty);
                    console.log(totale)
                    $('#totale_cmd').text('Totale:  ' + totale + ' DH')
                })
            });
        </script>
    @endsection
