@props(['label', 'onchange'])

<div class="mb-3">
    <label for="{{ $attributes['id'] }}" class="form-label"></label>
    <input {{ $attributes->merge(['class' => 'form-control']) }} type="file" {{ $attributes }}
        onchange="{{ $onchange }}">
    @error($attributes['name'])
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
