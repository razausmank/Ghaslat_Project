<!--begin::Group-->
<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label">{{ $attributes['label'] }}</label>
    <div class="col-lg-9 col-xl-9">
        {{ $slot }}
        <x-form.form_field_error field="{{ $attributes['error'] }}" />
    </div>
</div>
<!--end::Group-->
