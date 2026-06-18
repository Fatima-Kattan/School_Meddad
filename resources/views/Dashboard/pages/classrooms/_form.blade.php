@props([
    'classroom' => null,
    'action' => '',
    'method' => 'POST',
    'buttonText' => 'Save Classroom',
    'isEdit' => false
])

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas {{ $isEdit ? 'fa-edit' : 'fa-plus-circle' }} me-2 text-primary"></i>
                    {{ $isEdit ? 'Edit Classroom' : 'New Classroom' }}
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    {{-- Classroom Name --}}
                    <x-form.input 
                        name="name" 
                        label="Classroom Name"
                        type="text" 
                        :value="$classroom->name ?? ''"
                        placeholder="Enter classroom name"
                        id="name"
                        :required="true"
                    />

                    {{-- Classroom Description --}}
                    <x-form.textarea 
                        name="description" 
                        label="Classroom Description"
                        :value="$classroom->description ?? ''"
                        placeholder="Enter classroom description"
                        id="description"
                        rows="4"
                    />

                    {{-- Classroom Capacity --}}
                    <x-form.input 
                        name="capacity" 
                        label="Classroom Capacity"
                        type="number" 
                        :value="$classroom->capacity ?? 30"
                        placeholder="Enter classroom capacity"
                        id="capacity"
                        :required="true"
                    />

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-300">
                            <i class="fas fa-save me-2"></i> {{ $buttonText }}
                        </button>
                        <a href="{{ route('dashboard.classrooms.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>