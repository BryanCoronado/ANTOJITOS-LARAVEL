<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=Categoria::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $data=new Categoria();

        $data->category_name=$request->category;
        $data->save();

        return redirect()->back()->with('messege','la categoria se agrego correctamente');
    }

    public function delete_category($id)
    {
        $data=Categoria::find($id);
        $data->delete();

        return redirect()->back()->with('messege','la categoria se elimino correctamente');
    }

    //CONTROLADORES PARA PRODUCTOS

    public function view_product()
    {
        $category=Categoria::all();
        return view('admin.product',compact('category'));
    }


    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->catagory = $request->catagory;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();


        return redirect()->back()->with('messege', 'Producto agregado exitosamente');

    }

    public function show_product()
    {
        $product=Product::all();
        return view('admin.show_product',compact('product'));
    }

   
}
