<?php

namespace Tests\Feature\Models;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Price;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PriceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->course = Course::factory()
            ->create();

        $this->lesson = Lesson::factory()
            ->create();
    }

    /**
     * Check `prices` db has columns
     *
     * @return void
     * @test
     */
    public function prices_database_has_expected_columns(): void
    {
        $this->assertTrue(
            Schema::hasColumns('prices', [
                'price',
                'priceable_id',
                'priceable_type'
            ]), 1
        );
    }

    /**
     * price morph one course
     *
     * @return void
     * @test
     */
    public function price_relation_with_course()
    {
        $price = Price::factory()->create([
            'priceable_id' => $this->course->id,
            'priceable_type' => "App\Models\Course",
        ]);

        $this->assertInstanceOf(Course::class, $price->priceable);
    }

    /**
     * price morph one lesson
     *
     * @return void
     * @test
     */
    public function price_relation_with_lesson()
    {
        $price = Price::factory()->create([
            'priceable_id' => $this->lesson->id,
            'priceable_type' => "App\Models\Lesson",
        ]);

        $this->assertInstanceOf(Lesson::class, $price->priceable);
    }
}
