<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $category->name ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
        name="description">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="parent_id" class="form-label">Parent Category</label>
    <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id">
        <option value="">Select Parent Category</option>
        @foreach($parentCategories as $parent)
            <option value="{{ $parent->id }}" {{ (old('parent_id', $category->parent_id ?? '') == $parent->id) ? 'selected' : '' }}>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
    @error('parent_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if(isset($category) && $category->image)
        <div class="mt-2">
            <img src="{{ Storage::url($category->image) }}" alt="Current Image" width="100">
        </div>
    @endif
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
        <option value="active" {{ (old('status', $category->status ?? '') == 'active') ? 'selected' : '' }}>Active
        </option>
        <option value="inactive" {{ (old('status', $category->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive
        </option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>