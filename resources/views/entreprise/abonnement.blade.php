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
    <link href="//css/nucleo-icons.css" rel="stylesheet" />
    <link href="//css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/ffdf620d94.js" crossorigin="anonymous"></script>


    <style>
        .notification-count {
            position: absolute;
            top: -3px;
            right: -20%;
            background-color: red;
            color: white;
            padding: 3px 6px;
            border-radius: 50%;
            font-size: 10px;
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

        .divBtn {
            width: 180px;
        }

        .myP {
            font-size: 13px !important;
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('partials._aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <a href="{{ route('mesAbonnements') }}">
                        <h6 class="font-weight-bolder mb-0">Mes Abonnements</h6>
                    </a>
                </nav>
                @php
                    $type_abonnements = DB::table('type_abonnements')->get();
                @endphp
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            @if ($offres === null)
                                <form action="{{ route('SearchMesAbonnement') }}" method="GET">

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                            <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                        </button>

                                        <div class="input-group shadow">
                                            <div class="input-group-append">
                                                <input type="text" class="form-control" name="abonnement"
                                                    placeholder="Chercher .."
                                                    style="width: 300px; border-radius: 4px 0 0 4px !important; border: none !important;">
                                            </div>
                                            <select class="form-control ml-2 px-1" id="example-select-input"
                                                name="type_abonnement"
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
                            @else
                                <form action="{{ route('SearchMesOffresAbn') }}" method="GET">

                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                            <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                        </button>

                                        <div class="input-group shadow">
                                            <div class="input-group-append">
                                                <input type="text" class="form-control" name="offre"
                                                    placeholder="Chercher .."
                                                    style="width: 400px; border-radius: 4px 0 0 4px !important; border: none !important;">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif

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

                        <li class="nav-item dropdown pe-1 d-flex align-items-center">
                            @php
                                use Carbon\Carbon;
                                $currentDate = Carbon::today()->toDateString(); // Get the current date
                                $clientAbonnesToDays = DB::table('client_abonnes')
                                    ->whereIn('id_abonnement', $abns->pluck('id'))
                                    ->whereDate('created_at', $currentDate)
                                    ->get();

                                $nbrClients = $clientAbonnesToDays->count();
                            @endphp
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer" style="font-size: 18px"></i>
                                <span class="notification-count">{{ $nbrClients }}</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton"
                                style="max-height: 400px; width: 400px; overflow-y: auto;">

                                <strong style="font-family: Georgia, 'Times New Roman', Times, serif">Les clients
                                    abonnées aujourd'huis</strong>
                                @foreach ($clientAbonnesToDays as $clientAbonnesToDay)
                                    @php

                                        $client = DB::table('clients')
                                            ->where('id', $clientAbonnesToDay->id_client)
                                            ->first();
                                        $abonnement = DB::table('abonnements')
                                            ->where('id', $clientAbonnesToDay->id_abonnement)
                                            ->first();

                                    @endphp
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <i class="fa-solid fa-user me-3" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">
                                                            {{ $client->nom }} a {{ $abonnement->nom }}
                                                        </span>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0 ">
                                                        <i class="fa fa-clock me-1"></i>
                                                        {{ $currentDate }}
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
        <!-- End Navbar -->
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
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="row py-3">
                            <div class="col-md-6" style="padding-left: 160px;">
                                <a href="{{ route('mesAbonnements') }}" class="w-100 divBtn btn btnAct"
                                    onclick="toggleButton(this)"
                                    style="{{ $offres === null ? 'background-color: rgb(145, 21, 145); color: #FFFFFF;' : '' }}">Abonnements</a>
                            </div>
                            <div class="col-md-6" style="padding-right: 160px">
                                <a href="{{ route('mesOffresAbn') }}" class="w-100 divBtn btn btnAct"
                                    onclick="toggleButton(this)"
                                    style="{{ $abonnements === null ? 'background-color: rgb(145, 21, 145); color: #FFFFFF;' : '' }}">Offres</a>
                            </div>
                        </div>
                        <hr class="horizontal dark my-1"
                            style="background-color: white;
                            height: 2px;">
                        <div class="card-body px-0 pt-0 pb-2 py-2">
                            <div class="table-responsive py-3">
                                @if ($offres === null)
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nom / date depart</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Type</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Durée</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    nbrs abonnés</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Etat</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    offre</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display the search results here -->
                                            @if ($abonnements->isEmpty())
                                                <div class="text-center">
                                                    <h2 style="color: #999; font-style: italic;">abonnements non
                                                        trouvés
                                                    </h2>
                                                </div>
                                            @else
                                                @php
                                                    $n = 0;
                                                @endphp
                                                @foreach ($abonnements as $abonnement)
                                                    <tr>
                                                        <td>
                                                            <p class="text-xs text-secondary mb-0">
                                                                #{{ ++$n }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $abonnement->nom }}</h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $abonnement->created_at }}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        @php
                                                            $type_abonnement = DB::table('type_abonnements')
                                                                ->where('id', $abonnement->id_type_abonnement)
                                                                ->first();
                                                        @endphp
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="myP text-xs font-weight-bold mb-0">
                                                                {{ $type_abonnement->nom }}
                                                            </p>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            @if ($abonnement->duree >= 12)
                                                                <?php
                                                                $annees = floor($abonnement->duree / 12);
                                                                $moisRestants = $abonnement->duree % 12;
                                                                ?>
                                                                <p class="myP text-xs font-weight-bold mb-0">
                                                                    {{ $annees }} @if ($annees === 1)
                                                                        an
                                                                    @else
                                                                        ans
                                                                    @endif
                                                                    @if ($moisRestants > 0)
                                                                        {{ $moisRestants }} @if ($moisRestants === 1)
                                                                            mois
                                                                        @else
                                                                            mois
                                                                        @endif
                                                                    @endif
                                                                </p>
                                                            @else
                                                                <p class="myP text-xs font-weight-bold mb-0">
                                                                    {{ $abonnement->duree }} mois
                                                                </p>
                                                            @endif
                                                        </td>


                                                        @php
                                                            $nbrAbnm = DB::table('client_abonnes')
                                                                ->where('id_abonnement', $abonnement->id)
                                                                ->count();
                                                        @endphp

                                                        <td class="align-middle text-center text-sm">
                                                            <p class="myP text-xs font-weight-bold mb-0">
                                                                {{ $nbrAbnm }}
                                                            </p>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            @php
                                                                $expirationDate = date('Y-m-d', strtotime($abonnement->created_at . ' + ' . $abonnement->duree . ' months'));
                                                                $aujourdhui = date('Y-m-d');
                                                                $estExpiré = $aujourdhui > $expirationDate;
                                                            @endphp

                                                            @if ($estExpiré)
                                                                <p class="myP text-xs font-weight-bold mb-0 text-red-500"
                                                                    style="color: red">
                                                                    Abonnement expiré
                                                                </p>
                                                            @else
                                                                <p class=" myP text-xs font-weight-bold mb-0 text-green-500"
                                                                    style="color: green">
                                                                    En service
                                                                </p>
                                                            @endif
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            @php
                                                                $offre = $abonnement->id_offre;
                                                            @endphp
                                                            @if ($offre)
                                                                <p class="myP text-xs font-weight-bold mb-0"
                                                                    style="color: blue">
                                                                    avec offre
                                                                </p>
                                                            @else
                                                                <p class="myP text-xs font-weight-bold mb-0"
                                                                    style="color: orange">
                                                                    sans offre
                                                                </p>
                                                            @endif

                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <form
                                                                action="{{ route('monVoirePlus', ['id' => $abonnement->id]) }}"
                                                                method="GET">
                                                                @csrf

                                                                <button class="btn btnAct"
                                                                    style="background-color:  #87CEFA; color: white;"
                                                                    type="submit">Voir PLus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                @else
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Titre / date depart</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date fin offre </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Etat </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Abonnement</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    nbrs abonnés par offre</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display the search results here -->
                                            @if ($offres->isEmpty())
                                                <div class="text-center">
                                                    <h2 style="color: #999; font-style: italic;">Offres non
                                                        trouvés
                                                    </h2>
                                                </div>
                                            @else
                                                @php
                                                    $n = 0;
                                                @endphp
                                                @foreach ($offres as $offre)
                                                    @php
                                                        $abnOffre = DB::table('abonnements')
                                                            ->where('id_offre', $offre->id)
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <p class="text-xs text-secondary mb-0">
                                                                #{{ ++$n }}
                                                            </p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{ $offre->titre }}</h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $offre->created_at }}
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="myP text-xs font-weight-bold mb-0">
                                                                {{ $offre->dateFinOffre }}
                                                            </p>
                                                        </td>
                                                        @php
                                                            $vehiculesAbonnement = DB::table('vehicules')
                                                                ->where('id_abonnement', $abnOffre->id)
                                                                ->get();
                                                            $nbrClients = DB::table('paiements')
                                                                ->join('clients', 'clients.id', '=', 'paiements.id_client')
                                                                ->where('id_abonnement', $abnOffre->id)
                                                                ->count();

                                                            $capacite = 0;
                                                            foreach ($vehiculesAbonnement as $vehicule) {
                                                                $capacite = $capacite + $vehicule->capacite;
                                                            }

                                                            $estPlien = $capacite - $nbrClients;
                                                            $dateFinOffre = \Carbon\Carbon::parse($offre->dateFinOffre);
                                                        @endphp
                                                        <td class="align-middle text-center text-sm">
                                                            @if ($dateFinOffre < now())
                                                                <p class="myP text-xs font-weight-bold mb-0"
                                                                    style="color: red">
                                                                    Offre est terminer
                                                                </p>
                                                            @elseif ($estPlien == 0)
                                                                <p class="myP text-xs font-weight-bold mb-0"
                                                                    style="color: blue">
                                                                    Offre est plien
                                                                </p>
                                                            @else
                                                                <p class="myP text-xs font-weight-bold mb-0"
                                                                    style="color: green">
                                                                    Offre en service
                                                                </p>
                                                            @endif
                                                            </p>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <p class="myP text-xs font-weight-bold mb-0">
                                                                {{ $abnOffre->nom }}
                                                            </p>
                                                        </td>

                                                        @php
                                                            $nbrAbnm = DB::table('client_abonnes')
                                                                ->where('id_abonnement', $abnOffre->id)
                                                                ->count();
                                                        @endphp

                                                        <td class="align-middle text-center text-sm">
                                                            <p class="myP text-xs font-weight-bold mb-0">
                                                                {{ $nbrAbnm }}
                                                            </p>
                                                        </td>

                                                        <td class="align-middle text-center text-sm">
                                                            <form
                                                                action="{{ route('infosAbonnement', ['id' => $abnOffre->id]) }}"
                                                                method="GET">
                                                                @csrf

                                                                <button class="btn btnAct"
                                                                    style="background-color:  #87CEFA; color: white;"
                                                                    type="submit">Voir PLus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                @endif

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
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->

                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>

            </div>
        </div>
    </div>
    <script>
        function toggleButton(button) {
            button.classList.toggle('btnAct');
            button.classList.toggle('text-strat');
            button.style.backgroundColor = 'rgb(145, 21, 145)'; // Light blue color
            button.style.color = '#FFFFFF'; // White color
            button.type = 'submit';
        }
    </script>
    <!--   Core JS Files   -->
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <script src="/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
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
    <script src="/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
