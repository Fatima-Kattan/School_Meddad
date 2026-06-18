<?php

return [
    // ===== MAIN MENU =====
    'main_menu' => [
        [
            'title' => 'Dashboard',
            'route' => 'dashboard.index',
            'icon' => 'fas fa-chart-pie',
        ],
        [
            'title' => 'Classrooms',
            'route' => 'dashboard.classrooms.index',
            'icon' => 'fas fa-school',
            'badge' => true,
            'model' => \App\Models\Classroom::class,
        ],
        [
            'title' => 'Students',
            'route' => 'dashboard.students.index',
            'icon' => 'fas fa-user-graduate',
            'badge' => true, // لعرض العدد
            'model' => \App\Models\Student::class,
        ],
        [
            'title' => 'Teachers',
            'route' => 'dashboard.teachers.index',
            'icon' => 'fas fa-chalkboard-teacher',
            'badge' => true,
            'model' => \App\Models\Teacher::class,
        ],
        
    ],

    // ===== ACADEMIC =====
    'academic' => [
        [
            'title' => 'Subjects',
            'route' => '#',
            'icon' => 'fas fa-book-open',
        ],
        [
            'title' => 'Schedule',
            'route' => '#',
            'icon' => 'fas fa-calendar-alt',
        ],
    ],

    // ===== SYSTEM =====
    'system' => [
        [
            'title' => 'Users',
            'route' => '#',
            'icon' => 'fas fa-users-cog',
        ],
        [
            'title' => 'Settings',
            'route' => '#',
            'icon' => 'fas fa-cog',
        ],
    ],
];