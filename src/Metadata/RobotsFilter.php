<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\Metadata;

use Kaiseki\WordPress\Hook\HookProviderInterface;
use Kaiseki\WordPress\Yoast\OutputFilter\OutputFilterInterface;
use Yoast\WP\SEO\Presentations\Indexable_Presentation;

use function add_filter;

final class RobotsFilter implements HookProviderInterface
{
    public function __construct(private readonly OutputFilterInterface $filter)
    {
    }

    public function addHooks(): void
    {
        add_filter('wpseo_robots', [$this, 'maybeNoindexPost'], 10, 2);
    }

    public function maybeNoindexPost(
        string $output,
        Indexable_Presentation $presentation
    ): mixed {
        return ($this->filter)($output, $presentation);
    }
}
