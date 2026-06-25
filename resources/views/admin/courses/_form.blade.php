<div class="grid gap-5 md:grid-cols-2">
    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
        <input type="text" name="title" value="{{ old('title', isset($course) ? $course->title : '') }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Category</label>
        <select name="category_id" required class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none">
            <option value="">Select category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', isset($course) ? $course->category_id : '') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Instructor</label>
        <input type="text" name="instructor_name" value="{{ old('instructor_name', isset($course) ? $course->instructor_name : '') }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Price ($)</label>
        <input type="number" step="0.01" min="0" name="price" value="{{ old('price', isset($course) ? $course->price : 0) }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Duration (hours)</label>
        <input type="number" min="0" name="duration_hours" value="{{ old('duration_hours', isset($course) ? $course->duration_hours : 0) }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Level</label>
        <select name="level" required class="w-full rounded-lg border border-slate-300 px-4 py-2">
            @foreach (['beginner', 'intermediate', 'advanced'] as $level)
                <option value="{{ $level }}" @selected(old('level', isset($course) ? $course->level : 'beginner') === $level)>{{ ucfirst($level) }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Status</label>
        <select name="status" required class="w-full rounded-lg border border-slate-300 px-4 py-2">
            @foreach (['draft', 'published', 'archived'] as $status)
                <option value="{{ $status }}" @selected(old('status', isset($course) ? $course->status : 'draft') === $status)>{{ ucfirst($status) }}</option>
            @endforeach
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
        <textarea name="description" rows="5"
                  class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">{{ old('description', isset($course) ? $course->description : '') }}</textarea>
    </div>
</div>
