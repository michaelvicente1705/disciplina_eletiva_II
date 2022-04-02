<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProdutoController;
use App\Models\Permissions;
use App\Models\User;
use App\Models\UsersHasPermissions;
use App\Models\UserPermission;
use App\Models\users_has_permissions;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');

    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $usuarios = User::orderby('name')->paginate(5);

        return view('usuarios.index', compact('usuarios'));
    }


    public function create()
    {
            return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'permission_id' => ['required','int'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

           DB::table('permission_user')->insert([
               'permission_id' => $request->permission_id,
               'user_id'=>$user->id,
           ]);



           event(new Registered($user));

            //  Auth::login($user);  loga automaticamente no user criado

           return redirect(RouteServiceProvider::HOME);
    }

    public function delete($id)
    {
        try{

            $usuario = User::findOrFail($id);
            $user_id = $id;
            $userPermission = UsersHasPermissions::findOrFail($user_id);

            UsersHasPermissions::destroy($user_id);
           //Storage::delete('produtos/'.$usuario->caminho_foto);
            User::destroy($id);

            return redirect()->action([ProdutoController::class, 'index'])->
            with('sucesso', 'Registro excluído!');
        } catch(\Exception $e){
            return redirect()->action([ProdutoController::class, 'index'])->
            with('erro', 'Não foi possível excluir o registro!');
        }
    }
}
