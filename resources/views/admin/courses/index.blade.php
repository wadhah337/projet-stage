@extends('admin.layouts.app')

@section('title', 'Courses')
@section('page-title', 'Courses')
@section('page-subtitle', 'Manage all courses on the platform')

@section('content')
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <form method="GET" class="flex flex-wrap gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search courses..."
                   class="rounded-lg border border-slate-300 px-4 py-2 text-sm focus:border-indigo-500 focus:outline-none">
            <select name="status" class="rounded-lg border border-slate-300 px-4 py-2 text-sm">
                <option value="">All statuses</option>
                @foreach (['draft', 'published', 'archived'] as $status)
                    <option value="{{ $status }}" @selected(request('status') === $status)>{{ ucfirst($status) }}</option>
                @endforeach
            </select>
            <button type="submit" class="rounded-lg border border-slate-300 px-4 py-2 text-sm hover:bg-slate-50">Filter</button>
        </form>
        <a href="{{ route('admin.courses.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">+ Add Course</a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Lessons</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($courses as $course)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-900">{{ $course->title }}</p>
                            <p class="text-sm text-slate-500">{{ $course->instructor_name }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $course->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">${{ number_format($course->price, 2) }}</td>
                        <td class="px-6 py-4 text-sm">{{ $course->lessons_count }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-2.5 py-0.5 text-xs font-medium
                                {{ $course->status === 'published' ? 'bg-green-100 text-green-700' : ($course->status === 'draft' ? 'bg-yellow-100 text-yellow-700' : 'bg-slate-100 text-slate-600') }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <a href="{{ route('admin.courses.show', $course) }}" class="text-slate-600 hover:underline">View</a>
                            <a href="{{ route('admin.courses.edit', $course) }}" class="ml-3 text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('Delete this course?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-3 text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-6 py-8 text-center text-slate-500">No courses found.</td></tr>
                @endforelse
            </tbody>
        </table>
        @if ($courses->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">{{ $courses->links() }}</div>
        @endif
    </div>
@endsection
