@extends('Layout.default')

@section('contents')

    @include('Layout._errors')
    <h1 class="bg-info text-center">菜品分类</h1>
    <table class="table table-bordered table-striped ">
        <tr >

            <th>分类ID</th>
            <th>名称</th>
            <th>菜品编号</th>
            <th>所属商家</th>
            <th>描述</th>
            <th>是否是默认分类</th>
            <th>操作</th>
        </tr>
        @foreach ($menuCategorys as $menuCategory)
            <tr>
                <td>{{ $menuCategory->id }}</td>
                <td>{{ $menuCategory->name }}</td>
                <td>{{ $menuCategory->type_accumulation }}</td>
                <td>{{ $menuCategory->shop_id }}</td>
                <td>{{ $menuCategory->description }}</td>
                <td>{{ $menuCategory->is_selected }}</td>
                <td>
                    <a href="{{route('menu_category.create')}}" class="btn btn-warning">新增</a>
                    <a href="{{route('menu_category.edit',[ $menuCategory->id]) }}" class="btn btn-warning">修改</a>
                 {{--   <form method="post" action="{{route('menu_category.destroy',[$menuCategory->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">删除</button>
                    </form>--}}
     <a  data-href="{{ route('menu_category.destroy',[$menuCategory->id]) }}" href="javascript:;" class="btn btn-warning ">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        $('.btn').click(function(){
            var btn = $(this);
            var url = btn.data('href');
            if(confirm('你确定要删除该用户吗？删除后不可恢复！')){
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _token:"{{ csrf_token() }}"
                    },
                    success: function(msg){
                        if(msg == 'success'){
                            alert( "删除成功" );
                            //删除当前tr
                            btn.closest('tr').fadeOut();
                        }else{
                            alert('删除失败'+msg);
                        }
                    }
                });
            }
        });
    </script>
@endsection