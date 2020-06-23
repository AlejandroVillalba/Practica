<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Proveedor;
use Illuminate\Support\Facades\Redired;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\ProveedorFormRequest;

//use App\Categoria;

use DB;

class ProveedorController extends Controller
{
    public function __construc()
    {

    }
    public function index(Request $request)
    {
    	if ($request)
    	{
    		$query=trim($request->get('searchText'));
    		$proveedor=DB::table('proveedor')->where('nombreEmpresa','LIKE','%'.$query.'%')
    		->orderBy('idProveedor','desc')
    		->paginate(7);
    		$proveedor = Proveedor::all();
    		return view('proveedor.index',['proveedor' => $proveedor,"searchText"=>$query]);

    	}
    }
    public function create()
    {
    	return view("proveedor.create");
    }
    public function store(CategoriaFormRequest $request)
    {
    	$proveedor = new Proveedor();

        $proveedor-> nombreEmpresa = request( 'nombreEmpresa');
        $proveedor-> ruc = request( 'ruc');
        $proveedor-> direccion = request( 'direccion');
        $proveedor-> telefono = request( 'telefono');
        $proveedor-> email = request( 'email');

        $proveedor->save();

        return redirect( '/proveedor');
    }
    public function show($id)
    {
    	return view("proveedor.show",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view("proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]);
    }
    public function update(CategoriaFormRequest $request,$id)
    {
    	$proveedor = Proveedor::findOrFail($id);

      	$proveedor-> nombreEmpresa = $request->get( 'nombreEmpresa' );
      	$proveedor-> ruc = $request->get( 'ruc' );
      	$proveedor-> direccion = $request->get( 'direccion' );
      	$proveedor-> telefono = $request->get( 'telefono' );
      	$proveedor-> email = $request->get( 'email' );

      $proveedor->update();

      return redirect( '/proveedor');

    }
    public function destroy($id)
    {
    	$proveedor=Proveedor::findOrFail($id);
    	$proveedor->delete();
    	return Redirect('/proveedor');
    }
}
