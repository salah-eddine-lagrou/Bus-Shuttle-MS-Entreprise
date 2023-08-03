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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="/css/myFont.css">

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
            background-color: #f5f5f5 !important;
            text-align: center;
            padding: 10px 0;
        }
    </style>

    <style>
        @media (min-width: 992px) {

            /* Styles for desktop views */
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
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">
    @include('partials._aside')
    @php
        $offre = DB::table('offres')
            ->where('id', $abonnement->id_offre)
            ->first();
        $created_at = \Carbon\Carbon::parse($offre->created_at);
        $typeAbonnement = DB::table('type_abonnements')
            ->where('id', $abonnement->id_type_abonnement)
            ->first();
        $entreprise = DB::table('entreprises')
            ->where('id', $abonnement->id_entreprise)
            ->first();
        $imageOffre = DB::table('image_offres')
            ->where('id', $offre->id_imageOffre)
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
        $image_offres = DB::table('image_offres')->get();
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
                id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                            <li class="breadcrumb-item text-sm">
                                <a class="text-white opacity-5 purple-text" href="{{ route('offres') }}">Offres</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"
                                style="color: black !important;">Plus</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">Plus d'information</h6>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
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
        <!-- End Navbar -->
        @php
            $imagePath1 = asset('/autocars/2326x800_Coach_innovation_Top_image.jpg');
        @endphp
        <div class="container-fluid">
            <div class="min-height-300 border-radius-xl mt-4"
                style="box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); background-image: url('{{ $imagePath1 }}'); background-position-y: 50%; background-size: cover; padding-top: 15px; padding-bottom: 15px;">
                <div class="w-100 text-end">
                    <a class="btn btn-outline-white btn-sm mb-0 me-3 " style="filter: none !important;"
                        href="{{ route('profile') }}">voire
                        entreprise</a>
                </div>
                <div class="container-fluid content-overlay" style="backdrop-filter: none !important;">

                    <div class="row">
                        <div class="col-md-6 my-auto text-center">
                            <div class="card card-body blur shadow-blur mx-4 overflow-hidden h-100">
                                @if ($imageOffre)
                                    <img src="{{ asset('/' . $imageOffre->image) }}" alt=""
                                        style="max-width: 100%; height: auto;">
                                @endif

                                <label for="" class="border-0 ps-0 pt-0 text-sm"> {{ $offre->titre }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 my-auto">
                            <div class="card card-body blur shadow-blur mx-4 overflow-hidden h-100">
                                <div class="row gx-4 text-center">
                                    <div class="col-auto">
                                        <div class="avatar avatar-xl position-relative">
                                            <img src="{{ asset('/images/' . $entreprise->image) }}"
                                                alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                        </div>
                                    </div>
                                    <div class="col-auto my-auto">
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
                </div>
            </div>



            <!-- Content goes here -->
            {{-- <span class="mask bg-gradient-primary opacity-6"></span> --}}


        </div>





        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 col-xl-4" style="width: 100%">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div>
                                    <h4 class="mb-0 border text-center"
                                        style="font-family: Georgia, 'Times New Roman', Times, serif">Informations
                                        d'offre
                                        d'abonnement</h4>
                                </div>
                                <div class="text-end">
                                    <a class="afficherAdd btn fixed-plugin-button-nav cursor-pointer" href="#">
                                        <i class="fas fa-pen-square fa-2x text-secondary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Informations"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="text-end">
                                    <form action="{{ route('destroyOffre', $abonnement->id) }}" method="GET"
                                        onsubmit="return confirm('Etes-vous sur de offre supprimer')">
                                        <button class="btn btn-link text-danger text-gradient px-3 mb-0 rounded shadow"
                                            type="submit"
                                            title="La suppression de l'abonnement entraîne la suppression de l'offre">
                                            <i class="far fa-trash-alt me-2"></i>Delete Offre
                                        </button>
                                    </form>


                                </div>
                                <div class="col-md-6">
                                    <div class="custom-div">
                                        <hr class="horizontal gray-light my-4">
                                        <div class="card-body px-4 py-2 mt-4">
                                            <div class="mb-4">
                                                <h5 class="text-gradient text-dark mb-3">{{ $offre->titre }}</h5>
                                                <hr class="horizontal gray-light my-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="text-sm">
                                                            <strong>Date de début de l'offre:</strong>
                                                        </p>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $offre->dateFinOffre }}
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-sm">
                                                            <strong>Date de fin de l'offre:</strong>
                                                        </p>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $created_at->format('Y-m-d') }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <p class="mt-4 text-sm">
                                                    <strong>Description de l'offre:</strong>
                                                </p>
                                                <p class="border rounded p-3 text-sm">
                                                    {{ $offre->description }}
                                                </p>
                                            </div>

                                            <div class="mt-4 py-2 text-center">
                                                <img src="{{ asset('/autocars/howitworks_compare.png') }}"
                                                    alt="" style="max-width: 100%; height: auto;">

                                            </div>

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
                                            <strong>Infos sur offre</strong>
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

                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <br>
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
                                    <div class="text-center" style="padding-top: 50px !important">
                                        <img src="{{ asset('/autocars/reservat-backoffice.png') }}" alt=""
                                            style="max-width: 80%; height: auto;">
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
                                                <div class="text-end">
                                                    <form action="{{ route('destroyAbn', $abonnement->id) }}"
                                                        method="GET"
                                                        onsubmit="return confirm('Etes-vous sur de abonnement et offre supprimer')">
                                                        <button
                                                            class="btn btn-link text-danger text-gradient px-3 mb-0 rounded shadow"
                                                            type="submit"
                                                            title="La suppression de l'abonnement entraîne la suppression de l'offre">
                                                            <i class="far fa-trash-alt me-2"></i>Delete Abonnement
                                                        </button>
                                                    </form>
                                                </div>
                                                <h5 class="text-gradient text-dark mb-3">Informations suplementaires
                                                </h5>
                                                <hr class="horizontal gray-light my-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="text-sm mb-2">Nom de l'abonnement:</p>
                                                        <h5>{{ $abonnement->nom }}</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="text-sm mb-2"><strong>Description
                                                                d'abonnement:</strong></p>
                                                        <p class="border-top border-bottom py-2 text-sm">
                                                            {{ $abonnement->description }}</p>
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
                                                            <div class="col-md-6">
                                                                <p class="text-sm mb-2"><strong>Description de
                                                                        type:</strong></p>
                                                                <p class="border-top border-bottom py-2 text-sm">
                                                                    {{ $typeAbonnement->description }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            {{-- <div class="col-md-6"> --}}
                                                            <p class="text-sm mb-2"><strong>Trajet:</strong></p>
                                                            <p class="border-top border-bottom py-2 text-sm">
                                                                {{ $abonnement->trajet }}</p>
                                                            {{-- </div> --}}
                                                            @php
                                                                $n = 0;
                                                            @endphp
                                                            {{-- <div class="col-md-6"> --}}
                                                            <p class="text-sm mb-2"><strong>Emploi du
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
                                                                <p class="text-sm mb-2 text-end"><strong>Horaire
                                                                        d'aller</strong></p>
                                                                <p
                                                                    class="border-top border-bottom py-2 text-sm text-end">
                                                                    {{ date('H:i', strtotime($abonnement->heur_debut_aller)) }}
                                                                    -
                                                                    {{ date('H:i', strtotime($abonnement->heur_fin_aller)) }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="text-sm mb-2"><strong>Horaire de
                                                                        retour</strong></p>
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
                                                                $dateFinOffre = \Carbon\Carbon::parse($offre->dateFinOffre);
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
                                                                if ($dateFinOffre < now()) {
                                                                    $message .= ' Terminer';
                                                                }
                                                                if ($estPlien == 0) {
                                                                    $message .= ' Plein';
                                                                }
                                                            @endphp
                                                            @if ($dateFinOffre < now() || $estPlien == 0)
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
                            de modification d'offre d'abonnement</h4>
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
                <form action="{{ route('abonnement.update', $abonnement->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body pt-4 p-3"
                        style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                        <div class="form-group">
                            <h5 class="mt-3 mb-0">Offre : </h5>
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
                            <input class="form-control @error('dateFinOffre') is-invalid @enderror" type="date"
                                name="dateFinOffre" id="example-text-input" value="{{ $offre->dateFinOffre }}">
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
                                    class="form-control @error('image_offre') is-invalid @enderror" name="image_offre"
                                    accept="image/*" aria-label="Image Upload" aria-describedby="image-addon"
                                    @error('image_offre')>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                @error('image_offres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="id_entreprise" value="{{ $id_entreprise }}">
                            {{-- une autre chose sur l'id de lentreprise ne pas l'oublie --}}
                        </div>
                    </div>
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
                            <label for="example-search-input @error('description_abonnement') is-invalid @enderror"
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
                                name="duree" id="example-datetime-local-input" value="{{ $abonnement->duree }}">
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
                                        <option value="{{ $location->city }}" data-depart="{{ $location->city }}">
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
                            <input class="form-control @error('heur_fin_aller') is-invalid @enderror" type="time"
                                name="heur_fin_aller" id="example-time-input"
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
                            <input class="form-control @error('heur_fin_retour') is-invalid @enderror" type="time"
                                name="heur_fin_retour" id="example-time-input"
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
                                name="prix" id="example-datetime-local-input" value="{{ $abonnement->prix }}">
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

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

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
        const afficherAddLink = document.querySelector('a.afficherAdd');
        const closeAddLink = document.querySelector('.closer');

        afficherAddLink.addEventListener('click', function(event) {
            event.preventDefault();

            const cardDiv = document.querySelector('div.augmenterWidth');
            cardDiv.style.width = '700px';
        });

        document.addEventListener('click', function(event) {
            if (event.target.tagName.toLowerCase() != 'a') {
                const cardDiv = document.querySelector('div.augmenterWidth');
                if (!event.target.closest('div.augmenterWidth')) {
                    cardDiv.style.width = '200px';
                }
            }
        });
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
        const textarea = document.querySelector('textarea');
        const charCount = document.querySelector('.char-count');

        textarea.addEventListener('input', function() {
            const remainingChars = 250 - textarea.value.length;
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

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
