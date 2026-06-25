@extends('admin.layouts.app')

@section('title', 'Edit Course')
@section('page-title', 'Edit Course')

@section('content')
    <div class="max-w-3xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.courses.update', $course) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            @include('admin.courses._form')
            <div class="flex gap-3">
                <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Update Course</button>
                <a href="{{ route('admin.courses.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
