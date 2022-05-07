<?php

namespace App\Service\ExceptionHandler;

use InvalidArgumentException;

class ExceptionMappingResolver
{
    /**
     * @var ExceptionMapping[]
     */
    private array $mappings = [];

    public function __construct(array $mappings)
    {
        $className = null;
        $mappingData = [];
        foreach ($mappings as $class=>$mapping){
            if (empty($mapping['code'])) {
                throw new InvalidArgumentException('code is mandatory for class'.$class );
            }
            $className = $class;
            $mappingData = $mapping;
        }

        $this->addMapping(
            $className,
            $mappingData['code'],
            $mappingData['hidden'] ?? true,
            $mappingData['loggable'] ?? false
        );
    }

    public function resolve(string $throwableClass): ?ExceptionMapping
    {
        $foundMapping = null;

        foreach ($this->mappings as $class => $mapping) {
            if ($throwableClass === $class || is_subclass_of($throwableClass, $class)) {
                $foundMapping = $mapping;
                break;
            }
        }

        return $foundMapping;
    }

    private function addMapping(string $class, int $code, bool $hidden, bool $loggable): void
    {
        $this->mappings[$class] = new ExceptionMapping($code, $hidden, $loggable);
    }
}