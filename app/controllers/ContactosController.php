<?php
namespace App\Controllers;
use App\Models\Contactos;
use Illuminate\Support\Facades\Request;

class ContactosController extends Controller{

    public function index(){
        $datosContactos = Contactos::all();
        response()->json($datosContactos);
    }
    public function consultar($id){
        $datosContactos = Contactos::find($id);
        response()->json($datosContactos);
    }
    public function agregar(){
        $contacto = new Contactos;
        $contacto->nombre = app()->request()->get('nombre');
        $contacto->primerapellido = app()->request()->get('apaterno');
        $contacto->segundoapellido = app()->request()->get('amaterno');
        $contacto->correo = app()->request()->get('correo');
        $contacto->save();
        response()->json(["success"=> "Registro agregado"]);
    }
    public function eliminar($id){
        /*$datosContactos = Contactos::find($id);
        $nombre = $datosContactos->nombre;
        $datosContactos->delete();*/
        Contactos::destroy($id);
        response()->json(["success"=>"Datos Eliminados"]);
    }
    public function actualizar($id){
        $nombre = app()->request()->get('nombre');
        $primerapellido = app()->request()->get('apaterno');
        $segundoapellido = app()->request()->get('amaterno');
        $correo = app()->request()->get('correo');

        $contacto = Contactos::findOrFail($id);

        $contacto->nombre = ($nombre!="")?$nombre:$contacto->nombre;
        $contacto->primerapellido = ($primerapellido!="")?$nombre:$contacto->primerapellido;
        $contacto->segundoapellido = ($segundoapellido!="")?$nombre:$contacto->segundoapellido;
        $contacto->correo = ($correo!="")?$correo:$contacto->correo;
        $contacto->update();
        response()->json(["success"=>"Registro actualizado"]);
    }

}