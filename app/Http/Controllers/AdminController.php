<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;

class AdminController extends Controller
{
    //  Connexion de l'admin avec toutes les vérifications possibles
    public function login(Request $request)
    {
        //  Protection contre le spam (5 tentatives max en 1 min)
        $this->rateLimit($request->email);

        //  Validation des données d'entrée
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        //  Recherche de l'admin
        $user = User::where('email', $request->email)->first();

        //  Vérification si l'utilisateur est bien un admin
        if (!$user || $user->role !== 'admin') {
            return response()->json(['error' => 'Accès refusé.'], 403);
        }

        //  Vérification du mot de passe
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Mot de passe incorrect.'], 401);
        }

        //  Vérification si le compte est actif
        if (!$user->is_active) {
            return response()->json(['error' => 'Votre compte est désactivé.'], 403);
        }

        //  Suppression des anciens tokens (optionnel)
        $user->tokens()->delete();

        //  Génération du token API
        $token = $user->createToken('admin-token', ['admin-access'])->plainTextToken;

        //  Reset du compteur de tentatives échouées
        RateLimiter::clear('login:' . $request->email);

        //  Réponse avec les infos de l'admin
        return response()->json([
            'message' => 'Connexion réussie !',
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role
            ]
        ]);
    }

    //  Déconnexion de l'admin
    public function logout(Request $request)
    {
        //  Supprimer uniquement le token actuel
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnexion réussie !'
        ]);
    }

    //  Récupérer les infos de l'admin connecté
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    //  Gestion du verrouillage après trop de tentatives
    private function rateLimit($email)
    {
        if (RateLimiter::tooManyAttempts('login:' . $email, 5)) {
            throw ValidationException::withMessages([
                'email' => ['Trop de tentatives. Essayez plus tard.']
            ]);
        }

        RateLimiter::hit('login:' . $email, 60); // 60 secondes de blocage
    }
}
