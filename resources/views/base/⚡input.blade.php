<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $size = 'md';
    public $color = 'light';

    #[Computed]
    public function classList()
    {
        $sizeClass = match ($this->size) {
            'sm' => 'h-9 px-3 rounded-md',
            'md' => '',
            'custom' => ''
        };

        $colorClass = match ($this->color) {
            'light' => '',
            'custom' => ''
        };

        return "$sizeClass $colorClass placeholder-neutral-400 border transition-border focus:outline-0";
    }
};
?>

<input {{ $attributes->class($this->classList) }}>