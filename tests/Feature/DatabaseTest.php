<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_migrations_are_working()
    {
        $this->assertTrue(Schema::hasTable('teachers'));
        $this->assertTrue(Schema::hasTable('students'));
        $this->assertTrue(Schema::hasTable('documents'));
        $this->assertTrue(Schema::hasTable('questions'));
        $this->assertTrue(Schema::hasTable('answers'));

        $this->assertTrue(Schema::hasColumn('teachers', 'name'));
        $this->assertTrue(Schema::hasColumn('teachers', 'email'));
        $this->assertTrue(Schema::hasColumn('teachers', 'password'));

        $this->assertTrue(Schema::hasColumn('students', 'name'));
        $this->assertTrue(Schema::hasColumn('students', 'email'));
        $this->assertTrue(Schema::hasColumn('students', 'password'));

        $this->assertTrue(Schema::hasColumn('documents', 'teacher_id'));
        $this->assertTrue(Schema::hasColumn('documents', 'title'));
        $this->assertTrue(Schema::hasColumn('documents', 'content'));

        $this->assertTrue(Schema::hasColumn('questions', 'student_id'));
        $this->assertTrue(Schema::hasColumn('questions', 'question_text'));

        $this->assertTrue(Schema::hasColumn('answers', 'question_id'));
        $this->assertTrue(Schema::hasColumn('answers', 'answer_text'));
    }
}