<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Interfaces\ContactFormInterface;

class ContactController extends Controller
{
    public function show(ContactFormInterface $form)
    {
        /**
         * @var DatabaseFormHandler $form
         */
        return view('contact-form');
    }

    public function store(ContactRequest $request, ContactFormInterface $form)
    {
        $validated_form_data = $request->validated();
    }
}
