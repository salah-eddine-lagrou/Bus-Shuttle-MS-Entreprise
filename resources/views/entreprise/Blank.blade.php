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
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ Route('offres') }}" target="_blank">
                <img src="/img/bus.jpeg" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold">Nav Manage</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link  " href="#">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Offres</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ Route('clients') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>office</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g id="office" transform="translate(153.000000, 2.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Clients</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="#">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>credit-card</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Vehicules</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ Route('plainningVoyages') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Voyages</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="{{ route('commentsEntreprise') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(304.000000, 151.000000)">
                                                <polygon class="color-background opacity-6"
                                                    points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                </polygon>
                                                <path class="color-background opacity-6"
                                                    d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">voir les Commentaires</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="#">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(304.000000, 151.000000)">
                                                <polygon class="color-background opacity-6"
                                                    points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                </polygon>
                                                <path class="color-background opacity-6"
                                                    d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Abonnement</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link  active" href="{{ Route('profile') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                @php
                    $imagePath = asset('img/curved-images/white-curved.jpg');
                @endphp
                <div class="full-background" style="background-image: url('{{ $imagePath }}')"></div>
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true"
                            id="sidenavCardIcon"></i>
                    </div>
                    <div class="docs-info">
                        <h6 class="text-white up mb-0">Monsieur foulan</h6>
                        <p class="text-xs font-weight-bold">Votre profile bien organise</p>
                        <a href="{{ Route('profile') }}" target="_blank"
                            class="btn btn-white btn-sm w-100 mb-0">Voire profile</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>
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
            ->get();

        $entreprise = DB::table('entreprises')
            ->where('id', $abonnement->id_entreprise)
            ->first();
        $id_entreprise = $entreprise->id;
    @endphp
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <div class="container-fluid">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
                navbar-scroll="false">
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
                            <li class="nav-item d-flex align-items-center pe-3">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                    class="nav-link text-body font-weight-bold px-0">
                                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                                    <span class="d-sm-inline d-none">Se-deconnecter</span>
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
                        target="_blank" href="{{ route('entreprise', $abonnement->id_entreprise) }}">voire
                        entreprise</a>
                </div>
                <div class="container-fluid content-overlay" style="backdrop-filter: none !important;">

                    <div class="row">
                        <div class="col-md-6 my-auto text-center">
                            <div class="card card-body blur shadow-blur mx-4 overflow-hidden h-100">
                                <img src="{{ asset('/' . $imageOffre->image) }}" alt=""
                                    style="max-width: 100%; height: auto;">
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
                                <h4 class="mb-0 border text-center"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif">Informations d'offre
                                    d'abonnement</h4>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
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
                                                    $vide = ($nbrClients * 100) / $capacite;
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
                                    <img src="{{ asset('/autocars/138703-vind_jouw_reis-01.png') }}" alt=""
                                        style="max-width: 100%; height: auto;">
                                    <br>

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
                            <div class="row">
                                <div class="col-md-6 w-100">
                                    <div class="custom-div">
                                        <hr class="horizontal gray-light my-4">


                                        <div class="card-body px-4 py-2 mt-4">
                                            <div class="mb-4">
                                                <h5 class="text-gradient text-dark mb-3">Abonnement</h5>
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


        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="/js/core/popper.min.js"></script>
    <script src="/js/core/bootstrap.min.js"></script>
    <script src="/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/js/plugins/smooth-scrollbar.min.js"></script>

    <style>
        .priceButt:active {
            box-shadow: none !important;
        }
    </style>
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

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
