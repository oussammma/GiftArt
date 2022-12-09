<style>
    .cherchNav {
        padding: 0 100px;
        height: 13vh;
    }

    .cherchNav .logo img {
        border-radius: 50%;
    }

    .cherchNav .logo span {
        font-weight: 600;
        letter-spacing: 2px;
    }

    .cherchNav .cherch {
        position: relative;
    }

    .cherch #cherch-list {
        background: var(--white);
        position: absolute;
        width: 97%;
        z-index: 10;
        text-align: start;
        border-radius: 0 0 20px 20px;
        box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);  
        margin: 0;
        padding: 0;
    }
    .cherch #cherch-list li {
        list-style: none;
        padding: 15px 20px;
        cursor: pointer;
    }
    .cherch #cherch-list li:hover {
        background: #D0C9C0;
    }
    .cherch #cherch-list li a {
        color: var(--eerie-black);
        text-decoration: none;
        font-size: 16px;
    }

    .cherchNav .cherch input {
        position: relative;
        border-radius: 10px;
        border: 1px solid #D0C9C0;
        height: 6vh;
        padding: 5px 15px;
        font-size: 18px;
        font-weight: 400;
    }

    .cherchNav .cherch.slide::before {
        opacity: 1;
    }

    .cherchNav .cherch input::placeholder {
        font-weight: 600;
    }

    .cherchNav .cherch i {
        position: absolute;
        right: 25px;
        top: 24%;
        font-size: 25px;
        color: #798777;
        cursor: pointer;
        transition: all .3s;
    }

    .cherchNav .cherch i:hover {
        color: var(--sandy-brown);
        transform: scale(1.2);
    }

    .header-user-actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .header-user-actions .action-btn {
        position: relative;
        margin-top: 5px;
        font-size: 35px;
        color: var(--onyx);
        padding: 5px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .header-user-actions .action-btn::before {
        content: attr(data-count);
        position: absolute;
        color: var(--white);
        right: 0px;
        font-size: 15px;
        text-align: center;
        top: -10px;
        width: 16px;
        height: 16px;
        background: red;
        border-radius: 50%;
        opacity: 0;
    }

    .header-user-actions .action-btn.zero::before {
        opacity: 1;
    }

    /* .header-user-actions .count {
        position: absolute;
        top: -2px;
        right: -3px;
        background: var(--bittersweet);
        color: var(--white);
        font-size: 12px;
        font-weight: var(--weight-500);
        line-height: 1;
        padding: 2px 4px;
        border-radius: 20px;
    } */

    .desktop-navigation-menu {
        display: block;
    }

    .desktop-menu-category-list {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        list-style: none;
        height: 7vh;
    }

    .desktop-menu-category-list .menu-category .dropdown-list {
        position: absolute;
        top: 180%;
        border-radius: 10px;
        box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
        background: var(--white);
        opacity: 0;
        visibility: hidden;
        transition: all var(--transition-timing);
        z-index: 10000;
    }

    .desktop-menu-category-list .menu-category .dropdown-list .dropdown-item a {
        color: var(--eerie-black);
        text-decoration: none;
    }

    .desktop-menu-category-list .menu-category .dropdown-list .dropdown-item:hover a {
        color: var(--salmon-pink);
    }

    .desktop-menu-category-list .menu-category .dropdown-list .dropdown-item:hover {
        background: var(--white);
    }

    .desktop-menu-category-list .menu-category .menu-title {
        color: var(--eerie-black);
        text-decoration: none;
        font-weight: 600;
        letter-spacing: 1px;
        font-size: var(--fs-5);
        position: relative;
        padding-bottom: 15px;
        transition: all var(--transition-timing);
        text-transform: uppercase;
    }

    .desktop-menu-category-list .menu-category .menu-title::before {
        content: '';
        position: absolute;
        width: 0%;
        height: 2px;
        background: var(--salmon-pink);
        bottom: 0;
        left: 0;
        transition: all var(--transition-timing);
    }

    .desktop-menu-category-list .menu-category .menu-title:hover {
        color: var(--salmon-pink);
    }

    .desktop-menu-category-list .menu-category:hover>.dropdown-list {
        opacity: 1;
        visibility: visible;
        top: 100%;
    }

    .desktop-menu-category-list .menu-category .menu-title:hover::before {
        width: 100%;
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

    .modal-content .modal-body .title {
        font-weight: 600;
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
</style>
<nav class="cherchNav w-100 row d-flex align-items-center justify-content-between bg-light border-bottom">
    <div class="logo col-2 d-flex align-items-center">
        <img src="/upload/Produits/giftart.jpg" alt="" width="50px" height="50px">
        <span class="fs-4 ms-2">GiftArt</span>
    </div>
    <div class="cherch col-8 text-center">
        <i class="uil uil-search"></i>
        <input type="text" name="rechercher" id="rech" class="w-100" placeholder="Rechercher..." autocomplete="off">
        <ul id="cherch-list">

        </ul>
    </div>
    <div class="store col-2 text-end header-user-actions">
        <h1 class="action-btn" data-bs-toggle="modal" data-bs-target="#panier">
            <i class="uil uil-shopping-cart-alt"></i>
            {{-- <span class="count">0</span> --}}
        </h1>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="panier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="uil uil-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <h5 class="title mb-4">Panier</h5>
            </div>
            <div class="md-footer d-flex justify-content-between">
                <button data-bs-toggle="modal" data-bs-target="#commande">Commander</button>
                <span id="total-panier"></span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="commande" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('proDts.store') }}" method="POST">
                <button class="close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="uil uil-times-circle"></i></button>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="qty" id="qty">
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
                        <span id="afficher_qty"></span>
                        <span id="totale" class="mx-4"></span>
                        <button type="submit" class="valider">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<nav class="desktop-navigation-menu">

    <div class="bg-light w-100">
        <ul class="desktop-menu-category-list">

            <li class="menu-category">
                <a href="{{ route('userHome') }}" class="menu-title">Accueil</a>
            </li>
            @foreach ($cats as $cat)
                <li class="menu-category">
                    <a href="{{ route('catPro.index', $cat->name) }}" class="menu-title">{{ $cat->name }}</a>
                    @if ($cat->name == 'bijoux')
                        @if ($bijoux->count() > 0)
                            <ul class="dropdown-list ps-1 pe-5 py-3">
                                @foreach ($bijoux as $item)
                                    <li class="dropdown-item">
                                        <a href="{{ route('proDts.index', $item->name) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @elseif($cat->name == 'hommes')
                        @if ($hommes->count() > 0)
                            <ul class="dropdown-list ps-1 pe-5 py-3">
                                @foreach ($hommes as $item)
                                    <li class="dropdown-item">
                                        <a href="{{ route('proDts.index', $item->name) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @elseif($cat->name == 'romantique')
                        @if ($romantique->count() > 0)
                            <ul class="dropdown-list ps-1 pe-5 py-3">
                                @foreach ($romantique as $item)
                                    <li class="dropdown-item">
                                        <a href="{{ route('proDts.index', $item->name) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @elseif($cat->name == 'anniversaire')
                        @if ($anniversaire->count() > 0)
                            <ul class="dropdown-list ps-1 pe-5 py-3">
                                @foreach ($anniversaire as $item)
                                    <li class="dropdown-item">
                                        <a href="{{ route('proDts.index', $item->name) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @elseif($cat->name == 'femmes')
                        @if ($femmes->count() > 0)
                            <ul class="dropdown-list ps-1 pe-5 py-3">
                                @foreach ($femmes as $item)
                                    <li class="dropdown-item">
                                        <a href="{{ route('proDts.index', $item->name) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif
                </li>
            @endforeach
        </ul>

    </div>

</nav>
