<style>
    .card-widget .widget-user-username, .card-widget .widget-user-desc {
        color: #ffffff !important;
    }

    .card-widget .card-footer {
        margin: 0px !important;
    }

    .widget-user .card-footer {
        padding-top: 50px;
    }

    .card-widget .nav-link {
        padding: .5rem 1rem;
    }
</style>
<div class="card-widget-box">
    {{-- 风格1--}}
    @if($box_style == 1)
        @foreach($items as $key => $item)
            <div class="card card-widget widget-user-2 {{$shadow}}">
                <div class="widget-user-header bg-warning">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{$item['avatar']}}"
                             alt="User Avatar">
                    </div>

                    <h3 class="widget-user-username">{{$item['title']}}</h3>
                    <h5 class="widget-user-desc">{{$item['sub_title']}}</h5>
                </div>
                @if(!empty($item['nav_item']))
                    <div class="card-footer p-0">
                        <ul class="nav flex-column">
                            @foreach ($item['nav_item'] as $info)
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        {{$info['name'] ?? ''}} <span
                                                class="float-right badge {{$info['bg'] ?? 'bg-primary'}}">{{$info['num'] ?? ''}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    @endif

    {{-- 风格2--}}
    @if($box_style == 2)
            @foreach($items as $key => $item)
                <div class="card card-widget widget-user {{$shadow}}">
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{$item['title']}}</h3>
                        <h5 class="widget-user-desc">{{$item['sub_title']}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{$item['avatar']}}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            @foreach ($item['nav_item'] as $info)
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{$info['num'] ?? ''}}</h5>
                                    <span class="description-text">{{$info['name'] ?? ''}}</span>
                                </div>

                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
    @endif
    {{-- 风格3--}}
    @if($box_style == 3)
            @foreach($items as $key => $item)
                <div class="card card-widget widget-user {{$shadow}}">
                    <div class="widget-user-header text-white" @if(!empty($item['bg_img'])) style="background: url('{{$item['bg_img']}}') center center;" @endif>
                        <h3 class="widget-user-username text-right">{{$item['title']}}</h3>
                        <h5 class="widget-user-desc text-right">{{$item['sub_title']}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{$item['avatar']}}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            @foreach ($item['nav_item'] as $info)
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">{{$info['num'] ?? ''}}</h5>
                                        <span class="description-text">{{$info['name'] ?? ''}}</span>
                                    </div>

                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
    @endif
</div>
{{--<div class="row">
    <div class="col-md-4">


    </div>

    <div class="col-md-4">



    </div>

    <div class="col-md-4">

        <div class="card card-widget widget-user shadow-lg">

            <div class="widget-user-header text-white">
                <h3 class="widget-user-username text-right">极速开发 成就非凡</h3>
                <h5 class="widget-user-desc text-right">Web Admin 利刃</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="https://m.saishiyun.net/imgpic/work-photo.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">3,200</h5>
                            <span class="description-text">关注</span>
                        </div>

                    </div>

                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">13,000</h5>
                            <span class="description-text">粉丝</span>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header">35</h5>
                            <span class="description-text">视频</span>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>--}}

