<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConnectionRequestMail;

class ConnectionController extends Controller
{
    // Send connection request
    public function connect($id)
    {
        $receiver = Alumni::findOrFail($id);

        // Can't connect to yourself
        if (Auth::id() == $id) {
            return back()->with('error', 'You cannot connect with yourself!');
        }

        // Check if already connected or pending
        $existing = Connection::where('sender_id', Auth::id())
                              ->where('receiver_id', $id)
                              ->first();

        if ($existing) {
            return back()->with('error', 'Connection request already sent!');
        }

        // Create connection
        Connection::create([
            'sender_id'   => Auth::id(),
            'receiver_id' => $id,
            'status'      => 'pending',
        ]);

        // Send email notification
        try {
            Mail::to($receiver->email)->send(
                new ConnectionRequestMail(Auth::user(), $receiver)
            );
        } catch (\Exception $e) {
            // Email failed silently — connection still saved
        }

        return back()->with('success',
            'Connection request sent to ' . $receiver->name . '!');
    }

    // Show all connections for logged in alumni
    public function index()
    {
        $sent = Connection::with('receiver')
                          ->where('sender_id', Auth::id())
                          ->get();

        $received = Connection::with('sender')
                              ->where('receiver_id', Auth::id())
                              ->get();

        return view('connections.index', compact('sent', 'received'));
    }

    // Accept connection
    public function accept($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'accepted']);
        return back()->with('success', 'Connection accepted!');
    }

    // Reject connection
    public function reject($id)
    {
        $connection = Connection::findOrFail($id);
        $connection->update(['status' => 'rejected']);
        return back()->with('success', 'Connection rejected.');
    }
}