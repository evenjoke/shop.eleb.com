@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" action="{{ route('menu.store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>菜品名</label>
            <input type="text" name="goods_name" class="form-control" value="{{old('goods_name')}}">
        </div>
        <div class="form-group">
            <label >菜品图片</label>
            <input type="file" name="goods_img" value="{{old('goods_img')}}">
        </div>
        <div class="form-group">
            <label>所属商家</label>
            <select name="shop_id"  class="form-control">
                @foreach($shops as $shop)
                    <option value="{{$shop->id}}" selected="selected" >{{ $shop->shop_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>所属分类</label>
            <select name="category_id"  class="form-control">
                @foreach($menuCategorys as $menuCategory)
                    <option value="{{$menuCategory->id}}" selected="selected" >{{ $menuCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>价格</label>
            <input type="text" name="goods_price" value="{{old('goods_price')}}" class="form-control" >
        </div>
        <div class="form-group">
            <label>描述</label>
            <input type="text" name="description" value="{{old('description')}}" class="form-control" >
        </div>
        <div class="form-group">
            <label>提示信息</label>
            <input type="text" name="tips" value="{{old('tips')}}" class="form-control" >
        </div>
        <div class="form-group">
            <label>状态</label>
            <select name="status"  class="form-control">
                    <option value="1" selected="selected" >上架</option>
                    <option value="0" >下架</option>
            </select>
        </div>
        {{ csrf_field() }}
        <button type="submit" style="float:left" class="btn btn-primary btn-block">确认新增</button>
    </form>

@stop