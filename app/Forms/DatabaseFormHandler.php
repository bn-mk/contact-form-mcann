<?php

namespace App\Forms;

use App\Exceptions\ContactException;
use App\Interfaces\ContactFormInterface;
use App\Models\Contact;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class DatabaseFormHandler implements ContactFormInterface
{
    // handle the databse implemetation of the contact form.
    public function submission(array $form_data): void
    {
        try {
            // these form values are required but just in case we'll have some defaults
            $name = $form_data['name'] ?? 'No name submitted';
            $email = $form_data['email'] ?? 'No email submitted';
            $comment = $form_data['comment'] ?? 'No comment submitted';
            Contact::create(compact('name', 'email', 'comment'));
        } catch (QueryException | Exception $e) {
            Log::warning('Comment failed to save', [
                'error' => $e->getMessage()
            ]);
            throw new ContactException();
        }
    }

    public function transformName(string $name): string
    {
        return Str::title($name);
    }

    public function transformEmail(string $email): string
    {
        return Str::lower($email);
    }

    public function transformComment(string $comment): string
    {
        return $comment;
    }
}
