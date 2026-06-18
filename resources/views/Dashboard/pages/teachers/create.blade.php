@extends('dashboard.layouts.master')

@section('title', 'Add Teacher')
@section('page_title', 'Add New Teacher')
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
        <span style="color: #4e73df; font-weight: 500;">Create</span>
    </li>
@endsection

@section('content')
    @include('dashboard.pages.teachers._form', [
        'classrooms' => $classrooms,
        'action' => route('dashboard.teachers.store'),
        'method' => 'POST',
        'buttonText' => 'Save Teacher',
        'isEdit' => false
    ])
@endsection