<?php

namespace App\Http\Controllers;

use App\Forms\DatabaseFormHandler;
use App\Http\Requests\ContactRequest;
use App\Interfaces\ContactFormInterface;
use App\Models\Contact;
use Inertia\Inertia;

class ContactController extends Controller
{

    public function index()
    {
        $data = Contact::orderBy('id', 'desc')->paginate(5)->through(function ($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'comment' => $item->comment,
                'created' => $item->created_at->format('d M Y - H:i:s'),
            ];
        });

        return Inertia::render('Submissions', ['items' => $data]);
    }

    public function show()
    {
        return Inertia::render('ContactForm');
    }

    public function store(ContactRequest $request, ContactFormInterface $form)
    {
        $validated_form_data = $request->validated();
        /**
         * @var DatabaseFormHandler $form
         */
        $form->submission($validated_form_data);

        return redirect('submissions');
    }
}
