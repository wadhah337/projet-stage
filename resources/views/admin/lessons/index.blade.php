@extends('admin.layouts.app')

@section('title', 'Lessons')
@section('page-title', 'Lessons')
@section('page-subtitle', 'Manage course lessons')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex gap-3">
            <select name="course_id" class="rounded-lg border border-slate-300 px-4 py-2 text-sm">
                <option value="">All courses</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" @selected(request('course_id') == $course->id)>{{ $course->title }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50">Filter</button>
        </form>
        <a href="{{ route('admin.lessons.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ Add Lesson</a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Lesson</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Duration</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($lessons as $lesson)
                    <tr>
                        <td class="px-6 py-4 text-sm">{{ $lesson->sort_order }}</td>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-900">{{ $lesson->title }}</p>
                            @if ($lesson->is_free_preview)
                                <span class="text-xs text-green-600">Free preview</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $lesson->course->title }}</td>
                        <td class="px-6 py-4 text-sm">{{ $lesson->duration_minutes }} min</td>
                        <td class="px-6 py-4 text-right text-sm">
                            <a href="{{ route('admin.lessons.edit', $lesson) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" class="inline" onsubmit="return confirm('Delete this lesson?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-3 text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500">No lessons found.</td></tr>
                @endforelse
            </tbody>
        </table>
        @if ($lessons->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">{{ $lessons->links() }}</div>
        @endif
    </div>
@endsection
