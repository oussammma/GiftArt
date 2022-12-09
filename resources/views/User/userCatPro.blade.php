@extends('layouts.userApp')
@extends('user.cherchNav')
@extends('user.userNavbar')
<style>
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
        text-transform: capitalize;
    }

    .pro-title h1 img {
        padding-bottom: 15px;
        margin-left: 10px;
    }
    .cont {
        padding: 0 100px;
    }
</style>
@section('userContent')
    <div class="cont">
        <div class="new">
            <div class="pro-title mt-5">
                @foreach ($pros_name as $item)
                    <h1 class="fs-3 text-center">{{ $item->categorie }} <img
                            src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/undefined/external-gift-valentines-day-flatart-icons-outline-flatarticons-3.png" width="50px" />
                    </h1>
                @endforeach
            </div>
            <div class="new-produit row justify-content-start">
                @foreach ($pros as $pro)
                    <a href="{{ route('proDts.index', $pro->name) }}" style="display: contents">
                        <div class="new-item col-3 mx-3 my-4">
                            <div>
                                <img src="{{ asset($pro->img) }}">
                                <span class="name">{{ $pro->name }}</span>
                                <span class="price">{{ $pro->price }} DH</span>
                                <a href="#"><span class="shop"><i class="uil uil-shopping-cart-alt"></i></span></a>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @include('user.footer')

@endsection
