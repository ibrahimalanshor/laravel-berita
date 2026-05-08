<?php

namespace App\Support\StructuredData\Features;

class PageFeature extends Feature
{
    public function __construct(
        protected string $name,
        protected string $url,
        protected string $description,
        protected string $publishedDate,
        protected string $modifiedDate
    )
    {}

    public function details(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'datePublished' => $this->publishedDate,
            'dateModified' => $this->modifiedDate,
            'publisher' => $this->publisher(),
        ];
    }
}