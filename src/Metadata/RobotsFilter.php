<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\Metadata;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;
use Kaiseki\WordPress\Yoast\OutputFilter\OutputFilterInterface;
use Yoast\WP\SEO\Presentations\Indexable_Presentation;

final class RobotsFilter implements HookCallbackProviderInterface
{
    public function __construct(private readonly OutputFilterInterface $filter)
    {
    }

    public function registerHookCallbacks(): void
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
