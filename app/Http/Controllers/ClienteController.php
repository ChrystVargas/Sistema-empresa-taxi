<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $clientes = DB::table('clientes');

            return DataTables::of($clientes)
                ->addColumn('action',function($clientes){
                    $acciones = '<span id="'.$clientes->id.'" class="editar btn btn-warning btn-circle">
                    <i class="fas fa-edit"></i></span>';
                    $acciones .= '&nbsp;<span id="'.$clientes->id.'" class="eliminar btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i></span>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('cliente.index');
    }

    public function insertar(Request $request){
        if ($request->ajax()) {
            $cliente = new Cliente();
            $cliente->name = $request->name;
            $cliente->surname = $request->surname;
            $cliente->name_empresa = $request->name_empresa;
            $cliente->direccion = $request->direccion;
            $cliente->observaciones = $request->observaciones;

            $cliente->save();
            return back();
        }
    }

    public function eliminar($id){
        $cliente = DB::table('clientes')->whereId($id)->delete();
        return back();
    }

    public function editar($id){
        $cliente = DB::table('clientes')->where('id', $id)->first();
        return response()->json($cliente);
    }

    public function actualizar(Request $request){
        if ($request->ajax()) {
            $cliente = Cliente::find($request->id);
            $cliente->name = $request->name;
            $cliente->surname = $request->surname;
            $cliente->name_empresa = $request->name_empresa;
            $cliente->direccion = $request->direccion;
            $cliente->observaciones = $request->observaciones;

            $cliente->update();
            return back();
        }
    }
}
