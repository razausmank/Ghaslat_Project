<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Controller as AdminController;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use App\Notifications\ContactUs as NotificationsContactUs;

class ContactUsController extends AdminController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $contact_us = ContactUs::create($validated);

        $contact_us->notify(new NotificationsContactUs($contact_us->name, $contact_us->email));

        return "We've received your message and will contact you soon";
    }

    public function show(ContactUs $contact_us)
    {
        $contact_us->unreadNotifications->markAsRead();
        return view('contactus.show', compact('contact_us'));
    }

    public function index()
    {
        $messages = DatabaseNotification::where('type', 'App\Notifications\ContactUs')->get();
        return view('contactus.index', compact('messages'));
    }

    public function destroy(ContactUs $message)
    {
        try {
            $message->notifications()->delete();
            $message->destroy($message->id);
        } catch (Exception $exception) {
            return redirect(route('contactus.index'))->with('failure', 'Message Cannot be deleted');
        }

        return redirect(route('contactus.index'))->with('success', 'Message  successfuly deleted');
    }
}
