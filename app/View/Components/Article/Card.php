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
        public bool $featured = false,
        public $titleLevel = 3
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
                'thumbnail-link' => '',
                'content' => '
                    absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                    sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none
                ',
                'meta' => 'text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700 lg:text-sm',
                'category' => 'sm:text-red-700 sm:font-medium',
                'summary' => '',
                'premium-badge' => 'absolute top-4 left-4 z-20 flex items-center justify-center gap-1 font-bold bg-amber-500 text-amber-100 text-sm w-6 h-6 rounded-full',
                'premium-badge-normal' => 'sm:top-2 sm:left-2 sm:w-5 sm:h-5 sm:text-xs',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'highlight-sidebar') {
            return [
                'container' => 'relative sm:flex sm:flex-row-reverse sm:gap-4 sm:items-start sm:justify-between',
                'title' => 'text-lg/6 sm:text-sm',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'rounded-lg w-full h-[225px] object-cover sm:rounded-none sm:w-18 sm:h-18',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => '
                    absolute inset-0 p-4 flex flex-col gap-1 justify-end bg-linear-to-b from-transparent to-black/80 rounded-lg text-white
                    sm:static sm:p-0 sm:bg-transparent sm:text-neutral-900 sm:bg-none sm:min-w-0
                ',
                'meta' => 'text-sm flex items-center gap-2 sm:order-first sm:text-xs sm:text-neutral-700 lg:text-sm',
                'category' => 'sm:text-red-700 sm:font-medium',
                'summary' => '',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
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
                'thumbnail-link' => 'relative',
                'content' => 'flex flex-col-reverse gap-1 min-w-0',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => '',
                'premium-badge' => 'absolute bottom-0 right-0 z-10 w-5 h-5 flex items-center justify-center text-sm bg-amber-500/75 text-amber-100',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'category') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4 border border-neutral-300 rounded-md p-3 sm:border-0 sm:p-0 sm:rounded-none sm:block sm:space-y-2',
                'title' => 'text-sm sm:text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 shrink-0 object-cover rounded sm:h-[75px] lg:h-[105px] sm:w-full sm:rounded-none',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => 'sm:w-full relative',
                'content' => 'flex flex-col-reverse gap-1 min-w-0',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => '',
                'premium-badge' => 'absolute bottom-0 right-0 z-10 w-5 h-5 flex items-center justify-center text-sm bg-amber-500/75 text-amber-100',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'article-category') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 shrink-0 object-cover',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'flex flex-col-reverse gap-1 min-w-0',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => '',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'category-detail') {
            return [
                'container' => 'flex items-start justify-between flex-row-reverse gap-4 sm:flex-row',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 shrink-0 object-cover lg:w-[200px] lg:h-[120px]',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'flex flex-col-reverse gap-1 min-w-0 sm:flex-col',
                'meta' => 'text-xs flex items-center gap-2 text-neutral-700 sm:order-first lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => 'text-sm',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'related-article') {
            return [
                'container' => 'space-y-2',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'h-[175px] w-full object-cover sm:h-[100px] lg:h-[150px]',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'flex flex-col gap-1 justify-end text-neutral-900',
                'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => '',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'editor-sidebar') {
            return [
                'container' => 'space-y-2 sm:space-y-0 sm:flex sm:flex-row-reverse sm:gap-4 sm:items-start justify-between',
                'title' => 'text-base/5 sm:text-sm',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'h-[175px] w-full object-cover sm:rounded-none sm:w-18 sm:h-18',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'flex flex-col gap-1 justify-end text-neutral-900 sm:min-w-0',
                'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => '',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'search') {
            return [
                'container' => 'flex flex-row-reverse gap-4 sm:flex-row',
                'title' => 'text-base/5',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-21 h-21 object-cover sm:w-[200px] sm:h-[120px]',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'flex flex-col gap-1 justify-start text-neutral-900',
                'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => 'hidden sm:block sm:text-neutral-700',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
            ];
        }

        if ($type === 'bookmark' || $type === 'favorite') {
            return [
                'container' => 'flex gap-4 sm:flex-row',
                'title' => 'text-base/5 line-clamp-2',
                'title-normal' => '',
                'title-featured' => '',
                'thumbnail' => 'w-16 h-16 object-cover',
                'thumbnail-normal' => '',
                'thumbnail-featured' => '',
                'thumbnail-link' => '',
                'content' => 'min-w-0 flex flex-col gap-1 justify-start text-neutral-900',
                'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
                'category' => 'text-red-700 font-medium',
                'summary' => 'hidden sm:block sm:text-neutral-700',
                'premium-badge' => '',
                'premium-badge-normal' => '',
                'premium-badge-featured' => ''
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
            'thumbnail-link' => 'relative',
            'content' => 'flex flex-col gap-1 justify-end text-neutral-900',
            'meta' => 'flex items-center gap-2 order-first text-xs text-neutral-700 lg:text-sm',
            'category' => 'text-red-700 font-medium',
            'summary' => '',
            'premium-badge' => 'absolute top-2 left-2 z-20 flex items-center justify-center gap-1 font-bold bg-amber-500 text-amber-100 text-sm w-6 h-6 rounded-full',
            'premium-badge-normal' => 'sm:top-auto sm:bottom-0 sm:left-auto sm:right-0 sm:rounded-none sm:bg-amber-500/75 sm:w-5 sm:h-5 sm:text-xs',
            'premium-badge-featured' => ''
        ];
    }
}
