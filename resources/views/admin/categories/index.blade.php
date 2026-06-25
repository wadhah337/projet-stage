@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories')
@section('page-subtitle', 'Manage course categories')

@section('content')
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.categories.create') }}" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
            + Add Category
        </a>
    </div>

    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Courses</th>
                    <th class="px-6 py-3 text-left text-xs font-medium uppercase text-slate-500">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium uppercase text-slate-500">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($categories as $category)
                    <tr>
                        <td class="px-6 py-4">
                            <p class="font-medium text-slate-900">{{ $category->name }}</p>
                            <p class="text-sm text-slate-500">{{ Str::limit($category->description, 60) }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $category->courses_count }}</td>
                        <td class="px-6 py-4">
                            <span class="rounded-full px-2.5 py-0.5 text-xs font-medium {{ $category->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right text-sm">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-3 text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-6 py-8 text-center text-slate-500">No categories found.</td></tr>
                @endforelse
            </tbody>
        </table>
        @if ($categories->hasPages())
            <div class="border-t border-slate-200 px-6 py-4">{{ $categories->links() }}</div>
        @endif
    </div>
@endsection
