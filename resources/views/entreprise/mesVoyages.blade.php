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
    <style>
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
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('partials._aside')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky"
            id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5" style="background-color: #999">
                            <li class="breadcrumb-item text-sm">
                                <a class="text-white opacity-5 purple-text"
                                    href="{{ route('plainningVoyages') }}">Plainning</a>
                            </li>
                            <li class="breadcrumb-item text-sm text-white active" aria-current="page"
                                style="color: black !important;">Voyages</li>
                        </ol>
                        <h6 class="font-weight-bolder mb-0">Voyages</h6>
                    </nav>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <form action="{{ route('searchVoyage') }}" method="post">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                        <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                    </button>

                                    <div class="input-group shadow">
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="voyage"
                                                placeholder="Chercher .."
                                                style="width: 300px; border-radius: 4px 0 0 4px !important; border: none !important;">
                                        </div>
                                        @php
                                            $abnms = DB::table('abonnements')
                                                ->whereIn('id', $abonnementsIds)
                                                ->get();
                                        @endphp
                                        <select class="form-control ml-2 px-1" id="example-select-input"
                                            name="trajet"
                                            style="width: 100px; padding-right: 4px; border: none !important; border-left: 1px solid rgb(149, 144, 144) !important;">
                                            <option value="">par trajet</option>
                                            @foreach ($abnms as $abnm)
                                                <option value="{{ $abnm->trajet }}">{{ $abnm->depart }} -
                                                    {{ $abnm->destination }}</option>
                                            @endforeach
                                        </select>

                                        <input type="hidden" name="abonnementsIdds[]"
                                            value="{{ $abnms->pluck('id') }}">
                                    </div>



                                </div>
                            </form>
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="#">Home</a>
                        </li>
                        <li class="nav-item pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa-solid fa-right-from-bracket me-2"></i>
                                <span class="d-sm-inline d-none">Se-deconnecter</span>
                            </a>
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
        <!-- End Navbar -->
        <div class="container-fluid py-6">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Les Voyages</h5>
                        </div>
                        <br>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                @dd($abonnements)
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Entreprise</th>
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nom d'abonnement</th>
                                            <th <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                colspan="2">Depart-Destination</th>
                                            <th
                                                class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Trajet</th>
                                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                colspan="2">Horaire Aller</th>
                                            <th class="text-start text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                colspan="2">Horaire Retour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($abonnements->isEmpty())
                                            <div class="text-center">
                                                <h2 style="color: #999; font-style: italic;">Aucun résultat pour ce
                                                    voyage</h2>
                                            </div>
                                        @else
                                            @foreach ($abonnements as $abonnement)
                                                @php
                                                    $entreprise = DB::table('entreprises')
                                                        ->where('id', $abonnement->id_entreprise)
                                                        ->first();
                                                @endphp
                                                <tr>
                                                    <td class=" text-sm">
                                                        <a href="{{ Route('entreprise', $abonnement->id_entreprise) }}">
                                                            <div class="w-100 avatar avatar-xl position-relative"
                                                                style="width: 20px !important; height: 20px !important; overflow: hidden; border-radius: 50%;">
                                                                <img src="{{ asset('/images/' . $entreprise->image) }}"
                                                                    alt="profile_image"
                                                                    style="width: 100%; height: 100%; object-fit: cover;">
                                                            </div>
                                                            <span
                                                                class="mySpan d-sm-inline d-none px-2">{{ $entreprise->nom }}</span>
                                                        </a>

                                                    </td>
                                                    <td class="text-start text-sm">
                                                        <a href="{{ route('plusInfos', $abonnement->id) }}">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $abonnement->nom }}
                                                            </p>
                                                        </a>
                                                    </td>
                                                    <td class="text-end text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->depart }}
                                                        </p>
                                                    </td>
                                                    <td class="text-start text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->destination }}</p>
                                                    </td>
                                                    <td class="editableText  text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->trajet }}
                                                        </p>
                                                    </td>
                                                    <td class="editableTime  text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->heur_debut_aller }}</p>
                                                    </td>
                                                    <td class="editableTime  text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->heur_fin_aller }}</p>
                                                    </td>
                                                    <td class="editableTime  text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->heur_debut_retour }}</p>
                                                    </td>
                                                    <td class="editableTime  text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $abonnement->heur_fin_retour }}</p>
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
    <!--   Core JS Files   -->
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <script src="/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .modified {
            border: 2px solid #8bc34a;
            border-radius: 10px;
        }
    </style>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
