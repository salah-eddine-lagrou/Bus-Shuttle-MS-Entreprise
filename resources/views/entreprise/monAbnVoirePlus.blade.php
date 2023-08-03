<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/images/myLogo.png">
    <title>
        NavManage
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ffdf620d94.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/myFont.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        textarea {
            height: 150px;
            /* sets the height to 3 lines of text */
            resize: none;
            /* prevents resizing of the textarea */
        }

        #char-count {
            display: inline-block;
            padding: 0.2em 0.4em;
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
            color: #ffffff;
            background-color: #9454bc;
            border-radius: 0.25rem;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 0px 2px 2px black
        }

        .my-heading {
            margin: 10px;
            padding: 10px;
            padding-inline: 90px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f5f5f5;
            text-align: center;
            padding: 10px 0;
        }
    </style>

    <style>
        @media (min-width: 992px) {

            /* Styles for d<esktop views */
            #sidenav-main {
                position: fixed;
                top: 0;
                left: 0;
                bottom: 0;
                width: 250px;
                /* Adjust the width as needed */
                overflow-y: auto;
            }
        }

        #map {
            height: 450px;
            border: 2px solid #000;
            box-shadow: 0 0 5px #888;
            padding: 10px;
        }



        .checkbox-group label {
            display: inline-block;
            margin-right: 10px;
            font-size: 13px;
            color: #555;
            text-shadow: 1px 1px 1px #ccc;
        }

        .checkbox-group label input[type="checkbox"] {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 5px;
            vertical-align: middle;
            -webkit-box-shadow: 1px 1px 1px #ccc;
            box-shadow: 1px 1px 1px #ccc;
        }

        .checkbox-group label input[type="checkbox"]:hover {
            cursor: pointer;
            -webkit-box-shadow: 2px 2px 2px #ccc;
            box-shadow: 2px 2px 2px #ccc;
        }

        .checkbox-group label input[type="checkbox"]:checked:before {
            content: "\f00c";
            display: inline-block;
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            font-size: 16px;
            color: #007bff;
            margin-right: 5px;
            vertical-align: middle;
            text-shadow: none;
        }

        textarea {
            height: 150px;
            /* sets the height to 3 lines of text */
            resize: none;
            /* prevents resizing of the textarea */
        }

        .char-count {
            display: inline-block;
            padding: 0.2em 0.4em;
            font-size: 14px;
            font-weight: 600;
            line-height: 1;
            color: #ffffff;
            background-color: #9454bc;
            border-radius: 0.25rem;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 0px 2px 2px black
        }

        /* For the search drop menu */


        .position-relative {
            position: relative;
            display: inline-block;
        }

        .monFlex {
            flex-direction: row;
        }

        .select-form {
            margin-top: 10px;
            position: relative;
        }

        .select-form select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
            margin-top: 5px;
        }

        .select-form .delete-select {
            position: absolute;
            right: 0;
            top: 0;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 10px;
            margin-right: 10px;
            text-decoration: none;
            /* Add this line */
        }

        .select-form .delete-select:hover {
            background-color: #d32f2f;
            text-decoration: none;
            /* Add this line */
        }

        .purple-text {
            color: purple !important;
        }


        .content-overlay {
            position: relative;
            z-index: 1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
        }

        .custom-button {
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .custom-button::before {
            content: "";
            position: absolute;
            top: -20px;
            left: -20px;
            right: -20px;
            bottom: -20px;
            background: linear-gradient(to right,
                    #0047ab,
                    #003d96,
                    #003381,
                    #002e6c);
            z-index: -1;
            opacity: 0;
            border-radius: 50%;
            animation: pulsate 2s ease-out infinite;
        }

        @keyframes pulsate {
            0% {
                transform: scale(0.2);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: scale(1.2);
                opacity: 0;
            }
        }

        .myOffre {
            display: none;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('partials._aside')
    @php
        $typeAbonnement = DB::table('type_abonnements')
            ->where('id', $abonnement->id_type_abonnement)
            ->first();
        $entreprise = DB::table('entreprises')
            ->where('id', $abonnement->id_entreprise)
            ->first();
        $mesJours = DB::table('jours')
            ->join('date_abonnements', 'jours.id', '=', 'date_abonnements.id_jour')
            ->join('abonnements', 'date_abonnements.id_abonnement', '=', 'abonnements.id')
            ->where('abonnements.id', $abonnement->id) // Remplacez $abonnementId par l'ID de l'abonnement souhaité
            ->select('jours.*')
            ->get();
        $vehiculesAbonnement = DB::table('vehicules')
            ->where('id_abonnement', $abonnement->id)
            ->get();
        $vehiculesCount = DB::table('vehicules')
            ->where('id_abonnement', $abonnement->id)
            ->count();
        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $vehicules = DB::table('vehicules')
            ->whereNull('id_abonnement')
            ->where('id_entreprise', $entreprise->id)
            ->get();

        $id_entreprise = $entreprise->id;
    @endphp
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <div class="container-fluid">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
                navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="text-white opacity-5 purple-text"
                                    href="{{ route('mesAbonnements') }}">Abonnements</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"
                                style="color: black !important;">Plus</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">Plus d'information</h6>
                    </nav>

                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-1 d-flex align-items-center">
                            <div class="input-group">

                            </div>
                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="#">Home</a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                    class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    <span class="d-sm-inline d-none pe-3">Se-deconnecter</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center mx-4">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <i class="fa-solid fa-bus me-3"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0 ">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="d-flex justify-content-center">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none position-fixed blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
                navbar-scroll="true">
                <div class="text-center">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                            <li class="nav-item pe-3" style="padding-left: 10px">
                                <a class="nav-link mb-0 px-0 py-1 active" href="#infos">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(603.000000, 0.000000)">
                                                        <path class="color-background"
                                                            d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                        </path>
                                                        <path class="color-background"
                                                            d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"
                                                            opacity="0.7"></path>
                                                        <path class="color-background"
                                                            d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"
                                                            opacity="0.7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Infos</span>
                                </a>
                            </li>
                            <li class="nav-item pe-3" style="padding-left: 10px">
                                <a class="nav-link mb-0 px-0 py-1 "href="#statistics" role="tab"
                                    aria-selected="false">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Statistics</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(304.000000, 151.000000)">
                                                        <polygon class="color-background" opacity="0.596981957"
                                                            points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                        </polygon>
                                                        <path class="color-background"
                                                            d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
                                                            opacity="0.596981957"></path>
                                                        <path class="color-background"
                                                            d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Statistics</span>
                                </a>
                            </li>
                            <li class="nav-item pe-3" style="padding-left: 10px">
                                <a class="nav-link mb-0 px-0 py-1 " href="#clients">
                                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44"
                                        version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Clients</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF"
                                                fill-rule="nonzero">
                                                <g transform="translate(1716.000000, 291.000000)">
                                                    <g transform="translate(154.000000, 300.000000)">
                                                        <path class="color-background"
                                                            d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                            opacity="0.603585379"></path>
                                                        <path class="color-background"
                                                            d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                    <span class="ms-1">Clients</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->
        @php
            $imagePath1 = asset('/autocars/2326x800_Coach_innovation_Top_image.jpg');
        @endphp
        <div class="container-fluid">
            <div class="min-height-300 border-radius-xl mt-4"
                style="box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); background-image: url('{{ $imagePath1 }}'); background-position-y: 50%; background-size: cover; padding-top: 15px; padding-bottom: 15px;">

                <div class="py-4 container-fluid content-overlay" style="backdrop-filter: none !important;">
                    <div class="row">
                        <div class="card card-body blur shadow-blur mx-4 overflow-hidden h-100">
                            <div class="row text-center">
                                <div class="">
                                    <div class="avatar avatar-xl position-relative">
                                        <img src="{{ asset('/images/' . $entreprise->image) }}" alt="profile_image"
                                            class="w-100 border-radius-lg shadow-sm">
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <div class="h-100">
                                        <h5 class="mb-1">
                                            {{ $entreprise->nom }}
                                        </h5>
                                        <p class="mb-0 font-weight-bold text-sm">
                                            {{ $entreprise->secteur }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 py-2 text-center">
                    <a class="btn btn-outline-white btn-sm mb-0" style="filter: none !important;"
                        href="{{ route('profile') }}">voire
                        entreprise</a>
                </div>
            </div>



            <!-- Content goes here -->
            {{-- <span class="mask bg-gradient-primary opacity-6"></span> --}}


        </div>



        <div id="infos" class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4" style="width: 100%">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="">
                                    <h4 class="mb-0 border text-center"
                                        style="font-family: Georgia, 'Times New Roman', Times, serif">Informations
                                        d'abonnement</h4>
                                </div>
                                <div class="py-2 text-end">
                                    <div class="d-flex justify-content-end">
                                        <a class="afficherAdd btn fixed-plugin-button-nav cursor-pointer"
                                            style="width: 70px" href="#">
                                            <i class="fa-solid fa-pen-to-square" title="Edit Informations"
                                                style="font-size: 17px"></i>
                                        </a>

                                        <form action="{{ route('destroyMonAbn', $abonnement->id) }}" method="GET"
                                            onsubmit="return confirm('Etes-vous sur de supprimer abonnement')">
                                            @csrf
                                            @method('PATCH')
                                            <button
                                                class="btn btn-link text-danger text-gradient px-3 mb-0 rounded shadow"
                                                type="submit" style="width: 70px"
                                                title="la suppression de l'abonnement entraine la suppression de l'offre si il existe">
                                                <i class="far fa-trash-alt me-2" style="font-size: 17px"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-div">
                                        <hr class="horizontal gray-light my-4">
                                        <div class="card-body px-4 py-2 mt-4">
                                            @php
                                                $nbrClients = DB::table('client_abonnes')
                                                    ->join('clients', 'clients.id', '=', 'client_abonnes.id_client')
                                                    ->where('id_abonnement', $abonnement->id)
                                                    ->count();

                                                $capacite = 0;
                                                foreach ($vehiculesAbonnement as $vehicule) {
                                                    $capacite = $capacite + $vehicule->capacite;
                                                }
                                                if ($capacite != 0) {
                                                    $vide = number_format(($nbrClients * 100) / $capacite, 1);
                                                } else {
                                                    $vide = 'non determine';
                                                }

                                            @endphp
                                            <div class="">
                                                <p class="text-sm mb-2">Nom
                                                    d'abonnement:</p>
                                                <strong class="border-top border-bottom py-2 text-sm"
                                                    style="font-size: 19px !important">
                                                    {{ $abonnement->nom }}</strong>
                                            </div>
                                            <br>
                                            <div class="mt-4 border">
                                                <div class="row text-center">
                                                    <div class="col-md-4">
                                                        <h6 class="text-gradient text-dark mb-3">Nbr abonnées</h6>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $nbrClients }}
                                                        </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6 class="text-gradient text-dark mb-3">Capacite</h6>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $capacite }}
                                                        </p>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <h6 class="text-gradient text-dark mb-3">Vide par</h6>
                                                        <p class="border-top border-bottom py-2 text-sm"
                                                            style="{{ $vide < 100 ? 'color: green;' : 'color: red;' }}">
                                                            @if ($vide == 'non determine')
                                                                {{ $vide }}
                                                            @else
                                                                {{ $vide }} %
                                                            @endif

                                                        </p>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="text-center" style="padding-top: 50px !important">
                                                <img src="{{ asset('/autocars/reservat-backoffice.png') }}"
                                                    alt="" style="max-width: 80%; height: auto;">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border rounded p-3" id="map"></div>
                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <p class="text-sm mb-2 text-end"><i
                                                    class="fa-solid fa-location-dot pe-2"></i><strong>Depart</strong>
                                            </p>
                                            <p class="border-top border-bottom py-2 text-sm text-end">
                                                {{ $abonnement->depart }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="text-sm mb-2"><strong class="pe-2">Destination</strong><i
                                                    class="fa-solid fa-location-dot"></i></p>
                                            <p class="border-top border-bottom py-2 text-sm">
                                                {{ $abonnement->destination }}
                                            </p>
                                        </div>
                                    </div>
                                    <div style="padding-top : 40px">
                                        <h6 class="text-gradient text-dark mb-3">AutoCars</h6>
                                        <p class="text-sm">
                                            <strong>Nombre d'autocars:</strong>
                                        </p>
                                        <p class="border-top border-bottom py-2 text-sm">
                                            {{ $vehiculesCount }}
                                        </p>
                                        @if ($vehiculesCount != 0)
                                            <p class="mt-4 text-sm">
                                                <strong>Liste des autocars:</strong>
                                            </p>
                                            <ul class="list-group list-group-flush mt-2">
                                                @foreach ($vehiculesAbonnement as $key => $vehicule)
                                                    @if ($key < 3)
                                                        <li class="list-group-item border-0">
                                                            <i
                                                                class="fas fa-bus me-2 text-primary"></i>{{ $vehicule->marque }}
                                                        </li>
                                                    @elseif ($key == 3)
                                                        <li class="list-group-item border-0">
                                                            <span class="text-primary">et d'autres</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal gray-light my-4">
                            <div class="row">
                                <div class="col-md-6 w-100">
                                    <div class="custom-div">
                                        <hr class="horizontal gray-light my-4">

                                        <div class="card-body px-4 py-2 mt-4">
                                            <div class="mb-4">
                                                <h5 class="text-gradient text-dark mb-3"><i
                                                        class="fa-solid fa-circle-info"></i> Informations
                                                    suplementaires
                                                </h5>
                                                <hr class="horizontal gray-light my-4">
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <p class="text-sm mb-2"><strong>Description
                                                                d'abonnement:</strong></p>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $abonnement->description }}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-sm mb-2"><strong>Description de
                                                                type:</strong></p>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $typeAbonnement->description }}</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="text-sm mb-2"><strong>Type
                                                                        d'abonnement:</strong></p>
                                                                <p class="border-top border-bottom py-2 text-sm">
                                                                    {{ $typeAbonnement->nom }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            {{-- <div class="col-md-6"> --}}
                                                            <p class="text-sm mb-2"><i
                                                                    class="fa-solid fa-route pe-2"></i><strong>Trajet:</strong>
                                                            </p>
                                                            <p class="border-top border-bottom py-2 text-sm">
                                                                {{ $abonnement->trajet }}</p>
                                                            {{-- </div> --}}
                                                            @php
                                                                $n = 0;
                                                            @endphp
                                                            {{-- <div class="col-md-6"> --}}
                                                            <p class="text-sm mb-2"><i
                                                                    class="fa-regular fa-calendar-days pe-2"></i><strong>Emploi
                                                                    du
                                                                    temps:</strong></p>
                                                            <p class="border-top border-bottom py-2 text-sm">
                                                                @foreach ($mesJours as $mesJour)
                                                                    {{ $mesJour->jour }} - @php $n++; @endphp
                                                                @endforeach
                                                                {{ $n }}/7
                                                            </p>
                                                            {{-- </div> --}}
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="text-sm mb-2 text-end"><i
                                                                        class="fa-solid fa-clock pe-2"></i><strong>Horaire
                                                                        d'aller</strong></p>
                                                                <p
                                                                    class="border-top border-bottom py-2 text-sm text-end">
                                                                    {{ date('H:i', strtotime($abonnement->heur_debut_aller)) }}
                                                                    -
                                                                    {{ date('H:i', strtotime($abonnement->heur_fin_aller)) }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="text-sm mb-2"><strong class="pe-2">Horaire
                                                                        de
                                                                        retour</strong><i
                                                                        class="fa-solid fa-clock"></i></p>
                                                                <p class="border-top border-bottom py-2 text-sm">
                                                                    {{ date('H:i', strtotime($abonnement->heur_debut_retour)) }}
                                                                    -
                                                                    {{ date('H:i', strtotime($abonnement->heur_fin_retour)) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="py-4">
                                                            <video
                                                                src="/autocars/Blue Pink Abstract Gradient Animation Podcast Instagram Post.mp4"
                                                                autoplay loop muted playsinline
                                                                style="max-width: 100%; height: auto;"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">

                                                    </div>
                                                    <div
                                                        class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                                                        <div>
                                                            @php
                                                                $vehiculesAbonnement = DB::table('vehicules')
                                                                    ->where('id_abonnement', $abonnement->id)
                                                                    ->get();
                                                                $nbrClients = DB::table('paiements')
                                                                    ->join('clients', 'clients.id', '=', 'paiements.id_client')
                                                                    ->where('id_abonnement', $abonnement->id)
                                                                    ->count();

                                                                $capacite = 0;
                                                                foreach ($vehiculesAbonnement as $vehicule) {
                                                                    $capacite = $capacite + $vehicule->capacite;
                                                                }

                                                                $estPlien = $capacite - $nbrClients;
                                                                $message = '';
                                                                if ($estPlien == 0) {
                                                                    $message .= ' Plein';
                                                                }
                                                            @endphp
                                                            @if ($estPlien == 0)
                                                                <button class="priceButt btn btn-primary btn-lg mt-4"
                                                                    style="border: none; box-shadow: 0px 10px 2px purple; font-size: 15px;">
                                                                    <h5 style="color: white">{{ $message }}</h5>
                                                                    <span class="text-sm"
                                                                        style="color: #ffffff; font-style: italic">Prix:
                                                                        {{ $abonnement->prix }} dhs</span>
                                                                </button>
                                                            @else
                                                                <button class="priceButt btn btn-primary btn-lg mt-4"
                                                                    style="border: none; box-shadow: 0px 10px 2px purple; font-size: 15px;">
                                                                    <h5 style="color: white">Disponible</h5>
                                                                    Prix: {{ $abonnement->prix }} dhs
                                                                </button>
                                                            @endif


                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        @php

            // Get the current count of clients
            $currentClientCount = DB::table('client_entreprises')
                ->where('id_entreprise', $entreprise->id)
                ->count();
            //le nombre de mes client_entreprise

            $currentDayClientCount = DB::table('client_entreprises')
                ->where('id_entreprise', $entreprise->id)
                ->whereDate('created_at', Carbon\Carbon::now()->format('Y-m-d'))
                ->count();

            // Calculate the difference in client count
            $percentageChange = 0;
            if ($currentClientCount != 0) {
                $percentageChange = ($currentDayClientCount / $currentClientCount) * 100;
            }

            //____________________________
            $allMyclientsAbonnes = DB::table('client_abonnes')
                ->where('id_entreprise', $entreprise->id)
                ->where('id_abonnement', $abonnement->id)
                ->get();
            //le nombre de mes client_entreprise
            $nbrMyClientsAbn = $allMyclientsAbonnes->count();
            $currentClientAbnCount = DB::table('client_abonnes')
                ->where('id_entreprise', $entreprise->id)
                ->where('id_abonnement', $abonnement->id)
                ->count();

            $currentDayClientCount = DB::table('client_abonnes')
                ->where('id_entreprise', $entreprise->id)
                ->where('id_abonnement', $abonnement->id)
                ->whereDate('created_at', Carbon\Carbon::now()->format('Y-m-d'))
                ->count();

            $percentageChangeAbn = 0;
            if ($currentClientAbnCount != 0) {
                $percentageChangeAbn = ($currentDayClientCount / $currentClientAbnCount) * 100;
            }

            //_____________________
            $mesAbns = DB::table('abonnements')
                ->where('id_entreprise', $entreprise->id)
                ->get();
            $idsAbonnements = $abonnement->id;
            $mesPaiementsEntrep = DB::table('paiements')
                ->where('id_abonnement', $idsAbonnements)
                ->get();
            $totalSales = $mesPaiementsEntrep->sum('montant');

            $mesCurrentDayPaiementsEntrep = DB::table('paiements')
                ->where('id_abonnement', $idsAbonnements)
                ->whereDate('created_at', Carbon\Carbon::now()->format('Y-m-d'))
                ->get();
            $currentSales = $mesCurrentDayPaiementsEntrep->sum('montant');
            $percentageDifference = 0;
            if ($totalSales != 0) {
                $percentageDifference = ($currentSales / $totalSales) * 100;
            }
            //_____________________
            $yesterday = Carbon\Carbon::yesterday()->format('Y-m-d');
            $mesPaiementsEntrepYesterday = DB::table('paiements')
                ->where('id_abonnement', $idsAbonnements)
                ->whereDate('created_at', $yesterday)
                ->get();
            $totalSalesYesterday = $mesPaiementsEntrepYesterday->sum('montant');

            $percentageDifferenceYesterday = 0;
            if ($totalSales != 0) {
                $percentageDifferenceYesterday = ($totalSalesYesterday / $totalSales) * 100;
            }
            $percentageDifferenceToday = 0;
            if ($totalSales != 0) {
                $percentageDifferenceToday = ($currentSales / $totalSales) * 100;
            }

            $differenceSales = $percentageDifferenceToday - $percentageDifferenceYesterday;

        @endphp
        <div class="row statistics" id="statistics">
            <div class="col-12 col-xl-4 w-100">
                <div class="card h-100">
                    <div class="card mb-4">
                        <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Statistiques quotidiennes</h5>
                        </div>
                        <div class="card-header pb-0">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                            Revenu du jour</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            ${{ number_format($currentSales, 0, '.', ',') }}
                                                            @if ($differenceSales > 0)
                                                                <span
                                                                    class="text-success text-sm font-weight-bolder">+{{ number_format($differenceSales, 2) }}%</span>
                                                            @else
                                                                <span
                                                                    class="text-danger text-sm font-weight-bolder">{{ number_format($differenceSales, 2) }}%</span>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-money-coins text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                            Abonnements</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            +{{ $nbrMyClientsAbn }}
                                                            @if ($percentageChangeAbn > 0)
                                                                <span
                                                                    class="text-success text-sm font-weight-bolder">+{{ $percentageChangeAbn }}%</span>
                                                            @elseif ($percentageChangeAbn == 0)
                                                                <span
                                                                    class="text-danger text-sm font-weight-bolder">{{ $percentageChangeAbn }}%</span>
                                                            @else
                                                                <span
                                                                    class="text-danger text-sm font-weight-bolder">-{{ $percentageChangeAbn }}%</span>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-world text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                            Nouveaux clients</p>
                                                        <h5 class="font-weight-bolder mb-0">
                                                            +{{ $currentClientCount }}

                                                            @if ($percentageChange > 0)
                                                                <span
                                                                    class="text-success text-sm font-weight-bolder">+{{ $percentageChange }}%</span>
                                                            @elseif ($percentageChange == 0)
                                                                <span
                                                                    class="text-danger text-sm font-weight-bolder">{{ $percentageChange }}%</span>
                                                            @else
                                                                <span
                                                                    class="text-danger text-sm font-weight-bolder">-{{ $percentageChange }}%</span>
                                                            @endif

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="ni ni-paper-diploma text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="numbers">
                                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                            Ventes</p>
                                                        @if ($totalSales >= 1000000)
                                                            <?php $formattedSales = number_format($totalSales / 1000000, 1) . 'M'; ?>
                                                        @elseif ($totalSales >= 1000)
                                                            <?php $formattedSales = number_format($totalSales, 0, '.', ','); ?>
                                                        @else
                                                            <?php $formattedSales = $totalSales; ?>
                                                        @endif

                                                        <h5 class="font-weight-bolder mb-0">
                                                            ${{ $formattedSales }}
                                                        </h5>
                                                        <h6 class="text-muted mt-0">
                                                            ${{ number_format($totalSales, 0, '.', ',') }}
                                                        </h6>
                                                        @if ($percentageDifference > 0)
                                                            <span
                                                                class="text-success text-sm font-weight-bolder">+{{ number_format($percentageDifference, 2) }}%</span>
                                                        @else
                                                            <span
                                                                class="text-danger text-sm font-weight-bolder">{{ number_format($percentageDifference, 2) }}%</span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <div
                                                        class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                                        <i class="fa-solid fa-bus text-lg opacity-10"
                                                            aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="clients" class="container-fluid py-4">
            <div class="row">
                <div class="card h-100">
                    <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Clients abonnés</h5>
                    </div>
                    <hr class="horizontal dark my-1"
                        style="background-color: white;
                            height: 2px;">
                    <div class="card-body px-0 pt-0 pb-2 py-2">
                        <div class="table-responsive py-3">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nom / Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Telephone</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            date inscription</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            # Abonnements</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Etat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <script>
                                        @if (session('success'))
                                            alert("{{ session('success') }}");
                                        @endif

                                        @if ($errors->any())
                                            var errorMessage = "Errors:\n";
                                            @foreach ($errors->all() as $error)
                                                errorMessage += "{{ $error }}\n";
                                            @endforeach
                                            alert(errorMessage);
                                        @endif
                                    </script>
                                    <!-- Display the search results here -->
                                    @if (!$clients || $clients->isEmpty())
                                        <div class="text-center">
                                            <h2 style="color: #999; font-style: italic;">Aucun client pour le moment
                                            </h2>
                                        </div>
                                    @else
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    <i class="fa-solid fa-user me-3" style="font-size: 24px;"></i>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $client->nom }}</h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $client->email }}
                                                        </p>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $client->telephone }}
                                                    </p>
                                                </td>

                                                @php
                                                    $clientEntreprises = DB::table('client_entreprises')
                                                        ->where('id_entreprise', $entreprise->id)
                                                        ->get();

                                                    $clEntr = $clientEntreprises->where('id_client', $client->id)->first();
                                                @endphp
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        @if ($clEntr)
                                                            {{ $clEntr->dateInscription }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </p>
                                                </td>

                                                @php

                                                    $nbrAbnm = DB::table('client_abonnes')
                                                        ->where('id_client', $client->id)
                                                        ->where('id_entreprise', $entreprise->id)
                                                        ->count();

                                                @endphp

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $nbrAbnm }}
                                                    </p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0" style="color: green">
                                                        Client Abonné
                                                    </p>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    @php
                                                        $clientAbonneId = DB::table('client_abonnes')
                                                            ->where('id_client', $client->id)
                                                            ->where('id_abonnement', $abonnement->id)
                                                            ->first();
                                                    @endphp
                                                    <form
                                                        action="{{ route('clientEntreprise.destroyFromAbn', $clientAbonneId->id) }}"
                                                        method="GET" class="delete-vehicule-form"
                                                        onsubmit="return confirm('Etes-vous sûr supprimer le client {{ $client->nom }} de ce abonnement ?')">
                                                        @csrf
                                                        @method('GET')

                                                        <button
                                                            class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                            type="submit" style="color: red !important;">
                                                            Résiler
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed-plugin ">
        <div class="augmenterWidth card shadow-lg overflow-auto">
            <div class="card-header pb-0 pt-3 ">
                <div class="mt-3">
                    <h6 class="mb-0" style="display: inline-block; margin-right: 10px;">Navbar Fixed</h6>
                    <button class="closer btn btn-link text-dark p-0 " style="display: inline-block; float: right;">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>

                <hr class="horizontal dark my-sm-4">
                <div class="d-flex align-items-center justify-content-center">
                    <div>
                        <h4 class="mt-3 mb-0 text-shadow font-weight-bold border-bottom text-center my-heading"
                            style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">Formulaire
                            de modification d'abonnement</h4>
                        <hr class="horizontal dark my-sm-4">
                    </div>
                </div>

                <script>
                    @if (session('success'))
                        alert("{{ session('success') }}");
                    @endif

                    @if ($errors->any())
                        var errorMessage = "Errors:\n";
                        @foreach ($errors->all() as $error)
                            errorMessage += "{{ $error }}\n";
                        @endforeach
                        alert(errorMessage);
                    @endif
                </script>
                <form action="{{ route('updateAbn', $abonnement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body pt-4 p-3"
                        style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                        @if ($abonnement->id_offre === null)
                            <button id="showMyOffre" class="btn btn-outline-dark w-100" type="button">Ajouter un
                                offre</button>
                            <div id="myOffre" class="myOffre card-body pt-4 p-3"
                                style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                                <div class="form-group">
                                    <h5 class="mt-3 mb-0">Offre : </h5>
                                    <hr class="horizontal dark my-sm-4">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Titre d'offre</label>
                                    <input class="form-control @error('titre') is-invalid @enderror" type="text"
                                        name="titre" id="example-text-input" value="{{ old('titre') }}">
                                    @error('titre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="form-control-label">Description</label>
                                    <textarea class="form-control @error('description_offre') is-invalid @enderror" id="exampleTextarea"
                                        name="description_offre" rows="3" placeholder="decrire l'offre ses avantages et .." maxlength="250">{{ old('description_offre') }}</textarea>
                                    <span class="char-count">250</span>
                                    @error('description_offre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Date fin offre</label>
                                    <input
                                        class="reglerInputDate form-control @error('dateFinOffre') is-invalid @enderror"
                                        type="date" name="dateFinOffre" id="example-text-input"
                                        value="{{ old('dateFinOffre') }}">
                                    @error('dateFinOffre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="example-select-input" aria-label="multiple select example"
                                        class="form-control-label">Image pour offre</label>
                                    <div class="mb-3">
                                        <input id="imageFile" type="file"
                                            class="form-control @error('image_offre') is-invalid @enderror"
                                            name="image_offre" accept="image/*" aria-label="Image Upload"
                                            aria-describedby="image-addon">
                                        @error('image_offre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <button id="hideMyOffre" class="btn btn-outline-dark w-100" type="button">Retirer
                                    l'offre</button>

                                <input type="hidden" name="id_entreprise" value="{{ $entreprise->id }}">
                                {{-- une autre chose sur l'id de lentreprise ne pas l'oublie --}}
                            </div>
                        @else
                            @php
                                $offre = DB::table('offres')
                                    ->where('id', $abonnement->id_offre)
                                    ->first();
                            @endphp

                            <div class="card-body pt-4 p-3"
                                style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5 class="mt-3 mb-0">Offre : </h5>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('infosAbonnement', ['id' => $abonnement->id]) }}"
                                                class="btn btn-outline-dark w-100">Voir plus sur l'offre</a>

                                        </div>
                                    </div>
                                    <hr class="horizontal dark my-sm-4">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Titre d'offre</label>
                                    <input class="form-control @error('titre') is-invalid @enderror" type="text"
                                        name="titre" id="example-text-input" value="{{ $offre->titre }}">
                                    @error('titre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-search-input" class="form-control-label">Description</label>
                                    <textarea class="form-control @error('description_offre') is-invalid @enderror" id="exampleTextarea"
                                        name="description_offre" rows="3" placeholder="decrire l'offre ses avantages et .." maxlength="250">{{ $offre->description }}</textarea>
                                    <span class="char-count">250</span>
                                    @error('description_offre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Date fin offre</label>
                                    <input
                                        class="reglerInputDate form-control @error('dateFinOffre') is-invalid @enderror"
                                        type="date" name="dateFinOffre" id="example-text-input"
                                        value="{{ $offre->dateFinOffre }}">
                                    @error('dateFinOffre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @php
                                    $imageOffre = DB::table('image_offres')
                                        ->where('id', $offre->id_imageOffre)
                                        ->first();
                                @endphp
                                <div class="form-group">
                                    <label for="example-select-input" aria-label="multiple select example"
                                        class="form-control-label">Image pour offre</label>
                                    <div class="mb-3">
                                        <input id="imageFile" type="file"
                                            class="form-control @error('image_offre') is-invalid @enderror"
                                            name="image_offre" accept="image/*" aria-label="Image Upload"
                                            aria-describedby="image-addon">
                                        @if ($imageOffre)
                                            <div class="py-2 text-center">
                                                <img class="w-40 rounded shadow"
                                                    src="{{ asset('/' . $imageOffre->image) }}"
                                                    alt="Image de l'offre">
                                            </div>
                                        @endif
                                        @error('image_offre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                </div>

                                <input type="hidden" name="id_entreprise" value="{{ $entreprise->id }}">
                                {{-- une autre chose sur l'id de lentreprise ne pas l'oublie --}}
                            </div>
                        @endif

                        <br>
                        <div class="card-body pt-4 p-3"
                            style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                            <div class="form-group">
                                <h5 class="mt-3 mb-0">Abonnement : </h5>
                                <hr class="horizontal dark my-sm-4">
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Nom d'abonnement</label>
                                <input class="form-control @error('nom') is-invalid @enderror" type="text"
                                    name="nom" id="example-text-input" value="{{ $abonnement->nom }}">
                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Ici TypeAbonnement affichage de donnees -->
                            <div class="form-group">
                                <label for="example-select-input" aria-label="multiple select example"
                                    class="form-control-label">Type d'abonnement</label>
                                <select class="form-control @error('type_abonnement') is-invalid @enderror"
                                    id="example-select-input" name="type_abonnement">
                                    <option value="{{ $typeAbonnement->id }}">{{ $typeAbonnement->nom }}</option>
                                    @foreach ($type_abonnements as $type_abonnement)
                                        <option value="{{ $type_abonnement->id }}">{{ $type_abonnement->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_abonnement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label
                                    for="example-search-input @error('description_abonnement') is-invalid @enderror"
                                    class="form-control-label">Description</label>
                                <textarea class="form-control" id="exampleTextarea" name="description_abonnement" rows="3"
                                    placeholder="decrire les politiques et les règles de l'abonnement" maxlength="250">{{ $typeAbonnement->description }}</textarea>
                                <span class="char-count">250</span>
                                @error('description_abonnement')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-datetime-local-input" class="form-control-label">Durée</label>
                                <small class="form-text text-muted">(nombres des mois)</small>
                                <input class="form-control @error('duree') is-invalid @enderror" type="number"
                                    name="duree" id="example-datetime-local-input"
                                    value="{{ $abonnement->duree }}">
                                @error('duree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="depart" class="form-control-label">Place départ</label>
                                    <select class="form-control @error('depart') is-invalid @enderror" name="depart"
                                        id="depart">
                                        <option value="{{ $abonnement->depart }}">{{ $abonnement->depart }}</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->city }}">{{ $location->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('depart')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="destination" class="form-control-label">Destination</label>
                                    <select class="form-control @error('destination') is-invalid @enderror"
                                        name="destination" id="destination">
                                        <option value="{{ $abonnement->destination }}">{{ $abonnement->destination }}
                                        </option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->city }}"
                                                data-depart="{{ $location->city }}">
                                                {{ $location->city }}</option>
                                        @endforeach
                                    </select>
                                    @error('destination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="example-checkbox-group" class="form-control-label">Sélectionner les
                                    jours</label>
                                <div class="checkbox-group @error('jours') is-invalid @enderror"
                                    style="border: 1px solid #ccc; border-radius: 10px; padding-inline: 10px; padding-top: 5px; padding-bottom: 5px;">
                                    @foreach ($jours as $jour)
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="jours[]" value="{{ $jour->id }}"
                                                {{ in_array($jour->id, $mesJours->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            {{ $jour->jour }} </label>
                                    @endforeach
                                </div>

                                @error('jours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-week-input" class="form-control-label">Heur départ d'aller</label>
                                <input class="form-control @error('heur_debut_aller') is-invalid @enderror"
                                    type="time" name="heur_debut_aller" id="example-time-input"
                                    value="{{ $abonnement->heur_debut_aller }}">
                                @error('heur_debut_aller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-week-input" class="form-control-label">Heur fin d'aller</label>
                                <input class="form-control @error('heur_fin_aller') is-invalid @enderror"
                                    type="time" name="heur_fin_aller" id="example-time-input"
                                    value="{{ $abonnement->heur_fin_aller }}">
                                @error('heur_fin_aller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-week-input" class="form-control-label">Heur départ de
                                    retour</label>
                                <input class="form-control @error('heur_debut_retour') is-invalid @enderror"
                                    type="time" name="heur_debut_retour" id="example-time-input"
                                    value="{{ $abonnement->heur_debut_retour }}">
                                @error('heur_debut_retour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-week-input" class="form-control-label">Heur fin de retour</label>
                                <input class="form-control @error('heur_fin_retour') is-invalid @enderror"
                                    type="time" name="heur_fin_retour" id="example-time-input"
                                    value="{{ $abonnement->heur_fin_retour }}">
                                @error('heur_fin_retour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="example-datetime-local-input" class="form-control-label">Prix</label>
                                <small class="form-text text-muted">(par periode)</small>
                                <input class="form-control @error('prix') is-invalid @enderror" type="text"
                                    name="prix" id="example-datetime-local-input"
                                    value="{{ $abonnement->prix }}">
                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="card-body pt-4 p-3"
                            style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                            <div class="form-group">
                                <h5 class="mt-3 mb-0">Vehicule : </h5>
                                <hr class="horizontal dark my-sm-4">
                            </div>

                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">autoCar pour un
                                    abonnement</label><br>
                                {{-- <button type="button" id="generate-select">Generate Select Form</button> --}}
                                <a id="generate-select" class="btn btn-round btn-sm mb-0 btn-outline-primary me-2"
                                    target="_blank">Reserver un autoCar</a>
                                <div id="select-container" class="select-form">
                                    @foreach ($vehiculesAbonnement as $vehiculesAbon)
                                        <select name="vehicules[]"
                                            class="select-form @error('vehicules') is-invalid @enderror">
                                            <option value="{{ $vehiculesAbon->id }}">{{ $vehiculesAbon->marque }} |
                                                {{ $vehiculesAbon->capacite }} |
                                                {{ $vehiculesAbon->dateMiseEnservice }}
                                            </option>
                                            @foreach ($vehicules as $vehicule)
                                                <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} |
                                                    {{ $vehicule->capacite }} | {{ $vehicule->dateMiseEnservice }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endforeach

                                    @error('vehicules')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>



                            {{-- as Bar search --}}


                            {{-- une autre chose sur l'id de lentreprise ne pas l'oublie --}}
                        </div>
                        <hr class="horizontal dark my-sm-4">
                        <button class="btn bg-gradient-dark w-100" type="submit">Modifier l'offre
                            d'abonnement</button>
                        <button class="btn btn-outline-dark w-100" type="button">Annuler l'opération</button>
                </form>

            </div>

        </div>
    </div>
    <style>
        .priceButt:active {
            box-shadow: none !important;
        }
    </style>


    <!--   Core JS Files   -->
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <script src="/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="https://www.amcharts.com/lib/3/amcharts.js?x"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js?x"></script>
    <script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        var map = L.map('map').setView([{{ $destinationCitieDepart->destinationCitieDepartlat }},
            {{ $destinationCitieDepartlng->destinationCitieDepartlng }}
        ], 3);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        }).addTo(map);
        L.Routing.control({
            waypoints: [
                L.latLng({{ $destinationCitieDepart->destinationCitieDepartlat }},
                    {{ $destinationCitieDepartlng->destinationCitieDepartlng }}),
                L.latLng({{ $destinationCitieDestination->destinationCitieDestinationlat }},
                    {{ $destinationCitieDestinationlng->destinationCitieDestinationlng }}),
            ],

            createMarker: function(i, waypoint, n) {
                var marker = L.marker(waypoint.latLng);
                marker.bindPopup("Trajectory Name " + (1 + i));
                return marker;
            }
        }).addTo(map);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showFormButton = document.getElementById('showMyOffre');
            const myOffre = document.getElementById('myOffre');
            var myOffreFields = null;

            if (myOffre) {
                myOffreFields = myOffre.querySelectorAll('input, textarea, select');
            }

            if (showFormButton && myOffre && myOffreFields) {
                showFormButton.addEventListener('click', function() {
                    myOffre.classList.remove('myOffre');
                });

                const hideMyOffreButton = document.getElementById('hideMyOffre');

                hideMyOffreButton.addEventListener('click', function() {
                    myOffre.classList.add('myOffre');
                    myOffreFields.forEach(function(field) {
                        field.disabled = true;
                    });
                });
            }
        });
    </script>

    <script>
        // Get the <select> elements
        var departSelect = document.getElementById('depart');
        var destinationSelect = document.getElementById('destination');

        // Listen for the change event on the depart select
        departSelect.addEventListener('change', function() {
            var selectedDepart = this.value;

            // Enable all options in the destination select
            for (var i = 0; i < destinationSelect.options.length; i++) {
                destinationSelect.options[i].disabled = false;
            }

            // Disable the corresponding option in the destination select
            if (selectedDepart) {
                var correspondingOption = document.querySelector('#destination option[data-depart="' +
                    selectedDepart + '"]');
                if (correspondingOption) {
                    correspondingOption.disabled = true;
                }
            }
        });
    </script>

    <script>
        function resetForm() {
            window.location.reload(); // reload the page to reset all form fields
        }
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script>
        const textarea = document.querySelector('textarea');
        const charCount = document.querySelector('#char-count');

        textarea.addEventListener('input', function() {
            const remainingChars = 500 - textarea.value.length;
            charCount.innerText = remainingChars;

            if (remainingChars < 0) {
                charCount.classList.add('text-danger');
                textarea.classList.add('is-invalid');
                navigator.vibrate(100); // vibrate for 100ms
            } else {
                charCount.classList.remove('text-danger');
                textarea.classList.remove('is-invalid');
            }
        });
    </script>
    {{-- Ce que vous pris de la page offre --}}
    <script>
        document.getElementById("generate-select").addEventListener("click", function() {
            var selectContainer = document.getElementById("select-container");
            var selectForm = document.createElement("div");
            selectForm.className =
                "select-form @error('vehicules') is-invalid @enderror";

            var select = document.createElement("select");
            select.name = "vehicules[]";
            var option = document.createElement("option");
            option.value = "";
            option.text = "choisir autoCar";
            select.appendChild(option);

            @foreach ($vehicules as $vehicule)
                var option = document.createElement("option");
                option.value = "{{ $vehicule->id }}";
                option.text = "{{ $vehicule->marque }} " + "| " + "{{ $vehicule->capacite }} " + "| " +
                    "{{ $vehicule->dateMiseEnservice }}";
                option.name = "vehicules[]";

                // Vérifier si l'option est déjà sélectionnée dans une autre liste déroulante
                var selectedOptions = document.querySelectorAll('#select-container select');
                var isOptionSelected = Array.from(selectedOptions).some(function(selectElement) {
                    return selectElement.value === option.value;
                });

                if (isOptionSelected) {
                    option.disabled = true;
                }

                select.appendChild(option);
            @endforeach

            selectForm.appendChild(select);
            // ... Ajoutez le reste du code pour supprimer une liste déroulante et gérer les événements de changement de sélection
            var deleteButton = document.createElement("button");
            deleteButton.innerHTML = "Retirer";
            deleteButton.href = "";
            deleteButton.className = "delete-select";
            deleteButton.addEventListener("click", function() {
                // Remove the select form element when the delete button is clicked
                selectForm.remove();
                const cardDiv = document.querySelector('div.augmenterWidth');
                cardDiv.style.width = '700px';
            });
            selectForm.appendChild(deleteButton);

            // Disable selected options in other select elements
            select.addEventListener("change", function() {
                var selectedOption = select.options[select.selectedIndex];
                for (var i = 0; i < selectContainer.children.length; i++) {
                    var otherSelect = selectContainer.children[i].querySelector("select");
                    if (otherSelect != select) {
                        for (var j = 0; j < otherSelect.options.length; j++) {
                            if (otherSelect.options[j] != selectedOption) {
                                otherSelect.options[j].disabled = false;
                            } else {
                                otherSelect.options[j].disabled = true;
                            }
                        }
                    }
                }
            });
            selectContainer.appendChild(selectForm);
        });
    </script>
    <script>
        function updateImageSrc(selectElement) {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var imageSrc = selectedOption.value; // ou selectedOption.text si la valeur est l'URL de l'image
            var imgElement = document.getElementById("selectedImage");
            imgElement.src = imageSrc;
        }
    </script>

    <script>
        const textarea1 = document.querySelector('textarea');
        const charCount1 = document.querySelector('.char-count');

        textarea1.addEventListener('input', function() {
            const remainingChars = 250 - textarea1.value.length;
            charCount1.innerText = remainingChars;

            if (remainingChars < 0) {
                charCount1.classList.add('text-danger');
                textarea1.classList.add('is-invalid');
                navigator.vibrate(100); // vibrate for 100ms
            } else {
                charCount1.classList.remove('text-danger');
                textarea1.classList.remove('is-invalid');
            }
        });
    </script>


    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
