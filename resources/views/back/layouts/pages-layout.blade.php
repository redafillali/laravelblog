<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>@yield('pageTitle')</title>
        <base href="/">
        <!-- CSS files -->
        <link href="./back/dist/css/tabler.min.css" rel="stylesheet" />
        <link href="./back/dist/css/tabler-flags.min.css" rel="stylesheet" />
        <link href="./back/dist/css/tabler-payments.min.css" rel="stylesheet" />
        <link href="./back/dist/css/tabler-vendors.min.css" rel="stylesheet" />
        @stack('stylesheets')
        <link href="./back/dist/css/demo.min.css" rel="stylesheet" />
    </head>

    <body>
        <div class="wrapper">
            @include('back.partials.sidebar')
            @yield('content')
        </div>
        @include('back.partials.footer')
    </body>

</html>
