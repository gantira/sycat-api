@csrf

<label class="block mb-3">
    <span class="text-gray-700">Name</span>
    <x-input name="name" type="text" class="block w-full" value="{{ old('name') ?? $tag->name }}"></x-input>
    @error('name')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</label>

<label class="block mb-3">
    <span class="text-gray-700">Description</span>
    <x-textarea name="description" type="text" class="block w-full">{{ old('description') ?? $tag->description }}</x-textarea>
    @error('description')
    <span class="text-sm text-red-600">{{ $message }}</span>
    @enderror
</label>

<x-button>{{ $submit }}</x-button>
