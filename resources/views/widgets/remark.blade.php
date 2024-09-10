<style>
    .popover .popover-header{
        color:#000000 !important;
    }
</style>
<div class="remark-box" id="{{$id}}">
    <i class="{{ $icon }}" data-toggle="popover"  @if(!empty($title)) title="{{$title}}" @endif data-placement="{{$placement}}" data-content="{!! $content !!}"></i>
{{--
    <button type="button" class="btn btn-lg btn-danger" data-toggle="popover"  @if(!empty($title)) title="{{$title}}" @endif data-placement="{{$placement}}" data-content="{!! $content !!}">提示</button>
--}}
</div>
<script>
    $(function () {
        $('[data-toggle="popover"]').popover()
    })
</script>