@if(!Auth::check())
        <!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Fonts -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
</head>
<style type="text/css">
    body {
        background-color: white;
    }

    #loginbox {
        margin-top: 30px;
    }

    #loginbox > div:first-child {
        padding-bottom: 10px;
    }

    .iconmelon {
        display: block;
        margin: auto;
    }

    #form > div {
        margin-bottom: 25px;
    }

    #form > div:last-child {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .panel {
        background-color: transparent;
    }

    .panel-body {
        padding-top: 30px;
        background-color: rgba(2555, 255, 255, .3);
    }

    #particles {
        width: 100%;
        height: 100%;
        overflow: hidden;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        position: absolute;
        z-index: -2;
    }

    .iconmelon,
    .im {
        position: relative;
        width: 150px;
        height: 150px;
        display: block;
        fill: #525151;
    }

    .iconmelon:after,
    .im:after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<body class='login'>
<div class="wrapper">
    <div class="container">
        <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="row">
                <div class="iconmelon">
                    <svg viewBox="0 0 32 32">
                        <g filter="">
                            <use xlink:href="/img/login.svg#git"></use>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title text-center">Create Account</div>
                </div>
                <div class="panel-body">
                    <form name="form" id="form" action="" class="form-horizontal" enctype="multipart/form-data"
                          method="POST">
                        <div>
                            <input type="text" class="form-control" placeholder="Account" required name="name"/>
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required name="email"/>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required
                                   name="password"/>
                        </div>
                        <div>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required placeholder="Password confirmation" required>

                        </div>
                        <div>
                            <input id="password-validate" type="password" class="form-control" name="password_validate" required placeholder="Validate" required>
                        </div>
                        {{--<input  type="checkbox"--}}
                                {{--name="is_female" id="is_female">--}}
                        {{--<label for="is_female">Is female ? </label>--}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i
                                        class="glyphicon glyphicon-log-in"></i> Log in
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        @if($errors->any())
                            <div class="error-bar">
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <p class>{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="particles"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{--<script src="https://www.google.com/recaptcha/api.js"></script>--}}
<script src="./lib/particleground/particleground.js"></script>
<script type="text/javascript">
    $(function () {
        $('#particles').particleground({
            minSpeedX: 0.1,
            maxSpeedX: 0.7,
            minSpeedY: 0.1,
            maxSpeedY: 0.7,
            directionX: 'center', // 'center', 'left' or 'right'. 'center' = dots bounce off edges
            directionY: 'center', // 'center', 'up' or 'down'. 'center' = dots bounce off edges
            density: 10000, // How many particles will be generated: one particle every n pixels
            dotColor: '#eee',
            lineColor: '#eee',
            particleRadius: 7, // Dot size
            lineWidth: 1,
            curvedLines: true,
            proximity: 100, // How close two dots need to be before they join
            parallax: false
        });
    });
</script>
</body>
</html>
@endif