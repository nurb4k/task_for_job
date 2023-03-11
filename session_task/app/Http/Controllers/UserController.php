<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function sessions()
    {
        $sessions = auth()->user()->sessions;

        return view('profile', ['sessions' => $sessions]);
    }

    public function terminateAll()
    {
        DB::table('sessions')
            ->where('user_id', auth()->id())
            ->where('id', '<>', session()->getId())
            ->delete();
        return redirect()->back();
    }

    public function terminate(Session $session)
    {
        $session->terminate();
        return redirect()->back();
    }
}
