<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

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

    public function view_product()
    {
        return view('admin.product');
    }
}
