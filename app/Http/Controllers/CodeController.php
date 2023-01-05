<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodeController extends Controller
{
    public function view(Code $code)
    {
        if ($code->type == Code::REDIRECT && !auth()->user()->canUpdate($code)) {
            return redirect($code->content);
        }
        return view('code', ['code' => $code]);
    }

    public function list()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        return response(['code' => Code::with('user')->get()]);
    }

    public function update(Code $code, Request $request): RedirectResponse
    {
        $user = auth()->user();
        if (!$user->canUpdate($code)) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => Rule::in(array_keys(Code::TYPES)),
            'content' => 'required|string|max:1000',
        ]);

        $code->update($validated);
        return redirect()->back();
    }

    public function create()
    {
        if (!auth()->user()->canCreate()) {
            abort(403);
        }
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        if (!auth()->user()->canCreate()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'numeric|unique:codes|min:0',
            'type' => Rule::in(array_keys(Code::TYPES)),
            'content' => 'required|string|max:1000',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $code = Code::create($validated);

        return redirect(route('codes.view', $code));
    }
}
