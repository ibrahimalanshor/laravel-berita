<?php

use Livewire\Component;
use Livewire\Attributes\Computed;

new class extends Component
{
    public $icon;
    public $color = 'light';

    #[Computed]
    public function classList()
    {
        $colorClass = match($this->color) {
            'light' => 'border border-neutral-300 text-neutral-900',
            'primary' => 'bg-sky-600 text-white'
        };

        return "$colorClass";
    }
};
?>

<button class="h-10 w-full rounded-md inline-flex items-center justify-center gap-2 font-medium {{ $this->classList }}">
    @if ($icon)
        <span class="{{ $icon }} size-4"></span>
    @endif
    {{ $slot }}
</button>