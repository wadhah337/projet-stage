@extends('admin.layouts.app')

@section('title', 'Edit Lesson')
@section('page-title', 'Edit Lesson')

@section('content')
    <div class="max-w-3xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.lessons.update', $lesson) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            @include('admin.lessons._form')
            <div class="flex gap-3">
                <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Update Lesson</button>
                <a href="{{ route('admin.lessons.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
