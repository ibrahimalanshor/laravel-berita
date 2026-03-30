<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $article;
    public $slideOnMobile = false;
    public $enableFeatured = true;

    #[Computed]
    public function classList()
    {
        if ($this->slideOnMobile) {
            return [
                'container' => 'relative sm:space-y-2',
                'thumbnail' => 'rounded-lg w-full h-[225px] object-cover sm:h-auto sm:rounded-none',
                'content' => '
                    absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                    sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none
                ',
                'meta' => 'text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700 lg:text-sm'
            ];
        }

        return [
            'container' => 'space-y-2',
            'thumbnail' => 'w-full object-cover',
            'content' => 'flex flex-col gap-1 justify-end text-neutral-900',
            'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm'
        ];
    }
};
?>

<article {{ $attributes->class($this->classList['container']) }}>
    <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}" class="{{ $this->classList['thumbnail'] }}">
    <div class="{{ $this->classList['content'] }}">
        <h3 @class([
            'font-bold',
            'text-lg/6' => $slideOnMobile,
            'text-base/5' => !$slideOnMobile,
            'sm:text-base/5' => $slideOnMobile && (!$enableFeatured || !$article['featured']),
            'sm:text-xl lg:text-2xl' => $article['featured']
        ])>{{ $article['title'] }}</h3>
        <div class="{{ $this->classList['meta'] }}">
            <a href="" @class([
                'sm:text-sky-700 sm:font-medium' => $slideOnMobile,
                'text-sky-700 font-medium' => !$slideOnMobile
            ])>{{ $article['category'] }}</a>
            <span>|</span>
            <time>{{ $article['date'] }}</time>
        </div>
        @if ($enableFeatured && $article['featured'])
            <p class="hidden sm:block sm:text-neutral-700">{{ $article['summary'] }}</p>
        @endif
    </div>
</article>