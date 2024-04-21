<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): view
    {
        // メッセージテーブルのレコードを全件取得
        $messages = Message::all();

        // messagesという名前で$messagesをindexビューへ渡す
        return view('message/index', ['messages' => $messages]);
    }

    public function store(Request $request): RedirectResponse
    {
        // リクエストからボディを取得し、保存
        $message = new Message();
        $message->body = $request->body;
        $message->save();

        // リダイレクト
        return redirect('/messages');
    }
}
