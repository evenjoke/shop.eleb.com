@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" action="{{ route('shop.store') }}" enctype="multipart/form-data">
        <div class="form-group" >
            <h3>账号</h3>
            <label>商户名称</label>
                <input type="text" name="name" class="form-control" placeholder="请随意" value="{{ old('name') }}">
            <label>邮箱</label>
                <input type="email" name="email" class="form-control" placeholder="使用163或qq邮箱注册" value="{{ old('shop_name') }}">
            <label>密码 </label>
                <input type="password" name="password" class="form-control" placeholder="请随意" value="{{ old('password') }}">
            <label >确认密码</label>
                <input type="password" name="re_password" class="form-control " placeholder="两次密码需要一致" value="{{ old('re_password') }}">
            <label>所属商家</label>
            <select name="shop_id"  class="form-control">
                @foreach($shops as $shop)
                    <option value="{{$shop->id}}" selected="selected" >{{ $shop->shop_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" >
            <h3>商家信息</h3>
            <label>商家分类</label>
            <select name="shop_category_id"  class="form-control">
            @foreach($shopCategorys as $shopCategory)
               <option value="{{$shopCategory->id}}"  selected="selected"  >{{$shopCategory->name}}</option>
            @endforeach
            </select>
            <label >商家名称</label>
                <input type="text"  name="shop_name" value="{{old('shop_name') }}" class="form-control" placeholder="填写商铺名称">
            <label >店铺图片</label>
                <input type="file" name="shop_img" >
            <label>评分</label>
                <input type="text" name="shop_rating" value="0.00" selected="selected">
            <label>起送金额</label>
                <input type="text" name="start_send" value="{{old('start_send')}}">
            <label>配送费</label>
                <input type="text" name="send_cost" value="{{old('send_cost')}}">
            <label>店公告</label>
                <input type="text" name="notice" value="{{ old('notice') }}">
            <label>优惠信息</label>
                <input type="text" name="discount" value="{{ old('discount') }}">
            <label>
                <input type="checkbox" name="brand" value="1"
                       @if(old('brand'))
                       selected ="selected"
                        @endif>品牌
            </label>
            <label>
                <input type="checkbox" name="on_time" value="1"
                       @if(old('on_time'))
                       selected="selected"
                        @endif>准时
            </label>
            <label>
                <input type="checkbox" name="fengniao" value="1"
                       @if(old('fengniao'))
                       selected="selected"
                        @endif>蜂鸟配送
            </label>
            <label>
                <input type="checkbox" name="bao" value="1"
                       @if(old('bao'))
                       selected="selected"
                        @endif>保标记
            </label>
            <label>
                <input type="checkbox" name="piao" value="1"
                       @if(old('piao'))
                       selected="selected"
                        @endif>票标记
            </label>
            <label>
                <input type="checkbox" name="zhun" value="1"
                       @if(old('zhun'))
                       selected="selected"
                        @endif>准标记
            </label>
        </div>
        {{ csrf_field() }}
        <button type="submit" style="float:left" class="btn btn-primary btn-block">注册</button>
    </form>

@stop