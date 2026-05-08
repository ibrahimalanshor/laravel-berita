<?php

namespace App\Support\StructuredData\Features;

use DateTime;

class Article extends Feature
{
    
    public function __construct(
        protected string $headline,
        protected string $description,
        protected string $url,
        protected array $images,
        protected string $articleSection,
        protected DateTime $publishedDate,
        protected DateTime $modifiededDate,
        protected array $authors,
        protected array $breadcrumbs,
        protected ?string $paywallSelector = null
    ) {}

    public function details(): array
    {
        return [
            '@type' => 'NewsArticle',
            'headline' => $this->headline,
            'description' => $this->description,
            'url' => $this->url,
            'image' => $this->images,
            'datePublished' => $this->publishedDate,
            'dateModified' => $this->modifiededDate,
            'author' => array_map(function ($author) {
                return [
                    '@type' => 'Person',
                    ...$author
                ];
            }, $this->authors),
            'publisher' => $this->publisher(),
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $this->url
            ],
            'articleSection' => $this->articleSection,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => collect($this->breadcrumbs)->map(function ($breadcrumb, $i) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $i + 1,
                        ...$breadcrumb
                    ];
                })
            ],
            ...($this->paywallSelector ? $this->paywall() : [])
        ];
    }

    public function paywall(): array
    {
        return [
            'isAccessibleForFree' => false,
            'hasPart' => [
                '@type' => 'WebPageElement',
                'isAccessibleForFree' => false,
                'cssSelector'=> $this->paywallSelector
            ]
        ];
    }
}