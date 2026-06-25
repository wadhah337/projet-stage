@extends('admin.layouts.app')

@section('title', 'Create Course')
@section('page-title', 'Create Course')

@section('content')
    <div class="max-w-3xl rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.courses.store') }}" method="POST" class="space-y-5">
            @csrf
            @include('admin.courses._form')
            <div class="flex gap-3">
                <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">Save Course</button>
                <a href="{{ route('admin.courses.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">Cancel</a>
            </div>
        </form>
    </div>
@endsection
