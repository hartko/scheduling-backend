<?php
namespace App\Http\Services;

use App\Models\Subject;

class SubjectService
{
    /**
     * Get list of subject.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search)
    {
        // Retrieve and return all subject
        $subjects = Subject::where('code', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get()
            ->groupBy('code')
            ->makeHidden(['id','level','unit','created_at', 'updated_at']);
        return $subjects;
    }

    /**
     * Mass create subject.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        // Parse the input JSON string into an array of subject objects
        $subjects = json_decode($request->input('subjects'));
        // Iterate over each subject object and create a new subject record
        foreach ($subjects as $subject) {
            Subject::create((array) $subject);
        }
        return true;
    }

    public function update($request)
    {
        $updateSubject = Subject::where('subjectId', $request->subjectId)->update([
            'name' => $request->name,
            'subjectId' => $request->subjectId,
            'unit' => $request->unit,
        ]);

        return $updateSubject;
    }
}