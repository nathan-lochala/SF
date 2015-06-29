<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{{ env('HEAD_TITLE') }}</title>
    <meta name="keywords" content="{{ env('HEAD_KEYWORDS') }}" />
    <meta name="description" content="{{ env('HEAD_DESCRIPTION') }}">
    <meta name="author" content="{{ env('HEAD_AUTHOR') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css') }}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css') }}">

    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Glyphicons Pro CSS(font) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/glyphicons-pro/glyphicons-pro.css') }}">

    <!-- Icomoon CSS(font) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/icomoon/icomoon.css') }}">

    <!-- Iconsweets CSS(font) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/iconsweets/iconsweets.css') }}">

    <!-- Octicons CSS(font) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/octicons/octicons.css') }}">

    <!-- Stateface CSS(font) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/stateface/stateface.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ url('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
    <![endif]-->

</head>