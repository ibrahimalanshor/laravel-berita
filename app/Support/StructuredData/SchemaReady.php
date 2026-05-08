<?php

namespace App\Support\StructuredData;

use App\Support\StructuredData\Features\Feature;

interface SchemaReady
{
    public function toSchema(): Feature;
}