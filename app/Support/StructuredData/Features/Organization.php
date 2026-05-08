<?php

namespace App\Support\StructuredData\Features;

use App\Models\SocialLink;

class Organization extends Feature
{
    public function __construct(
        protected string $name,
        protected string $description
    ) {}

    public function details(): array
    {
        return [
            '@type' => ['WebSite', 'Organization'],
            'name' => $this->name,
            'url' => route('home'),
            'description' => $this->description,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => setting('logo_url'),
            ],
            'sameAs' => SocialLink::pluck('url'),
        ];
    }
}