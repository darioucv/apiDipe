<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response ()->json(User::get(),200);
        $users = User::latest()->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $contenido = new User();
        $contenido->name = $request->input('name');
        $contenido->email = $request->input('email');
        $contenido->password = $request->input('password');
        $contenido->fill([
            'password' => Crypt::encrypt($contenido->password),
        ]);
        $contenido->save();
        return back()->with('status', 'Creado con éxito');
    }

    public function edit(User $user){
        return view('users.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user_id)
    {
        $contenido = User::find($user_id);
        if(is_null($contenido)){
            return response()->json('id no válido',404);
        }
        $contenido->name = $request->input('name');
        $contenido->fill([
            'password' => Crypt::encrypt($contenido->password),
        ]);
       /*  $contenido->password = $request->input('name');
        echo json_encode($contenido); */
        $contenido->save(); 
        
        return back()->with('status', 'Actualizado con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
