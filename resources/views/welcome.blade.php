<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SchoolHub') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <!-- Main Container -->
        <div
            class="w-full max-w-7xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden border border-white/20">
            <!-- Header with Logo -->
            <div class="bg-gradient-to-r from-purple-600 to-indigo-500 px-8 py-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-graduation-cap text-white text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">SchoolHub</h1>
                        <p class="text-blue-100 text-sm">School Management System</p>
                    </div>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-6 py-2.5 bg-white/20 hover:bg-white/30 text-white rounded-xl font-medium transition-all duration-200 flex items-center gap-2 backdrop-blur-sm">
                                <i class="fas fa-th-large"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-6 py-2.5 bg-white/20 hover:bg-white/30 text-white rounded-xl font-medium transition-all duration-200 flex items-center gap-2 backdrop-blur-sm">
                                <i class="fas fa-sign-in-alt"></i>
                                Log In
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-6 py-2.5 bg-white hover:bg-blue-50 text-blue-600 rounded-xl font-semibold transition-all duration-200 flex items-center gap-2 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-plus"></i>
                                    Register
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 lg:p-12">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Left Side - Text -->
                    <div class="space-y-6">
                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                            <i class="fas fa-rocket"></i>
                            Welcome to SchoolHub
                        </div>

                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 leading-tight">
                            Manage Your School
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                                Effortlessly
                            </span>
                        </h2>

                        <p class="text-gray-600 text-md leading-relaxed">
                            SchoolHub is a comprehensive school management system designed to streamline administrative
                            tasks,
                            manage students, teachers, classes, and more — all in one place.
                        </p>

                        <!-- Features -->
                        <div class="grid grid-cols-2 gap-4 pt-4">
                            <div class="flex items-center gap-3 text-gray-700">
                                <div
                                    class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Students</p>
                                    <p class="text-xs text-gray-500">Manage all students</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div
                                    class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Teachers</p>
                                    <p class="text-xs text-gray-500">Manage all teachers</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div
                                    class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center text-purple-600">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Subjects</p>
                                    <p class="text-xs text-gray-500">Manage all subjects</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-gray-700">
                                <div
                                    class="w-10 h-10 bg-pink-100 rounded-xl flex items-center justify-center text-pink-600">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm">Schedule</p>
                                    <p class="text-xs text-gray-500">Class schedules</p>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Stats -->
                        <div class="flex items-center gap-6 pt-4 border-t border-gray-200">
                            <div>
                                <p class="text-2xl font-bold text-gray-800">4.8</p>
                                <p class="text-xs text-gray-500">⭐ Rating</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-800">10K+</p>
                                <p class="text-xs text-gray-500">Users</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-800">98%</p>
                                <p class="text-xs text-gray-500">Satisfaction</p>
                            </div>
                        </div>

                        <!-- CTA Buttons for guests -->
                        @guest
                            <div class="flex flex-wrap gap-4 pt-2">
                                <a href="{{ route('login') }}"
                                    class="px-8 py-3 bg-gradient-to-r from-purple-600 to-indigo-500 hover:from-indigo-600 hover:to-indigo-700 text-white rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl flex items-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Get Started
                                </a>
                                <a href="{{ route('register') }}"
                                    class="px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-semibold transition-all duration-200 flex items-center gap-2">
                                    <i class="fas fa-user-plus"></i>
                                    Create Account
                                </a>
                            </div>
                        @endguest
                    </div>

                    <!-- Right Side - Illustration -->
                    <div class="hidden lg:flex items-center justify-center">
                        <div class="relative">
                            <div
                                class="w-96 h-96 bg-gradient-to-br from-blue-400/20 to-indigo-400/20 rounded-full blur-3xl absolute -top-10 -right-10">
                            </div>
                            <div
                                class="relative bg-white/60 backdrop-blur-sm rounded-2xl p-24 shadow-xl border border-white/50">
                                <div class="space-y-8">
                                    <!-- Dashboard Preview -->
                                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-10">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white">
                                                    <i class="fas fa-user-graduate"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-800 text-sm">Students</p>
                                                    <p class="text-xs text-gray-500">1,248 enrolled</p>
                                                </div>
                                            </div>
                                            <span class="text-green-600 text-sm font-medium">+12%</span>
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-10">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center text-white">
                                                    <i class="fas fa-chalkboard-teacher"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-800 text-sm">Teachers</p>
                                                    <p class="text-xs text-gray-500">64 active</p>
                                                </div>
                                            </div>
                                            <span class="text-green-600 text-sm font-medium">+5%</span>
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-10">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center text-white">
                                                    <i class="fas fa-book-open"></i>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-gray-800 text-sm">Subjects</p>
                                                    <p class="text-xs text-gray-500">28 subjects</p>
                                                </div>
                                            </div>
                                            <span class="text-green-600 text-sm font-medium">+8%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-gray-200/50 px-8 py-4 bg-gray-50/50">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-500">
                        <i class="far fa-copyright mr-1"></i>
                        2026 SchoolHub - All rights reserved.
                    </p>
                    <div class="flex items-center gap-6 text-sm text-gray-500">
                        <a href="#" class="hover:text-blue-600 transition-colors">Privacy</a>
                        <a href="#" class="hover:text-blue-600 transition-colors">Terms</a>
                        <a href="#" class="hover:text-blue-600 transition-colors">Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
