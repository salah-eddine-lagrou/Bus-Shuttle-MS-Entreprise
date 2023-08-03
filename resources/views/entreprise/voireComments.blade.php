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
    <link rel="stylesheet" href="/css/myFont.css">
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
                    <a href="{{ route('commentsEntreprise') }}">
                        <h6 class="font-weight-bolder mb-0">Voir les Commentaires</h6>
                    </a>

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <form action="{{ route('searchComment') }}" method="get">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0 me-3">
                                        <i class="fas fa-search text-primary" style="font-size: 14px;"></i>
                                    </button>

                                    <div class="input-group shadow">
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="client"
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

                        <li class="nav-item dropdown pe-1 d-flex align-items-center">
                            @php
                                $entreMent = auth()->user();
                                $idClientExp = DB::table('exprimer_abonnements')
                                    ->where('description', 'LIKE', '%' . $entreMent->nom . '%')
                                    ->pluck('id_client'); // Utiliser pluck() pour obtenir une collection des valeurs d'id_client

$clientExps = DB::table('clients')
    ->whereIn('id', $idClientExp)
    ->get();

$nbrClients = DB::table('exprimer_abonnements')
    ->where('description', 'LIKE', '%' . $entreMent->nom . '%')
    ->select('id_client')
                                    ->count();
                            @endphp
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer" style="font-size: 18px"></i>
                                <span class="notification-count">{{ $nbrClients }}</span>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton"
                                style="max-height: 400px; width: 450px; overflow-y: auto;">
                                @if ($nbrClients > 0)
                                    <strong style="font-family: Georgia, 'Times New Roman', Times, serif">
                                        {{ $nbrClients }} mentionnés vous dans leur commentaire
                                    </strong>
                                @else
                                    <strong style="font-family: Georgia, 'Times New Roman', Times, serif">
                                        Aucun mentionnement
                                    </strong>
                                @endif
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                @foreach ($clientExps as $clientExp)
                                    @php
                                        $tempPasse = DB::table('exprimer_abonnements')
                                            ->where('id_client', $clientExp->id)
                                            ->select('created_at')
                                            ->first();

                                        $tempActuel = Carbon::now();
                                        $diffTemps = $tempActuel->diff($tempPasse->created_at);

                                        $diffString = '';
                                        if ($diffTemps->days > 0) {
                                            $diffString .= $diffTemps->days . ' days ';
                                        }
                                        elseif ($diffTemps->h > 0) {
                                            $diffString .= $diffTemps->h . ' hours ';
                                        }
                                        elseif ($diffTemps->i > 0) {
                                            $diffString .= $diffTemps->i . ' minutes ';
                                        }
                                        elseif ($diffTemps->s > 0) {
                                            $diffString .= $diffTemps->s . ' seconds ';
                                        }

                                        $diffStringSafe = htmlspecialchars($diffString);

                                    @endphp
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <i class="fa-solid fa-user me-3" style="font-size: 24px;"></i>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight">
                                                            <strong>{{ $clientExp->nom }}</strong> a mentionné vous
                                                            dans sa commentaire
                                                        </span>
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0 ">
                                                        <i class="fa fa-clock me-1"></i>
                                                        Il ya <strong>{{ $diffStringSafe }}</strong> passé
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
        @php
            $type_abonnements = DB::table('type_abonnements')->get();
            $clientAuth = auth()->user();
        @endphp
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
        @php
            $imagePath1 = asset('');
        @endphp
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4 w-100 rounded">
                    <div class="card shadow-blur"
                        style="background-image: url('{{ $imagePath1 }}'); background-size: cover;">
                        <div class="card-header pb-0 px-3 d-flex justify-content-between align-items-center"
                            style="background-image: url('{{ $imagePath1 }}'); background-size: cover;">
                            <h5 class="mb-0">Les commentaires</h5>
                        </div>
                        @if ($exprimerAbonnement === null)
                            <div class="text-center">
                                <h2 style="color: #999; font-style: italic;">Aucune résultat pour ce nom</h2>
                            </div>
                        @else
                            <ul class="list-group">
                                @foreach ($exprimerAbonnement as $comment)
                                    @php
                                        $client = DB::table('clients')
                                            ->where('id', $comment->id_client)
                                            ->first();
                                        $entreprise = auth()->user();
                                        $typeAbonnement = DB::table('type_abonnements')
                                            ->where('id', $comment->id_type_abonnement)
                                            ->first();
                                        $noteComment = DB::table('notes_commentaires')
                                            ->where('id_entreprise', $entreprise->id)
                                            ->where('id_exprimer_abonnement', $comment->id)
                                            ->first();
                                    @endphp
                                    <div
                                        class="rounded shadow p-3 mt-4 card card-body blur shadow-blur mx-4 overflow-hidden h-100">
                                        <li class="p-4 mb-2 bg-gray-100 border-radius-lg rounded shadow p-3">
                                            <div class="row">
                                                <div class="col-md-6 text-start w-25 border-bottom">
                                                    <h6 class="mb-3 text-sm"><i class="fas fa-user-circle pe-2"
                                                            style="font-size: 25px"></i>{{ $client->nom }}</h6>
                                                </div>


                                            </div>

                                            <div>
                                                <div class=" p-3">
                                                    <p class="text-dark font-weight-bold">{{ $comment->description }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <hr class="horizontal dark text-start">

                                                @if ($comment->nom_abonnement !== null)
                                                    <div class="mb-2 text-xs d-felx">Nom proposé<span
                                                            class="text-dark font-weight-bold"
                                                            style="padding-left: 3px">
                                                            : {{ $comment->nom_abonnement }}
                                                        </span></div>
                                                @endif

                                                @if ($comment->id_type_abonnement !== null)
                                                    @if ($comment->nom_abonnement !== null)
                                                        <div class="mb-2 text-xs d-flex">Type<span
                                                                class="text-dark font-weight-bold"
                                                                style="padding-left: 57px">
                                                                : {{ $typeAbonnement->nom }}
                                                            </span></div>
                                                    @else
                                                        <div class="mb-2 text-xs d-flex">Type<span
                                                                class="text-dark font-weight-bold"
                                                                style="padding-left: 3px">
                                                                : {{ $typeAbonnement->nom }}
                                                            </span></div>
                                                    @endif
                                                @endif

                                                @if ($comment->heur_debut_aller !== null || $comment->heur_debut_retour !== null)
                                                    <div class="mb-2 text-xs"><span
                                                            class="text-dark font-weight-bold">
                                                            <i class="fa-solid fa-clock pe-2"
                                                                style="font-size: 16px;"></i>
                                                            {{ $comment->heur_debut_aller }} -
                                                            {{ $comment->heur_debut_retour }}
                                                        </span></div>
                                                @endif

                                                @if ($comment->depart !== null || $comment->destination !== null)
                                                    <div class="mb-2 text-xs"><span
                                                            class="text-dark font-weight-bold">
                                                            <i class="fa-solid fa-map-location-dot pe-2"
                                                                style="font-size: 17px;"></i>
                                                            {{ $comment->depart }} -
                                                            {{ $comment->destination }}
                                                        </span></div>
                                                @endif

                                                <hr class="horizontal dark text-start">
                                            </div>
                                        </li>
                                        <div class="row">
                                            <div class="button-container d-flex justify-content-center align-items-center button-container"
                                                data-commentId="{{ $comment->id }}">

                                                <form action="{{ route('rereactEntreprise', $entreprise->id) }}"
                                                    method="POST">
                                                    <button class="myBtn2 btn" type="submit" style="width:75px"
                                                        onclick="toggleButton2(this)"><i class="fas fa-sync-alt"
                                                            style="font-size: 15px"></i></button>
                                                    @csrf
                                                    <input type="hidden" id="incommentId" name="commentId"
                                                        value="{{ $comment->id }}">
                                                </form>
                                                @if ($noteComment !== null)
                                                    @if ($noteComment->likes != 0)
                                                        <button class="btn like-btn"
                                                            id="like-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)"
                                                            style="background-color: green" disabled>
                                                            <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"
                                                                style="color: white"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                style="color: white !important;"
                                                                id="like-count-{{ $comment->id }}">
                                                                @if ($comment->likes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->likes }}
                                                                @endif
                                                            </span>
                                                        </button>

                                                        <button class="btn dislike-btn"
                                                            id="dislike-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)">
                                                            <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                id="dislike-count-{{ $comment->id }}">
                                                                @if ($comment->dislikes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->dislikes }}
                                                                @endif
                                                            </span>
                                                        </button>
                                                    @elseif ($noteComment->dislikes != 0)
                                                        <button class="btn like-btn"
                                                            id="like-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)">
                                                            <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                id="like-count-{{ $comment->id }}">
                                                                @if ($comment->likes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->likes }}
                                                                @endif
                                                            </span>
                                                        </button>

                                                        <button class="btn dislike-btn"
                                                            id="dislike-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)" style="background-color: red"
                                                            disabled>
                                                            <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"
                                                                style="color: white"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                style="color: white !important;"
                                                                id="dislike-count-{{ $comment->id }}">
                                                                @if ($comment->dislikes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->dislikes }}
                                                                @endif
                                                            </span>
                                                        </button>
                                                    @else
                                                        <button class="btn like-btn"
                                                            id="like-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)">
                                                            <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                id="like-count-{{ $comment->id }}">
                                                                @if ($comment->likes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->likes }}
                                                                @endif
                                                            </span>
                                                        </button>

                                                        <button class="btn dislike-btn"
                                                            id="dislike-btn-{{ $comment->id }}"
                                                            onclick="toggleButton(this)">
                                                            <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                                            <span class="text-dark ms-2 font-weight-bold"
                                                                id="dislike-count-{{ $comment->id }}">
                                                                @if ($comment->dislikes === null)
                                                                    0
                                                                @else
                                                                    {{ $comment->dislikes }}
                                                                @endif
                                                            </span>
                                                        </button>
                                                    @endif
                                                @else
                                                    <button class="btn like-btn" id="like-btn-{{ $comment->id }}"
                                                        onclick="toggleButton(this)">
                                                        <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                                                        <span class="text-dark ms-2 font-weight-bold"
                                                            id="like-count-{{ $comment->id }}">
                                                            @if ($comment->likes === null)
                                                                0
                                                            @else
                                                                {{ $comment->likes }}
                                                            @endif
                                                        </span>
                                                    </button>

                                                    <button class="btn dislike-btn"
                                                        id="dislike-btn-{{ $comment->id }}"
                                                        onclick="toggleButton(this)">
                                                        <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                                        <span class="text-dark ms-2 font-weight-bold"
                                                            id="dislike-count-{{ $comment->id }}">
                                                            @if ($comment->dislikes === null)
                                                                0
                                                            @else
                                                                {{ $comment->dislikes }}
                                                            @endif
                                                        </span>
                                                    </button>
                                                @endif


                                                <form action="{{ route('reactEntreprise', $entreprise->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="sendBtn btn text-strat" style="width:75px"
                                                        type="submit" onclick="toggleButton1(this)"><i
                                                            class="fas fa-paper-plane" style="font-size: 15px"></i>
                                                    </button>
                                                    <input type="hidden" id="inlikes-{{ $comment->id }}"
                                                        name="likes" value="">
                                                    <input type="hidden" id="indislikes-{{ $comment->id }}"
                                                        name="dislikes" value="">
                                                    <input type="hidden" id="incommentId" name="commentId"
                                                        value="{{ $comment->id }}">
                                                </form>




                                            </div>
                                            <hr class="horizontal dark">
                                        </div>
                                    </div>
                                @endforeach

                            </ul>
                        @endif

                    </div>
                </div>
            </div>

        </div>

        @php
            $imagePath = asset('images/pexels-lumn-399161.jpg');
        @endphp


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
    <style>
        .like-btn.clicked,
        .dislike-btn.clicked {
            animation: pulse 0.5s;
        }

        .like-btn.clicked {
            background-color: #28a745;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        .dislike-btn.clicked {
            background-color: #dc3545;
            color: #ffffff;
            transition: background-color 0.3s;
        }


        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .textarea-container {
            position: relative;
            width: 700px;
            height: 250px;
        }

        .textarea-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ $imagePath }}');
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }

        .textarea-container textarea {
            background-color: transparent;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            color: #000;
            padding: 10px;
            width: 100%;
            height: 100%;
        }
    </style>
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
        // Get all button containers
        const buttonContainers = document.querySelectorAll('.button-container');

        buttonContainers.forEach(buttonContainer => {
            const commentId = buttonContainer.getAttribute('data-commentId');
            const likeButton = document.getElementById(`like-btn-${commentId}`);
            const dislikeButton = document.getElementById(`dislike-btn-${commentId}`);
            const likeCount = document.getElementById(`like-count-${commentId}`);
            const dislikeCount = document.getElementById(`dislike-count-${commentId}`);
            const likesInput = document.getElementById(`inlikes-${commentId}`);
            const dislikesInput = document.getElementById(`indislikes-${commentId}`);

            // Initialize the hidden input values if they are empty or NaN
            if (likesInput.value === '' || isNaN(parseInt(likesInput.value))) {
                likesInput.value = '0';
            }

            if (dislikesInput.value === '' || isNaN(parseInt(dislikesInput.value))) {
                dislikesInput.value = '0';
            }

            likeButton.addEventListener('click', () => {
                if (likeButton.classList.contains('active')) {
                    let currentLikes = parseInt(likeCount.textContent);
                    currentLikes--;
                    likeCount.textContent = currentLikes;
                    likeButton.classList.remove('active');
                    likesInput.value = decrementCount(parseInt(likesInput.value));
                } else {
                    let currentLikes = parseInt(likeCount.textContent);
                    currentLikes++;
                    likeCount.textContent = currentLikes;
                    likeButton.classList.add('active');
                    likesInput.value = incrementCount(parseInt(likesInput.value));

                    if (dislikeButton.classList.contains('active')) {
                        let currentDislikes = parseInt(dislikeCount.textContent);
                        currentDislikes--;
                        dislikeCount.textContent = currentDislikes;
                        dislikeButton.classList.remove('active');
                        dislikesInput.value = decrementCount(parseInt(dislikesInput.value));
                    }
                }
            });

            dislikeButton.addEventListener('click', () => {
                if (dislikeButton.classList.contains('active')) {
                    let currentDislikes = parseInt(dislikeCount.textContent);
                    currentDislikes--;
                    dislikeCount.textContent = currentDislikes;
                    dislikeButton.classList.remove('active');
                    dislikesInput.value = decrementCount(parseInt(dislikesInput.value));
                } else {
                    let currentDislikes = parseInt(dislikeCount.textContent);
                    currentDislikes++;
                    dislikeCount.textContent = currentDislikes;
                    dislikeButton.classList.add('active');
                    dislikesInput.value = incrementCount(parseInt(dislikesInput.value));

                    if (likeButton.classList.contains('active')) {
                        let currentLikes = parseInt(likeCount.textContent);
                        currentLikes--;
                        likeCount.textContent = currentLikes;
                        likeButton.classList.remove('active');
                        likesInput.value = decrementCount(parseInt(likesInput.value));
                    }
                }
            });
        });

        function toggleButton1(button) {
            button.classList.toggle('sendBtn');
            button.classList.toggle('text-strat');
            button.style.backgroundColor = '#87CEFA'; // Light blue color
            button.style.color = '#FFFFFF'; // White color
            button.type = 'submit';
        }

        function toggleButton2(button) {
            button.classList.toggle('myBtn2');
            button.classList.toggle('text-strat');
            button.style.backgroundColor = 'rgb(196, 6, 222)'; // Light blue color
            button.style.color = '#FFFFFF'; // White color
            button.type = 'submit';
        }

        function toggleButton(button) {

            var div = button.closest('.button-container');
            var commentId = div.dataset.commentid;

            var buttons = div.querySelectorAll('.like-btn, .dislike-btn');

            buttons.forEach(function(btn) {
                if (btn !== button) {
                    btn.classList.remove('clicked');
                }
            });

            button.classList.toggle('clicked');

            var likeCount = div.querySelector('.like-count');
            var dislikeCount = div.querySelector('.dislike-count');

            var likeValue = parseInt(likeCount.textContent);
            var dislikeValue = parseInt(dislikeCount.textContent);

            if (button.classList.contains('like-btn')) {
                if (button.classList.contains('clicked')) {
                    likeCount.textContent = incrementCount(likeValue);
                    if (dislikeValue > 0) {
                        dislikeCount.textContent = decrementCount(dislikeValue);
                    }
                } else {
                    likeCount.textContent = decrementCount(likeValue);
                }
            } else if (button.classList.contains('dislike-btn')) {
                if (button.classList.contains('clicked')) {
                    dislikeCount.textContent = incrementCount(dislikeValue);
                    if (likeValue > 0) {
                        likeCount.textContent = decrementCount(likeValue);
                    }
                } else {
                    dislikeCount.textContent = decrementCount(dislikeValue);
                }
            }
        }


        function incrementCount(value) {
            return value + 1;
        }

        function decrementCount(value) {
            return Math.max(0, value - 1);
        }
    </script>


    <!--   Core JS Files   -->
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/plugins/perfect-scrollbar.min.js"></script>
    <script src="js/plugins/smooth-scrollbar.min.js"></script>
    <script src="js/plugins/chartjs.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                $('.notification-count').hide();
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
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
