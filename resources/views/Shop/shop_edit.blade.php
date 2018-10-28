@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" action="{{ route('shop.shop_update',[$shop]) }}" enctype="multipart/form-data">
            <div class="form-group" >
                <h3>商家信息</h3>
                <label>商家分类</label>
               {{-- <select name="shop_category_id"  class="form-control">
                    @foreach($shopCategorys as $shopCategory)
                        <option value="{{$shopCategory->id}}"  selected="selected"  >{{$shopCategory->name}}</option>
                    @endforeach
                </select>--}}
                <label >商家名称</label>
                <input type="text"  name="shop_name" value="{{$shop->shop_name}}" class="form-control" placeholder="填写商铺名称">
                <label >店铺图片</label>
                @if($shop->shop_img) <img class="img-circle" src="{{ Illuminate\Support\Facades\Storage::url($shop->shop_img)}}"/> @endif
                <input type="file" name="shop_img" >
                <label>评分</label>
                <input type="text" name="shop_rating" value="{{$shop->shop_rating}}" selected="selected">
                <label>起送金额</label>
                <input type="text" name="start_send" value="{{$shop->start_send}}">
                <label>配送费</label>
                <input type="text" name="send_cost" value="{{$shop->send_cost}}">
                <label>店公告</label>
                <input type="text" name="notice" value="{{ $shop->notice }}">
                <label>优惠信息</label>
                <input type="text" name="discount" value="{{ $shop->discount }}">
                <label>
                    <input type="checkbox" name="brand" value="1"
                           @if($shop->brand)
                           checked ="checked"
                           @endif
                           >品牌
                </label>
                <label>
                    <input type="checkbox" name="on_time" value="1"
                           @if($shop->on_time)
                           checked ="checked"
                            @endif>准时
                </label>
                <label>
                    <input type="checkbox" name="fengniao" value="1"
                           @if($shop->fengniao)
                           checked ="checked"
                            @endif>蜂鸟配送
                </label>
                <label>
                    <input type="checkbox" name="bao" value="1"
                           @if($shop->bao)
                          checked ="checked"
                            @endif>保标记
                </label>
                <label>
                    <input type="checkbox" name="piao" value="1"
                           @if($shop->piao)
                           checked ="checked"
                            @endif>票标记
                </label>
                <label>
                    <input type="checkbox" name="zhun" value="1"
                           @if($shop->zhun)
                            checked ="checked" 
                            @endif>准标记
                </label>
            </div>
            {{ csrf_field() }}
             {{ method_field('PUT')}}
            <button type="submit" style="float:left" class="btn btn-primary btn-block">确认修改</button>
    </form>

@stop