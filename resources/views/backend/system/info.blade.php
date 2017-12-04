@extends("backend.master")
@section("panel-content")
<!-- Include top bar-->
<style type="text/css">
    #phpinfo {}
    #phpinfo pre {}
    #phpinfo a:link {}
    #phpinfo a:hover {}
    #phpinfo table {}
    #phpinfo .center {}
    #phpinfo .center table {}
    #phpinfo .center th {}
    #phpinfo td, th {}
    #phpinfo h1 {}
    #phpinfo h2 {}
    #phpinfo .p {}
    #phpinfo .e {
        font-weight: bold;
        width: 300px;
        display: block;
    }
    #phpinfo .h {}
    #phpinfo .v {min-width: 300px;    word-break: break-word;}
    #phpinfo .vr {}
    #phpinfo img {}
    #phpinfo hr {}
</style>
<div id='phpinfo'>
    <?php
    ob_start();
    phpinfo();
    $pinfo = ob_get_contents();
    ob_end_clean();

    $pinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $pinfo);
    echo $pinfo;
    ?>
</div>
<!-- page content -->
@endsection