@extends('dashboard.layouts.master')

@section('title', 'Edit Teacher')
@section('page_title', 'Edit Teacher')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.teachers.index') }}" style="color: #6c757d; text-decoration: none;">
            teachers
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Edit</span>
    </li>
@endsection

@section('content')
    @include('dashboard.pages.teachers._form', [
        'teacher' => $teacher,
        'classrooms' => $classrooms,
        'action' => route('dashboard.teachers.update', $teacher->id),
        'method' => 'POST',
        'buttonText' => 'Update Teacher',
        'isEdit' => true
    ])
@endsection