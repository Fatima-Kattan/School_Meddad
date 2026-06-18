@extends('dashboard.layouts.master')

@section('title', 'Classroom Details')
@section('page_title', 'Classroom Details')

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
        <span style="color: #4e73df; font-weight: 500;">Show</span>
    </li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            {{-- ===== Classroom Information ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard me-2 text-primary"></i>Classroom Information
                    </h5>
                    <div>
                        <a href="{{ route('dashboard.classrooms.edit', $classroom->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <a href="{{ route('dashboard.classrooms.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 30%;">Classroom Name</th>
                                    <td><strong>{{ $classroom->name }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $classroom->description ?? 'No description' }}</td>
                                </tr>
                                <tr>
                                    <th>Capacity</th>
                                    <td>
                                        <span class="badge" style="background-color: #6f42c1; color: #fff; padding: 6px 12px;">
                                            <i class="fas fa-users me-1"></i>
                                            {{ $classroom->capacity }} Students
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Students</th>
                                    <td>
                                        <span class="badge" style="background-color: #4e73df; color: #fff; padding: 6px 12px;">
                                            <i class="fas fa-user-graduate me-1"></i>
                                            {{ $classroom->students->count() }} Students
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Teachers</th>
                                    <td>
                                        <span class="badge" style="background-color: #1cc88a; color: #fff; padding: 6px 12px;">
                                            <i class="fas fa-chalkboard-teacher me-1"></i>
                                            {{ $classroom->teachers->count() }} Teachers
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td>{{ $classroom->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Last Updated</th>
                                    <td>{{ $classroom->updated_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            {{-- Statistics --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="card bg-primary text-white">
                                        <div class="card-body text-center">
                                            <h1 class="display-4">{{ $classroom->students->count() }}</h1>
                                            <p class="mb-0">
                                                <i class="fas fa-user-graduate me-1"></i> Students
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card bg-warning text-dark">
                                        <div class="card-body text-center">
                                            <h1 class="display-4">{{ $classroom->teachers->count() }}</h1>
                                            <p class="mb-0">
                                                <i class="fas fa-chalkboard-teacher me-1"></i> Teachers
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="card bg-info text-white">
                                        <div class="card-body text-center">
                                            <h1 class="display-4">{{ $classroom->capacity }}</h1>
                                            <p class="mb-0">
                                                <i class="fas fa-users me-1"></i> Capacity
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="card bg-success text-white">
                                        <div class="card-body text-center">
                                            @php
                                                $percentage = $classroom->capacity > 0 
                                                    ? round(($classroom->students->count() / $classroom->capacity) * 100) 
                                                    : 0;
                                            @endphp
                                            <h1 class="display-4">{{ $percentage }}%</h1>
                                            <p class="mb-0">
                                                <i class="fas fa-chart-pie me-1"></i> Utilization
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== Students List ===== --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-user-graduate me-2 text-success"></i>Students in this Classroom
                        <span class="badge bg-success ms-2">{{ $classroom->students->count() }}</span>
                    </h5>
                    <x-buttons.add-button route="{{ route('dashboard.students.create') }}" label="Add New Student"
                        icon="fas fa-plus" color="indigo" size="ms" />
                </div>
                <div class="card-body">
                    @if ($classroom->students->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birth Date</th>
                                        <th width="150" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classroom->students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $student->name }}</strong></td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone ?: '—' }}</td>
                                            <td>{{ $student->birth_date ?: '—' }}</td>
                                            <td class="text-center">
                                                <x-buttons.action-buttons
                                                    editRoute="{{ route('dashboard.students.edit', $student->id) }}"
                                                    deleteRoute="{{ route('dashboard.students.destroy', $student->id) }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-user-graduate fa-3x text-muted d-block mb-3"></i>
                            <h5>No Students Assigned</h5>
                            <p class="text-muted">No students are currently assigned to this classroom.</p>
                            <x-buttons.add-button route="{{ route('dashboard.students.create') }}" label="Add New Student"
                                icon="fas fa-plus" color="indigo" size="ms" />
                        </div>
                    @endif
                </div>
            </div>

            {{-- ===== Teachers List ===== --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-chalkboard-teacher me-2 text-warning"></i>Teachers in this Classroom
                        <span class="badge bg-warning ms-2">{{ $classroom->teachers->count() }}</span>
                    </h5>
                    <x-buttons.add-button route="{{ route('dashboard.teachers.create') }}" label="Add New Teacher"
                        icon="fas fa-plus" color="indigo" size="ms" />
                </div>
                <div class="card-body">
                    @if ($classroom->teachers->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Specialization</th>
                                        <th width="150" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classroom->teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><strong>{{ $teacher->name }}</strong></td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->phone ?: '—' }}</td>
                                            <td>
                                                <span class="badge" style="background-color: #6f42c1; color: #fff;">
                                                    {{ $teacher->specialization ?: 'Not Specified' }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <x-buttons.action-buttons
                                                    editRoute="{{ route('dashboard.teachers.edit', $teacher->id) }}"
                                                    deleteRoute="{{ route('dashboard.teachers.destroy', $teacher->id) }}" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-chalkboard-teacher fa-3x text-muted d-block mb-3"></i>
                            <h5>No Teachers Assigned</h5>
                            <p class="text-muted">No teachers are currently assigned to this classroom.</p>
                            <x-buttons.add-button route="{{ route('dashboard.teachers.create') }}" label="Add New Teacher"
                                icon="fas fa-plus" color="indigo" size="ms" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection