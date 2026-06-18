@extends('dashboard.layouts.master')

@section('title', 'Edit Classroom')
@section('page_title', 'Edit Classroom')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.classrooms.index') }}" style="color: #6c757d; text-decoration: none;">
            classrooms  
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Edit</span>
    </li>
@endsection

@section('content')
    @include('dashboard.pages.classrooms._form', [
        'classroom' => $classroom,
        'action' => route('dashboard.classrooms.update', $classroom->id),
        'method' => 'POST',
        'buttonText' => 'Update Classroom',
        'isEdit' => true
    ])
@endsection