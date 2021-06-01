<?php if (!isset($_SESSION)) session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesan Makan</title>
    <link rel="icon" href="http://localhost/pesan-makan/assets/favicon.png" type="image/png" />
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <style>
        li>ul {
            transform: translatex(100%) scale(0)
        }

        li:hover>ul {
            transform: translatex(101%) scale(1)
        }

        li>button svg {
            transform: rotate(-90deg)
        }

        li:hover>button svg {
            transform: rotate(-270deg)
        }

        .group:hover .group-hover\:scale-100 {
            transform: scale(1)
        }

        .group:hover .group-hover\:-rotate-180 {
            transform: rotate(180deg)
        }

        .scale-0 {
            transform: scale(0)
        }

        .min-w-32 {
            min-width: 8rem
        }

        .link,
        .order-menu-item-delete {
            color: #ff9800;
            transition: 0.5 ease !important;
        }

        .link:hover,
        .order-menu-item-delete:hover {
            color: #ef6c00;
            cursor: pointer;
        }

        .item-link:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto"></nav>
            <a class="link flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0" href="index.php">
                <img class="ml-3" src="http://localhost/pesan-makan/assets/favicon.png" /><span class="ml-1 text-xl font-bold">Pesan Makan</span>
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0"></div>
        </div>
    </header>