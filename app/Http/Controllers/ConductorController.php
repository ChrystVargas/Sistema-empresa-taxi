<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ConductorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $conductores = DB::table('conductores');

            return DataTables::of($conductores)
                ->addColumn('action',function($conductores){
                    $acciones = '<span id="'.$conductores->id.'" class="detail btn btn-info btn-circle">
                    <i class="fas fa-file-invoice"></i></span>';
                    $acciones .= '&nbsp;<span id="'.$conductores->id.'" class="editar btn btn-warning btn-circle">
                    <i class="fas fa-edit"></i></span>';
                    $acciones .= '&nbsp;<span id="'.$conductores->id.'" class="eliminar btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i></span>';
                    return $acciones;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('conductor.index');
    }

    public function insertar(Request $request){
        if ($request->ajax()) {
            $conductor = new Conductor();
            $conductor->nro_auto = $request->nro_auto;
            $conductor->name = $request->name;
            $conductor->surname = $request->surname;
            $conductor->dueno_auto = $request->dueno_auto;
            $conductor->dni = $request->dni;
            $conductor->nro_brevete = $request->nro_brevete;
            $conductor->direccion = $request->direccion;
            $conductor->fecha_ingreso = $request->fecha_ingreso;
            $conductor->observaciones = $request->observaciones;

            $conductor->save();
            return back();
        }
    }

    public function eliminar($id){
        $cliente = DB::table('conductores')->whereId($id)->delete();
        return back();
    }

    public function editar($id){
        $conductor = DB::table('conductores')->where('id', $id)->first();
        return response()->json($conductor);
    }

    public function actualizar(Request $request){
        if ($request->ajax()) {
            $conductor = Conductor::find($request->id);
            $conductor->nro_auto = $request->nro_auto;
            $conductor->name = $request->name;
            $conductor->surname = $request->surname;
            $conductor->dueno_auto = $request->dueno_auto;
            $conductor->dni = $request->dni;
            $conductor->nro_brevete = $request->nro_brevete;
            $conductor->direccion = $request->direccion;
            $conductor->fecha_ingreso = $request->fecha_ingreso;
            $conductor->observaciones = $request->observaciones;

            $conductor->update();
            return back();
        }
    }
}
