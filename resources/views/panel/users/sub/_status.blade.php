
<label
    class="form-check form-switch form-check-custom form-check-solid justify-content-center " >
    <input data-url="{{ route('users.disable',$instance->id) }}" class="form-check-input disable_employees" type="checkbox" @if($instance->status == 1) checked="" @endif
            data-title="" >
    <span class="form-check-label"></span>
</label>
