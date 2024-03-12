<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ProSM - Profentic Stock Manager</title>

    <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <style>
        #layoutSidenav_content .card {
            margin: 1rem;
        }
        #layoutSidenav_content svg {
            margin-right: 0.5rem;
        }

        [data-href] {
            cursor: pointer;
        }
        .table th,
        .table td {
            padding: 1rem;
            vertical-align: top;
            border-top: 1px solid #e9ecef;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #e9ecef;
        }

        .table tbody+tbody {
            border-top: 2px solid #e9ecef;
        }

        .table .table {
            background-color: #f8f9fe;
        }

        .table-dark,
        .table-dark>th,
        .table-dark>td {
            background-color: #c1c2c3;
        }

        .table .thead-dark th {
            color: #f8f9fe;
            border-color: #1f3a68;
            background-color: #172b4d;
        }

        .table .thead-light th {
            color: #8898aa;
            border-color: #e9ecef;
            background-color: #f6f9fc;
        }

        .table-dark {
            color: #f8f9fe;
            background-color: #172b4d;
        }

        .table-dark th,
        .table-dark td,
        .table-dark thead th {
            border-color: #1f3a68;
        }

        .table-responsive {
            display: block;
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .btn {
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5;
            display: inline-block;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            border: 1px solid transparent;
            border-radius: .375rem;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }

        .btn:hover,
        .btn:focus {
            text-decoration: none;
        }





        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }



        a.btn.disabled {
            pointer-events: none;
        }

        .btn-sm {
            font-size: .875rem;
            line-height: 1.5;
            padding: .25rem .5rem;
            border-radius: .375rem;
        }




        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            border-radius: .375rem;
        }

        .page-link {
            line-height: 1.25;
            position: relative;
            display: block;
            margin-left: -1px;
            padding: .5rem .75rem;
            color: #8898aa;
            border: 1px solid #dee2e6;
            background-color: #fff;
        }

        .page-link:hover {
            z-index: 2;
            text-decoration: none;
            color: #8898aa;
            border-color: #dee2e6;
            background-color: #dee2e6;
        }

        .page-link:focus {
            z-index: 2;
            outline: 0;
            box-shadow: none;
        }

        .page-link:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        .page-item:first-child .page-link {
            margin-left: 0;
            border-top-left-radius: .375rem;
            border-bottom-left-radius: .375rem;
        }

        .page-item:last-child .page-link {
            border-top-right-radius: .375rem;
            border-bottom-right-radius: .375rem;
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            border-color: #5e72e4;
            background-color: #5e72e4;
        }

        .page-item.disabled .page-link {
            cursor: auto;
            pointer-events: none;
            color: #8898aa;
            border-color: #dee2e6;
            background-color: #fff;
        }

        .badge {
            font-size: 66%;
            font-weight: 600;
            line-height: 1;
            display: inline-block;
            padding: .35rem .375rem;
            text-align: center;
            vertical-align: baseline;
            white-space: nowrap;
            border-radius: .375rem;
        }

        .badge:empty {
            display: none;
        }

        .btn .badge {
            position: relative;
            top: -1px;
        }

        @keyframes progress-bar-stripes {
            from {
                background-position: 1rem 0;
            }

            to {
                background-position: 0 0;
            }
        }

        .progress {
            font-size: .75rem;
            display: flex;
            overflow: hidden;
            height: 1rem;
            border-radius: .375rem;
            background-color: #e9ecef;
            box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
        }

        .progress-bar {
            display: flex;
            flex-direction: column;
            transition: width .6s ease;
            text-align: center;
            white-space: nowrap;
            color: #fff;
            background-color: #5e72e4;
            justify-content: center;
        }

        @media screen and (prefers-reduced-motion: reduce) {
            .progress-bar {
                transition: none;
            }
        }

        .media {
            display: flex;
            align-items: flex-start;
        }

        .media-body {
            flex: 1 1;
        }

        .tooltip {
            font-family: Open Sans, sans-serif;
            font-size: .875rem;
            font-weight: 400;
            font-style: normal;
            line-height: 1.5;
            position: absolute;
            z-index: 1070;
            display: block;
            margin: 0;
            text-align: left;
            text-align: start;
            white-space: normal;
            text-decoration: none;
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            word-wrap: break-word;
            word-break: normal;
            opacity: 0;
            text-shadow: none;
            line-break: auto;
        }

        .tooltip.show {
            opacity: .9;
        }

        .tooltip .arrow {
            position: absolute;

            display: block;

            width: .8rem;
            height: .4rem;
        }

        .tooltip .arrow::before {
            position: absolute;

            content: '';

            border-style: solid;
            border-color: transparent;
        }

        .bs-tooltip-top,
        .bs-tooltip-auto[x-placement^='top'] {
            padding: .4rem 0;
        }

        .bs-tooltip-top .arrow,
        .bs-tooltip-auto[x-placement^='top'] .arrow {
            bottom: 0;
        }

        .bs-tooltip-top .arrow::before,
        .bs-tooltip-auto[x-placement^='top'] .arrow::before {
            top: 0;

            border-width: .4rem .4rem 0;
            border-top-color: #000;
        }

        .bs-tooltip-right,
        .bs-tooltip-auto[x-placement^='right'] {
            padding: 0 .4rem;
        }

        .bs-tooltip-right .arrow,
        .bs-tooltip-auto[x-placement^='right'] .arrow {
            left: 0;

            width: .4rem;
            height: .8rem;
        }

        .bs-tooltip-right .arrow::before,
        .bs-tooltip-auto[x-placement^='right'] .arrow::before {
            right: 0;

            border-width: .4rem .4rem .4rem 0;
            border-right-color: #000;
        }

        .bs-tooltip-bottom,
        .bs-tooltip-auto[x-placement^='bottom'] {
            padding: .4rem 0;
        }

        .bs-tooltip-bottom .arrow,
        .bs-tooltip-auto[x-placement^='bottom'] .arrow {
            top: 0;
        }

        .bs-tooltip-bottom .arrow::before,
        .bs-tooltip-auto[x-placement^='bottom'] .arrow::before {
            bottom: 0;

            border-width: 0 .4rem .4rem;
            border-bottom-color: #000;
        }

        .bs-tooltip-left,
        .bs-tooltip-auto[x-placement^='left'] {
            padding: 0 .4rem;
        }

        .bs-tooltip-left .arrow,
        .bs-tooltip-auto[x-placement^='left'] .arrow {
            right: 0;

            width: .4rem;
            height: .8rem;
        }

        .bs-tooltip-left .arrow::before,
        .bs-tooltip-auto[x-placement^='left'] .arrow::before {
            left: 0;

            border-width: .4rem 0 .4rem .4rem;
            border-left-color: #000;
        }

        .tooltip-inner {
            max-width: 200px;
            padding: .25rem .5rem;

            text-align: center;

            color: #fff;
            border-radius: .375rem;
            background-color: #000;
        }

        .bg-success {
            background-color: #2dce89 !important;
        }

        a.bg-success:hover,
        a.bg-success:focus,
        button.bg-success:hover,
        button.bg-success:focus {
            background-color: #24a46d !important;
        }

        .bg-info {
            background-color: #11cdef !important;
        }

        a.bg-info:hover,
        a.bg-info:focus,
        button.bg-info:hover,
        button.bg-info:focus {
            background-color: #0da5c0 !important;
        }

        .bg-warning {
            background-color: #fb6340 !important;
        }

        a.bg-warning:hover,
        a.bg-warning:focus,
        button.bg-warning:hover,
        button.bg-warning:focus {
            background-color: #fa3a0e !important;
        }

        .bg-danger {
            background-color: #f5365c !important;
        }

        a.bg-danger:hover,
        a.bg-danger:focus,
        button.bg-danger:hover,
        button.bg-danger:focus {
            background-color: #ec0c38 !important;
        }

        .bg-default {
            background-color: #172b4d !important;
        }

        a.bg-default:hover,
        a.bg-default:focus,
        button.bg-default:hover,
        button.bg-default:focus {
            background-color: #0b1526 !important;
        }

        .bg-transparent {
            background-color: transparent !important;
        }

        .border-0 {
            border: 0 !important;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .d-flex {
            display: flex !important;
        }

        .justify-content-end {
            justify-content: flex-end !important;
        }

        .align-items-center {
            align-items: center !important;
        }

        @media (min-width: 1200px) {

            .justify-content-xl-between {
                justify-content: space-between !important;
            }
        }

        .sr-only {
            position: absolute;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            width: 1px;
            height: 1px;
            padding: 0;
            white-space: nowrap;
            border: 0;
        }

        .shadow {
            box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
        }

        .mb-0 {
            margin-bottom: 0 !important;
        }

        .mr-2 {
            margin-right: .5rem !important;
        }

        .mr-3 {
            margin-right: 1rem !important;
        }

        .mr-4 {
            margin-right: 1.5rem !important;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .mb-5 {
            margin-bottom: 3rem !important;
        }

        .mt-7 {
            margin-top: 6rem !important;
        }

        .py-4 {
            padding-top: 1.5rem !important;
        }

        .py-4 {
            padding-bottom: 1.5rem !important;
        }

        .m-auto {
            margin: auto !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-white {
            color: #fff !important;
        }

        .text-light {
            color: #adb5bd !important;
        }

        a.text-light:hover,
        a.text-light:focus {
            color: #919ca6 !important;
        }

        .text-white {
            color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
            color: #e6e6e6 !important;
        }

        @media print {

            *,
            *::before,
            *::after {
                box-shadow: none !important;
                text-shadow: none !important;
            }

            a:not(.btn) {
                text-decoration: underline;
            }

            thead {
                display: table-header-group;
            }

            tr,
            img {
                page-break-inside: avoid;
            }

            p,
            h2,
            h3 {
                orphans: 3;
                widows: 3;
            }

            h2,
            h3 {
                page-break-after: avoid;
            }

            @ page {
                size: a3;
            }

            body {
                min-width: 992px !important;
            }

            .container {
                min-width: 992px !important;
            }

            .badge {
                border: 1px solid #000;
            }

            .table {
                border-collapse: collapse !important;
            }

            .table td,
            .table th {
                background-color: #fff !important;
            }

            .table-dark {
                color: inherit;
            }

            .table-dark th,
            .table-dark td,
            .table-dark thead th,
            .table-dark tbody+tbody {
                border-color: #e9ecef;
            }

            .table .thead-dark th {
                color: inherit;
                border-color: #e9ecef;
            }
        }

        figcaption,
        main {
            display: block;
        }

        main {
            overflow: hidden;
        }

        @keyframes floating-lg {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes floating-sm {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        [class*='shadow'] {
            transition: all .15s ease;
        }

        .text-sm {
            font-size: .875rem !important;
        }

        .text-white {
            color: #fff !important;
        }

        a.text-white:hover,
        a.text-white:focus {
            color: #e6e6e6 !important;
        }

        .text-light {
            color: #ced4da !important;
        }

        a.text-light:hover,
        a.text-light:focus {
            color: #b1bbc4 !important;
        }

        .avatar {
            font-size: 1rem;
            display: inline-flex;
            width: 48px;
            height: 48px;
            color: #fff;
            border-radius: 50%;
            background-color: #adb5bd;
            align-items: center;
            justify-content: center;
        }

        .avatar img {
            width: 100%;
            border-radius: 50%;
        }

        .avatar-sm {
            font-size: .875rem;
            width: 36px;
            height: 36px;
        }

        .avatar-group .avatar {
            position: relative;
            z-index: 2;
            border: 2px solid #fff;
        }

        .avatar-group .avatar:hover {
            z-index: 3;
        }

        .avatar-group .avatar+.avatar {
            margin-left: -1rem;
        }

        .badge {
            text-transform: uppercase;
        }

        .badge a {
            color: #fff;
        }

        .btn .badge:not(:first-child) {
            margin-left: .5rem;
        }

        .btn .badge:not(:last-child) {
            margin-right: .5rem;
        }

        .badge-dot {
            font-size: .875rem;
            font-weight: 400;
            padding-right: 0;
            padding-left: 0;
            text-transform: none;
            background: transparent;
        }

        .badge-dot strong {
            color: #32325d;
        }

        .badge-dot i {
            display: inline-block;
            width: .375rem;
            height: .375rem;
            margin-right: .375rem;
            vertical-align: middle;
            border-radius: 50%;
        }

        .btn {
            font-size: .875rem;
            position: relative;
            transition: all .15s ease;
            letter-spacing: .025em;
            text-transform: none;
            will-change: transform;
        }


        .btn:not(:last-child) {
            margin-right: .5rem;
        }

        .btn i:not(:first-child) {
            margin-left: .5rem;
        }

        .btn i:not(:last-child) {
            margin-right: .5rem;
        }

        .btn-sm {
            font-size: .75rem;
        }

        [class*='btn-outline-'] {
            border-width: 1px;
        }

        .btn-icon-only {
            width: 2.375rem;
            height: 2.375rem;
            padding: 0;
        }

        a.btn-icon-only {
            line-height: 2.5;
        }

        .btn-icon-only.btn-sm {
            width: 2rem;
            height: 2rem;
        }

        .main-content {
            position: relative;
        }

        .dropdown {
            display: inline-block;
        }

        .dropdown-menu {
            min-width: 12rem;
        }

        .dropdown-menu.show {
            display: block;
        }


        .dropdown-menu .dropdown-item {
            font-size: .875rem;
            padding: .5rem 1rem;
        }

        .dropdown-menu .dropdown-item>i {
            font-size: 1rem;
            margin-right: 1rem;
            vertical-align: -17%;
        }

        .dropdown-menu a.media>div:first-child {
            line-height: 1;
        }

        .dropdown-menu a.media p {
            color: #8898aa;
        }

        .dropdown-menu a.media:hover p {
            color: #172b4d !important;
        }

        .footer {
            padding: 2.5rem 0;
            background: #f7fafc;
        }

        .footer .copyright {
            font-size: .875rem;
        }

        @media (min-width: 768px) {

            @ keyframes show-navbar-dropdown {
                0% {
                    transition: visibility .25s, opacity .25s, transform .25s;
                    transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
                    opacity: 0;
                }

                100% {
                    transform: translate(0, 0);
                    opacity: 1;
                }
            }

            @keyframes hide-navbar-dropdown {
                from {
                    opacity: 1;
                }

                to {
                    transform: translate(0, 10px);
                    opacity: 0;
                }
            }
        }

        @keyframes show-navbar-collapse {
            0% {
                transform: scale(.95);
                transform-origin: 100% 0;
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes hide-navbar-collapse {
            from {
                transform: scale(1);
                transform-origin: 100% 0;
                opacity: 1;
            }

            to {
                transform: scale(.95);
                opacity: 0;
            }
        }

        .page-item.active .page-link {
            box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
        }

        .page-item .page-link,
        .page-item span {
            font-size: .875rem;
            display: flex;
            width: 36px;
            height: 36px;
            margin: 0 3px;
            padding: 0;
            border-radius: 50% !important;
            align-items: center;
            justify-content: center;
        }

        .progress {
            overflow: hidden;
            height: 8px;
            margin-bottom: 1rem;
            border-radius: .25rem;
            background-color: #e9ecef;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
        }

        .progress .sr-only {
            font-size: 13px;
            line-height: 20px;
            left: 0;
            clip: auto;
            width: auto;
            height: 20px;
            margin: 0 0 0 30px;
        }

        .progress-bar {
            height: auto;
            border-radius: 0;
            box-shadow: none;
        }

        .table thead th {
            font-size: .65rem;
            padding-top: .75rem;
            padding-bottom: .75rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 1px solid #e9ecef;
        }

        .table th {
            font-weight: 600;
        }

        .table td .progress {
            width: 120px;
            height: 3px;
            margin: 0;
        }

        .table td,
        .table th {
            font-size: .8125rem;
            white-space: nowrap;
        }

        .table.align-items-center td,
        .table.align-items-center th {
            vertical-align: middle;
        }

        .table .thead-dark th {
            color: #4d7bca;
            background-color: #1c345d;
        }

        .table .thead-light th {
            color: #8898aa;
            background-color: #f6f9fc;
        }

        .table-flush td,
        .table-flush th {
            border-right: 0;
            border-left: 0;
        }

        .table-flush tbody tr:first-child td,
        .table-flush tbody tr:first-child th {
            border-top: 0;
        }

        .table-flush tbody tr:last-child td,
        .table-flush tbody tr:last-child th {
            border-bottom: 0;
        }

        .card .table {
            margin-bottom: 0;
        }

        .card .table td,
        .card .table th {
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }

        p {
            font-size: 1rem;
            font-weight: 300;
            line-height: 1.7;
        }

        @media (max-width: 768px) {
            .btn {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark p-2">
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <a class="navbar-brand">ProSM</a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                    </form>

                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        {{-- <div class="sb-sidenav-menu-heading">Management</div> --}}
                        <a id="plantsitem" class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapsePlants" aria-expanded="false" aria-controls="collapsePlants">

                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                             Plants
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                       <div class="collapse" id="collapsePlants" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                {{--  <a class="nav-link" href="{{ route('add.plant') }}">New Product</a>
                                <a class="nav-link" href="{{ route('available.plants') }}">Available Products</a>
                                 --}}
                                 <a class="nav-link" href="{{ route('all.plant') }}">Plant List</a>                            </nav>
                        </div>
                        {{-- <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Products
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseProducts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('add.product') }}">New Product</a>
                                <a class="nav-link" href="{{ route('all.product') }}">Stock Report</a>
                                <a class="nav-link" href="{{ route('available.products') }}">Available Products</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseOrders" aria-expanded="false" aria-controls="collapseOrders">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Orders
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('new.order') }}">New Order</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('all.orders') }}">Orders List</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('pending.orders') }}">Pending Orders</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseOrders" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('delivered.orders') }}">Delivered Orders</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseInvoice" aria-expanded="false" aria-controls="collapseInvoice">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sales
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseInvoice" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('new.invoice') }}">New Invoice</a>
                                <a class="nav-link" href="{{ route('all.invoices') }}">Invoices List</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                            data-target="#collapseAuthentication" aria-expanded="false"
                            aria-controls="collapseAuthentication">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Customers
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseAuthentication" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('add.customer') }}">New Customer</a>
                            </nav>
                        </div>
                        <div class="collapse" id="collapseAuthentication" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('all.customers') }}">Customers List</a>
                            </nav>
                        </div> --}}



                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">

            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright 2024 &copy; Profentic
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend') }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="{{ asset('backend') }}/assets/demo/datatables-demo.js"></script>  -->
    <!--
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

    @yield('script')
</body>

</html>
