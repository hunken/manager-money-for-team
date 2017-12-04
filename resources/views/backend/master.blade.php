<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('backend.head')

<body class="{{ $is_login or 'nav-md'}}">
    <div class="container body ">
        <div class="main_container">
            @include('backend.sidebar')
            <div class="top_nav">
                @include("backend.topbar")
            </div>
            <!-- page content -->
            <div class="right_col" role="main">
                @yield("panel-content")
            </div>
        </div>
    </div>
@include('backend.footer')
</body>
</html>