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

<div class="border-b border-gray-300">
    <livewire:base::container :paddless="true">
        <div class="flex gap-2 py-3 overflow-x-auto">
            <div class="w-2 shrink-0"></div>
            @foreach ($this->tags as $tag)
                <a href="" class="whitespace-nowrap inline-flex items-center h-8 border border-neutral-300 px-3 rounded-md font-medium lg:hover:bg-neutral-100">#{{ $tag }}</a>
            @endforeach
            <div class="w-2 shrink-0"></div>
        </div>
    </livewire:base::container>
</div>