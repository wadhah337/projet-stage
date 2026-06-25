@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview of your e-learning platform')

@section('content')
    {{-- <div class="mb-8 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach ([
            ['label' => 'Total Courses', 'value' => $stats['courses'], 'color' => 'indigo'],
            ['label' => 'Published Courses', 'value' => $stats['published_courses'], 'color' => 'green'],
            ['label' => 'Students', 'value' => $stats['students'], 'color' => 'blue'],
            ['label' => 'Categories', 'value' => $stats['categories'], 'color' => 'purple'],
            ['label' => 'Lessons', 'value' => $stats['lessons'], 'color' => 'orange'],
            ['label' => 'Enrollments', 'value' => $stats['enrollments'], 'color' => 'pink'],
        ] as $stat)
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-sm text-slate-500">{{ $stat['label'] }}</p>
                <p class="mt-2 text-3xl font-bold text-slate-900">{{ $stat['value'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-4">
                <h2 class="font-semibold text-slate-900">Recent Courses</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($recentCourses as $course)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="font-medium text-slate-900">{{ $course->title }}</p>
                            <p class="text-sm text-slate-500">{{ $course->category->name ?? 'Uncategorized' }}</p>
                        </div>
                        <span class="rounded-full px-2.5 py-0.5 text-xs font-medium
                            {{ $course->status === 'published' ? 'bg-green-100 text-green-700' : ($course->status === 'draft' ? 'bg-yellow-100 text-yellow-700' : 'bg-slate-100 text-slate-600') }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </div>
                @empty
                    <p class="px-6 py-8 text-center text-sm text-slate-500">No courses yet.</p>
                @endforelse
            </div>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-6 py-4">
                <h2 class="font-semibold text-slate-900">Recent Enrollments</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse ($recentEnrollments as $enrollment)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="font-medium text-slate-900">{{ $enrollment->user->name }}</p>
                            <p class="text-sm text-slate-500">{{ $enrollment->course->title }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-indigo-600">{{ $enrollment->progress }}%</p>
                            <p class="text-xs text-slate-400">{{ $enrollment->enrolled_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="px-6 py-8 text-center text-sm text-slate-500">No enrollments yet.</p>
                @endforelse
            </div>
        </div>
    </div> --}}
@endsection
