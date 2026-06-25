<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Name</label>
    <input type="text" name="name" value="{{ old('name', isset($category) ? $category->name : '') }}" required
           class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
</div>

<div>
    <label class="mb-1 block text-sm font-medium text-slate-700">Description</label>
    <textarea name="description" rows="4"
              class="w-full rounded-lg border border-slate-300 px-4 py-2 focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/20">{{ old('description', isset($category) ? $category->description : '') }}</textarea>
</div>

<label class="flex items-center gap-2 text-sm text-slate-700">
    <input type="checkbox" name="is_active" value="1" {{ old('is_active', isset($category) ? $category->is_active : true) ? 'checked' : '' }}
           class="rounded border-slate-300 text-indigo-600">
    Active category
</label>
