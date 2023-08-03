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
            width: 120px;
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
                    <a href="{{ route('clients') }}">
                        <h6 class="font-weight-bolder mb-0">Clients</h6>
                    </a>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <form action="{{ route('SearchClient') }}" method="GET">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                        <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                    </button>

                                    <div class="input-group shadow">
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="client"
                                                placeholder="Chercher .."
                                                style="width: 400px; border-radius: 4px 0 0 4px !important; border: none !important;">
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
                                use Carbon\Carbon;

                                $currentDate = Carbon::today()->toDateString(); // Get the current date
                                $id_clients = $clientEntreprises
                                    ->filter(function ($item) use ($currentDate) {
                                        return Carbon::parse($item->dateInscription)->toDateString() === $currentDate;
                                    })
                                    ->pluck('id_client')
                                    ->toArray();

                                $newClients = $clients->whereIn('id', $id_clients)->all();

                                $nbrClients = count($newClients);
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
                                @foreach ($newClients as $newClient)
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <i class="fa-solid fa-user me-3" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">
                                                            {{ $newClient->nom }} - {{ $newClient->email }}
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
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header text-center pb-0 d-flex justify-content-center">
                            <div class="divBtn pe-3">
                                <a class="w-100" href="{{ route('clients') }}"><button class="btn btnAct w-100"
                                        onclick="toggleButton(this)"
                                        style="{{ empty($etat) ? 'background-color: #87CEFA; color: #FFFFFF;' : '' }}">Tout</button>
                                </a>
                            </div>
                            <div class="divBtn pe-3">
                                <form action="{{ route('debiteurs') }}" method="get" class="w-100"><button
                                        class="btn btnAct" onclick="toggleButton(this)" type="submit"
                                        style="{{ $etat == 'debite' ? 'background-color: #87CEFA; color: #FFFFFF;' : '' }}">Debités</button>
                                </form>
                            </div>
                            <div class="divBtn">
                                <form action="{{ route('abonnes') }}" method="get" class="w-100"><button class="btn btnAct"
                                        onclick="toggleButton(this)" type="submit"
                                        style="{{ $etat == 'abonne' ? 'background-color: #87CEFA; color: #FFFFFF;' : '' }}">abonnés</button>
                                </form>
                            </div>
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
                                        @if (!$clients || $clients->isEmpty() && $etat == '')
                                            <div class="text-center">
                                                <h2 style="color: #999; font-style: italic;">Aucun client pour le moment</h2>
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
                                                            ->whereNotNull('id_abonnement')
                                                            ->count();

                                                    @endphp

                                                    <td class="align-middle text-center text-sm">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $nbrAbnm }}
                                                        </p>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        @if ($etat == 'debite')
                                                            <p class="text-xs font-weight-bold mb-0"
                                                                style="color: red">
                                                                Client Debité
                                                            @elseif ($etat == 'abonne')
                                                            <p class="text-xs font-weight-bold mb-0"
                                                                style="color: green">
                                                                Client Abonné
                                                            @else
                                                            <p class="text-xs font-weight-bold mb-0"
                                                                style="color: rgb(71, 71, 250)">
                                                                Client preexisté
                                                        @endif
                                                        </p>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <form
                                                            action="{{ route('clientEntreprise.destroy', $client->id) }}"
                                                            method="GET" class="delete-vehicule-form"
                                                            onsubmit="return confirm('Etes-vous sûr supprimer le client {{ $client->nom }} de tout ses abonnements de entreprise ?')">
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
            button.style.backgroundColor = '#87CEFA'; // Light blue color
            button.style.color = '#FFFFFF'; // White color
            button.type = 'submit';
        }
    </script>
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
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
    <script src="js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
