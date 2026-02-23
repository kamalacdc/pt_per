<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Mail\ContactReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KotakMasukController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin.kotak_masuk.index', compact('contacts'));
    }

    public function destroy($name)
    {
        $contact = Contact::findOrFail($name);
        $contact->delete();
        return redirect()->route('admin.kotak_masuk.index')->with('success', 'Contact deleted successfully.');
    }

    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply_message' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);

        Mail::to($contact->email)->send(new ContactReply($contact, $request->reply_message));

        return redirect()->route('admin.kotak_masuk.index')->with('success', 'Reply sent successfully.');
    }
}
