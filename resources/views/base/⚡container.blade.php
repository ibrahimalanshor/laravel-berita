<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $paddless = false;

    #[Computed]
    public function classList()
    {
        $paddingClass = $this->paddless ? '' : 'px-4';

        return "sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg mx-auto $paddingClass";
    }
};
?>

<div {{ $attributes->class($this->classList) }}>
    {{ $slot }}
</div>