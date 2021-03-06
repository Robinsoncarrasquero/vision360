<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       // $users->withPath('list');
       $buscarWordKey = $request->get('buscarWordKey');
       $users = User::name($buscarWordKey)->orderBy('name','ASC')->paginate(5);

        return \view('user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back()
        ->withWarning('Los usuarios pueden autoregistrarse por el sistema de autenticacion integrado y verificar su correo.');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //
        $user = User::findOrFail($user);
        $roles = Role::all();

        return \view('user.edit',\compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$id,
                'roluser' => 'required',
                'newrol' => 'required',

            ],
            [
                'name.required'=>'El nombre es requerido.',
                'email.required' => "Email del usuario es unico y obligatorio.",
                'roluser.required' => "Rol del usuario es requerido.",
                'newrol.required' => "Nuevo Rol es requerido.",
                'email.unique' => "Este email ya ha sido tomado por otro Usuario."

            ]);
        $user =User::findOrFail($id);
        $user->email=$request['email'];
        $user->name = $request['name'];
        $user->save();

        //Eliminamos el rol anterior
        $userRol = Role::find($request->roluser);
        $user->roles($userRol)->detach();

        //Agredamos el nuevo rol
        $new_rol = Role::find($request->newrol);
        $user->roles()->attach($new_rol);

        return redirect()->route('user.index')->withSuccess('Usuario Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        //
        $user = User::find($user);
        if ($user->admin()){
            return redirect()->back()
            ->withError('No esta permitido Eliminar Un Administrador del Sistema');
        }
        try {
            $user->delete();
        } catch (QueryException $e) {
            return redirect()->back()
            ->withErrors('Error imposible Eliminar este registro, tiene restricciones con algunas Evaluaciones.');
        }

        return redirect('user')->withSuccess('El usuario ha sido eliminado con exito!!');

    }
}
