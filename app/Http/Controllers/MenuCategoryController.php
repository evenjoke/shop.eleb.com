<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuCategoryController extends Controller
{
    /*  public function __construct()
      {
          $this->middleware('auth', [
              'except' => []
          ]);
      }*/
    public function index()
    {
        $menuCategorys = DB::table('menu_categories')->paginate(5);
        return view('MenuCategory.index', compact('menuCategorys'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_selected' => 'required',
        ],
            [
                'name.required' => '分类名不能为空',
                'is_selected.required' => '必须选择是否默认分类',
            ]);
        /* $shops=DB::table('shops')->pluck('id');
         foreach($shops as $shop){
             $result=DB::table('menu_categories')->where('shop_id','=',$shop)->get();
            dd($result);
             $is_selected=DB::table('menu_categories')->where('is_selected','=',1)->get();
             dd($is_selected);*/

        MenuCategory::create([
            'name' => $request->name,
            'type_accumulation' => implode($request->type_accumulation, ','),
            'shop_id' => $request->shop_id,
            'description' => $request->description,
            'is_selected' => $request->is_selected,
        ]);
        session()->flash('success', '成功');
        return redirect()->route('menu_category.index');
    /*else{
        session()->flash('danger', '一个商户只允许一个默认分类');
        return redirect()->route('menu_category.create');
        }*/
}







    public function create()
    {
        $menus = DB::table('menus')->get();
        $shops = DB::table('shops')->get();
        return view('MenuCategory.add',compact('shops','menus'));
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

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
       /* session()->flash('success','菜品分类删除成功');*/

        return/* redirect()->route('menu_category.index')*/'success';

    }

}
