<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personals = User::paginate(10);

        return view('users.index-user', compact('personals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                /* OBteniendo todos los request de la vista */
                $user_data = $request->all();

                /* Reglas de validación del request */
                $validation = Validator::make($request->all(), [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'min:8'],
                    'password2' => ['required', 'min:8'],
                ]);
        
                /* Fallo en caso de que las reglas de validación fallen */
                if ($validation->fails()) {
                    return redirect()->back()->with('error','Por favor complete bien los campos');
                }
        
                /* Msj de error si el usuario es sonso y no hace caso al ajax :v que ya está en uso el correo */
                if (User::where('email', $user_data['email'])->exists()) {
                    return redirect()->back()->with('error','Correo electrónico ya existente, escoja otro');
                }
        
                /* Mensaje de error si la contraseña no está bien confirmada */
                if ($user_data['password']!=$user_data['password2'])
                    return redirect()->back()->with('error','Contraseñas no coinciden');
                
                /*Se hashea la contraseña */
                $user_data['password'] = Hash::make( $user_data['password'] );
        
                /* Se llena el modelo con los datos en caso de que todo esté correcto */
                $register = new User();
                $register->fill($user_data);
                $register->save();
        
                return redirect()->route('users.index')->with('mensaje','Usuario creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personal = User::findOrFail($id);

        return view('users.show-user', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = User::findOrFail($id);

        return view('users.edit-user', compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, User $user)
    {
        $personal_data = $request->all();

        $user->update($personal_data);

        return redirect()->route('users.index')->with('success', 'Usuario del personal editado correctamente');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal_user_select = User::find($id);

        try{
            $personal_user_select->delete();
            return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
        } catch (\Illuminate\Database\QueryException $e){
            return redirect()->route('users.index')->with('error',$e->getMessage());
        }
    }
}
