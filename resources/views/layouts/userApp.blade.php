<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GiftArt</title>
    <link rel="shortcut icon" href="https://img.icons8.com/doodle/48/undefined/gift.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        * {
            font-family: 'Poppins', sans-serif;
        }
        :root {
            --spanish-gray: hsl(0, 0%, 60%);
            --sonic-silver: hsl(0, 0%, 47%);
            --eerie-black: hsl(0, 0%, 13%);
            --salmon-pink: hsl(353, 100%, 78%);
            --sandy-brown: hsl(29, 90%, 65%);
            --bittersweet: hsl(0, 100%, 70%);
            --ocean-green: hsl(152, 51%, 52%);
            --davys-gray: hsl(0, 0%, 33%);
            --white: hsl(0, 100%, 100%);
            --onyx: hsl(0, 0%, 27%);
            /**
   * typography
   */

            --fs-1: 1.563rem;
            --fs-2: 1.375rem;
            --fs-3: 1.25rem;
            --fs-4: 1.125rem;
            --fs-5: 1rem;
            --fs-6: 0.938rem;
            --fs-7: 0.875rem;
            --fs-8: 0.813rem;
            --fs-9: 0.75rem;
            --fs-10: 0.688rem;
            --fs-11: 0.625rem;

            --weight-300: 300;
            --weight-400: 400;
            --weight-500: 500;
            --weight-600: 600;
            --weight-700: 700;

            /**
   * border-radius
   */

            --border-radius-md: 10px;
            --border-radius-sm: 5px;

            /**
   * transition
   */

            --transition-timing: 0.2s ease;
        }

    </style>
</head>

<body class="bg-light">
    <main>
        @yield('userContent')
    </main>
</body>

</html>
