<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast;

use Kaiseki\WordPress\Yoast\Metadata\RobotsFilter;
use Kaiseki\WordPress\Yoast\Metadata\RobotsFilterFactory;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'yoast' => [
                'robots' => [],
            ],
            'hook' => [
                'provider' => [],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    RobotsFilter::class => RobotsFilterFactory::class,
                ],
            ],
        ];
    }
}
