<?php

namespace App\Support\StructuredData\Features;

class Author extends Feature
{
    public function __construct(
        protected string $name,
        protected string $description,
        protected string $url,
        protected string $createdAt,
        protected string $modifiededAt,
        protected ?string $image,
        protected array $links,
    )
    {}

    public function details(): array
    {
        return [
            '@type' => 'ProfilePage',
            'dateCreated' => $this->createdAt,
            'dateModified' => $this->modifiededAt,
            'mainEntity' => [
                '@type' => 'Person',
                'name' => $this->name,
                'url' => $this->url,
                'description' => $this->description,
                'image' => $this->image,
                'sameAs' => $this->links
            ]
        ];
    }
}