<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Commande;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showRegister()
    {
        return view('admin.register_form');
    }

    public function Register(AdminRequest $request)
    {
        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->telephone = $validatedData['telephone'];
        $user->role = $validatedData['role'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storePublicly('docImage', 'public');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->route('showLogin')->with('success', 'Bravo, vous êtes inscrit ! Connectez-vous.');
    }

    public function updateUser(AdminRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->name = $request->validated('name');
        $user->email = $request->validated('email');
        $user->password = Hash::make($request->validated('password'));
        $user->telephone = $request->validated('telephone');
        $user->role = $request->validated('role');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storePublicly('docImage', 'public');
            $user->image = $imagePath;
        }
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Bravo, vous avez modifier vos informations !.');
    }

    public function ShowLogin()
    {
        return view('admin.login_form');
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        return back()->withErrors([
            'name' => 'informations incorrects essayez encore .',
        ])->onlyInput('name');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('/showLogin')->with('success', 'Vous êtes déconnecté.');
    }

    public function showParametre()
    {
        return view('admin.parametre');
    }

    public function Commande()
    {
        $commandes = Commande::query()->paginate(8);

        return view('admin.commande_list', ['commandes' => $commandes]);
    }

    public function updateCommande(Request $request, $id)
    {
        $commande = Commande::find($id);
        $commande->update([$request->input('vendu')]);

        dd($commande);

        return to_route('admin.commande');
    }
}
