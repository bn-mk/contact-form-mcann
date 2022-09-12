<?php

namespace Tests\Unit;

use App\Forms\DatabaseFormHandler;
use App\Interfaces\ContactFormInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class DatabaseFormHandlerTest extends TestCase
{
    use RefreshDatabase;

    protected DatabaseFormHandler $component;

    public function setUp(): void
    {
        parent::setUp();
        $this->component = new DatabaseFormHandler();
    }
    public function test_handler_implements_interface(): void
    {
        $this->assertInstanceOf(ContactFormInterface::class, $this->component);
    }

    public function test_transformName(): void
    {
        $this->assertEquals('Test String', $this->component->transformName('test string'));
    }

    public function test_transformEmail(): void
    {
        $this->assertEquals('test@gmail.com', $this->component->transformEmail('Test@Gmail.com'));
    }

    public function test_transformComment(): void
    {
        $this->assertEquals('test string', $this->component->transformComment('test string'));
    }
}
