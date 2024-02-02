<label
    class="form-check form-switch form-check-custom form-check-solid justify-content-center">
    <input class="form-check-input" type="checkbox" @if($instance->status == 1) checked @endif
    data-title="" data-id="{{$instance->id}}">
    <span class="form-check-label"></span>
</label>
