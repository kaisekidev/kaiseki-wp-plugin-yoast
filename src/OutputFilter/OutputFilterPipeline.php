<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Yoast\OutputFilter;

use Yoast\WP\SEO\Presentations\Indexable_Presentation;

class OutputFilterPipeline implements OutputFilterInterface
{
    /** @var array<OutputFilterInterface> */
    protected array $filters;

    public function __construct(OutputFilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    public function __invoke(mixed $output, Indexable_Presentation $presentation): mixed
    {
        foreach ($this->filters as $filter) {
            $output = $filter($output, $presentation);
        }
        return $output;
    }
}
