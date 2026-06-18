@extends('dashboard.layouts.master')

@section('title', 'Add Classroom')
@section('page_title', 'Add New Classroom')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;">
            Dashboard
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.classrooms.index') }}" style="color: #6c757d; text-decoration: none;">
            Classrooms
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Create</span>
    </li>
@endsection

@section('content')
    @include('dashboard.pages.classrooms._form', [
        'action' => route('dashboard.classrooms.store'),
        'method' => 'POST',
        'buttonText' => 'Save Classroom',
        'isEdit' => false
    ])
@endsection