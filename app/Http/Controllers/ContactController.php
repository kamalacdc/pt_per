<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact.create');
    }

    public function store(ContactRequest $request): RedirectResponse
    {
        Contact::create($request->validated());
        return back()->with('status','Pesan terkirim. Kami akan menghubungi Anda.');
    }

    public function index()
    {
        $contacts = Contact::paginate(15);
        return view('admin.kotak_masuk.index', compact('contacts'));
    }
}
