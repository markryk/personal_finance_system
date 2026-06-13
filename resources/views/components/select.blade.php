<div class="mb-3">
    <label class="form-label"> {{ $label }} </label>
    <select name="{{ $name }}" class="form-control">
        <option value=""> Selecione </option>
        @foreach($options as $key => $value)
            <option value="{{ $key }}" @selected(old($name, $selected) == $key)> {{ $value }} </option>
        @endforeach
    </select>

    @error($name)
        <div class="text-danger"> {{ $message }} </div>
    @enderror
</div>