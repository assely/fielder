<?php

namespace Assely\Fielder;

use Assely\Foundation\Factory;
use Assely\Field\FieldException;

class Fielder extends Factory
{
    /**
     * Collection of fielder fields.
     *
     * @var array
     */
    protected $fields = [];

    /**
     * Register fields within fielder.
     *
     * @param array $fields
     */
    public function register(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);

        return $this;
    }

    /**
     * Get registered field.
     *
     * @param string $name
     *
     * @return string
     */
    public function get($name)
    {
        if (isset($this->fields[$name])) {
            return $this->fields[$name];
        }

        throw new FieldException("Fielder doesn't have [$name] field registered.");
    }

    /**
     * Creates field instance.
     *
     * @param  string $class
     * @param  string $type
     * @param  string $slug
     * @param  array $arguments
     *
     * @return \Assely\Contracts\Field\FieldInterface
     */
    public function make($class, $type, $slug, $arguments = [])
    {
        $field = $this->container->make($class);

        $field
            ->setType($type)
            ->setSlug($slug)
            ->setArguments($arguments)
            ->boot();

        return $field;
    }

    /**
     * Dynamically build registered fields.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return \Assely\Contracts\Field\FieldInterface
     */
    public function __call($name, $arguments)
    {
        $class = $this->get($name);

        array_unshift($arguments, $class, $name);

        return call_user_func_array([$this, 'make'], $arguments);
    }
}
