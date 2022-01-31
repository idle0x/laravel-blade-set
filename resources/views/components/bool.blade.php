@props(['value' => false, 'classTrue' => 'bg-success', 'classFalse' => 'bg-danger'])
@if($value)
    <span class="badge {{ $classTrue }}">{{ __('Yes') }}</span>
@else
    <span class="badge {{ $classFalse }}">{{ __('No') }}</span>
@endif
