@extends("backend.master")
@section("panel-content")
<!--Form Add User-->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('users.update')}}  <small> {{trans('users.system_account')}} </small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form class="form-horizontal form-label-left" validate method="POST" action='' novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('users.name')}} <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled value='{{Auth::user()->username}}' id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1,1" name="username" placeholder="Nhập tài khoản" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('users.fullname')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='{{Auth::user()->fullname}}' id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="fullname" placeholder="Nhập tên đầy đủ" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">{{trans('users.email')}} <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{Auth::user()->email}}" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value='{{old('email')}}'>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">{{trans('users.password')}} <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" name="password" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('users.retype_password')}} <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    @if($errors->any())
                    <div class="error-bar">
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            <p class>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success">{{trans('main.update')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection


@section("js-include")
<script src="{{asset('lib/validator/validator.js')}}"></script>
@endsection