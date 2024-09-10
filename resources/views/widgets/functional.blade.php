<style>
    .functional-body {

    }
    .functional-panel {
        padding: 10px 20px;
        margin-bottom: 50px;
    }

    .functional-box .title {
        margin-bottom: 16px;
        font-size: 2rem;
        color: #333;
        font-weight: 500;
    }

    .functional-box .description-item {
        font-size: 1rem;
        color: #565656;
        font-weight: 400;
        line-height: 30px;
    }

    .functional-box .description-item .bold {
        color: #333;
        font-weight: 500;
    }
</style>
<div class="functional-box">
    <div class="functional-body" style="@if(!empty($boxColor)) background-color:{{$boxColor}}; @endif">
        @foreach($items as $key => $item)
            <div class="functional-panel {{$item['round']}} {{$item['shadow']}}" style=" @if(!empty($item['bgcolor'])) background-color:{{$item['bgcolor']}}; @endif">
                <div class="row">
                    @if($item['rsort'])
                        <div class="col-md-6">
                            <div class="img">
                                <img src="{{$item['img']}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="content">
                                <div class="title">
                                    {!! $item['title'] !!}
                                </div>
                                <div class="description">
                                    {!! $item['content'] !!}
                                </div>
                                @if(!empty($item['btn']['txt']))
                                    <a href="{{$item['btn']['href']}}" class="btn {{$item['btn']['style']}}" target="_blank">{{$item['btn']['txt']}}</a>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <div class="content">
                                <div class="title">
                                    {!! $item['title'] !!}
                                </div>
                                <div class="description">
                                    {!! $item['content'] !!}
                                </div>
                                @if(!empty($item['btn']['txt']))
                                    <a href="{{$item['btn']['href']}}" class="btn {{$item['btn']['style']}}" target="_blank">{{$item['btn']['txt']}}</a>
                                @endif
                            </div>
                                {{--<a href="#" class="btn btn-primary grid-refresh btn-mini" rel="nofollow"
                                   target="_blank">免费试用</a></div>--}}
                        </div>
                        <div class="col-md-6">
                            <div class="img">
                                <img src="{{$item['img']}}" alt="">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        @endforeach
    </div>


    {{--<div class="card">
        <div class="card-body">

        <div>
    </div>--}}

</div>


<script require="@ycookies.multi-widgets">
    $('.extension-demo').extensionDemo();
</script>
