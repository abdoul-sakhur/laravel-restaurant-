<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ClientController extends Controller
{
    public function inscription()
    {
        return view('front.inscription');
    }

    public function inscrire(ClientRequest $clientRequest)
    {
        $user = User::create([
'name' => $clientRequest->validated('name'),
'email' => $clientRequest->validated('email'),
'telephone' => $clientRequest->validated('telephone'),
'password' => Hash::make($clientRequest->validated('password')),
'role' => $clientRequest->validated('role'),
        ]);
        // dd($user);

        return to_route('connexion')->with('success', 'Bravo votree compte a ete cree');
    }

    public function connexion(){
        return view ('front.connexion');
    }
    public function connecter(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'name' => 'informations incorrects essayez encore .',
        ])->onlyInput('name');
    }
    public function deconnexion(){
        Auth::logout();

        return redirect()->route('accueil');
    }
    
}
