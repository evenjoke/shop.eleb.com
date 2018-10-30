@extends('Layout.default')

@section('contents')

    <form method="get">
        名称<input type="text" name="name" value="{{old('name')}}">
        价格区间<input type="text" value="{{old('min_price')}}" name="min_price">————<input type="text" value="{{old('max_price')}}" name="max_price">
        <button type="submit"   class="btn btn-primary ">搜索</button>
    </form>







    <table class="table table-bordered table-striped ">
        <tr >

            <th>菜品编号</th>
            <th>菜品名</th>
            <th>图片</th>
            <th>评分</th>
            <th>所属商家</th>
            <th>所属分类</th>
            <th>价格</th>
            <th>描述</th>
            <th>月销量</th>
            <th>评分数量</th>
            <th>提示信息</th>
            <th>满意度数量</th>
            <th>满意度评分 </th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->goods_name }}</td>
                <td>@if($menu->goods_img) <img class="img-circle" src="{{ Illuminate\Support\Facades\Storage::url($menu->goods_img)}}"/> @endif </td>
                <td>{{ $menu->rating }}</td>
                <td>{{ $menu->shop_id }}</td>
                <td>{{ $menu->category_id }}</td>
                <td>{{ $menu->goods_price }}</td>
                <td>{{ $menu->description }}</td>
                <td>{{ $menu->month_sales }}</td>
                <td>{{ $menu->rating_count }}</td>
                <td>{{ $menu->tips }}</td>
                <td>{{ $menu->satisfy_count }}</td>
                <td>{{ $menu->satisfy_rate }}</td>
                <td>{{$menu->status==1 ? "上架" : "下架"}}</td>
                <td>
                    <a href="{{route('menu.create',[ $menu->id] )}}" class="btn btn-primary">新增</a>
                    <a href="{{route('menu.edit',[ $menu->id] )}}" class="btn btn-warning">修改</a>
                    <form method="post" action="{{route('menu.destroy',[$menu->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $menus->appends(request()->except('page'))->links() }}
@endsection