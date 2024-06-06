<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('users.home',[
            $user_id = Auth::user()->id,
            $user = User::find($user_id),
            'articles' => $user->articles,
        ]);
    }

    public function profile()
    {
        return view('users.profile',[
            $user_id = Auth::user()->id,
            $user = User::find($user_id),
            'user' => $user,
        ]);
    }

    public function updatemobile(Request $request)
    {
        $mobile = $request->input('mobile');

        User::where('id',Auth::user()->id)->update([
            'mobile' => $mobile,
        ]);
        return back();
    }

}
