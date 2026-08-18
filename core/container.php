<?php

class Container
{
    private array $bindings = [];

    // el set indica: Cuando alguien solicite PDO, sé cómo construirlo
    public function set(string $abstract, callable $factory): void
    {
        $this->bindings[$abstract] = $factory;
    }

    public function get(string $abstract): mixed
    {
        /*
         * 1. Primero comprobamos si existe un binding manual.
         */
        if (isset($this->bindings[$abstract])) {
            return $this->bindings[$abstract]($this);
        }


        /*
         * 2. Si no existe binding, intentamos
         *    construir la clase automáticamente.
         */
        $reflection = new ReflectionClass($abstract);


        /*
         * 3. Comprobamos que la clase pueda ser instanciada.
         */
        if (!$reflection->isInstantiable()) {
            throw new Exception(
                "La clase {$abstract} no se puede instanciar."
            );
        }


        /*
         * 4. Obtenemos el constructor.
         */
        $constructor = $reflection->getConstructor();


        /*
         * 5. Si no tiene constructor,
         *    podemos crearla directamente.
         */
        if ($constructor === null) {
            return new $abstract();
        }


        /*
         * 6. Obtenemos los parámetros del constructor.
         */
        $parameters = $constructor->getParameters();


        $dependencies = [];


        /*
         * 7. Recorremos cada dependencia.
         */
        foreach ($parameters as $parameter) {

            $type = $parameter->getType();


            /*
             * Por ahora solamente soportaremos
             * tipos que sean clases.
             */
            if (!$type instanceof ReflectionNamedType) {
                throw new Exception(
                    "No se pudo resolver la dependencia: "
                        . $parameter->getName()
                );
            }


            /*
             * 8. Le pedimos al Container que resuelva
             *    esa dependencia.
             */
            $dependencies[] = $this->get(
                $type->getName()
            );
        }


        /*
         * 9. Creamos la clase pasando las dependencias
         *    que acabamos de resolver.
         */
        return $reflection->newInstanceArgs(
            $dependencies
        );
    }
}
