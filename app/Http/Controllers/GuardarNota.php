<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\UsersNota;


class GuardarNota extends Controller
{
    public function SaveToDo(Request $request)
    {
        $Model = new UsersNota();
        $Model->title = $request->input('titulo');
        $Model->fecha = $request->input('fecha');
        $Model->contenido = $request->input('contenido');
        $Model->user = $request->input('user');
        $Model->save();
        return redirect('home')->with('info_add', 'Se agregó correctamente');
        // Redirect::to('login')->send();
    }

    public function StructuNota(Request $request)
    {   
        // isset($_POST)
        if(isset($request['delete_nota']))
        {
            // $Model = new UsersNota();
            $TempId = $request->input('id_edit');
            $afect = UsersNota::where('id', $TempId)->delete();
            return redirect('home')->with('info_message', 'Se eliminó correctamente');
            // $Model->save();
        }
        if(isset($request['edit_nota']))
        {
            
            $TempId = $request->input('id_edit');
            $title = $request->input('titulo_edit');
            $fecha = $request->input('fecha_edit');
            $contenido = $request->input('contenido_edit');
            $afect = UsersNota::where('id', $TempId)->update(['title' => $title, 'fecha' => $fecha, 'contenido' => $contenido]);
            return redirect('home')->with('info_message2', 'Se actualizó correctamente');
        }
    }
}
