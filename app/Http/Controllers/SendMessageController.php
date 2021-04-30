<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{
    //
    public function store(Request $request)
    {
        Chat::create([
            'user_id'=> $request->userId,
            'receiver_id'=> $request->receiverId,
            'ad_id'=> $request->adId,
            'message' => $request->body
        ]);
    }

    public function index()
    {
        return view('admin.chats.index');
    }

    public function chatWithThisUser()
    {
        $conversations = Chat::orderBy('id','DESC')->
            where('user_id', auth()->id())
            ->orWhere('receiver_id', auth()->id())
            ->get();
        $users  = $conversations->map(function ($conversation) {
            if ($conversation->user_id === auth()->id()) {
                return $conversation->receiver;
            }
            return $conversation->sender;
        })->unique();
        return $users;
    }

    public function showMessages(Request $request , $id)
    {
        $messages = Chat::with(['user','ads'])->where('receiver_id', auth()->user()->id)
            ->where('user_id', $id)
            ->orWhere('user_id', auth()->user()->id)
            ->where('receiver_id', $id)
            ->get();
        return $messages;
    }

    public function startChat(Request $request)
    {
        $message = Chat::create([
            'user_id'=> Auth::id(),
            'receiver_id'=> $request->receiverId,
            'message' => $request->body
        ]);

        return $message->load('user');
    }
}
