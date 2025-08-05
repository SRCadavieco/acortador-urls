<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    // Dashboard para usuarios logueados
    public function index()
    {
        $links = Link::where('user_id', Auth::id())->get();

        return view('links.index', compact('links'));
    }

    // Guardar nuevo enlace
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
            'custom_alias' => 'nullable|alpha_dash|unique:links,custom_alias',
        ]);

        $shortCode = $request->custom_alias ?: Str::random(6);

        $linkData = [
            'original_url' => $request->original_url,
            'shortened_url' => $shortCode,
            'custom_alias' => $request->custom_alias,
            'user_id' => Auth::check() ? Auth::id() : null,
        ];

        $link = Link::create($linkData);

        return redirect()->back()->with('success', 'URL acortada: ' . url('/' . $shortCode));
    }
}
