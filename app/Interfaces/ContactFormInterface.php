<?php

namespace App\Interfaces;

interface ContactFormInterface
{
    public function submission(array $form_data): void;
    public function transformName(string $name): string;
    public function transformEmail(string $email): string;
    public function transformComment(string $comment): string;
}
