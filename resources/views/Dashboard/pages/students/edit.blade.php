@extends('dashboard.layouts.master')

@section('title', 'Edit Student')
@section('page_title', 'Edit Student')
@section('page_title', 'Edit Teacher')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.students.index') }}" style="color: #6c757d; text-decoration: none;">
            Students
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Edit</span>
    </li>
@endsection

@section('content')
    @include('dashboard.pages.students._form', [
        'student' => $student,
        'classrooms' => $classrooms,
        'action' => route('dashboard.students.update', $student->id),
        'method' => 'POST',
        'buttonText' => 'Update Student',
        'isEdit' => true
    ])
@endsection