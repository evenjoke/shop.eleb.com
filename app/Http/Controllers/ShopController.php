<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }
    public function index()
    {
        $shops=DB::table('shops')->paginate(5);
        return view('Shop.index',compact('shops'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'shop_img'=>'required',
            //'shop_rating'=>'required',
            //'brand'=>'required',
            //'on_time'=>'required',
            //'fengniao'=>'required',
           // 'bao'=>'required',
           // 'piao'=>'required',
            //'zhun'=>'required',
            'start_send'=>'required',
            'send_cost'=>'required',
            //'notice'=>'required',
            //'discount'=>'required',
            're_password'=>'required|same:password',
            'name'=>'required',
            'email'=>'email',
            'password'=>'required',
        ],
            [
                'shop_category_id.required'=>'分类名不能为空',
                'shop_img.required'=>'店铺图片不能为空',
                'shop_name.required'=>'店铺名称不能为空',
                'start_send.required'=>'起送金额不能为空',
                'send_cost.required'=>'配送费用不能为空',
                're_password.required'=>'确认密码不能为空',
                're_password.same'=>'两次密码不一致',
                'name.required'=>'商户名称不能为空',
                'email.email'=>'邮箱格式不对',
                'password.required'=>'密码不能为空',
            ]);

        $path = $request->file('shop_img')->store('public/shop_img');
        Shop::create([
            'shop_category_id'=>$request->shop_category_id,
            'shop_name'=>$request->shop_name,
            'shop_img'=>$path,
            'shop_rating'=>$request->shop_rating,
            'brand'=>$request->brand,
            'on_time'=>$request->on_time,
            'fengniao'=>$request->fengniao,
            'bao'=>$request->input('bao'),
            'piao'=>$request->input('piao'),
            'zhun'=>$request->input('zhun'),
            'start_send'=>$request->input('start_send'),
            'send_cost'=>$request->input('send_cost'),
            'notice'=>$request->input('notice'),
            'discount'=>$request->input('discount'),
            'status'=>'0',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'status'=>'0',
            'password'=>bcrypt($request->input('password')),
            'remember_token'=>str_random(50),
            'shop_id'=>$request->input('shop_id'),
        ]);
        session()->flash('success','成功');
        return redirect()->route('shop.index');
    }

    public function create()
    {
        $shops=Shop::all();
        $shopCategorys = DB::table('shop_categories')->get();
        return view('Shop.add',compact('shops','shopCategorys'));
    }

    public function show()
    {
        
    }

    public function update()
    {
        
    }
    public function user_edit(User $user)
    {
        $shop=DB::table('shops')->where('id','=',$user->shop_id)->value('shop_name');
        return view('Shop.user_edit',compact('user','shop'));
    }
    public function shop_edit(Shop $shop)
    {
        return view('Shop.shop_edit',compact('shop'));
    }
    public function user_update(User $user,Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'email',
            ],[
            'name.required'=>'商户名称不能为空',
            'email.email'=>'邮箱格式不对',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
        ]);
        session()->flash('success','成功');
        return redirect()->route('shop.index');

    }
    public function shop_update(Shop $shop,Request $request)
    {

    }

    public function edit()
    {

    }

    public function destroy(Shop $shop)
    {
        $shop->delete();
        session()->flash('success','店铺信息成功');

        return redirect()->route('shop.index');
        
    }
    
}
