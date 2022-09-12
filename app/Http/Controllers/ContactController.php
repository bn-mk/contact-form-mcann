<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Interfaces\ContactFormInterface;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function show(ContactFormInterface $form)
    {
        /**
         * @var DatabaseFormHandler $form
         */
        return Inertia::render('ContactForm');
    }

    public function store(ContactRequest $request, ContactFormInterface $form)
    {
        $validated_form_data = $request->validated();
        dd($request->all());
    }
}
