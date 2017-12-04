<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        @if(Auth::user()->money_added - Auth::user()->amount_to_pay  > 0)
            <img src="{{env('APP_URL')}}/img/user-haha.png" alt="..." class="img-circle profile_img">
        @else
            <img src="{{env('APP_URL')}}/img/user-cry.png" alt="..." class="img-circle profile_img">
        @endif
    </div>
    <div class="profile_info">
        <span>{{trans('main.welcome')}},</span>
        <h2>{{Auth::user()->name}}</h2>
    </div>
</div>
<!-- /menu profile quick info -->