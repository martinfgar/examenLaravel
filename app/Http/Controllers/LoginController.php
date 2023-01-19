<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|regex:/^[0-9].{6,}[0-9]$/'
        ],[
            'password.regex' => 'La contraseña debe empezar y terminar por un dígito y tener un mínimo de 8 caracteres'
        ]);
        $alumno = Alumno::create([
            'nombre' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return view('inicio');
    }

    public function login(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $users = Alumno::where('nombre', $request->name);
        if ($users->count() == 0){
            return  back()->withErrors(['error' => 'No hay alumnos con ese nombre']);
        }
        foreach($users->get() as $alumno){
            if (Hash::check($request->password,$alumno->password)) return $alumno->email;
        }

        return back()->withErrors(['error' => 'Contraseña incorrecta']);
    }
}
