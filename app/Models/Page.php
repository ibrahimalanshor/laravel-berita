<?php

namespace App\Models;

use App\Support\StructuredData\Features\Feature;
use App\Support\StructuredData\Features\Page as PageFeature;
use App\Support\StructuredData\SchemaReady;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Page extends Model implements Sitemapable, SchemaReady
{
    use HasFactory;
    
    /**
     * toSitemapTag
     *
     * @return Url
     */
    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('page.detail', $this))
            ->setLastModificationDate($this->updated_at);
    }
    
    /**
     * toSchema
     *
     * @return Feature
     */
    public function toSchema(): Feature
    {
        return new PageFeature(
            name: $this->title,
            url: route('page.detail', $this),
            description: Str::of($this->content)->stripTags()->limit(100),
            publishedDate: $this->created_at,
            modifiedDate: $this->updated_at
        );
    }
}
