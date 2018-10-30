@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <form method="post" style="width:80%" action="{{ route('menu_category.store') }}" >
        <div class="form-group">
            <label>分类名
            <input type="text" name="name" class="form-control" value="{{old('goods_name')}}">
            </label>
        </div>
        <div class="form-group">
            <label >菜品名</label>

                @foreach($menus as $menu)
                     <lable>
                    <input type="checkbox" name="type_accumulation[]" value="{{$menu->id}}"
                           @if(old('type_accumulation'))
                           selected="selected"
                            @endif>{{$menu->goods_name}}
                     </lable>
                @endforeach

        </div>
        <div class="form-group">
            <label>所属商家 </label>
            <select name="shop_id"  class="form-control">
                @foreach($shops as $shop)
                    <option value="{{$shop->id}}" selected="selected" >{{ $shop->shop_name }}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label>描述
            <input type="text" name="description" value="{{old('description')}}">
            </label>
        </div>
        <div class="form-group">
            <label>是否是默认分类</label>
            <input type="radio" name="is_selected" value="1"
                   @if(old('is_selected'))
                   selected="selected"
                    @endif>是
            <input type="radio" name="is_selected" value="0"
                   @if(old('is_selected'))
                   selected="selected"
                    @endif>否
        </div>
        {{ csrf_field() }}
        <button type="submit" style="float:left" class="btn btn-primary btn-block">确认新增</button>
    </form>

@stop