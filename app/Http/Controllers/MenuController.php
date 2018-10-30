<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /*  public function __construct()
      {
          $this->middleware('auth', [
              'except' => []
          ]);
      }*/
    public function index(Request $request)
    {
        $wheres=[];
        if($request->name){
            $wheres[]=['goods_name','like',"%{$request->name}%"];
        }
        if($request->min_price){
            $wheres[]=['goods_price','>=',$request->min_price];
        }
        if($request->max_price){
            $wheres[]=['goods_price','<=',$request->max_price];
        }
        $menus=DB::table('menus')->where($wheres)->paginate(1);
        return view('Menu.index',compact('menus'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'goods_name'=>'required',
            'goods_img'=>'required|file',
            'tips'=>'required',
            'goods_price'=>'required',
            'description'=>'required',
        ],
            [
                'goods_name.required'=>'菜品名不能为空',
                'goods_img.required'=>'菜品图片不能为空',
                'goods_img.file'=>'菜品图片格式不对',
                'tips.required'=>'提示信息不能为空',
                'goods_price.required'=>'菜品金额不能为空',
                'description.required'=>'菜品描述不能为空',
            ]);

        $path = $request->file('goods_img')->store('public/goods_img');
        Menu::create([
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'goods_name'=>$request->goods_name,
            'rating'=>0.00,
            'shop_id'=>$request->shop_id,
            'category_id'=>$request->category_id,
            'month_sales'=>0,
            'rating_count'=>0,
            'tips'=>$request->tips,
            'satisfy_count'=>0,
            'satisfy_rate'=>0,
            'goods_img'=>$path,
            'status'=>$request->status,
        ]);
        session()->flash('success','成功');
        return redirect()->route('menu.index');
    }

    public function create()
    {
        $shops = DB::table('shops')->get();
        $menuCategorys = DB::table('menu_categories')->get();
        return view('Menu.add',compact('menuCategorys','shops'));
    }

    public function show()
    {

    }

    public function update()
    {

    }


    public function edit()
    {

    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        session()->flash('success','菜品删除成功');

        return redirect()->route('menu.index');

    }

}
