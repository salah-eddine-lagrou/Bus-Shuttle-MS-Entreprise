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
    <link href="css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <link rel="stylesheet" href="css/alertStyle">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/ffdf620d94.js" crossorigin="anonymous"></script>
    <script src="js/alertCustomized.js"></script>
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
                    <a href="{{ route('vehicule') }}">
                        <h6 class="font-weight-bolder mb-0">Vehicules</h6>
                    </a>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <form action="{{ route('SearchVehicule') }}" method="GET">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                        <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                    </button>

                                    <div class="input-group shadow">
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="vehicule"
                                                placeholder="Chercher .."
                                                style="width: 400px; border-radius: 4px 4px 4px 4px !important; border: none !important;">
                                        </div>
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

                        <li class="nav-item dropdown pe-1 d-flex align-items-center">
                            @php
                                $vehcles = DB::table('vehicules')
                                    ->where('id_entreprise', $id_entreprise)
                                    ->whereNotNull('id_abonnement')
                                    ->get();
                                $n = DB::table('vehicules')
                                    ->where('dateMiseEnservice', '>', date('Y-m-d')) // Comparaison avec la date actuelle
                                    ->where('id_entreprise', $id_entreprise)
                                    ->whereNotNull('id_abonnement')
                                    ->count();
                            @endphp
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer" style="font-size: 18px !important"></i>
                                <span class="notification-count">{{ $n }}</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton" style="max-height: 400px; overflow-y: auto;">
                                <div class="d-flex text-center">Date fin des offres</div>
                                @foreach ($vehcles as $vehArr)
                                    @if ($vehArr->id_abonnement !== null && strtotime($vehArr->dateMiseEnservice) > strtotime('now'))
                                        @php
                                            $abnm = DB::table('abonnements')
                                                ->where('id', $vehArr->id_abonnement)
                                                ->first();
                                        @endphp
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <i class="fa-solid fa-bus me-3" style="font-size: 24px;"></i>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">AutoCar
                                                                {{ $vehArr->marque }} - {{ $vehArr->immatriculation }}
                                                                de
                                                                {{ $abnm->nom }}</span>
                                                            <h6 style="color: red;">Hors service</h6>
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0 ">
                                                            <i class="fa fa-clock me-1"></i>
                                                            {{ $abnm->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        @php
                            $countCars = $vehicules->count();
                        @endphp
                        <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Les autocars [ {{ $countCars }} ]</h5>
                            <a class="afficherAdd btn bg-gradient-primary mt-3 fixed-plugin-button-nav cursor-pointer"
                                href="#">Ajouter un autocar</a>
                        </div>
                        <br>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Marque</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Capacite</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Immatricule</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Date mis en service</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Etat de vehicule</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                colspan="3">
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
                                        @if (isset($vehiculesSearched))
                                            <!-- Display the search results here -->
                                            @foreach ($vehiculesSearched as $vehicule)
                                                <tr>
                                                    <form action="{{ route('vehicule.update', $vehicule->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <td class="align-middle text-center text-sm">
                                                            <i class="fa-solid fa-bus me-3"
                                                                style="font-size: 24px;"></i>
                                                        </td>
                                                        <td
                                                            class="editableTextMarque align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $vehicule->marque }}
                                                            </p>
                                                        </td>
                                                        <input type="hidden" name="marque"
                                                            value="{{ $vehicule->marque }}">

                                                        <td
                                                            class="editableTextCapacite align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $vehicule->capacite }}
                                                            </p>
                                                        </td>
                                                        <input type="hidden" name="capacite"
                                                            value="{{ $vehicule->capacite }}">

                                                        <td
                                                            class="editableTextImmatriculation align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $vehicule->immatriculation }}</p>
                                                        </td>
                                                        <input type="hidden" name="immatriculation"
                                                            value="{{ $vehicule->immatriculation }}">

                                                        <td class="editableDate align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0"
                                                                style="@if ($vehicule->dateMiseEnservice <= date('Y-m-d')) color: green @else color: red @endif">
                                                                {{ $vehicule->dateMiseEnservice }}
                                                            </p>

                                                            <!-- date toujours c'est la date actuel -->
                                                        </td>
                                                        <input type="hidden" name="dateMiseEnservice"
                                                            value="{{ $vehicule->dateMiseEnservice }}">

                                                        @php
                                                            $abonnem = DB::table('abonnements')
                                                                ->where('id', $vehicule->id_abonnement)
                                                                ->first();
                                                        @endphp
                                                        <td class="align-middle text-center text-sm">
                                                            <p class="text-xs font-weight-bold mb-0" style="">
                                                                <?php
                                                                if ($vehicule->id_abonnement === null) {
                                                                    echo '<span style="color: rgb(30, 127, 197);">Non réservé</span>';
                                                                } else {
                                                                    echo '<span style="color: rgb(201, 215, 7);">Réservé</span><br>';
                                                                    echo $abonnem->nom;
                                                                }
                                                                ?>
                                                            </p>
                                                        </td>

                                                        <td class="text-end text-sm">
                                                            <button
                                                                class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1"
                                                                style="padding-right: 5px; background-color: green !important; color: white !important;"
                                                                type="submit">
                                                                <i class="fa-solid fa-bus pe-2"></i>Editer
                                                            </button>
                                                        </td>
                                                    </form>
                                                    <td class="text-left text-sm">
                                                        <form action="{{ route('vehicule.destroy', $vehicule->id) }}"
                                                            method="POST" class="delete-vehicule-form"
                                                            onsubmit="return confirm('Etes-vous sûr de vouloir supprimer le véhicule {{ $vehicule->marque }} ?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="vehicule_id"
                                                                value="{{ $vehicule->id }}">

                                                            <button
                                                                class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                type="submit" style="background-color: red !important; color: white !important">
                                                                <i class="fa-solid fa-bus pe-2"></i>Supprimer
                                                            </button>
                                                        </form>
                                                    </td>

                                                    <td class="text-left text-sm">
                                                        {{-- dans le show on engage --}}
                                                        <form action="{{ route('vehicule.show', $vehicule->id) }}"
                                                            method="GET" class="delete-vehicule-form"
                                                            onsubmit="return confirm('Etes-vous sûr de vouloir Abolir la véhicule {{ $vehicule->marque }} du abonnement {{ isset($abonnem->nom) ? $abonnem->nom : '' }} ?')">
                                                            @csrf
                                                            @method('GET')
                                                            <input type="hidden" name="vehicule_id"
                                                                value="{{ $vehicule->id }}">
                                                            @if ($vehicule->id_abonnement !== null)
                                                                <button
                                                                    class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                    type="submit" style="background-color: rgb(13, 99, 246) !important; color: white !important;">
                                                                    <i class="fa-solid fa-bus pe-2"></i>Abolir
                                                                </button>
                                                            @else
                                                                <button
                                                                    class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                    type="button" style="background-color: rgb(13, 99, 246) !important; color: white !important;" disabled>
                                                                    <i class="fa-solid fa-bus pe-2"></i>Abolir
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        @else
                                            <!-- Display the regular data -->
                                            @if (!$vehicules || $vehicules->isEmpty())
                                                <div class="text-center">
                                                    <h2 style="color: #999; font-style: italic;">Aucune résultat pour le moment</h2>
                                                </div>
                                            @else
                                                @foreach ($vehicules as $vehicule)
                                                    <tr>
                                                        <form action="{{ route('vehicule.update', $vehicule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <td class="align-middle text-center text-sm">
                                                                <i class="fa-solid fa-bus me-3"
                                                                    style="font-size: 24px;"></i>
                                                            </td>
                                                            <td
                                                                class="editableTextMarque align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $vehicule->marque }}
                                                                </p>
                                                            </td>
                                                            <input type="hidden" name="marque"
                                                                value="{{ $vehicule->marque }}">

                                                            <td
                                                                class="editableTextCapacite align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $vehicule->capacite }}
                                                                </p>
                                                            </td>
                                                            <input type="hidden" name="capacite"
                                                                value="{{ $vehicule->capacite }}">

                                                            <td
                                                                class="editableTextImmatriculation align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $vehicule->immatriculation }}</p>
                                                            </td>
                                                            <input type="hidden" name="immatriculation"
                                                                value="{{ $vehicule->immatriculation }}">

                                                            <td class="editableDate align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"
                                                                    style="@if ($vehicule->dateMiseEnservice <= date('Y-m-d')) color: green @else color: red @endif">
                                                                    {{ $vehicule->dateMiseEnservice }}
                                                                </p>

                                                                <!-- date toujours c'est la date actuel -->
                                                            </td>
                                                            <input type="hidden" name="dateMiseEnservice"
                                                                value="{{ $vehicule->dateMiseEnservice }}">

                                                            @php
                                                                $abonnem = DB::table('abonnements')
                                                                    ->where('id', $vehicule->id_abonnement)
                                                                    ->first();
                                                            @endphp
                                                            <td class="align-middle text-center text-sm">
                                                                <p class="text-xs font-weight-bold mb-0" style="">
                                                                    <?php
                                                                    if ($vehicule->id_abonnement === null) {
                                                                        echo '<span style="color: rgb(30, 127, 197);">Non réservé</span>';
                                                                    } else {
                                                                        echo '<span style="color: rgb(201, 215, 7);">Réservé</span><br>';
                                                                        echo $abonnem->nom;
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </td>

                                                            <td class="text-end text-sm">
                                                                <button
                                                                    class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1"
                                                                    style="padding-right: 5px; background-color: green !important; color: white !important;"
                                                                    type="submit">
                                                                    <i class="fa-solid fa-bus pe-2"></i>Editer
                                                                </button>
                                                            </td>
                                                        </form>
                                                        <td class="text-left text-sm">
                                                            <form action="{{ route('vehicule.destroy', $vehicule->id) }}"
                                                                method="POST" class="delete-vehicule-form"
                                                                onsubmit="return confirm('Etes-vous sûr de vouloir supprimer le véhicule {{ $vehicule->marque }} ?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="vehicule_id"
                                                                    value="{{ $vehicule->id }}">

                                                                <button
                                                                    class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                    type="submit" style="background-color: red !important; color: white !important">
                                                                    <i class="fa-solid fa-bus pe-2"></i>Supprimer
                                                                </button>
                                                            </form>
                                                        </td>

                                                        <td class="text-left text-sm">
                                                            {{-- dans le show on engage --}}
                                                            <form action="{{ route('vehicule.show', $vehicule->id) }}"
                                                                method="GET" class="delete-vehicule-form"
                                                                onsubmit="return confirm('Etes-vous sûr de vouloir Abolir la véhicule {{ $vehicule->marque }} du abonnement {{ isset($abonnem->nom) ? $abonnem->nom : '' }} ?')">
                                                                @csrf
                                                                @method('GET')
                                                                <input type="hidden" name="vehicule_id"
                                                                    value="{{ $vehicule->id }}">
                                                                @if ($vehicule->id_abonnement !== null)
                                                                    <button
                                                                        class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                        type="submit"style="background-color: rgb(13, 99, 246) !important; color: white !important;">
                                                                        <i class="fa-solid fa-bus pe-2"></i>Abolir
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        class="btn text-secondary font-weight-bold text-xs rounded border-bottom border-top p-1 delete-vehicule-button"
                                                                        type="button" style="background-color: rgb(13, 99, 246) !important; color: white !important;" disabled>
                                                                        <i class="fa-solid fa-bus pe-2"></i>Abolir
                                                                    </button>
                                                                @endif

                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        @endif

                                    </tbody>
                                </table>
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
                            d'ajoute des autocars</h4>
                        <hr class="horizontal dark my-sm-4">
                    </div>
                </div>

                <form action="{{ route('vehicule.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_entreprise" value="{{ $id_entreprise }}">
                    <div class="card-body pt-4 p-3"
                        style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                        <div class="form-group">
                            <h5 class="mt-3 mb-0">Autocar : </h5>
                            <hr class="horizontal dark my-sm-4">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Marque d'autocar</label>
                            <input class="form-control @error('marque') is-invalid @enderror" name="marque"
                                type="text" id="example-text-input" value="{{ old('marque') }}">
                            @error('marque')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Immatricule</label>
                            <small class="form-text text-muted">(exemple : AA-123-BB)</small>
                            <input class="form-control @error('immatriculation') is-invalid @enderror"
                                name="immatriculation" type="text" id="example-text-input"
                                value="{{ old('immatriculation') }}">
                            @error('immatriculation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">Capacite</label>
                            <input class="form-control @error('capacite') is-invalid @enderror" name="capacite"
                                type="number" id="example-text-input" value="{{ old('capacite') }}">
                            @error('capacite')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-search-input" class="form-control-label">Date mise en service</label>
                            <input class="form-control @error('dateMiseEnservice') is-invalid @enderror"
                                name="dateMiseEnservice" type="date" id="example-text-input"
                                value="{{ old('dateMiseEnservice') }}">
                            @error('dateMiseEnservice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr class="horizontal dark my-sm-4">
                    <button class="btn bg-gradient-dark w-100" type="submit">Ajouter autoCar</button>
                    <button class="btn btn-outline-dark w-100" type="button">Annuler l'opération</button>
                </form>
            </div>


        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <style>
        .modified {
            border: 2px solid #8bc34a;
            border-radius: 10px;
        }
    </style>


    <script>
        $(document).ready(function() {
            $('.editableTextMarque').on('click', function(e) {
                if ($(this).find('input').length === 0) {
                    const cell = $(this);
                    const row = cell.closest('tr');
                    const text = cell.text().trim();
                    const input = $('<input>', {
                        class: 'form-control text-xs font-weight-bold mb-0',
                        id: 'example-text-input',
                        type: 'text',
                        value: $('<div>').text(text).html()
                    }).css('width', cell.width());

                    // Get the corresponding hidden input element
                    const hiddenInput = $(row).find('input[type=hidden][name=marque]');

                    cell.empty().append(input);
                    input.focus();

                    input.animate({
                        width: '100%'
                    }, 500);

                    input.on('blur keydown', function(e) {
                        if (e.type === 'blur' || e.which === 13) {
                            const text = input.val().trim();
                            cell.text(text);
                            row.addClass('modified');

                            // Update the value of the hidden input element in the corresponding row
                            hiddenInput.val(text);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });
            $('.editableTextCapacite').on('click', function(e) {
                if ($(this).find('input').length === 0) {
                    const cell = $(this);
                    const row = cell.closest('tr');
                    const text = cell.text().trim();
                    const input = $('<input>', {
                        class: 'form-control text-xs font-weight-bold mb-0',
                        id: 'example-text-input',
                        type: 'text',
                        value: $('<div>').text(text).html()
                    }).css('width', cell.width());

                    // Get the corresponding hidden input element
                    const hiddenInput = $(row).find('input[type=hidden][name=capacite]');

                    cell.empty().append(input);
                    input.focus();

                    input.animate({
                        width: '100%'
                    }, 500);

                    input.on('blur keydown', function(e) {
                        if (e.type === 'blur' || e.which === 13) {
                            const text = input.val().trim();
                            cell.text(text);
                            row.addClass('modified');

                            // Update the value of the hidden input element in the corresponding row
                            hiddenInput.val(text);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });
            $('.editableTextImmatriculation').on('click', function(e) {
                if ($(this).find('input').length === 0) {
                    const cell = $(this);
                    const row = cell.closest('tr');
                    const text = cell.text().trim();
                    const input = $('<input>', {
                        class: 'form-control text-xs font-weight-bold mb-0',
                        id: 'example-text-input',
                        type: 'text',
                        value: $('<div>').text(text).html()
                    }).css('width', cell.width());

                    // Get the corresponding hidden input element
                    const hiddenInput = $(row).find('input[type=hidden][name=immatriculation]');

                    cell.empty().append(input);
                    input.focus();

                    input.animate({
                        width: '100%'
                    }, 500);

                    input.on('blur keydown', function(e) {
                        if (e.type === 'blur' || e.which === 13) {
                            const text = input.val().trim();
                            cell.text(text);
                            row.addClass('modified');

                            // Update the value of the hidden input element in the corresponding row
                            hiddenInput.val(text);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });

            $('.editableDate').on('click', function(e) {
                if ($(this).find('input').length === 0) {
                    const cell = $(this);
                    const row = cell.closest('tr');
                    const text = cell.text().trim();
                    const input = $('<input>', {
                        class: 'form-control text-xs font-weight-bold mb-0',
                        id: 'example-text-input',
                        type: 'date',
                        value: $('<div>').text(text).html()
                    }).css('width', '0px');

                    // Get the corresponding hidden input element
                    const hiddenInput = $(row).find('input[type=hidden][name=dateMiseEnservice]');

                    cell.empty().append(input);
                    input.focus();

                    input.animate({
                        width: '100%'
                    }, 500);

                    input.on('blur keydown', function(e) {
                        if (e.type === 'blur' || e.which === 13) {
                            const text = input.val().trim();
                            cell.text(text);
                            row.addClass('modified');

                            // Update the value of the hidden input element in the corresponding row
                            hiddenInput.val(text);
                        }
                    });
                } else {
                    e.stopPropagation();
                }
            });
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
