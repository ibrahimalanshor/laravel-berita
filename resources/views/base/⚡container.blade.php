<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div {{ $attributes->class('sm:max-w-screen-sm md:max-w-screen-md lg:max-w-screen-lg mx-auto px-4') }}>
    {{ $slot }}
</div>