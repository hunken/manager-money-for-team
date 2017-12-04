@extends("backend.master")
@section("panel-content")
<!-- page content -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{trans('users.user_list')}} <small> {{trans('users.system_account')}}</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <a href="../../dashboard/user?action=add" class="btn btn-default">{{trans('users.add')}}</a>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="datatable-responsive" class="jambo_table table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>{{trans('users.number')}}</th>
                            <th>{{trans('users.account')}}</th>
                            <th>{{trans('users.fullname')}}</th>
                            <th>{{trans('users.email')}}</th>
                            <th>{{trans('users.permission')}}</th>
                            <th>{{trans('users.created_date')}}</th>
                            @if(Auth::user()->role >50)
                            <th>{{trans('main.action')}}</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class='username-data'>{{$user->user}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->created}}</td>
                            @if(Auth::user()->role > 50)
                            <td>
                                <a href=".../../user/edit?id={{$user->user}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{trans('main.edit')}}</a>
                                <a href=".../../user/remove?id={{$user->user}}" class="remove-user btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> {{trans('main.delete')}} </a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
