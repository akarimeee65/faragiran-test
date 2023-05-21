<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Http\Resources\LessonResource;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Resources\CourseResource;

class CourseController extends Controller
{

    /**
     * update Course Price
     *
     * @param CourseUpdateRequest $request
     * @param $id
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        $course->price->price = $request->price;
        $course->price->update();

        return new CourseResource($course);
    }
}
