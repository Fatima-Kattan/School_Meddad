<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    public function index(Request $request)
    {
        $query = Classroom::withCount(['students', 'teachers']);

        //search
        if ($request->filled('search')) {
            $search = $request->search;
            
            if (is_numeric($search)) {
                $query->having('students_count', $search);
            } 
            else {
                $query->where('name', 'like', "%{$search}%");
            }
        }

        // Sort by newest
        $query->orderBy('created_at', 'desc');

        $classrooms = $query->paginate(5);

        return view('dashboard.pages.classrooms.index', compact('classrooms'));
    }


    public function create()
    {
        return view('dashboard.pages.classrooms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'nullable|integer',
        ]);

        Classroom::create($data);

        return redirect()->route('dashboard.classrooms.index')->with('success', 'Classroom created successfully.');
    }

    public function show(Classroom $classroom)
    {
        $classroom->load(['students', 'teachers']);
        
        return view('dashboard.pages.classrooms.show', compact('classroom'));
    } 

    public function edit(Classroom $classroom)
    {
        return view('dashboard.pages.classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity' => 'nullable|integer',
        ]);

        $classroom->update($data);

        return redirect()->route('dashboard.classrooms.index')->with('success', 'Classroom updated successfully.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('dashboard.classrooms.index')->with('success', 'Classroom deleted successfully.');
    }
}
