<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Http\Requests\ProductosFormRequest;
use Illuminate\Support\Facades\Redirect;
use ventasT\Http\Requests\CategoriaFormRequest;
use DB;

class ProductosController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('productos')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('nombres')
            ->paginate(7);
            return view('productos.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }

    public function create()
    {
        return view("productos.create");
    }

    public function store (ProductosFormRequest $request)
    {
        $producto=new Productos;
        $producto->nombre=$request->get('nombre');
        $producto->save();
        return Redirect::to('productos');

    }

    public function show($id)
    {
        return view("productos.show",["productos"=>Productos::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('productos.edit',['productos'=>Productos::findOrFail($id)]);
    }

    public function update(ProductosFormRequest $request,$id)
    {
        $producto=Productos::findOrFail($id);
        $producto->nombre=$request->get('nombre');
        return Redirect::to('productos');
    }
    public function destroy($id)
    {
        $producto=Productos::findOrFail($id);
        $producto->delete();
        return Redirect::to('productos');
    }
}
