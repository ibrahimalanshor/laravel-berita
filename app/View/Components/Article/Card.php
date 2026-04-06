<?php

namespace App\View\Components\Article;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * classList
     *
     * @var mixed
     */
    public $classList;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public $article,
        public $type,
        public bool $featured = false
    )
    {
        $this->classList = $this->getClassList($type);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.article.card');
    }
    
    /**
     * getClassList
     *
     * @param  mixed $type
     * @return array
     */
    private function getClassList(string $type) : array
    {
        if ($type === 'highlight') {
            return [
                'container' => 'relative sm:space-y-2',
                'title' => 'text-lg/6',
                'title-normal' => 'sm:text-base/5',
                'title-featured' => 'sm:text-xl lg:text-2xl',
                'thumbnail' => 'rounded-lg w-full h-[225px] object-cover sm:rounded-none',
                'thumbnail-normal' => 'sm:h-[100px] lg:h-[125px]',
                'thumbnail-featured' => 'sm:h-[260px]',
                'content' => '
                    absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                    sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none
                ',
                'meta' => 'text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700 lg:text-sm',
                'category' => 'sm:text-sky-700 sm:font-medium'
            ];
        }

        if ($type === 'flash') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 shrink-0 object-cover',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'content' => 'flex flex-col-reverse gap-1 min-w-0',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 lg:text-sm',
                'category' => 'text-sky-700 font-medium'
            ];
        }

        if ($type === 'category') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4 border border-neutral-300 rounded-md p-3 sm:border-0 sm:p-0 sm:rounded-none sm:flex-col sm:gap-2 sm:justify-start',
                'title' => 'text-sm sm:text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 object-cover rounded sm:w-full sm:h-auto sm:rounded-none',
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
            'thumbnail' => 'h-[175px] w-full object-cover sm:h-[75px] lg:h-[105px]',
            'thumbnail-normal' => '',
            'thumbnail-featured' => '',
            'content' => 'flex flex-col gap-1 justify-end text-neutral-900',
            'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
            'category' => 'text-sky-700 font-medium'
        ];
    }
}
