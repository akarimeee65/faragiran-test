<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Price;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Check `courses` db has columns
     *
     * @return void
     * @test
     */
    public function courses_database_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('courses', [
                'id',
                'name',
            ]), 1
        );
    }

    /**
     * Insert Data
     *
     * @test
     */
    public function insert_data_course()
    {
        $data = Course::factory()
            ->make()
            ->toArray();

        Course::create($data);

        $this->assertDatabaseHas('courses', $data);
    }

    /**
     * check Course has Lessons
     *
     * @return void
     * @test
     */
    public function course_relation_with_lesson()
    {
        $count = rand(0, 10);

        $course = Course::factory()
            ->hasLessons($count)
            ->create();

        $this->assertCount($count, $course->lessons);
        $this->assertTrue($course->lessons->first() instanceof Lesson);
    }

    /**
     * course morph one price
     *
     * @test
     */
    public function course_morph_one_price()
    {
        $course = Course::factory()
            ->create();

        $coursePrice = Price::factory()->for(
            $course, 'priceable'
        )->create();

        $this->assertInstanceOf(Price::class, $course->price);
    }
}
