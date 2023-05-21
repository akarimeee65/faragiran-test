<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Price;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check `lessons` db has columns
     *
     * @return void
     * @test
     */
    public function lessons_database_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('lessons', [
                'id',
                'name',
                'course_id'
            ]), 1
        );
    }

    /**
     * Insert Data
     *
     * @test
     */
    public function insert_data_lesson()
    {
        $data = Lesson::factory()
            ->make()
            ->toArray();

        Lesson::create($data);

        $this->assertDatabaseHas('lessons', $data);
    }

    /**
     * check Lesson instance of Course
     *
     * @return void
     * @test
     */
    public function lesson_relation_with_course(): void
    {
        $lesson = Lesson::factory()
            ->for(Course::factory())
            ->create();

        $this->assertTrue(isset($lesson->course->id));
        $this->assertTrue($lesson->course instanceof Course);
    }

    /**
     * lesson morph one price
     *
     * @test
     */
    public function lesson_morph_one_price()
    {
        $lesson = Lesson::factory()
            ->create();

        $coursePrice = Price::factory()->for(
            $lesson, 'priceable'
        )->create();

        $this->assertInstanceOf(Price::class, $lesson->price);
    }
}
