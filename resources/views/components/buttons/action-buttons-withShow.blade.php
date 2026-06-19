@props([
    'editRoute' => '#',
    'deleteRoute' => '#',
    'showRoute' => null,
    'confirmMessage' => 'Are you sure you want to delete this item?',
])

<div class="d-flex gap-1 justify-content-center">
    {{--  زر العرض --}}
    @if($showRoute)
        <a href="{{ $showRoute }}" class="btn btn-info btn-sm" title="View Details">
            <i class="fas fa-eye"></i>
        </a>
    @endif

    {{-- زر التعديل --}}
    <a href="{{ $editRoute }}" class="btn btn-warning btn-sm" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    {{-- زر الحذف --}}
    <form action="{{ $deleteRoute }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" title="Delete"
            onclick="return confirm('{{ $confirmMessage }}')">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>