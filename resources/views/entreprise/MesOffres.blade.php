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
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="/images/myLogo.png">
    <title>
        NavManage
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="css/nucleo-icons.css" rel="stylesheet" />
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffdf620d94.js" crossorigin="anonymous"></script>
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Iconscout Link For Icons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/myFont.css">

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

        .my-heading {
            margin: 10px;
            padding: 10px;
            padding-inline: 90px;
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
        .wrapper {
            position: relative;
        }

        .content {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 8px;
        }

        .options {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .options li {
            padding: 8px;
            cursor: pointer;
        }

        .options li:hover {
            background-color: #f5f5f5;
        }

        .select-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
        }

        .select-btn label {
            margin-right: 8px;
        }

        .select-btn i {
            transition: transform 0.2s ease-in-out;
        }

        .select-btn:hover i {
            transform: rotate(180deg);
        }


        .form-control {
            display: flex;
            flex-direction: column;
        }

        .select-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .select-btn label {
            margin: 0;
        }






        /*input date flexdirection*/
        .reglerInputDate {
            flex-direction: row;
        }

        /* submit button */



        .centered-options {
            text-align: center;
        }


        .notification-count {
            position: absolute;
            top: -3px;
            right: -6%;
            background-color: red;
            color: white;
            padding: 3px 6px;
            border-radius: 50%;
            font-size: 10px;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('partials._aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="container-fluid w-100">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
                id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <a href="{{ route('MesOffres') }}">
                            <h6 class="font-weight-bolder mb-0 pe-5">Mes Offres</h6>
                        </a>
                    </nav>
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group">
                                <form action="{{ route('SearchMesOffres') }}" method="GET">

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                            <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                        </button>

                                        <div class="input-group shadow">
                                            <div class="input-group-append">
                                                <input type="text" class="form-control" name="offreAbonnement"
                                                    placeholder="Chercher .."
                                                    style="width: 300px; border-radius: 4px 0 0 4px !important; border: none !important;">
                                            </div>
                                            <select class="form-control ml-2 px-1" id="example-select-input"
                                                name="type"
                                                style="width: 100px; padding-right: 4px; border: none !important; border-left: 1px solid rgb(149, 144, 144) !important;">
                                                <option value="">par type</option>
                                                @foreach ($type_abonnements as $type_abonnement)
                                                    <option value="{{ $type_abonnement->id }}">
                                                        {{ $type_abonnement->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                    </div>
                                </form>
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

                            <li class="nav-item dropdown d-flex align-items-center">
                                @php
                                    $offres = DB::table('offres')
                                        ->where('id_entreprise', $id_entreprise)
                                        ->get();
                                    $nbrOffres = DB::table('offres')
                                        ->where('id_entreprise', $id_entreprise)
                                        ->count();
                                @endphp
                                <a href="javascript:;" class="nav-link text-body" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer" style="font-size: 18px !important"></i>
                                    <span class="notification-count">{{ $nbrOffres }}</span>
                                </a>

                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton"
                                    style="max-height: 400px;width: 400px; overflow-y: auto;">
                                    <div class="d-flex text-center">Date fin des offres</div>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($offres as $offre)
                                        @php
                                            $abnm = DB::table('abonnements')
                                                ->where('id_offre', $offres[$i++]->id)
                                                ->first();
                                            $vehiculesAbonnement = DB::table('vehicules')
                                                ->where('id_abonnement', $abnm->id)
                                                ->get();
                                        @endphp
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md"
                                                href="{{ route('infosAbonnement', $abnm->id) }}">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <i class="fa-solid fa-bus me-3" style="font-size: 24px;"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">Offres
                                                                {{ $offre->titre }}</span>
                                                            @php
                                                                $abn = DB::table('abonnements')
                                                                    ->where('id_offre', $offre->id)
                                                                    ->first();
                                                                $nbrClients = DB::table('paiements')
                                                                    ->join('clients', 'clients.id', '=', 'paiements.id_client')
                                                                    ->where('id_abonnement', $abn->id)
                                                                    ->count();

                                                                $capacite = 0;
                                                                foreach ($vehiculesAbonnement as $vehicule) {
                                                                    $capacite = $capacite + $vehicule->capacite;
                                                                }

                                                                $estPlien = $capacite - $nbrClients;
                                                                $dateFinOffre = \Carbon\Carbon::parse($offre->dateFinOffre);
                                                            @endphp
                                                            @php
                                                                $backgroundColor = $dateFinOffre > now() ? 'green' : 'red';
                                                            @endphp
                                                            <div class="offre-container"
                                                                style="background-color: {{ $backgroundColor }}">
                                                                <p style="color: #ffffff">

                                                                    @if ($dateFinOffre > now())
                                                                        Il reste {{ $dateFinOffre->diffInDays(now()) }}
                                                                        jours
                                                                    @elseif ($estPlien == 0)
                                                                        offre est pleine
                                                                    @else
                                                                        L'offre est expirée
                                                                    @endif
                                                                </p>
                                                                <!-- Display other details of the offer -->
                                                            </div>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            creer a {{ $offre->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <!-- End Navbar -->
        <div class="container-fluid py-4 w-100">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Offres des Abonnements [{{ $nbrAbonnements }}]</h5>
                            <a class="afficherAdd btn bg-gradient-primary mt-3 fixed-plugin-button-nav cursor-pointer">Ajouter
                                une offre d'abonnement</a>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                @if (!$abonnements || $abonnements->isEmpty())
                                    <div class="text-center">
                                        <h2 style="color: #999; font-style: italic;">Aucune résultat pour le moment</h2>
                                    </div>
                                    <p>{{ $nbrAbonnements }} abonnements touvés</p>
                                @else
                                    @foreach ($abonnements as $abonnement)
                                        @php
                                            $offre = DB::table('offres')
                                                ->where('id', $abonnement->id_offre)
                                                ->first();
                                            $mesJours = DB::table('jours')
                                                ->join('date_abonnements', 'jours.id', '=', 'date_abonnements.id_jour')
                                                ->join('abonnements', 'date_abonnements.id_abonnement', '=', 'abonnements.id')
                                                ->where('abonnements.id', $abonnement->id) // Remplacez $abonnementId par l'ID de l'abonnement souhaité
                                                ->select('jours.*')
                                                ->get();
                                            $typeAbonnement = DB::table('type_abonnements')
                                                ->where('id', $abonnement->id_type_abonnement)
                                                ->first();
                                            $entreprise = DB::table('entreprises')
                                                ->where('id', $abonnement->id_entreprise)
                                                ->first();
                                            $imageOffre = DB::table('image_offres')
                                                ->where('id', $offre->id_imageOffre)
                                                ->first();

                                            $nbrClients = DB::table('paiements')
                                                ->join('clients', 'clients.id', '=', 'paiements.id_client')
                                                ->where('id_abonnement', $abonnement->id)
                                                ->count();

                                            $capacite = 0;
                                            foreach ($vehiculesAbonnement as $vehicule) {
                                                $capacite = $capacite + $vehicule->capacite;
                                            }

                                            $estPlien = $capacite - $nbrClients;
                                        @endphp
                                        @php
                                            $dateFinOffre = \Carbon\Carbon::parse($offre->dateFinOffre);
                                        @endphp
                                        <div class="col-md-6 py-3">
                                            <div class="rounded shadow p-4 h-100">
                                                <div class="ms-auto text-end">
                                                    @if ($dateFinOffre < now())
                                                        <h6 style="color: red; font-weight: bold">
                                                            [ Offre est terminer]
                                                        </h6>
                                                    @elseif ($estPlien == 0)
                                                        <h6 style="color: rgb(173, 46, 46); font-weight: bold">
                                                            [ Offre est plien]
                                                        </h6>
                                                    @endif
                                                </div>
                                                <hr class="horizontal dark my-sm-3">
                                                <div class="">
                                                    <span class="d-sm-inline d-none pe-3">Entreprise : </span>
                                                    <div class="ms-auto text-start">
                                                        <h5>
                                                            {{ $entreprise->nom }}
                                                        </h5>
                                                    </div>
                                                    @php
                                                        $image_offres = DB::table('image_offres')->get();
                                                    @endphp
                                                    <div class="card card-blog card-plain">
                                                        <div class="position-relative">
                                                            @if ($imageOffre)
                                                                <img src="{{ $imageOffre->image }}"
                                                                    alt="img-blur-shadow"
                                                                    class="img-fluid shadow border-radius-xl">
                                                            @endif
                                                            <div class="overlay-content">
                                                                <!-- Your HTML content here -->
                                                                <h3>{{ $offre->titre }}</h3>
                                                                disponible jusqu'à : <p>{{ $offre->dateFinOffre }}</p>
                                                                <!-- Add more elements as needed -->
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="myCard card-body px-3 py-2 mt-4 rounded-3 shadow-lg border border-gray-300">
                                                            <span class="text-sm text-lg font-italic mb-2"
                                                                style="margin-bottom: 10px">Abonnement
                                                                #{{ $loop->iteration }}</span>
                                                                <p class="text-primary" style="">
                                                                    <h5 class="text-xl text-center font-bold  " style="text-shadow: 2px 2px 2px rgb(147, 146, 146); font-size: 25px;">{{ $abonnement->nom }}</h5>
                                                                </p>
                                                            <div class="text-center border-bottom border-top">
                                                                <strong class="text-md ">Type d'abonnement</strong>
                                                                <p class="text-center text-sm"
                                                                    style="margin-bottom: 0px">
                                                                    {{ $typeAbonnement->nom }}</p>
                                                            </div>
                                                            <div class="text-center border-1" style="margin-top: 5px">
                                                                <strong class="text-md ">Itinéraire</strong>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p
                                                                            class=" border-bottom border-top text-sm text-center">
                                                                            {{ $abonnement->depart }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p
                                                                            class=" border-bottom border-top text-sm text-center">
                                                                            {{ $abonnement->destination }}
                                                                        </p>
                                                                    </div>
                                                                </div>
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

                                                            <div class="row">
                                                                @php
                                                                    $n = 0;
                                                                @endphp
                                                                {{-- <div class="col-md-6"> --}}
                                                                <p class="text-sm mb-2"><strong>Planning:</strong></p>
                                                                <p class="border-top border-bottom py-2 text-sm">
                                                                    @foreach ($mesJours as $mesJour)
                                                                        {{ $mesJour->jour }} - @php $n++; @endphp
                                                                    @endforeach
                                                                    {{ $n }}/7
                                                                </p>
                                                                {{-- </div> --}}
                                                            </div>

                                                            <div class="text-center">
                                                                <div class="flex items-center justify-center border border-gray-300 rounded-2 px-2 py-3"
                                                                    style="box-shadow: 0px 2px 4px black; border: none; border-radius: 30px; background-image: linear-gradient(to right, #9fd3c7, #40699c);">
                                                                    <span class="text-lg font-semibold"
                                                                        style="color: white">Prix:</span>
                                                                    <span class="text-4xl font-bold text-red-600 mx-2"
                                                                        style="color: black">{{ $abonnement->prix }}</span>
                                                                    <span class="text-lg font-semibold"
                                                                        style="color: white">DHS</span>

                                                                    <div
                                                                        class=" justify-content-between py-1 text-center ">
                                                                        <form
                                                                            action="{{ route('infosAbonnement', ['id' => $abonnement->id]) }}"
                                                                            method="GET">
                                                                            @csrf
                                                                            <div class="myContainer mb-0 container-fluid d-flex flex-column align-items-center justify-content-center"
                                                                                style="width: 240px; box-shadow: 0px 2px 4px black; border: none; border-radius: 30px">
                                                                                @if ($dateFinOffre > now())
                                                                                    <a class="font-weight-bolder ms-lg-0 ms-3"
                                                                                        style="color: rgb(0, 0, 0)">Offre
                                                                                        limité</a>
                                                                                @elseif($capacite == 0)
                                                                                    <a class="font-weight-bolder ms-lg-0 ms-3"
                                                                                        style="color: red">Offre
                                                                                        Plein</a>
                                                                                @else
                                                                                    <a class="font-weight-bolder ms-lg-0 ms-3"
                                                                                        style="color: red">Offre
                                                                                        expiré</a>
                                                                                @endif

                                                                                <button
                                                                                    class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark"
                                                                                    type="submit">EXPLORER</button>
                                                                            </div>
                                                                        </form>

                                                                        {{-- <hr class="horizontal dark my-sm-2"> --}}
                                                                    </div>
                                                                </div>

                                                            </div>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
                            d'ajoute des offres</h4>
                        <hr class="horizontal dark my-sm-4">
                    </div>
                </div>

                <script>
                    @if (session('success'))
                        alert("{{ session('success') }}");
                        // ici
                    @endif

                    @if ($errors->any())
                        var errorMessage = "Errors:\n";
                        @foreach ($errors->all() as $error)
                            errorMessage += "{{ $error }}\n";
                        @endforeach
                        alert(errorMessage);
                    @endif
                </script>
                <form action="{{ route('abonnement.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card-body pt-4 p-3"
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
                            <input class="reglerInputDate form-control @error('dateFinOffre') is-invalid @enderror"
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
                                    class="form-control @error('image_offre') is-invalid @enderror" name="image_offre"
                                    accept="image/*" aria-label="Image Upload" aria-describedby="image-addon">
                                @error('image_offre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                        </div>

                        <input type="hidden" name="id_entreprise" value="{{ $id_entreprise }}">
                        {{-- une autre chose sur l'id de lentreprise ne pas l'oublie --}}
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
                                name="nom" id="example-text-input" value="{{ old('nom') }}">
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
                                <option value="{{ old('type_abonnement') }}">..</option>
                                @foreach ($type_abonnements as $type_abonnement)
                                    <option value="{{ $type_abonnement->id }}">{{ $type_abonnement->nom }}</option>
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
                                placeholder="decrire les politiques et les règles de l'abonnement" maxlength="250">{{ old('description_abonnement') }}</textarea>
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
                                name="duree" id="example-datetime-local-input">
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
                                    <option value="">Select depart</option>
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
                                    <option value="">Select destination</option>
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
                            <label for="example-checkbox-group" class="form-control-label">Selectionner les
                                joures</label>
                            <div class="checkbox-group @error('jours') is-invalid @enderror"
                                style="border: 1px solid #ccc; border-radius: 10px; padding-inline: 10px; padding-top: 5px; padding-bottom: 5px;">
                                @foreach ($jours as $jour)
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="jours[]" value="{{ $jour->id }}">
                                        {{ $jour->jour }}
                                    </label>
                                @endforeach
                            </div>
                            @error('jours')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="example-week-input" class="form-control-label">Heur départ d'aller</label>
                                <input
                                    class="reglerInputDate form-control @error('heur_debut_aller') is-invalid @enderror"
                                    type="time" name="heur_debut_aller" id="example-time-input"
                                    value="{{ old('heur_debut_aller') }}">
                                @error('heur_debut_aller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="example-week-input" class="form-control-label">Heur fin d'aller</label>
                                <input
                                    class="reglerInputDate form-control @error('heur_fin_aller') is-invalid @enderror"
                                    type="time" name="heur_fin_aller" id="example-time-input">
                                @error('heur_fin_aller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="example-week-input" class="form-control-label">Heur départ de
                                    retour</label>
                                <input
                                    class="reglerInputDate form-control @error('heur_debut_retour') is-invalid @enderror"
                                    type="time" name="heur_debut_retour" id="example-time-input">
                                @error('heur_debut_retour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="example-week-input" class="form-control-label">Heur fin de retour</label>
                                <input
                                    class="reglerInputDate form-control @error('heur_fin_retour') is-invalid @enderror"
                                    type="time" name="heur_fin_retour" id="example-time-input">
                                @error('heur_fin_retour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="example-datetime-local-input" class="form-control-label">Prix</label>
                            <small class="form-text text-muted">(par periode)</small>
                            <input class="form-control @error('prix') is-invalid @enderror" type="text"
                                name="prix" id="example-datetime-local-input" value="{{ old('prix') }}">
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
                            <h5 class="mt-3 mb-0">Autocar : </h5>
                            <hr class="horizontal dark my-sm-4">
                        </div>
                        @php
                            $vehicules = DB::table('vehicules')
                                ->where('id_entreprise', $id_entreprise)
                                ->whereNull('id_abonnement')
                                ->get();
                        @endphp
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">autoCar pour un
                                abonnement</label><br>
                            {{-- <button type="button" id="generate-select">Generate Select Form</button> --}}
                            <a id="generate-select" class="btn btn-round btn-sm mb-0 btn-outline-primary me-2"
                                target="_blank">Reserver un autoCar</a>
                            <div id="select-container" class="select-form">
                                <select name="vehicules"
                                    class="select-form @error('vehicules') is-invalid @enderror">
                                    <option value="">choisir autoCar</option>
                                    @foreach ($vehicules as $vehicule)
                                        <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} |
                                            {{ $vehicule->capacite }} | {{ $vehicule->dateMiseEnservice }}</option>
                                    @endforeach
                                </select>
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
                    <button class="btn bg-gradient-dark w-100" type="submit">Generer l'offre d'abonnement</button>
                    <button class="btn btn-outline-dark w-100" type="button">Annuler l'opération</button>
                </form>
            </div>


        </div>
    </div>
    <style>
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
    </style>
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
            // Add a delete button to the select form element
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
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
    <script src="js/plugins/chartjs.min.js"></script>
    {{-- We will use this script in the bar search --}}
    @php
        $type_abonnements_nom = $type_abonnements->pluck('nom')->toJson();
    @endphp

    <script>
        const typeAbonnementsNom = JSON.parse('{!! $type_abonnements_nom !!}');
    </script>


    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                $('.notification-count').hide();
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
