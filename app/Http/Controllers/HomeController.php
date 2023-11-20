<?php


//condicionando el ingreso de usuarios

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;

use App\Models\Comment;
use App\Models\Reply;



use App\Models\Order;


use Session;
use Stripe;



class HomeController extends Controller
{
    public function index()
    {
        $product = product::paginate(10);
        $comment=comment::orderby('id','desc')->get();
        $reply=reply::all();
      
        return view('home.userpage', compact('product', 'comment','reply'));
      
     
    }
    public function redirect()
    {
        $usertype =Auth::user()->usertype;
        if ($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $order=order::all();
            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status','ENTREGADO')->get()->count();
            $total_processing=order::where('delivery_status','PROSESANDO')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else{
            $product = Product::paginate(10);
            $comment=comment::orderby('id','desc')->get();
            $reply=reply::all();
            return view('home.userpage', compact('product','comment','reply'));
          
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

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            
            $comment = new comment;
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();
            return redirect()->back();
        }
        else
        {
            session()->flash('message', 'Debes iniciar sesión para poder comentar');
            return redirect('login');
        }

    }

    public function add_reply(Request $request)
    {
        if (Auth::id()) {
            $reply = new reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;
            $reply->save();
            return redirect()->back();
        } else {
            session()->flash('message', 'Debes iniciar sesión para poder reponder comentarios');
            return redirect('login');
        }
    }

    // public function product_search(Request $request)
    // {
    //     $comment = comment::orderby('id', 'desc')->get();
    //     $reply = reply::all();
    //     $serach_text = $request->search;
    //     $product = product::where('title', 'LIKE', "%$serach_text%")->orWhere('catagory', 'LIKE', "$serach_text")->paginate(10);
    //     return view('home.userpage', compact('product', 'comment', 'reply'));
    // }
    // public function products()
    // {
    //     $product = Product::paginate(10);
    //     $comment = comment::orderby('id', 'desc')->get();
    //     $reply = reply::all();
    //     return view('home.all_product', compact('product', 'comment', 'reply'));
    // }
    // public function search_product(Request $request)
    // {
    //     $comment = comment::orderby('id', 'desc')->get();
    //     $reply = reply::all();
    //     $serach_text = $request->search;
    //     $product = product::where('title', 'LIKE', "%$serach_text%")->orWhere('catagory', 'LIKE', "$serach_text")->paginate(10);
    //     return view('home.all_product', compact('product', 'comment', 'reply'));
    // }
    // public function blog(){
    //     $comment = comment::orderby('id', 'desc')->get();
    //     $reply = reply::all();
    //     return view('home.blog',compact('comment','reply'));
    // }
    // public function contact(){
    //     $comment = comment::orderby('id', 'desc')->get();
    //     $reply = reply::all();
    //     return view('home.contact',compact('comment','reply'));
    // }

}
