<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::with('classroom');
            //search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Sort by newest
        $query->orderBy('created_at', 'desc');

        $students = $query->paginate(5);
        $classrooms = Classroom::pluck('name', 'id');

        return view('dashboard.pages.students.index', compact('students', 'classrooms'));
    }

    public function create()
    {
        return view('dashboard.pages.students.create', [
            'student' => new Student(),
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:150|unique:students,email',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'classroom_id' => 'nullable|exists:classrooms,id|required',
        ]);

        Student::create($data);

        return redirect()->route('dashboard.students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('dashboard.pages.students.edit', [
            'student' => $student,
            'classrooms' => Classroom::pluck('name', 'id'),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:150|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'classroom_id' => 'nullable|exists:classrooms,id|required',
        ]);

        $student->update($data);

        return redirect()->route('dashboard.students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('dashboard.students.index')->with('success', 'Student deleted successfully.');
    }
}
