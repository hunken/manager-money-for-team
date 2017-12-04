@extends("backend.master")
@section("panel-content")
<div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Nhật ký hoạt động<small>Người dùng</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <ul class="list-unstyled timeline">
                @foreach($activities as $activity)
                <li>
                    <div class="block">
                        <div class="tags">
                            <a href="" class="tag">
                                <span>Entertainment</span>
                            </a>
                        </div>
                        <div class="block_content">
                            <h2 class="title">
                                <a>{{$activity->priority}}</a>
                            </h2>
                            <div class="byline">
                                <span>13 hours ago</span> bởi <a>{{$activity->fullname}}</a>
                            </div>
                            <p class="excerpt">{{$activity->log}}
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
