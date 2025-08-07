<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    // Eliminar un link
    public function destroy($id)
    {
        $link = Link::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Enlace eliminado correctamente.');
    }
    // Mostrar estadísticas de un link
    public function show($id)
    {
        $link = Link::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        return view('links.show', compact('link'));
    }
    // Dashboard para usuarios logueados
    public function index()
    {
        // Eliminar enlaces expirados del usuario
        Link::where('user_id', Auth::id())
            ->whereNotNull('expires_at')
            ->where('expires_at', '<=', now())
            ->delete();
        $links = Link::where('user_id', Auth::id())
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->get();

        return view('links.index', compact('links'));
    }

    // Guardar nuevo enlace
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'custom_alias' => 'nullable|alpha_dash|unique:links,custom_alias',
            'expires_at' => 'nullable|date|after:now',
        ]);

        $shortCode = $request->custom_alias ?: Str::random(6);

        $linkData = [
            'original_url' => $request->original_url,
            'shortened_url' => $shortCode,
            'custom_alias' => $request->custom_alias,
            'user_id' => Auth::check() ? Auth::id() : null,
            'expires_at' => $request->expires_at,
        ];

        $link = Link::create($linkData);

        return redirect()->back()->with('success', 'URL acortada: ' . url('/' . $shortCode));
    }
}
