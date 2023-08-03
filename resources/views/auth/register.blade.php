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
    <link rel="stylesheet" href="css/myFont2.css">
    <style>
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

        textarea {
            height: 250px;
            /* sets the height to 3 lines of text */
            resize: none;
            /* prevents resizing of the textarea */
        }

        .image-div {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* Add any additional styles as needed */
        }

        .about,
        .conditions {
            margin-bottom: 30px;
        }

        .highlight1 {
            background-color: #394867;
            color: white;
            padding: 10px;
        }

        .highlight2 {
            background-color: #9BA4B5;
            padding: 10px;
        }

        .footer {
            left: 0;
            bottom: 0;
            width: 100%;
            /* background-color: #616161 !important; */
            background-image: linear-gradient(to right, #9BA4B5, #212A3E) !important;
            text-align: center;
            padding: 10px 0;
        }
        .footText {
            color: black !important;
        }
    </style>
</head>

<body class="">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="../pages/dashboard.html">
                Nav Manage
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav mx-auto ms-xl-auto me-xl-auto">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                            <i class="fa fa-chart-pie opacity-6  me-1"></i>
                            Gestion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('profile') }}">
                            <i class="fa fa-user opacity-6  me-1"></i>
                            Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="{{ route('login') }}">
                            <i class="fas fa-key opacity-6  me-1"></i>
                            Sign In
                        </a>
                    </li>
                </ul>
                <li class="nav-item d-flex align-items-center">
                    <a class="btn btn-round btn-sm mb-0 btn-outline-white me-2" href="#">Return au
                        accueil</a>
                </li>
            </div>
        </div>
    </nav>
    @php
        $imagePath0 = asset('img/curved-images/curved7.jpg');
        $imagePath1 = asset('images/Capture d’écran 2023-06-02 211526.png');
    @endphp
    <!-- End Navbar -->
    <main class="main-content  mt-0" style="background-image: url('{{ $imagePath1 }}'); background-size: cover;
    background-position: center;
    background-attachment: fixed;">
        <section class="min-vh-100 mb-8">

            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
                style="background-image: url('{{ $imagePath1 }}'); box-shadow: 0px 2px 10px 2px #051125d4 !important;">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                    <div class="row justify-content-center" style="height: 300px">
                        <div class="col-lg-7 text-center mx-auto">
                            <h1 class="text-white mb-2 mt-5">Bienvenue !</h1>
                            <p class="text-lead text-white">Cette page offre une opportunité d'inscription pour les
                                entreprises de navette et les abonnements associés. En vous inscrivant, vous pourrez
                                bénéficier d'un accès facile et rapide à notre service de navette professionnel pour
                                votre entreprise .</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto blur blur-rounded top-0 z-index-3 shadow"
                        style="width: 500px">
                        <div class="" style="padding-bottom: 12px; padding-top: 12px;">
                            <div class="card-header text-center pt-4">
                                <h3>Register with</h3>
                            </div>

                            <div class="card-body">
                                <form role="form text-left" action="{{ route('register') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control text-center @error('nom') is-invalid @enderror"
                                            name="nom" value="{{ old('nom') }}" placeholder="Nom"
                                            aria-label="Nom" aria-describedby="email-addon">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text"
                                            class="form-control text-center @error('adresse') is-invalid @enderror" name="adresse"
                                            value="{{ old('adresse') }}" placeholder="Adresse" aria-label="Adresse"
                                            aria-describedby="email-addon">
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="email"
                                            class="form-control text-center @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Email" aria-label="Email"
                                            aria-describedby="email-addon">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text"
                                            class="form-control text-center @error('telephone') is-invalid @enderror"
                                            name="telephone" value="{{ old('telephone') }}" placeholder="Téléphone"
                                            aria-label="Téléphone" aria-describedby="email-addon">
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password"
                                            class="form-control text-center @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" aria-label="Password"
                                            aria-describedby="password-addon">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control text-center" name="password_confirmation"
                                            placeholder="Confirm Password" aria-label="Confirm Password"
                                            aria-describedby="password-addon">
                                    </div>
                                    <div class="mb-3">
                                        <label for="select-options" class="form-label">Autre lien de site-web:</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="site-web-addon"><i
                                                    class="bi bi-globe2"></i></span>
                                            <input type="url" class="form-control text-center" id="site-web" name="siteWeb"
                                                value="{{ old('siteWeb') }}" placeholder="https://example.com"
                                                aria-label="Site web" aria-describedby="site-web-addon">
                                            @error('siteWeb')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <small class="form-text text-muted">Ce champ est optionelle.</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="select-options" class="form-label">Secteur de
                                            domaine:</label>
                                        <input type="text"
                                            class="form-control text-center @error('secteur') is-invalid @enderror" name="secteur"
                                            value="{{ old('secteur') }}" placeholder="Secteur de domaine"
                                            aria-label="secteurDomaine" aria-describedby="email-addon"
                                            value="Transport en commun par navette">
                                        @error('secteur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                            placeholder="Description" aria-label="Description" aria-describedby="description-addon" maxlength="500">{{ old('description') }}</textarea>
                                        <span id="char-count" class="badge badge-secondary">500</span>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            accept="image/*" aria-label="Image Upload"
                                            aria-describedby="image-addon">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            J'accepte <a href="#conditions"
                                                class="text-dark font-weight-bolder">les termes et conditions ci-dessous</a>
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            up</button>
                                    </div>
                                    <p class="text-sm text-center mt-1 mb-0">Vous avez déjà un compte ? <a
                                            href="{{ route('login') }}" class="text-dark font-weight-bolder">Sign
                                            in</a></p>
                                </form>
                                <br>
                                <div class="card-header text-center pt-4 border-top">
                                    <h3>Veuillez regarder la vidéo</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10" style="padding-top: 115px;">
                    <div class="py-5">
                        <video class="with-3d-shadow" src="/cars/representation.mp4" controls
                            style="max-width: 100%; height: auto; border-radius: 10px;"></video>
                    </div>
                </div>
            </div>
            <div class="container" id="conditions">
                <h1 class="text-center" style="color: white">Bienvenue</h1>
                <div class="about">
                    <h2 class="text-center" style="color: white">À propos du site</h2>
                    <p style="color: white">
                        Bienvenue sur notre site de gestion de navettes de bus dédié aux entreprises de gestion de
                        navettes. Notre plateforme permet aux entreprises de créer un compte, de gérer leurs navettes,
                        leurs voyages et leurs abonnements en toute simplicité. Que vous soyez une grande entreprise de
                        transport ou une petite société de navettes, notre solution vous aidera à optimiser votre
                        gestion et à offrir un service de qualité à vos clients.
                    </p>
                    <p class="highlight1" style="color: white">
                        Avec notre système convivial et efficace, vous pourrez ajouter et gérer vos navettes, créer des
                        voyages, gérer les réservations des passagers et gérer les abonnements. Notre objectif est de
                        simplifier vos opérations, d'automatiser les processus et de vous permettre de fournir un
                        service fiable et pratique à vos clients.
                    </p>
                </div>

                <div class="conditions">
                    <h2 class="text-center" style="color: white">Conditions d'utilisation pour les entreprises de gestion de navettes</h2>
                    <ul class="list-unstyled">
                        <li style="color: white"><i class="fas fa-check-circle text-success"></i> Veuillez fournir des informations exactes
                            lors de votre inscription en tant qu'entreprise de gestion de navettes.</li>
                        <li style="color: white"><i class="fas fa-check-circle text-success"></i> Vous êtes responsable de la vérification
                            de l'authenticité des informations fournies par les passagers lors des réservations.</li>
                        <li class="highlight2" style="color: white"><i class="fas fa-check-circle text-success"></i> Les paiements pour les
                            voyages et les abonnements doivent être effectués selon les modalités convenues avec les
                            passagers.</li>
                        <li style="color: white"><i class="fas fa-check-circle text-success"></i> Toute modification ou annulation de
                            voyages doit être communiquée aux passagers concernés dans les meilleurs délais.</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="footer py-5 opacity-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-4 mx-auto text-center">
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Company
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            About Us
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Team
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Products
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Blog
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                            Pricing
                        </a>
                    </div>
                    <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-dribbble footText "></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-twitter footText "></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-instagram footText"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-pinterest footText"></span>
                        </a>
                        <a href="javascript:;" target="_blank" class="footText text-secondary me-xl-4 me-4">
                            <span class="text-lg fab fa-github footText"></span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
                        <p class="mb-0 text-secondary footText">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Soft by Creative Tim.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
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
