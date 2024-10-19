<?php
namespace App\Http\Services;

use App\Models\Teacher;

use Illuminate\Support\Facades\Hash;

class TeacherService
{
    /**
     * Get list of teachers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search, $limit = 10)
    {
        // Retrieve and return all teachers
        return Teacher::where('teacherId', 'like', '%' . $search . '%')
            ->orWhere('firstname', 'like', '%' . $search . '%')
            ->orWhere('middlename', 'like', '%' . $search . '%')
            ->orWhere('lastname', 'like', '%' . $search . '%')
            ->paginate($limit);
        ;
    }
    /**
     * Mass create teachers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        // Parse the input JSON string into an array of teacher objects
        $teachers = json_decode($request->input('teachers'));
        // Iterate over each teacher object and create a new teacher record
        foreach ($teachers as $teacher) {
            Teacher::create((array) $teacher);
        }
        return true;
    }

    public function update($request)
    {
        $updateTeacher = Teacher::where('teacherId', $request->teacherId)->update([
            'teacherId' => $request->teacherId,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
        ]);

        return $updateTeacher;
    }
}