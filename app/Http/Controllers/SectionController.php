<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function dataSection(Request $request)
    {
        // return 123;
        if ($request->input('department_code') != null) {
            $section = Section::where('department_code', $request->input('department_code'))->orderBy('section_name')->get();
        } else {
            $section = Section::orderBy('section_name')->get();
        }
        return response()
            ->json($section);
    }
}
