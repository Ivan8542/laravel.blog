<?php


namespace App\Http\Controllers;


use App\Contact;

class ContactsController extends Controller
{
    public function contacts()
    {
        $title = 'Контакты';
        $menu = $this->menu();

        return view('tasks.contacts', compact('title', 'menu'));
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required',
            'body' => 'required',
        ]);

        Contact::create(request()->all());

        return redirect('/');

    }
}