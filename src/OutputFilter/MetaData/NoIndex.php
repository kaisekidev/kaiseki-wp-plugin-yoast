<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\OutputFilter\Metadata;

use Kaiseki\WordPress\Yoast\OutputFilter\OutputFilterInterface;
use Yoast\WP\SEO\Presentations\Indexable_Presentation;

use function array_filter;
use function explode;
use function implode;
use function is_string;

final class NoIndex implements OutputFilterInterface
{
    public function __invoke(mixed $output, Indexable_Presentation $presentation): mixed
    {
        if (!is_string($output)) {
            return $output;
        }
        $values = array_filter(explode(', ', $output), fn (string $value) => $value !== 'index');
        return implode(', ', ['noindex', ...$values]);
    }
}
