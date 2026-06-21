<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index(Request $request) 
    {
        $query = Teacher::with('classroom');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('specialization', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Sort by newest
        $query->orderBy('created_at', 'desc');

        $teachers = $query->paginate(5);
        $classrooms = Classroom::pluck('name', 'id');

        return view('dashboard.pages.teachers.index', compact('teachers', 'classrooms'));
    }

    public function create()
    {
        return view('dashboard.pages.teachers.create', [
            'teacher' => new Teacher(),
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:150|unique:teachers,email',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:100',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ]);

        Teacher::create($data);

        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher)
    {
        return view('dashboard.pages.teachers.edit', [
            'teacher' => $teacher,
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:150|unique:teachers,email,' . $teacher->id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:100',
            'classroom_id' => 'nullable|exists:classrooms,id',
        ]);

        $teacher->update($data);

        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('dashboard.teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
