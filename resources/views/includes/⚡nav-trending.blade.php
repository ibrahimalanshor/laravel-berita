<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function tags()
    {
        return [
            'AS-Israel Serang Iran',
            'Board of Peace',
            'Serangan ke Aktivis KontraS',
        ];
    }
};
?>

<div>
    <p>Trending</p>
    <div>
        @foreach ($this->tags as $tag)
            <a href="">{{ $tag }}</a>
        @endforeach
    </div>
</div>