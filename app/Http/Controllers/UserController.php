<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{

    public function ActualizaContrasena(Request $request)
    {
        $id=request('IdUsuarioClave');
        $obj=User::findOrFail($id);
        $obj->password=bcrypt($request->input('passwordchange'));
        $obj->save();
        $data=["Mensaje"=>"Ok"];
        return response()->json($data);
    }

    public function ListarUsuarios()
    {
        $lista=DB::table('users')
        ->select('users.id','users.name','users.nombres','users.apellidos','users.email','is_admin','status')
        ->get();
        return datatables()->of($lista)->toJson();
    }

    public function Usuarios(Request $request)
    {
        return view('listarusuarios');
    }


    public function ActualizaUsuario(Request $request){
        $id=request('IdUsuario');
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nombres = $request->input('nombres');
        $user->apellidos = $request->input('apellidos');
        // $user->password = bcrypt($request->input('password'));
        $user->is_admin = $request->input('rol');
        $user->status = $request->input('status');
        $user->save();
        $data=["Mensaje"=>"Listo"];
        return response()->json($data);
        // return json_encode(["msg" => "usuario agregado"]); 
    }

    public function create(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->nombres = $request->input('nombres');
        $user->apellidos = $request->input('apellidos');
        $user->password = bcrypt($request->input('password'));
        $user->is_admin = $request->input('rol');
        $user->status = $request->input('status');
        $user->save();
        $data=["Mensaje"=>"Listo"];
        return response()->json($data);
        // return json_encode(["msg" => "usuario agregado"]); 
    }

    public function verificanombre(Request $request)
    {
        $name=request('name');
        $lista=DB::table('users')
        ->select('users.*')
        ->where('users.name','=',$name)
        ->count();
        if ($lista>0) {
            $data=['estado'=>'No_disponible'];
        }else{
            $data=['estado'=>'Disponible'];
        }
        return response()->json($data);
      }

      public function verificaemail(Request $request)
      {
          $email=request('email');
          $lista=DB::table('users')
          ->select('users.*')
          ->where('users.email','=',$email)
          ->count();
          if ($lista>0) {
              $data=['estado'=>'No_disponible'];
          }else{
              $data=['estado'=>'Disponible'];
          }
          return response()->json($data);
        }
}
