@if($instance->order)
    @if($instance->order !== null && $instance->order->status == 3)
        <a href="{{ route('orders.edit',$instance->order->id) }}" class="menu-link px-3 btn btn-sm btn-warning">
            تعديل الطلب
        </a>
    @endif
@else
    <a href="javascript:;" class="menu-link px-3 edit_category btn btn-sm btn-primary"
       data-url="{{ route('createOrder') }}" data-id="{{$instance->id}}">
        تقديم طلب
    </a>
@endif

