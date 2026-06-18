@props([
    'teacher' => null,
    'classrooms' => [],
    'action' => '',
    'method' => 'POST',
    'buttonText' => 'Save Teacher',
    'isEdit' => false
])

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas {{ $isEdit ? 'fa-edit' : 'fa-plus-circle' }} me-2 text-primary"></i>
                    {{ $isEdit ? 'Edit Teacher' : 'New Teacher' }}
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    {{-- Teacher Name --}}
                    <x-form.input 
                        name="name" 
                        label="Teacher Name"
                        type="text" 
                        :value="$teacher->name ?? ''"
                        placeholder="Enter teacher name"
                        id="name"
                        :required="true"
                    />

                    {{-- Teacher Email --}}
                    <x-form.input 
                        name="email" 
                        label="Teacher Email"
                        type="email" 
                        :value="$teacher->email ?? ''"
                        placeholder="Enter teacher email"
                        id="email"
                        :required="true"
                    />

                    {{-- Teacher Phone --}}
                    <x-form.input 
                        name="phone" 
                        label="Teacher Phone"
                        type="text" 
                        :value="$teacher->phone ?? ''"
                        placeholder="Enter teacher phone"
                        id="phone"
                        :required="true"
                    />

                    {{-- Teacher Specialization --}}
                    <x-form.input 
                        name="specialization" 
                        label="Specialization"
                        type="text" 
                        :value="$teacher->specialization ?? ''"
                        placeholder="Enter teacher specialization"
                        id="specialization"
                        :required="true"
                    />

                    {{-- Classroom Selection --}}
                    <x-form.select 
                        name="classroom_id" 
                        label="Select Classroom"
                        :options="$classrooms"
                        :selected="$teacher->classroom_id ?? ''"
                    />

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-300">
                            <i class="fas fa-save me-2"></i> {{ $buttonText }}
                        </button>
                        <a href="{{ route('dashboard.teachers.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>