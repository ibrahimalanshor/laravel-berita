<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public $article;
    public $type;

    #[Computed]
    public function classList()
    {
        if ($this->type === 'highlight') {
            return [
                'container' => 'relative sm:space-y-2',
                'title' => 'text-lg/6',
                'title-normal' => 'sm:text-base/5',
                'title-featured' => 'sm:text-xl lg:text-2xl',
                'thumbnail' => 'rounded-lg w-full h-[225px] object-cover sm:h-auto sm:rounded-none',
                'content' => '
                    absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                    sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none
                ',
                'meta' => 'text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700 lg:text-sm',
                'category' => 'sm:text-sky-700 sm:font-medium'
            ];
        }

        if ($this->type === 'flash') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 object-cover',
                'content' => 'flex flex-col-reverse gap-1',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 lg:text-sm',
                'category' => 'text-sky-700 font-medium'
            ];
        }

        return [
            'container' => 'space-y-2',
            'title' => 'text-base/5',
            'title-normal' => '',
            'title-featured' => '',
            'thumbnail' => 'w-full object-cover',
            'content' => 'flex flex-col gap-1 justify-end text-neutral-900',
            'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
            'category' => 'text-sky-700 font-medium'
        ];
    }
};
?>

<article {{ $attributes->class($this->classList['container']) }}>
    <img src="{{ $article['thumbnail'] }}" alt="{{ $article['title'] }}" class="{{ $this->classList['thumbnail'] }}">
    <div class="{{ $this->classList['content'] }}">
        <h3 @class([
            'font-bold',
            $this->classList['title'],
            $this->classList['title-featured'] => $article['featured'],
            $this->classList['title-normal'] => !$article['featured'],
        ])>{{ $article['title'] }}</h3>
        <div class="{{ $this->classList['meta'] }}">
            <a href="" @class([
                'truncate',
                $this->classList['category'],
            ])>{{ $article['category'] }}</a>
            <span>|</span>
            <time class="truncate">{{ $article['date'] }}</time>
        </div>
        @if ($type === 'highlight' && $article['featured'])
            <p class="hidden sm:block sm:text-neutral-700">{{ $article['summary'] }}</p>
        @endif
    </div>
</article>