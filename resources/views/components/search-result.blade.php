@props([
    'search' => null,
    'clearRoute' => null,
    'resultsCount' => null,
])

@if ($search)
    <div class="alert bg-purple-200 alert-dismissible fade show">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <div>
                <i class="fas fa-search me-2"></i>
                Showing results for: <strong>"{{ $search }}"</strong>
                @if ($resultsCount !== null)
                    <span class="badge bg-primary ms-3">{{ $resultsCount }} results</span>
                @endif
            </div>
            <div class="mt-2 mt-sm-0">
                <a href="{{ $clearRoute ?? URL::current() }}" class="btn btn-sm btn-secondary btn-close">
                </a>
            </div>
        </div>
    </div>
@endif
