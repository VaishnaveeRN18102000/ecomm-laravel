<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Session;
class ProductController extends Controller
{
    function index()
    {
        $da = Product::all();
        return view('product', ['products'=>$da]);
    }
    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
	    }
    }
    static function cartItem()
    {
        $uid = Session::get('user')['id'];
        return Cart::where('user_id', $uid)->count();
    }
    function cartList()
    {
        $uid = Session::get('user')['id'];
        $pdts = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $uid)
        ->select('products.*', 'cart.id as cart_id')
        ->get();
        return view('cartlist', ['products'=>$pdts]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
}
