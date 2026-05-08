<?php

namespace App\Support\StructuredData;

use App\Support\StructuredData\Features\Feature;

abstract class StructuredData
{
    public static function generate(Feature $feature): string
    {
        $json = json_encode([
            '@context' => 'https://schema.org',
            ...$feature->details()
        ]);;
        
        return <<<EOD
<script type="application/ld+json">
$json
</script>
EOD;
    }
}