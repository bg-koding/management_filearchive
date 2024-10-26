<div class="form-group">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control @error($name) is-invalid @enderror"
        placeholder="{{ $placeholder ?? '' }}"
        value="@isset($value){{ $value }}@else{{ old($name) }}@endisset"
        {{ $attributes ?? '' }}
    >
    @error($name)
        <span class="text-red-500 text-sm float-end inline-block">{{ $message }}</span>
    @enderror
</div>
