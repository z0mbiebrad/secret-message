<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Message $message)
    {
        $messages = $message::all();

        return view('read-message', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('write-message');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'recipient' => 'required',
            'decryption_key' => 'required'
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'sender' => Auth::user()->name,
            'message' => $validated['message'],
            'recipient' => $validated['recipient'],
            'decryption_key' => $validated['decryption_key'],
        ]);

        return redirect()->route('message.create')->with('message', 'Your message has been sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message, Request $request)
    {
        if ($message::where('decryption_key', $request->input('decryption_key'))->where('recipient', Auth::user()->name)->exists()) {

            $secret_message = $message::where('decryption_key', $request->input('decryption_key'))->where('recipient', Auth::user()->name)->get();

            return view('show-message', ['secret_message' => $secret_message]);
        } else {
            return redirect()->route('message.index')->with('message', 'You are not authorized to view this message');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message, $id)
    {
        $delete_message = $message::where('id', $id);
        $delete_message->delete();

        return redirect()->route('message.index');
    }
}
