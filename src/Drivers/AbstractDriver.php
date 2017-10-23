<?php

namespace STS\Metrics\Drivers;

use STS\Metrics\Metric;

/**
 * Class AbstractDriver
 * @package STS\Metrics\Drivers
 */
abstract class AbstractDriver
{
    /**
     * @var array
     */
    protected $metrics = [];

    /**
     * @var array
     */
    protected $tags = [];

    /**
     * @var array
     */
    protected $extra = [];

    /**
     * @param $name
     *
     * @return Metric
     */
    public function create($name)
    {
        $metric = new Metric($name, $this);
        $this->metrics[] = &$metric;

        return $metric;
    }

    /**
     * @param Metric $metric
     *
     * @return $this
     */
    public function add(Metric $metric)
    {
        $this->metrics[] = $metric;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetrics()
    {
        return $this->metrics;
    }

    /**
     * Set default tags to be merged in on all metrics
     *
     * @param array $tags
     *
     * @return $this
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Set default extra to be merged in on all metrics
     *
     * @param array $extra
     *
     * @return $this
     */
    public function setExtra(array $extra)
    {
        $this->extra = $extra;

        return $this;
    }
}
