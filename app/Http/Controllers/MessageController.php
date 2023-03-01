<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected function sendEmail()
    {
        $email = Profile::get()[0]->email;
    }


    protected function sendTelegram($id, $pesan)
    {
        $url = 'https://api.telegram.org/bot'.config('messages.telegram.bot_token').'/sendmessage?chat_id=' . $id . '&text=' . $pesan;
        $result = file_get_contents($url, true);
        $result = json_decode($result);
        return $result;
    }

    public function sendMessage($email, $name, $message)
    {
        $id = config('messages.telegram.author_user');
        $msg = 'New message from ' . $name . '(' . $email . ')%0A %0A' . $message;
        if ($this->sendTelegram($id, $msg)) {
            return true;
        }
    }

    public function message(Request $request)
    {
        if ($this->sendMessage($request->email, $request->name, $request->message)) {
            return redirect('/')->with('message_send', 'Message Send Succesfully. I will contact you later.');
        } else {
            return redirect('/')->with('message_send_failed', 'Message Failed to send, You can directly Contact me on Email : ' . Profile::get()[0]->email);
        }
    }
}
