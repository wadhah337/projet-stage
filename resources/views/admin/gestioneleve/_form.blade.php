<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Course</label>
    <select name="course_id" required class="w-full rounded-lg border border-slate-300 px-4 py-2">
        <option value="">Select course</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" @selected(old('course_id', isset($lesson) ? $lesson->course_id : ($selectedCourse ?? '')) == $course->id)>{{ $course->title }}</option>
        @endforeach
    </select>
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Title</label>
    <input type="text" name="title" value="{{ old('title', isset($lesson) ? $lesson->title : '') }}" required
           class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
</div>

<div class="grid gap-5 md:grid-cols-2">
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Duration (minutes)</label>
        <input type="number" min="0" name="duration_minutes" value="{{ old('duration_minutes', isset($lesson) ? $lesson->duration_minutes : 0) }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2">
    </div>
    <div>
        <label class="mb-1 block text-sm font-medium text-slate-700">Sort Order</label>
        <input type="number" min="0" name="sort_order" value="{{ old('sort_order', isset($lesson) ? $lesson->sort_order : 0) }}" required
               class="w-full rounded-lg border border-slate-300 px-4 py-2">
    </div>
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Video URL</label>
    <input type="url" name="video_url" value="{{ old('video_url', isset($lesson) ? $lesson->video_url : '') }}"
           class="w-full rounded-lg border border-slate-300 px-4 py-2" placeholder="https://...">
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Content</label>
    <textarea name="content" rows="6"
              class="w-full rounded-lg border border-slate-300 px-4 py-2">{{ old('content', isset($lesson) ? $lesson->content : '') }}</textarea>
</div>

<label class="flex items-center gap-2 text-sm text-slate-700">
    <input type="checkbox" name="is_free_preview" value="1" {{ old('is_free_preview', isset($lesson) ? $lesson->is_free_preview : false) ? 'checked' : '' }}
           class="rounded border-slate-300 text-indigo-600">
    Free preview lesson
</label>
