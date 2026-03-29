<?php

use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    public $icon;
    public $color = 'light';
    public $size = 'md';
    public $ignoreDisplay = false;

    #[Computed]
    public function classList()
    {
        $colorClass = match($this->color) {
            'light' => 'bg-white text-neutral-900',
            'bordered' => 'bg-white border border-neutral-300 text-neutral-900',
            'primary' => 'bg-sky-600 text-white'
        };

        $sizeClass = match($this->size) {
            'sm' => 'h-9 px-3 rounded-md',
            'md' => 'h-10 px-4 rounded-md',
            'custom' => ''
        };

        $displayClass = $this->ignoreDisplay ? '' : 'inline-flex items-center justify-center';

        return "$displayClass $colorClass $sizeClass";
    }
};
?>

<button {{ $attributes->class("gap-2 font-medium $this->classList") }}>
    @if ($icon)
        <span class="{{ $icon }} size-4"></span>
    @endif
    {{ $slot }}
</button>