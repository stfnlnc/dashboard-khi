<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        try {
            $user = auth()->user();

            if (!$user || !$user->role || $user->role->name === $role) {
                // Journalisation de la tentative d'accès non autorisé
                Log::warning("Tentative d'accès non autorisé à la route avec le rôle : $role");

                return to_route('index')->with('danger', 'Accès non autorisé');
            }
        } catch (\Exception $e) {
            // En cas d'erreur, retournez une réponse 403 générique
            return to_route('index')->with('danger', 'Erreur : Accès non autorisé');
        }

        return $next($request);
    }
}
