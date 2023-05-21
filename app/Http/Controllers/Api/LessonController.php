<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonStoreRequest;
use App\Http\Resources\LessonResource;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Price;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * store Lesson and Price
     *
     * @param LessonStoreRequest $request
     * @return LessonResource
     */
    public function store(LessonStoreRequest $request,Lesson $lesson)
    {
        $lesson->name = $request->name;
        $lesson->course_id = $request->course_id;
        $lesson->save();

        $price = new Price();
        $price->price = $request->price;
        $price->priceable_id = $lesson->id;
        $price->priceable_type = 'App\Models\Lesson';
        $price->save();

        return new LessonResource($lesson);
    }
}
