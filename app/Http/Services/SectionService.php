<?php
namespace App\Http\Services;

use App\Http\Requests\CreateSectionRequest;
use App\Models\Section;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class SectionService
{
    /**
     * Get list of Sections.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list($search)
    {
        // Retrieve and return all Sections
        return Section::where('code', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get()->makeHidden(['id', 'created_at', 'updated_at']);
        ;
    }
    /**
     * Attempt to create Section.
     *
     * @param  CreateSectionRequest  $request
     * @return bool
     */
    public function store(CreateSectionRequest $request)
    {
        $section = Section::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);
        return $section;
    }

    /**
     * Mass create Sections.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function massCreate($request)
    {
        // Parse the input JSON string into an array of Section objects
        $sections = json_decode($request->input('sections'));
        // Iterate over each Section object and create a new Section record
        foreach ($sections as $section) {
            Section::create((array) $section);
        }
        return true;
    }

    public function update(CreateSectionRequest $request)
    {
        $updateSection = Section::where('sectionId', $request->sectionId)->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return $updateSection;
    }
}