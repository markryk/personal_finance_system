<div class="mb-3">
    <label class="form-label"> {{ $label }} </label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        step="{{ $step }}" 
        class="form-control {{ $class }}"
        required
    />

    @error($name)
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>