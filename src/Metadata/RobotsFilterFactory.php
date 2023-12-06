<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\Metadata;

use Kaiseki\Config\Config;
use Kaiseki\WordPress\Yoast\OutputFilter\OutputFilterInterface;
use Kaiseki\WordPress\Yoast\OutputFilter\OutputFilterPipeline;
use Psr\Container\ContainerInterface;

use function is_array;
use function is_string;

/**
 * @phpstan-type OutputFilterType class-string<OutputFilterInterface>|OutputFilterInterface
 * @phpstan-type OutputFilterTypes OutputFilterType|list<OutputFilterType>
 */
class RobotsFilterFactory
{
    public function __invoke(ContainerInterface $container): RobotsFilter
    {
        $config = Config::get($container);
        /** @var OutputFilterTypes $filter */
        $filter = $config->get('yoast/robots', []);
        return new RobotsFilter(
            $this->getConfigs($filter, $container),
        );
    }

    /**
     * @param OutputFilterTypes  $filter
     * @param ContainerInterface $container
     *
     * @return OutputFilterInterface
     */
    private function getConfigs(mixed $filter, ContainerInterface $container): OutputFilterInterface
    {
        if ($filter instanceof OutputFilterInterface) {
            return $filter;
        }
        if (is_string($filter)) {
            return Config::initClass($container, $filter);
        }
        if (!is_array($filter)) {
            throw new \InvalidArgumentException('Invalid filter configuration');
        }
        return new OutputFilterPipeline(...Config::initClassMap($container, $filter));
    }
}
