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
    <link rel="stylesheet" href="/css/myFont.css">

    <script src="https://kit.fontawesome.com/ffdf620d94.js" crossorigin="anonymous"></script>

    @vite(['resources/sass/timetable.scss'])


    <style>
        .notification-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: red;
            color: white;
            padding: 2px 6px;
            border-radius: 50%;
            font-size: 12px;
        }


        .divBtn {
            width: 120px;
        }

        .myTime {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
            /* Adjust the width as needed */
            height: 100px;
            /* Adjust the height as needed */
            border: 1px solid #ccc;
            /* Optional: Add a border for visual separation */
            /* Add any other desired styles */
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
                    <a href="{{ route('plainningVoyages') }}">
                        <h6 class="font-weight-bolder mb-0">Plainning des voyages</h6>
                    </a>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" href="#">Home</a>
                        </li>
                        <li class="nav-item d-flex pe-3 align-items-center">
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
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        @php
                            // Récupérer le nom du mois actuel
                            $currentMonth = date('F'); // Obtient le nom complet du mois (ex: May)

                            // Calculer le nombre de semaines écoulées avec une précision décimale
                            $startDate = new DateTime(date('Y-m-01')); // Date du premier jour du mois actuel
                            $today = new DateTime(date('Y-m-d')); // Date actuelle
                            $daysPassed = $today->diff($startDate)->format('%a'); // Nombre de jours écoulés
                            $weekNumber = ceil($daysPassed / 7); // Arrondir le nombre de semaines à l'entier supérieur

                            // Afficher le résultat dans la vue Blade

                        @endphp
                        <div class="card-header text-center pb-0 d-flex justify-content-center">
                            <h2 class="mb-0 border-bottom"> {{ $currentMonth }} : {{ $weekNumber }}ème
                                semaine
                            </h2>
                            <hr class="horizontal gray-light my-4">
                        </div>

                        <div class="card-body px-0 pt-0 pb-2 py-2">
                            <div class="timetable">
                                <div class="week-names">
                                    <div>Lundi</div>
                                    <div>Mardi</div>
                                    <div>Mercredi</div>
                                    <div>Jeudi</div>
                                    <div>Vendredi</div>
                                    <div class="weekend">Samedi</div>
                                    <div class="weekend">Dimanche</div>
                                </div>
                                <div class="time-interval">
                                    <div>6:00 - 9:00</div>
                                    <div>9:00 - 12:00</div>
                                    <div>12:00 - 15:00</div>
                                    <div>15:00 - 18:00</div>
                                    <div>18:00 - 21:00</div>
                                    <div>21:00 - 00:00</div>
                                </div>



                                @php
                                    $heur = 0;
                                @endphp
                                <div class="content">
                                    @foreach ($abonnementss as $index => $abonnements)
                                        @php
                                            $heur++;
                                        @endphp
                                        @if ($abonnements->isNotEmpty())
                                            @for ($day = 1; $day <= 7; $day++)
                                                @php
                                                    $nbrAbn = DB::table('date_abonnements')
                                                        ->whereIn('id_abonnement', $abonnements->pluck('id')->toArray())
                                                        ->where('id_jour', $day)
                                                        ->count();
                                                    $idsAbns = DB::table('date_abonnements')
                                                        ->whereIn('id_abonnement', $abonnements->pluck('id')->toArray())
                                                        ->where('id_jour', $day)
                                                        ->select('id_abonnement')
                                                        ->get();

                                                    $abonIds = $idsAbns->pluck('id_abonnement')->toArray();

                                                    $abns = DB::table('abonnements')
                                                        ->whereIn('id', $abonIds)
                                                        ->get();
                                                @endphp
                                                {{-- @ --}}
                                                @php
                                                    $colors = ['accent-orange-gradient', 'accent-green-gradient', 'accent-cyan-gradient', 'accent-pink-gradient', 'accent-purple-gradient'];

                                                    $randomColor = $colors[array_rand($colors)];
                                                @endphp
                                                @if ($nbrAbn > 0)
                                                    <form action="{{ route('voyages') }}" method="post" class="myForm"
                                                        data-index="{{ $index }}" data-day="{{ $day }}">
                                                        @csrf
                                                        <a
                                                            onclick="submitForm(event, {{ $index }}, {{ $day }})">
                                                            <input type="hidden" name="heur" value="{{ $heur }}">
                                                            <input type="hidden" name="day" value="{{ $day }}">

                                                            <div class="myTime {{ $randomColor }}"
                                                                style="display: flex; flex-direction: column; align-items: center;">
                                                                <div class="row" style="text-align: center;">
                                                                    {{ $nbrAbn }} voyages
                                                                    @foreach ($idsAbns as $idsAbn)
                                                                        <input type="hidden" name="abonnements[]"
                                                                            value="{{ $idsAbn->id_abonnement }}">
                                                                    @endforeach
                                                                </div>

                                                                <div class="avatar-group mt-2"
                                                                    style="display: flex; justify-content: center;">
                                                                    @php
                                                                        $counter = 0;
                                                                    @endphp

                                                                    @foreach ($abns as $abn)
                                                                        @php
                                                                            $entrep = DB::table('entreprises')
                                                                                ->where('id', $abn->id_entreprise)
                                                                                ->first();
                                                                        @endphp

                                                                        @if ($counter < 5)
                                                                            <a href="javascript:;"
                                                                                class="avatar avatar-xs rounded-circle"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="bottom"
                                                                                title="{{ $entrep->nom }}">
                                                                                <img alt="Image placeholder"
                                                                                    src="{{ asset('/images/' . $entrep->image) }}">
                                                                            </a>
                                                                        @endif

                                                                        @php
                                                                            $counter++;
                                                                        @endphp
                                                                    @endforeach

                                                                    @if ($counter > 5)
                                                                        <a href="javascript:;"
                                                                            class="avatar avatar-xs rounded-circle"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="bottom" title="...">
                                                                            <span
                                                                                class="more-counter">+{{ $counter - 5 }}</span>
                                                                        </a>
                                                                    @endif



                                                                </div>
                                                            </div>
                                                        </a>
                                                    </form>
                                                @else
                                                    <div class="weekend"></div>
                                                @endif
                                            @endfor
                                        @else
                                            @foreach (range(1, 7) as $index)
                                                <div class="weekend"></div>
                                            @endforeach
                                        @endif
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                            Tim</a>
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
        function submitForm(event, index, day) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the form element and submit it
            const form = document.querySelector(`form.myForm[data-index="${index}"][data-day="${day}"]`);
            form.submit();
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
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
