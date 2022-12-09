@extends('layouts.userApp')
@extends('user.cherchNav')
@extends('user.userNavbar')
<style>
    .img-slider {
        position: relative;
        width: 87%;
        height: 65vh;
        margin: 0 auto;
        margin-top: -16px;
        border-radius: 10px;
    }

    .img-slider .slide {
        z-index: 1;
        position: absolute;
        width: 100%;
        clip-path: circle(0% at 0 50%);
    }

    .img-slider .slide.active {
        clip-path: circle(150% at 0 50%);
        transition: 2s;
        transition-property: clip-path;
    }

    .img-slider .slide img {
        z-index: 1;
        width: 100%;
        height: 65vh;
        border-radius: 10px;
    }

    .img-slider .slide .info {
        position: absolute;
        top: 0;
        padding: 15px 30px;
        width: 50%;
        right: 0;
    }

    .img-slider .slide .info h2 {
        color: var(--eerie-black);
        font-size: 45px;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 2px;
    }

    .img-slider .slide .info p {
        color: var(--eerie-black);
        background: rgba(0, 0, 0, 0.1);
        font-size: 16px;
        width: 80%;
        padding: 10px;
        border-radius: 4px;
    }

    .img-slider .navigation {
        z-index: 2;
        position: absolute;
        display: flex;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
    }

    .img-slider .navigation .btn-slide {
        background: rgba(255, 255, 255, 0.5);
        width: 12px;
        height: 12px;
        margin: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    .img-slider .navigation .btn-slide.active {
        background: #2696E9;
        box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
    }

    @media (max-width: 820px) {
        .img-slider {
            width: 600px;
            height: 375px;
        }

        .img-slider .slide .info {
            padding: 10px 25px;
        }

        .img-slider .slide .info h2 {
            font-size: 35px;
        }

        .img-slider .slide .info p {
            width: 70%;
            font-size: 15px;
        }

        .img-slider .navigation {
            bottom: 25px;
        }

        .img-slider .navigation .btn-slide {
            width: 10px;
            height: 10px;
            margin: 8px;
        }
    }

    @media (max-width: 620px) {
        .img-slider {
            width: 400px;
            height: 250px;
        }

        .img-slider .slide .info {
            padding: 10px 20px;
        }

        .img-slider .slide .info h2 {
            font-size: 30px;
        }

        .img-slider .slide .info p {
            width: 80%;
            font-size: 13px;
        }

        .img-slider .navigation {
            bottom: 15px;
        }

        .img-slider .navigation .btn-slide {
            width: 8px;
            height: 8px;
            margin: 6px;
        }
    }

    @media (max-width: 420px) {
        .img-slider {
            width: 320px;
            height: 200px;
        }

        .img-slider .slide .info {
            padding: 5px 10px;
        }

        .img-slider .slide .info h2 {
            font-size: 25px;
        }

        .img-slider .slide .info p {
            width: 90%;
            font-size: 11px;
        }

        .img-slider .navigation {
            bottom: 10px;
        }
    }

    .new,
    .top {
        margin: 30px 100px;
        margin-bottom: 50px;
    }

    .top-produit {
        height: 16vh;
        overflow-x: scroll;
    }

    .top-produit a {
        text-decoration: none;
    }

    .top-produit .produit-item {
        border: 1px solid var(--spanish-gray);
        background: var(--white);
        border-radius: 10px;
        min-width: 300px;
        margin: 0 15px;
        box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
        transition: all var(--transition-timing);
    }

    .top-produit .produit-item:hover {
        transform: scale(0.9);
    }

    .top-produit .produit-item img {
        border-radius: 10px;
        margin-right: 15px;
    }

    .top-produit .produit-item span:nth-child(1) {
        font-weight: 700;
        font-size: 14px;
        color: var(--eerie-black);
        margin-top: -5px;
    }

    .top-produit .produit-item span:nth-child(2) {
        font-weight: 700;
        color: #398AB9;
        margin-top: 10px;
    }

    .new-produit .new-item {
        position: relative;
        max-width: 300px;
        width: 300px;
        height: 300px;
        border: 5px solid var(--white);
        border-radius: 10px;
        box-shadow: 0 2px 10px 1px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        padding: 0;
    }

    .new-produit .new-item img {
        position: absolute;
        width: 100%;
        height: 100%;
        transition: all .3s ease-in-out;
    }

    .new-produit .new-item span {
        position: absolute;
        color: var(--white);
    }

    .new-produit .new-item .name {
        top: 0;
        left: 0;
        width: 100%;
        height: auto;
        font-weight: 700;
        transform: translateY(-100%);
        opacity: 0;
        text-transform: capitalize;
        visibility: hidden;
        padding: 20px 20px;
        font-size: 20px;
        background: linear-gradient(to bottom, #000, #000, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.1));
        transition: all .3s ease-in-out;
    }

    .new-produit .new-item:hover .name {
        transform: translateY(0%);
        opacity: 1;
        visibility: visible;
    }

    .new-produit .new-item .price {
        bottom: 20px;
        right: 20px;
        height: auto;
        font-size: 20px;
        padding: 3px 8px;
        border-radius: 5px;
        transform: translateY(100%);
        opacity: 0;
        visibility: hidden;
        background: #398AB9;
        font-weight: 600;
        transition: all .3s ease-in-out;
        box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
    }

    .new-produit .new-item .shop {
        bottom: 20px;
        right: 40%;
        padding: 3px 5px;
        font-size: 30px;
        height: auto;
        border-radius: 5px;
        transform: translateY(100%);
        opacity: 0;
        visibility: hidden;
        background: #D0C9C0;
        color: #5F7161;
        font-weight: 600;
        transition: all .3s ease-in-out;
        box-shadow: 0 2px 5px 1px rgba(0, 0, 0, 0.2);
    }

    .new-produit .new-item .shop:hover {
        background: var(--salmon-pink);
        color: var(--white);
        transform: scale(1.1);
    }

    .new-produit .new-item:hover .price {
        transform: translateY(0%);
        opacity: 1;
        visibility: visible;
    }

    .new-produit .new-item:hover .shop {
        transform: translateY(0%);
        opacity: 1;
        visibility: visible;
    }

    .new-produit .new-item:hover img {
        transform: scale(1.3);
    }

    .pro-title h1 {
        font-weight: 600;
    }

    .service {
        padding: 0 100px;
    }

    .service .service-inner {
        background: var(--white);
        border: 1px solid var(--salmon-pink);
        border-radius: 10px;
        padding: 10px 20px;
    }

    .service .service-inner h6 {
        font-weight: 600;
        color: var(--salmon-pink);
    }

    .service .service-inner span {
        font-size: 14px;
        color: var(--spanish-gray);
    }

    .modal-body .item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .modal-body .item:last-child {
        margin-bottom: 0;
    }

    .modal-body .item a img {
        width: 80px;
        border-radius: 50%;
    }

    .modal-body .item a .name {
        flex: 1;
        padding-left: 15px;
        padding-right: 15px;
        color: var(--eerie-black);
    }

    .modal-body .item a .price {
        color: var(--eerie-black);
        font-weight: 600;
    }

    .modal-body .item .panier {
        display: none;
    }

    .md-footer {
        padding-top: 20px;
    }

    .md-footer button {
        border: none;
        background: var(--salmon-pink);
        color: var(--white);
        padding: 4px 15px;
        border-radius: 8px;
        font-weight: 600;
        transition: all var(--transition-timing);
    }

    .md-footer button:hover {
        transform: scale(0.95);
    }

    .md-footer span {
        font-weight: 600;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 10px;
        height: 5px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #DDDDDD;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #D1D1D1;
    }
</style>
@section('userContent')
    <div class="bg-light">
        <div class="img-slider mt-4">
            <div class="slide active">
                <img src="/upload/Slide/1.jpg" alt="">
                <div class="info">
                    <h2>Cadeaux pour hommes</h2>
                    <p>Pas évident de dénicher la bonne idée cadeau homme… Si vous en avez marre d’offrir des cadeaux homme
                        ringards, scrutez ce que nous avons à vous proposer.</p>
                </div>
            </div>
            <div class="slide">
                <img src="/upload/Slide/2.jpg" alt="">
                <div class="info">
                    <h2>Cadeaux pour femmes</h2>
                    <p>Pas évident de dénicher la bonne idée cadeau femme Si vous en avez marre d’offrir des cadeaux femme
                        ringards, scrutez ce que nous avons à vous proposer.</p>
                </div>
            </div>
            <div class="slide">
                <img src="/upload/Slide/3.jpg" alt="">
                <div class="info">
                    <h2>Cadeaux pour anniversaire</h2>
                    <p>Pas évident de dénicher la bonne idée cadeau anniversaire Si vous en avez marre d’offrir des cadeaux anniversaire
                        ringards, scrutez ce que nous avons à vous proposer.</p>
                </div>
            </div>
            {{-- <div class="slide">
                <img src="/upload/Slide/4.jpg" alt="">
                <div class="info">
                    <h2>Slide 04</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="slide">
                <img src="/upload/Slide/5.jpg" alt="">
                <div class="info">
                    <h2>Slide 05</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.</p>
                </div>
            </div> --}}
            <div class="navigation">
                <div class="btn-slide active"></div>
                <div class="btn-slide"></div>
                <div class="btn-slide"></div>
                {{-- <div class="btn-slide"></div>
                <div class="btn-slide"></div> --}}
            </div>
        </div>
        <div class="top">
            <div class="pro-title">
                <h1 class="fs-3 text-center">Top 10 produits <img
                        src="https://img.icons8.com/wired/64/undefined/circled-10.png" width="60px" /></h1>
            </div>
            <div class="top-produit d-flex align-items-center justify-content-between">
                @foreach ($best_pro as $item)
                    <a href="{{ route('proDts.index', $item->name) }}">
                        <div class="produit-item ps-3 pe-2 py-3 d-flex">
                            <img src="{{ asset($item->img) }}" alt="" width="50px" height="50px">
                            <div class="pro-item-inner d-flex flex-column">
                                <span>{{ $item->name }}</span>
                                <span>{{ $item->price }} DH</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="new">
            <div class="pro-title mb-4">
                <h1 class="fs-3 text-center">Nouveau produits <img
                        src="https://img.icons8.com/wired/64/undefined/new.png" /></h1>
            </div>
            <div class="new-produit row justify-content-start">
                @foreach ($pros as $pro)
                    <a href="{{ route('proDts.index', $pro->name) }}" style="display: contents">
                        <div class="new-item col-3 mx-3 my-4">
                            <div>
                                <img src="{{ asset($pro->img) }}">
                                <span class="name">{{ $pro->name }}</span>
                                <span class="price">{{ $pro->price }} DH</span>
                                <a class="panier" href="#"><span class="shop"><i
                                            class="uil uil-shopping-cart-alt"></i></span></a>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="service">
            <div class="pro-title mb-4">
                <h1 class="fs-3 text-center">Nos services <img
                        src="https://img.icons8.com/external-icongeek26-outline-icongeek26/64/undefined/external-service-car-service-icongeek26-outline-icongeek26.png" />
                </h1>
            </div>
            <div class="row">
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="service-inner d-flex align-items-center w-75">
                        <img src="https://img.icons8.com/ios/50/undefined/delivery--v1.png" width="70px" />
                        <div class="ms-3">
                            <h6>Livraison rapide</h6>
                            <span>Entre 24H et 48H</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4 d-flex justify-content-center">
                    <div class="service-inner d-flex align-items-center w-75">
                        <img src="https://img.icons8.com/ios/50/undefined/phonelink-ring--v1.png" width="70px" />
                        <div class="ms-3">
                            <h6>Meilleure assistance en ligne</h6>
                            <span>Heures: 8h00 - 23h00</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-center"">
                                                <div class="       service-inner d-flex align-items-center w-75">
                    <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/undefined/external-left-arrow-kmg-design-detailed-outline-kmg-design.png"
                        width="70px" />
                    <div class="ms-3">
                        <h6>Politique de retour</h6>
                        <span>Retour facile et gratuit</span>
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-center"">
                                                <div class="     service-inner d-flex align-items-center w-75">
                <img src="https://img.icons8.com/ios/50/undefined/money-bag-yen.png" width="70px" />
                <div class="ms-3">
                    <h6>30 % de remboursement</h6>
                    <span>Pour une commande supérieure à 200 DH</span>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    @include('user.footer')

    <script type="text/javascript">
        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn-slide');
        let currentSlide = 1;

        // Javascript for image slider manual navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // Javascript for image slider autoplay navigation
        var repeat = function(activeClass) {
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function() {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });

                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;

                    if (slides.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
        }
        repeat();
        var noti = document.querySelector('.action-btn');
        var panier = document.querySelectorAll('.panier');
        var select = document.querySelector('.modal-body');
        var total_panier = document.querySelector('#total-panier');
        total_panier.innerText = 'Totale : ';
        var total = 0;
        for (btn of panier) {
            btn.addEventListener('click', (e) => {
                var add = Number(noti.getAttribute('data-count') || 0)
                noti.setAttribute('data-count', add + 1)
                noti.classList.add('zero')

                var parent = e.target.parentNode;
                var parent2 = parent.parentNode;
                var parent3 = parent2.parentNode;
                var tag_price = parent3.querySelector('.price').innerText;
                var price = parseInt(tag_price)
                parent3.classList.add('item')
                var clone = parent3.cloneNode(true);
                select.appendChild(clone);
            })
        }
        $(document).ready(function() {
            $('#rech').on('keyup', function() {
                if ($(this).val().length > 0) {
                    var query = $(this).val();
                    $.ajax({
                        url: "rechercher",
                        type: "GET",
                        data: {
                            "rechercher": query
                        },
                        success: function(data) {
                            $('#cherch-list').html(data)
                        }
                    })
                }
                else if($(this).val().length == 0) {
                    $('#cherch-list').css('display','none')
                }

            })
        })

        // console.log(noti)
    </script>
@endsection
