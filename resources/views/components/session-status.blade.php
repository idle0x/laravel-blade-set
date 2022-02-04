@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-muted']) }}>
        {{ $status }}
    </div>
@endif
