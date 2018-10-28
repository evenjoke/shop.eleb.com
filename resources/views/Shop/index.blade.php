@extends('Layout.default')

@section('contents')
    <table class="table table-bordered table-striped">
        <tr>
            <th>商铺ID</th>
            <th>分类</th>
            <th>名称</th>
            <th>图片</th>
            <th>评分</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>是否为品牌</th>
            <th>是否准时</th>
            <th>是否为蜂鸟配送</th>
            <th>是否有保标记 </th>
            <th>是否有票标记</th>
            <th>是否有准标记</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($shops as $shop)
            <tr>
                <td>{{ $shop->id }}</td>
                <td>{{ $shop->shop_category_id }}</td>
                <td>{{ $shop->shop_name }}</td>
                <td>@if($shop->shop_img) <img class="img-circle" src="{{ Illuminate\Support\Facades\Storage::url($shop->shop_img)}}"/> @endif </td>
                <td>{{ $shop->shop_rating }}</td>
                <td>{{ $shop->start_send }}</td>
                <td>{{ $shop->send_cost }}</td>
                <td>{{ $shop->notice }}</td>
                <td>{{ $shop->discount }}</td>
                <td>{{$shop->brand ? "是" : "否"}}</td>
                <td>{{$shop->on_time ? "是" : "否"}}</td>
                <td>{{$shop->fengniao ? "是" : "否"}}</td>
                <td>{{$shop->bao ? "是" : "否"}}</td>
                <td>{{$shop->piao ? "是" : "否"}}</td>
                <td>{{$shop->zhun ? "是" : "否"}}</td>
                <td>@if($shop->status==1)
                        使用中
                    @elseif($shop->status==0)
                        等待审核
                    @else
                        禁用
                    @endif
                </td>
                <td>
                    <a href="{{route('shop.edit',[ $shop->id] )}}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{route('shop.destroy',[$shop->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $shops->links() }}
@endsection