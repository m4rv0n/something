<?php

namespace Framework;

/**
 * Class Controller
 * @package Framework
 */
abstract class Controller {
    /**
     * Parameters from the matched route
     *
     * @var array
     */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params Parameters from the route
     *
     * @return void
     */
    public function __construct($route_params) {
        $this->route_params = $route_params;
    }

    /**
     * Calls an action with before and after filter applied
     *
     * @param $name
     * @param $args
     *
     * @throws \Exception
     * @return void
     */
    public function __call($name, $args) {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            $reflection = new \ReflectionMethod($this, $method);
            $args      = $args[0];
            $fire_args = [];
            $keys      = [];

            foreach ($args as $key => $value) {
                $keys[] = $key;
            }

            foreach ($reflection->getParameters() as $arg) {
                if (in_array($arg->name, $keys)) {
                    $fire_args[$arg->name] = $args[$arg->name];
                } else {
                    if ($arg->isDefaultValueAvailable()) {
                        $fire_args[$arg->name] = $arg->getDefaultValue();
                    } else {
                        $fire_args[$arg->name] = null;
                    }
                }
            }
            call_user_func_array([$this, $method], $fire_args);
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }
}
