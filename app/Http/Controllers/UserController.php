<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function perfil(Request $request)
  {
    $user = $request->user();

    return view('perfil', compact('user'));
  }

  public function actualizar(Request $request)
  {
      $this->validate($request,
          [
            'name' => ['nullable', 'string', 'max:255'],
            'surname' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpg,jpeg,png'],
          ],
          [
            'string' => 'El campo :attribute solo admite letras',
            'max' => 'El maximo de caracteres para :attribute es :max',
            'mimes'=>'El campo :attribute solo puede ser png,jpg o jpeg',
          ]);

        $user = User::find($request->user()->id);

        if($request->name) {
          $user->name = $request->name;
        }

        if($request->surname) {
          $user->surname = $request->surname;
        }

        if($request->avatar) {
          $user->avatar = basename($request->file('avatar')->store('public/avatars'));
        }

        $user->save();

        return redirect('/perfil');
  }
}
