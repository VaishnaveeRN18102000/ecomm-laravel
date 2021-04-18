<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
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
    function orderNow()
    {
        $uid = Session::get('user')['id'];
        $tot =  $pdts = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $uid)
        ->select('products.*', 'cart.id as cart_id')
        ->sum('products.price');
        return view('ordernow', ['tot'=>$tot]);
    }
    function orderPlace(Request $req)
    {
        $uid = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $uid)->get();
        foreach($allCart as $cart)
        {
            $order = new Order;
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->address = $req->address;
            $order->status = 'Pending';
            $order->paymentmethod = $req->payment;
            $order->paymentstatus = 'Pending';
            $order->save();
            Cart::where('user_id', $uid)->delete();
        }
        return redirect('/');
    }
    function myOrders()
    {
        $uid = Session::get('user')['id'];
        $ord = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $uid)
        ->get();
        return view('myorders', ['orders'=>$ord]);
    }
}
