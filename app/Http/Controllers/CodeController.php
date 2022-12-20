<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class CodeController extends Controller
{
    public function view(Code $code)
    {
        if ($code->type == Code::REDIRECT && (!Auth::check() || !auth()->user()->isAdmin())) {
            return redirect($code->content);
        }
        return view('code', ['code' => $code]);
    }

    public function list(Code $code)
    {
        if ($code->type == Code::REDIRECT && (!Auth::check() || !auth()->user()->isAdmin())) {
            return redirect($code->content);
        }
        return response(['code' => Code::get()]);
    }

    public function update(Code $code, Request $request): RedirectResponse
    {
        $code->update(Arr::only($request->all(), ['name', 'type', 'content']));
        return redirect()->back();
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request): RedirectResponse
    {
        $code = Code::create(Arr::only($request->all(), ['name', 'code', 'type', 'content']));

        return redirect('/' . $code->code);
    }
}
