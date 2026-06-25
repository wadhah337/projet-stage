@extends('admin.layouts.app')

@section('title', $course->title)
@section('page-title', $course->title)
@section('page-subtitle', $course->category->name ?? 'Course details')

@section('content')
    <div class="mb-6 flex flex-wrap gap-3">
        <a href="{{ route('admin.courses.edit', $course) }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Edit Course</a>
        <a href="{{ route('admin.lessons.create', ['course_id' => $course->id]) }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50">+ Add Lesson</a>
        <a href="{{ route('admin.courses.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50">Back to list</a>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
                <h2 class="mb-4 font-semibold text-slate-900">Course Information</h2>
                <dl class="grid gap-4 sm:grid-cols-2">
                    <div><dt class="text-sm text-slate-500">Instructor</dt><dd class="font-medium">{{ $course->instructor_name }}</dd></div>
                    <div><dt class="text-sm text-slate-500">Price</dt><dd class="font-medium">${{ number_format($course->price, 2) }}</dd></div>
                    <div><dt class="text-sm text-slate-500">Duration</dt><dd class="font-medium">{{ $course->duration_hours }} hours</dd></div>
                    <div><dt class="text-sm text-slate-500">Level</dt><dd class="font-medium">{{ ucfirst($course->level) }}</dd></div>
                    <div><dt class="text-sm text-slate-500">Status</dt><dd class="font-medium">{{ ucfirst($course->status) }}</dd></div>
                    <div><dt class="text-sm text-slate-500">Enrollments</dt><dd class="font-medium">{{ $course->enrollments->count() }}</dd></div>
                </dl>
                @if ($course->description)
                    <div class="mt-4 border-t border-slate-100 pt-4">
                        <dt class="mb-2 text-sm text-slate-500">Description</dt>
                        <dd class="text-slate-700">{{ $course->description }}</dd>
                    </div>
                @endif
            </div>

            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <h2 class="font-semibold text-slate-900">Lessons ({{ $course->lessons->count() }})</h2>
                </div>
                <div class="divide-y divide-slate-100">
                    @forelse ($course->lessons as $lesson)
                        <div class="flex items-center justify-between px-6 py-4">
                            <div>
                                <p class="font-medium text-slate-900">{{ $lesson->sort_order }}. {{ $lesson->title }}</p>
                                <p class="text-sm text-slate-500">{{ $lesson->duration_minutes }} min @if($lesson->is_free_preview) · Free preview @endif</p>
                            </div>
                            <a href="{{ route('admin.lessons.edit', $lesson) }}" class="text-sm text-indigo-600 hover:underline">Edit</a>
                        </div>
                    @empty
                        <p class="px-6 py-8 text-center text-sm text-slate-500">No lessons yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-4">
                <h2 class="font-semibold text-slate-900">Enrolled Students</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($course->enrollments as $enrollment)
                    <div class="px-6 py-4">
                        <p class="font-medium text-slate-900">{{ $enrollment->user->name }}</p>
                        <p class="text-sm text-slate-500">{{ $enrollment->progress }}% complete</p>
                    </div>
                @empty
                    <p class="px-6 py-8 text-center text-sm text-slate-500">No enrollments yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
