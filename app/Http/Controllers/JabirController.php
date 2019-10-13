<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Token;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response as FacadeResponse;

class JabirController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // $sol_tick = Token::where('token_status', 1)->get();
        // $open_tick = Token::where('token_status', 0)->get();

        return view('admin.dashboard.dashboardContent');
    }
    public function submitToken()
    {
        return view('admin.token.submitToken');
    }
    public function allToken()
    {

        $id = Auth::user()->id;
        $all_token = Token::where('customer_id', $id)->get();
        // echo '<pre>';
        // print_r($all_token);
        // echo '</pre>';
        return view('admin.token.allToken', compact('all_token'));
    }
    public function submitTokenCre(Request $req)
    {
        // return $req->all();
        $token_sub = $req->token_sub;
        $token_des = $req->token_des;
        $token_priority = $req->token_priority;
        $productimg = $req->file('token_attach');
        if ($productimg) {
            $imgname =  rand(11111, 99999) . time() . '-' . $productimg->getClientOriginalName();
            // $uploadPath = 'token_images/';
            // $size = $productimg->getSize();
            // $productimg->move($uploadPath, $imgname);
            // $imgUrl = $uploadPath . $imgname;

            // $new_name = rand() . '.' . $productimg->getClientOriginalExtension();
            $productimg->move(public_path('token_images'), $imgname);
        } else {
            $imgname = '';
        }
        return view('admin.token.amount', compact('token_sub',  'token_des',  'token_priority',  'imgname'));
    }
    public function submitTokenDeposit(Request $req)
    {
        $deposit_amount = User::where('id', Auth::user()->id)->value('deposit_amount');

        $this->validate($req, [
            'token_sub' => 'required|min:2',

            'token_des' => 'required|min:5',
            'token_attach' => 'mimes:jpeg,jpg,png',
            'deposit_amount' => 'required|lte:' . $deposit_amount . '',
        ], [
            'deposit_amount.size' => 'Insufficient Balance ! Please Deposit Now.',
        ]);

        $insert_token =  Token::insert([
            'token_sub' => $req->token_sub,
            'token_des' => $req->token_des,
            'token_priority' => $req->token_priority,
            'deposit_amount' => $req->deposit_amount,
            'token_attach' =>  $req->imgname,
            'customer_id' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);
        $user_dep_amount  = User::where('id', Auth::user()->id)->value('deposit_amount');
        $last_am = $user_dep_amount -   $req->deposit_amount;
        // echo $last_am;
        $user_up = User::where('id', Auth::user()->id)->update([
            'deposit_amount' => $last_am,
        ]);
        // // echo $insert_token;
        if ($insert_token && $user_up) {
            return redirect('submit/token')->with('status', 'Token Submitted Successfully!');
        } else {
            return redirect('submit/token')->with('status', 'Sorry Please Try Again!');
        }
    }
    public function TokenDetails($id)
    {
        $one_token = Token::where('id', $id)->first();
        // echo '<pre>';
        // print_r($token);
        // echo '</pre>';
        $all_comments =  Comment::where('token_id', $id)
            ->get();
        return view('admin.token.oneToken', compact('one_token', 'all_comments'));
    }
    public function tokensub_reply(Request $req)
    {
        $this->validate($req, [
            'details' => 'required|min:2',
            'comment_attachment' => 'mimes:jpeg,jpg,png',
        ]);
        $comment_img = $req->file('comment_attachment');
        if ($comment_img) {
            $comment_img_name =  'commment-' . rand(1111, 9999) . time() . '-' . $comment_img->getClientOriginalName();
            //     // $uploadPath = 'token_images/';
            //     // $size = $comment_img->getSize();
            //     // $comment_img->move($uploadPath, $comment_img_name);
            //     // $imgUrl = $uploadPath . $comment_img_name;

            //     // $new_name = rand() . '.' . $comment_img->getClientOriginalExtension();
            $comment_img->move(public_path('comment_image'), $comment_img_name);
        } else {
            $comment_img_name = '';
        }
        $insert_id =  Comment::insertGetId([
            'token_id' => $req->token_id,
            'details' => $req->details,
            'comment_attachment' => $comment_img_name,
            'reply_person' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        // $comments =  Comment::find($insert_id);
        $all_comments =  Comment::where('token_id', $req->token_id)

            ->get();

        return back();
    }
    public function image_Download($image)
    {
        $ss =  public_path('comment_image/') . $image;
        FacadeResponse::download($ss);
        return back();
    }
    public function dep_update(Request $req)
    {
        Token::where('id', $req->release_id)->update([
            'payment_status' => 1,
        ]);
        $deposit_amount = User::where('user_role', 1)->value('deposit_amount');
        $uder_id = User::where('user_role', 1)->value('id');
        $last_am =   $deposit_amount +  $req->release_amount;

        User::where('id', $uder_id)->update([
            'deposit_amount' => $last_am,
        ]);
        return back();
    }
}
