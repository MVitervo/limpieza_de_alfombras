<?php

class Container
{
    private array $bindings = [];

    public function set(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function get(string $abstract): mixed
    {
        if (!isset($this->bindings[$abstract])) {
            throw new Exception(
                "No existe un binding para: {$abstract}"
            );
        }

        return $this->bindings[$abstract]($this);
    }
}

?>

