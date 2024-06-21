<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Document;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_teacher_can_have_documents()
    {
        $teacher = Teacher::factory()->create();
        $document = Document::factory()->create(['teacher_id' => $teacher->id]);

        $this->assertInstanceOf(Document::class, $teacher->documents->first());
        $this->assertEquals(1, $teacher->documents->count());
    }

    public function test_student_can_have_questions()
    {
        $student = Student::factory()->create();
        $question = Question::factory()->create(['student_id' => $student->id]);

        $this->assertInstanceOf(Question::class, $student->questions->first());
        $this->assertEquals(1, $student->questions->count());
    }

    public function test_document_belongs_to_teacher()
    {
        $teacher = Teacher::factory()->create();
        $document = Document::factory()->create(['teacher_id' => $teacher->id]);

        $this->assertInstanceOf(Teacher::class, $document->teacher);
        $this->assertEquals($teacher->id, $document->teacher->id);
    }

    public function test_question_belongs_to_student()
    {
        $student = Student::factory()->create();
        $question = Question::factory()->create(['student_id' => $student->id]);

        $this->assertInstanceOf(Student::class, $question->student);
        $this->assertEquals($student->id, $question->student->id);
    }

    public function test_question_can_have_answer()
    {
        $question = Question::factory()->create();
        $answer = Answer::factory()->create(['question_id' => $question->id]);

        $this->assertInstanceOf(Answer::class, $question->answer);
        $this->assertEquals($answer->id, $question->answer->id);
    }

    public function test_answer_belongs_to_question()
    {
        $question = Question::factory()->create();
        $answer = Answer::factory()->create(['question_id' => $question->id]);

        $this->assertInstanceOf(Question::class, $answer->question);
        $this->assertEquals($question->id, $answer->question->id);
    }
}