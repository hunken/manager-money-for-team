@extends("backend.master")
@section("panel-content")
<!--Form Add User-->

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('users.add')}} <small> {{trans('users.system_account')}}</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <form class="form-horizontal form-label-left" validate method="POST" action='' novalidate>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('users.name')}} <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='{{old('username')}}' id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1,1" name="username" placeholder="{{trans('users.input_account')}}" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">{{trans('users.fullname')}}
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value='{{old('fullname')}}' id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="fullname" placeholder="{{trans('users.input_name')}}" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">{{trans('users.email')}} <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value='{{old('email')}}'>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">{{trans('users.password')}} <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" name="password" data-validate-length="6" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('users.retype_password')}}<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="permission" class="control-label col-md-3 col-sm-3 col-xs-12">{{trans('users.select_role')}}  <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12"><select class="form-control" name="permission">
                                <option value="0">{{trans('users.internship')}} </option>
                                <option  value="30">{{trans('users.staff')}}</option>
                                <option  value="60">{{trans('users.manager')}} </option>
                                @if(Auth::user()->role>80)
                                <option  value="90" >{{trans('users.admin')}}</option>
                                <option  value="100">{{trans('users.super_admin')}}</option>
                                @endif
                            </select>
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
                            <button id="send" type="submit" class="btn btn-success">{{trans('main.send')}}</button>
                            <button type="submit" class="btn btn-primary">{{trans('main.reset')}}</button>
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