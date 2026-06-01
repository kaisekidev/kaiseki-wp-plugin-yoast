# kaiseki/wp-plugin-yoast

WordPress helpers for the Yoast SEO plugin: filter the robots meta output (`noindex`/`nofollow`) via configurable output filters.

`RobotsFilter` is a `kaiseki/wp-hook` `HookProviderInterface` that hooks Yoast's `wpseo_robots` filter
and runs the configured `OutputFilterInterface`(s) over the value. The package ships `NoIndex` and
`NoFollow` filters, and you can compose several into an `OutputFilterPipeline` or add your own.

## Installation

```bash
composer require kaiseki/wp-plugin-yoast
```

Requires PHP 8.2 or newer. Expects the Yoast SEO plugin to be active at runtime.

## Usage

Register `ConfigProvider` with your laminas-style config aggregator, set the `yoast.robots` filter
(an `OutputFilterInterface` instance, a class-string resolved from the container, or a list combined
into a pipeline), and activate `RobotsFilter` via `kaiseki/wp-hook`:

```php
use Kaiseki\WordPress\Yoast\Metadata\RobotsFilter;
use Kaiseki\WordPress\Yoast\OutputFilter\Metadata\NoIndex;
use Kaiseki\WordPress\Yoast\OutputFilter\Metadata\NoFollow;

return [
    'yoast' => [
        // single class-string, an instance, or a list (run as a pipeline)
        'robots' => [
            NoIndex::class,
            NoFollow::class,
        ],
    ],
    'hook' => [
        'provider' => [
            RobotsFilter::class,
        ],
    ],
];
```

`ConfigProvider` registers `RobotsFilterFactory`, which resolves the configured filter(s) from the
container. Implement `OutputFilterInterface` for custom robots transformations.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
