@extends('dashboard.layouts.master')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')
@section('breadcrumbs', 'Welcome back! 👋')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">
        <span style="color: #4e73df; font-weight: 500;">Dashboard</span>
    </li>
@endsection
@section('content')
<!-- Stats Cards - New Design -->
<div class="stats-grid">
    <!-- Student Card -->
    <div class="stat-item">
        <div class="stat-item-inner">
            <div class="stat-item-front">
                <div class="stat-icon-wrapper stat-icon-blue">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Students</span>
                    <span class="stat-value">{{ $stats['students'] }}</span>
                </div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 12%
                </div>
            </div>
            <div class="stat-item-back stat-blue-bg">
                <div class="stat-back-content">
                    <i class="fas fa-user-graduate"></i>
                    <span>Total Students</span>
                    <strong>{{ $stats['students'] }}</strong>
                    <small>Enrolled in school</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Teacher Card -->
    <div class="stat-item">
        <div class="stat-item-inner">
            <div class="stat-item-front">
                <div class="stat-icon-wrapper stat-icon-green ">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Teachers</span>
                    <span class="stat-value">{{ $stats['teachers'] }}</span>
                </div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 8%
                </div>
            </div>
            <div class="stat-item-back stat-green-bg">
                <div class="stat-back-content">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Total Teachers</span>
                    <strong>{{ $stats['teachers'] }}</strong>
                    <small>Active staff</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Classroom Card -->
    <div class="stat-item">
        <div class="stat-item-inner">
            <div class="stat-item-front">
                <div class="stat-icon-wrapper stat-icon-orange">
                    <i class="fas fa-school"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Classrooms</span>
                    <span class="stat-value">{{ $stats['classrooms'] }}</span>
                </div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 5%
                </div>
            </div>
            <div class="stat-item-back stat-orange-bg">
                <div class="stat-back-content">
                    <i class="fas fa-school"></i>
                    <span>Total Classrooms</span>
                    <strong>{{ $stats['classrooms'] }}</strong>
                    <small>Available rooms</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Subjects Card -->
    <div class="stat-item">
        <div class="stat-item-inner">
            <div class="stat-item-front">
                <div class="stat-icon-wrapper stat-icon-purple">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-label">Subjects</span>
                    <span class="stat-value">8</span>
                </div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i> 3%
                </div>
            </div>
            <div class="stat-item-back stat-purple-bg">
                <div class="stat-back-content">
                    <i class="fas fa-book-open"></i>
                    <span>Total Subjects</span>
                    <strong>8</strong>
                    <small>Active curriculum</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions-wrapper">
    <div class="quick-actions-header">
        <h5><i class="fas fa-bolt"></i> Quick Actions</h5>
        <span class="header-badge">4 actions</span>
    </div>
    <div class="quick-actions-body">
        <x-buttons.add-button route="{{ route('dashboard.students.create') }}" label="Add New Student"
                        icon="fas fa-user-plus" color="indigo" size="ms" />
        <x-buttons.add-button route="{{ route('dashboard.teachers.create') }}" label="Add New Teacher"
                        icon="fas fa-chalkboard-teacher" color="indigo" size="ms" />
        <x-buttons.add-button route="{{ route('dashboard.classrooms.create') }}" label="Add New Classroom"
                        icon="fas fa-school" color="indigo" size="ms" />
    </div>
</div>
@endsection
