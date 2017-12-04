@extends("backend.master")
@section("title")
    WeMoney Dashboard
@endsection
@section("panel-content")
    <!-- page content -->
    <div class="x_panel preload submit-wemoney">
        <div class="preloader loading">
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
            <span class="slice"></span>
        </div>
        <div class="chartPreload">
            <div class="loader">
                <div class="cssload-loader">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
        <div class="content-dashboard">
            <div id="wemoney"></div>
        </div>
    </div>
@endsection