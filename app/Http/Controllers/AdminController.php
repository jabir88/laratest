<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function permission()
    {
        return abort(404);
    }

    public function alltickets_solve()
    {
        $all_token = Token::where('token_status', 1)->get();

        return view('admin.token.solveallTokenadmin', compact('all_token'));
    }
    public function alltickets_admin()
    {
        $all_token = Token::where('token_status', 0)->get();
        $all_auth = Auth::user();
        return view('admin.token.allTokenadmin', compact('all_token', 'all_auth'));
    }
    public function alltickets_view($id)
    {
        $one_token = Token::where('id', $id)->first();

        $auth =  User::where('id', $one_token->customer_id)->first();

        $all_comments =  Comment::where('token_id', $id)
            ->get();
        return view('admin.token.oneTokenadmin', compact('one_token', 'all_comments', 'auth'));
    }
    public function alltickets_view_submit(Request $req)
    {
        $all_token = Token::where('id', $req->cls_ticket)->update([
            'token_status' => 1,
        ]);
        return back();
    }
}
