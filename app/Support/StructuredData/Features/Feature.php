<?php

namespace App\Support\StructuredData\Features;

abstract class Feature
{
    abstract public function details(): array;

    protected function publisher(): array
    {
        return [
            '@type' => 'Organization',
            'name' => setting('name'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => setting('logo_url')
            ]
        ];
    }
}