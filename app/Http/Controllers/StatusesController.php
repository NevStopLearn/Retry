<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStatusPost;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param StoreStatusPost $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStatusPost $request)
    {
        Auth::user()->statuses()->create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        session()->flash('success', '发布成功！');

        return redirect()->back();
    }
}
