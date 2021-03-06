<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserEvent;
use App\Http\Requests\UserRequest;
use App\User;

class UsuariosController extends Controller
{
    public function create () {
        return view('admin.usuarios.agregar')->with('title', 'Agregar Usuario');
    }

    public function store (UserRequest $request) {
        $usuarios = new User($request->all());
        $usuarios->rol = 'Admin';
        $usuarios->password = bcrypt($request->password);

        $confirm = User::find($usuarios->id);
        if(!$confirm) {
            $usuarios->nombre = ucfirst(trans($request->nombre));
            $usuarios->apellido = ucfirst(trans($request->apellido));
            $usuarios->save();
            event(new UserEvent($usuarios, 'Agregar usuario'));
            flash('Se ha agregado el administrador ' .$usuarios->nombre)->success()->important();
            return redirect()->route('usuarios.index');
        } 
        else {
            flash('El administrador ' .$usuarios->id. ' ya existe')->error()->important();
            return redirect()->route('usuarios.create');
        }
            
    }

    public function index () {
        $usuarios = User::orderBy('id', 'ASC')->paginate(10);
        return view('admin.usuarios.listar')->with('usuarios', $usuarios);
    }

    public function destroy ($id) {
        $usuario = User::find($id);
        $usuario->active = false;
        $usuario->save();

        event(new UserEvent($usuario, 'Eliminar usuario'));
        flash('Se ha eliminado al ' .$usuario->rol. ' '.$usuario->nombre)->error()->important();
        return redirect()->route('usuarios.index');
    }

    public function activar ($id) {
        $usuario = User::find($id);
        $usuario->active = true;
        $usuario->save();

        event(new UserEvent($usuario, 'Actualizar usuario'));
        flash('Se ha reactivado al ' .$usuario->rol. ' '.$usuario->nombre)->success()->important();
        return redirect()->route('usuarios.index');
    }

    public function search (Request $request) {
        $usuarios = User::apellido($request->get('apellido'))->orderBy('id', 'ASC')->paginate(10);

        if($usuarios->count() > 0)
            return view('admin.usuarios.listar')->with('usuarios', $usuarios);
        else {
            flash('No se encontraron coincidencias ')->error()->important();
            return redirect()->route('usuarios.index');
        }
    }
}
