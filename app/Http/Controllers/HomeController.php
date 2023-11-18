<?php


//condicionando el ingreso de usuarios

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use App\Models\Order;
use Session;
use Stripe;


class HomeController extends Controller
{
    public function index()
    {
        $product = product::paginate(10);
        return view('home.userpage', compact('product'));
      
     
    }
    public function redirect()
    {
        $usertype =Auth::user()->usertype;
        if ($usertype=='1'){
            return view('admin.home');
        }
        else{
            $product = product::paginate(10);
            return view('home.userpage', compact('product'));
          
        }
    }

    public function product_details( Request $request, $id)
    {
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_card( Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $product = product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            if($product->discount_price!=null)
            {
                $cart->price = $product->discount_price * $request->quantity;
            }
            else
            {
                $cart->price = $product->price * $request->quantity;
            }
            $cart->image = $product->image;
            $cart->Product_id = $product->id;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back() ;
            
         
        }

        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            session()->flash('message', 'Debes iniciar sesión para ver tu carrito.');
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        session()->flash('message', 'ELIMINASTE UN PRODUCTO DE TU CARRITO');
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id',$userid)->get();

        foreach($data as $data)
        {
            $order = new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->Product_id=$data->Product_id;

            $order->payment_status='PAGO CONTRA ENTREGA - DELIVERY';
            $order->delivery_status='PROSESANDO';

            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();



        }
        return redirect()->back()->with('message','TU PEDIDO SE HA REALIZADO CON EXITO');
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {
      
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create([
            "amount" => $totalprice * 100, // Monto en céntimos
            "currency" => "pen",   // Código de moneda para soles peruanos
            "source" => $request->stripeToken,
            "description" => "Pago de prueba desde antojitos del mar"
        ]);


        $user = Auth::user();
        $userid=$user->id;

        $data=cart::where('user_id',$userid)->get();

        foreach($data as $data)
        {
            $order = new Order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->Product_id=$data->Product_id;

            $order->payment_status='PAGO CON TARJETA';
            $order->delivery_status='PROSESANDO';

            $order->save();

            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();



        }
        
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }



    


    



}
