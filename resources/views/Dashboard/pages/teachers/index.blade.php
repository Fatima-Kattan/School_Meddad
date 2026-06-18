@extends('dashboard.layouts.master')

@section('title', 'Teachers Management')
@section('page_title', 'Teachers List')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;"> Dashboard
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Teachers</span>
    </li>
@endsection

@php
    $searchPlaceholder = '🔍 Search teachers by name, email or specialization...';
    $searchHint = 'Search by name, email, or specialization';
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard-teacher me-2 text-primary"></i>All Teachers
                    </h5>
                    <x-buttons.add-button route="{{ route('dashboard.teachers.create') }}" label="Add New Teacher"
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
                        clearRoute="{{ route('dashboard.teachers.index') }}" resultsCount="{{ $teachers->count() }}" />

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Specialization</th>
                                    <th>Classroom</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $teacher->name }}</strong></td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone ?? '_' }}</td>
                                        <td>
                                            <span class="tx-purple-600 fw-bold">
                                                {{ $teacher->specialization ?? 'Not Specified' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($teacher->classroom)
                                                <span class="badge bg-purple-600 text-sm px-3 py-1">
                                                    <i class="fas fa-chalkboard me-1"></i>
                                                    {{ $teacher->classroom->name }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">Not Assigned</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <x-buttons.action-buttons
                                                editRoute="{{ route('dashboard.teachers.edit', $teacher->id) }}"
                                                deleteRoute="{{ route('dashboard.teachers.destroy', $teacher->id) }}"
                                                confirmMessage="Are you sure you want to delete this teacher?" />
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-chalkboard-teacher fa-3x text-muted d-block mb-3"></i>
                                            <h5>No Teachers Found</h5>
                                            <p class="text-muted">Click "Add New" to create your first teacher.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ===== PAGINATION ===== --}}
                    @if ($teachers->hasPages())
                        <div class="card-footer clearfix">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                {{-- Showing info --}}
                                <div class="text-muted small">
                                    Showing <strong>{{ $teachers->firstItem() }}</strong> 
                                    to <strong>{{ $teachers->lastItem() }}</strong> 
                                    of <strong>{{ $teachers->total() }}</strong> teachers
                                </div>
                                
                                {{-- Pagination links --}}
                                <div class="float-right">
                                    {{ $teachers->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection