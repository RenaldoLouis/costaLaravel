<label>
    {{ $label }} @if ($required)
        <span class="required">*</span>
    @endif
</label>
{{ html()->input($type)->name($name)->placeholder($placeholder)->class('checkout-input' . ($errors->has($name) ? ' is-invalid' : ''))->value(!empty($value) ? $value : old($name)) }}
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
