<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\OutputFilter;

use Yoast\WP\SEO\Presentations\Indexable_Presentation;

interface OutputFilterInterface
{
    public function __invoke(mixed $output, Indexable_Presentation $presentation): mixed;
}
