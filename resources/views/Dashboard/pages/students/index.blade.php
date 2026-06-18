@extends('dashboard.layouts.master')

@section('title', 'Students Management')
@section('page_title', 'Students List')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;"> Dashboard
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Students</span>
    </li>
@endsection

@php
    $searchPlaceholder = '🔍 Search students by name, email or phone...';
    $searchHint = 'Search by name, email, or phone';
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-user-graduate me-2 text-primary"></i>All Students
                    </h5>
                    <x-buttons.add-button route="{{ route('dashboard.students.create') }}" label="Add New Student"
                        icon="fas fa-plus" color="indigo" size="ms" />
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- section search results --}}
                    <x-search-result search="{{ request()->query('search') }}"
                        clearRoute="{{ route('dashboard.students.index') }}" resultsCount="{{ $students->count() }}" />

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Classroom</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $student->name }}</strong></td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone ?? '_' }}</td>
                                        <td>
                                            @if ($student->classroom)
                                                <span class="badge bg-purple-600 text-sm px-3 py-1">
                                                    <i class="fas fa-chalkboard me-1"></i>
                                                    {{ $student->classroom->name }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary text-sm px-3 py-1">
                                                    <i class="fas fa-times-circle me-1"></i>
                                                    Not Assigned
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <x-buttons.action-buttons
                                                editRoute="{{ route('dashboard.students.edit', $student->id) }}"
                                                deleteRoute="{{ route('dashboard.students.destroy', $student->id) }}"
                                                confirmMessage="Are you sure you want to delete this student?" />
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            <i class="fas fa-user-graduate fa-3x text-muted d-block mb-3"></i>
                                            <h5>No Students Found</h5>
                                            <p class="text-muted">Click "Add New" to create your first student.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ===== PAGINATION ===== --}}
                    @if ($students->hasPages())
                        <div class="card-footer clearfix">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                {{-- Showing info --}}
                                <div class="text-muted small">
                                    Showing <strong>{{ $students->firstItem() }}</strong> 
                                    to <strong>{{ $students->lastItem() }}</strong> 
                                    of <strong>{{ $students->total() }}</strong> students
                                </div>
                                
                                {{-- Pagination links --}}
                                <div class="float-right">
                                    {{ $students->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection