<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <!-- Fonts -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('lib/bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('lib/font-awesome/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/lib/iCheck/skins/flat/green.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/template.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/lib/zebra_dialog/dist/css/flat/zebra_dialog.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/lib/jbox/jBox.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/lib/datetimepicker/jquery.datetimepicker.css')}}" rel="stylesheet" type="text/css">
    @yield('custom-header')
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet" type='text/css'>
    {{--<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>--}}
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet">
    <link href="{{asset('/lib/font-awesome/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/backend/media/media.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/css/dashboard.min.css')}}" rel="stylesheet" type="text/css">
    <meta id="csrf-token" name="csrf-token" value="{{ csrf_token() }}">
    <script type="text/javascript">
        // rename myToken as you like
        window.TD_Framework = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'user'      => Auth::user()->name,
            'base_url'  => env('APP_URL')
        ])
        ;?>
    </script>

</head>