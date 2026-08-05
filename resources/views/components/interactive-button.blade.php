@props([
    'href' => null,
    'text' => 'Lihat Semua',
    'variant' => 'forest', // 'forest', 'gold', 'card'
    'size' => 'md',       // 'sm', 'md', 'lg'
    'icon' => 'fa-solid fa-arrow-right',
    'iconPosition' => 'right', // 'right', 'left'
    'class' => '',
])

@php
    $variantClass = match($variant) {
        'gold' => 'btn-interactive-gold',
        'card' => 'btn-interactive-card',
        default => 'btn-interactive-forest',
    };

    $sizeClass = match($size) {
        'sm' => 'btn-interactive-sm',
        'lg' => 'btn-interactive-lg',
        default => 'btn-interactive-md',
    };

    $classes = "btn-interactive {$variantClass} {$sizeClass} {$class}";
@endphp

@if($href)
<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="btn-text-initial">{{ $text }}</span>
    <div class="btn-text-hover">
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }}"></i>
        @endif
        <span>{{ $text }}</span>
        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }}"></i>
        @endif
    </div>
    <div class="btn-bubble"></div>
</a>
@else
<button type="button" {{ $attributes->merge(['class' => $classes]) }}>
    <span class="btn-text-initial">{{ $text }}</span>
    <div class="btn-text-hover">
        @if($icon && $iconPosition === 'left')
            <i class="{{ $icon }}"></i>
        @endif
        <span>{{ $text }}</span>
        @if($icon && $iconPosition === 'right')
            <i class="{{ $icon }}"></i>
        @endif
    </div>
    <div class="btn-bubble"></div>
</button>
@endif
