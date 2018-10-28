@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
<form method="post" style="width:80%" action="{{ route('shop.user_update',[$user]) }}" enctype="multipart/form-data">
        <div class="form-group" >
            <h3>账号</h3>
            <label>商户名称</label>
                <input type="text" name="name" class="form-control" placeholder="请随意" value="{{ $user->name }}">
            <label>邮箱</label>
                <input type="email" name="email" class="form-control" placeholder="使用163或qq邮箱注册" value="{{ $user->email}}">
            {{--<label>密码 </label>
                <input type="password" name="password" class="form-control" placeholder="请随意" value="{{ $user->password }}">
            <label >确认密码</label>
                <input type="password" name="re_password" class="form-control " placeholder="两次密码需要一致" value="{{ old('re_password') }}">--}}
            <label>所属商家</label>
            <input type="text" name="shop_id" value="{{$shop}}" class="form-control">
              {{--  <select name="shop_id"  class="form-control">
                    @foreach($shops as $shop)
                        <option value="{{$shop->id}}" selected="selected" >{{ $shop->shop_name }}</option>
                        <option value="{{$shop->id}}" selected="selected" >{{ $shop->shop_name }}</option>
                    @endforeach
                </select>--}}
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <button type="submit" style="float:left" class="btn btn-primary btn-block">确认修改</button>
    </form>
@stop