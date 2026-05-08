<?php

namespace App\Support\StructuredData\Features;


class CollectionPage extends Feature
{
    public function __construct(
        protected string $name,
        protected string $url,
        protected string $description,
        protected array $items
    ) {}

    public function details(): array
    {
        return [
            '@type' => 'CollectionPage',
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description,
            'publisher' => $this->publisher(),
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => collect($this->items)
                    ->map(function ($item, $pos) {
                        return [
                            '@type' => 'ListItem',
                            'position' => $pos,
                            'url' => $item['url'],
                            'name' => $item['name']
                        ];
                    })
            ]
        ];
    }
}