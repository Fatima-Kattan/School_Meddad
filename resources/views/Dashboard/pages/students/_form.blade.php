@props([
    'student' => null,
    'classrooms' => [],
    'action' => '',
    'method' => 'POST',
    'buttonText' => 'Save Student',
    'isEdit' => false
])

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas {{ $isEdit ? 'fa-edit' : 'fa-plus-circle' }} me-2 text-primary"></i>
                    {{ $isEdit ? 'Edit Student' : 'New Student' }}
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    {{-- Student Name --}}
                    <x-form.input 
                        name="name" 
                        label="Student Name"
                        type="text" 
                        :value="$student->name ?? ''"
                        placeholder="Enter student name"
                        id="name"
                        
                    />

                    {{-- Student Email --}}
                    <x-form.input 
                        name="email" 
                        label="Student Email"
                        type="email" 
                        :value="$student->email ?? ''"
                        placeholder="Enter student email"
                        id="email"
                        
                    />

                    {{-- Student Phone --}}
                    <x-form.input 
                        name="phone" 
                        label="Student Phone"
                        type="text" 
                        :value="$student->phone ?? ''"
                        placeholder="Enter student phone"
                        id="phone"
                    />

                    {{-- Student Birth Date --}}
                    <x-form.input 
                        name="birth_date" 
                        label="Birth Date"
                        type="date" 
                        :value="$student->birth_date ?? ''"
                        placeholder=""
                        id="birth_date"
                        
                    />

                    {{-- Classroom Selection --}}
                    <x-form.select 
                        name="classroom_id" 
                        label="Select Classroom"
                        :options="$classrooms"
                        :selected="$student->classroom_id ?? ''"
                        
                        id="classroom_id"
                    />

                    {{-- Buttons --}}
                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-indigo-300">
                            <i class="fas fa-save me-2"></i> {{ $buttonText }}
                        </button>
                        <a href="{{ route('dashboard.students.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>