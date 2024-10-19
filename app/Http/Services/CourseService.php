<?php
namespace App\Http\Services;

use App\Models\Course;

class CourseService
{
    /**
     * Get list of courses.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search)
    {
        // Retrieve and return all courses
        $courses = Course::where('courseId', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get()
            ->makeHidden(['id','department', 'created_at', 'updated_at']);

        return $courses;
    }

    /**
     * Mass create courses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        var_dump($request->input('courses'));
        // Parse the input JSON string into an array of course objects
        $courses = json_decode($request->input('courses'));
        // Iterate over each course object and create a new course record
        foreach ($courses as $course) {
            Course::create((array) $course);
        }
        return true;
    }

    public function update($request)
    {
        $updateCourse = Course::where('courseId', $request->courseId)->update([
            'courseId' => $request->day,
            'name' => $request->startTime,
            'department' => $request->middlename,
        ]);

        return $updateCourse;
    }
}