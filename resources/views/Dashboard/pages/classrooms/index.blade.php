@extends('dashboard.layouts.master')

@section('title', 'Classrooms Management')
@section('page_title', 'Classrooms List')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}" style="color: #6c757d; text-decoration: none;"> Dashboard
        </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Classrooms</span>
    </li>
@endsection

@php
    $searchPlaceholder = '🔍 Search by classroom name, capacity, or students count...';
    $searchHint = 'Search by name (e.g. "Grade 5"), capacity (e.g. "30"), or students count';
@endphp

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard me-2 text-primary"></i>All Classrooms
                    </h5>
                    <x-buttons.add-button route="{{ route('dashboard.classrooms.create') }}" label="Add New Classroom"
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
                        clearRoute="{{ route('dashboard.classrooms.index') }}" resultsCount="{{ $classrooms->count() }}" />

                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Capacity</th>
                                    <th>Students Count</th>
                                    <th>Teachers Count</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($classrooms as $classroom)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $classroom->name }}</strong></td>
                                        <td>{{ $classroom->description ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-purple-600 text-sm px-3 py-1">
                                                <i class="fas fa-users me-1"></i>
                                                {{ $classroom->capacity }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-purple-900 text-sm px-3 py-1">
                                                <i class="fas fa-user-graduate me-1"></i>
                                                {{ $classroom->students_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-indigo-900 text-sm px-3 py-1">
                                                <i class="fas fa-chalkboard-teacher me-1"></i>
                                                {{ $classroom->teachers_count ?? 0 }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <x-buttons.action-buttons-withShow
                                                editRoute="{{ route('dashboard.classrooms.edit', $classroom->id) }}"
                                                deleteRoute="{{ route('dashboard.classrooms.destroy', $classroom->id) }}"
                                                showRoute="{{ route('dashboard.classrooms.show', $classroom->id) }}"
                                                confirmMessage="Are you sure you want to delete this classroom?" />
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <i class="fas fa-chalkboard fa-3x text-muted d-block mb-3"></i>
                                            <h5>No Classrooms Found</h5>
                                            <p class="text-muted">Click "Add New" to create your first classroom.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- ===== PAGINATION ===== --}}
                    @if ($classrooms->hasPages())
                        <div class="card-footer clearfix">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                {{-- Showing info --}}
                                <div class="text-muted small">
                                    Showing <strong>{{ $classrooms->firstItem() }}</strong> 
                                    to <strong>{{ $classrooms->lastItem() }}</strong> 
                                    of <strong>{{ $classrooms->total() }}</strong> classrooms
                                </div>
                                
                                {{-- Pagination links --}}
                                <div class="float-right">
                                    {{ $classrooms->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection