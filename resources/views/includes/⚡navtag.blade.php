<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function tags()
    {
        return [
            'News',
            'Nusaraya',
            'Event',
            'Cahaya',
            'Tekno',
            'Otomotif',
            'Bola',
            'Lifestyle',
            'Tren',
            'Lestari',
            'Money',
            'Properti',
            'Edukasi',
            'Travel',
        ];
    }
};
?>

<nav>
    @foreach ($this->tags as $tag)
        <a href="">{{ $tag }}</a>
    @endforeach
</nav>