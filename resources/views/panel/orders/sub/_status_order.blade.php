@if ($instance)
    @php
        $statusClass = [
            1 => 'badge-info',
            2 => 'badge-secondary',
            3 => 'badge-warning',
            4 => 'badge-danger',
            5 => 'badge-success',
        ];

        $statusText = [
            1 => \App\Constants\ENUM::STATUS[1],
            2 => \App\Constants\ENUM::STATUS[2],
            3 => \App\Constants\ENUM::STATUS[3],
            4 => \App\Constants\ENUM::STATUS[4],
            5 => \App\Constants\ENUM::STATUS[5],
        ];
    @endphp

    @if (array_key_exists($instance->status, $statusClass))
        <span class="badge {{ $statusClass[$instance->status] }}">
            {{ $statusText[$instance->status] }}
        </span>
    @else
        <span class="badge badge-primary">لا يوجد طلبات</span>
    @endif
@else
    <span class="badge badge-primary">لا يوجد طلبات</span>
@endif
