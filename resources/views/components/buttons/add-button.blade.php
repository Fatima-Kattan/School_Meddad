@props([
    'route' => '#', // الرابط
    'label' => 'Add New', // النص الظاهر
    'icon' => 'fas fa-plus', // الأيقونة
    'size' => 'sm', // الحجم: sm, md, lg
    'color' => 'indigo', // اللون: indigo, blue, green, red, yellow, purple, pink, gray
    'target' => '_self', // _self, _blank
    'permission' => null, // صلاحية معينة (اختياري)
])

@php
    // الألوان المتاحة
    $colors = [
        'indigo' => 'bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-300',
        'blue' => 'bg-blue-500 hover:bg-blue-600 focus:ring-blue-300',
        'green' => 'bg-green-500 hover:bg-green-600 focus:ring-green-300',
        'red' => 'bg-red-500 hover:bg-red-600 focus:ring-red-300',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-300 text-gray-800',
        'purple' => 'bg-purple-500 hover:bg-purple-600 focus:ring-purple-300',
        'pink' => 'bg-pink-500 hover:bg-pink-600 focus:ring-pink-300',
        'gray' => 'bg-gray-500 hover:bg-gray-600 focus:ring-gray-300',
    ];

    // الحجوم
    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];

    $colorClass = $colors[$color] ?? $colors['indigo'];
    $sizeClass = $sizes[$size] ?? $sizes['sm'];
@endphp

@if ($permission && !auth()->user()->can($permission))
    {{-- إذا كان المستخدم ليس لديه صلاحية، لا نعرض الزر --}}
@else
    <a href="{{ $route }}" target="{{ $target }}"
        class="inline-flex items-center px-2 py-2 gap-1.5 rounded font-medium text-white shadow-sm transition-all duration-200 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 {{ $colorClass }} {{ $sizeClass }}">
        <i class="{{ $icon }}"></i>
        {{ $label }}
    </a>
@endif
