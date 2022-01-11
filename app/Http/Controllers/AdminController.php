<?php


namespace App\Http\Controllers;

use App\Contact;

class AdminController extends Controller
{
    public function feedback()
    {
        $title = "Список обращений";
        $menu = $this->menu();
        $contacts = Contact::get();

        return view('admin.feedback', compact("menu", 'title', 'contacts'));
    }

}