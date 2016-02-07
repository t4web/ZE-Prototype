<?php

namespace Prototype;

class ModuleConfig
{
    public function __invoke()
    {
        $moduleDir = dirname(dirname(__DIR__));

        return [
            'dependencies' => include $moduleDir . '/config/dependencies.config.php',
            'routes' => include $moduleDir . '/config/routes.config.php',
            'templates' => include $moduleDir . '/config/templates.config.php',
        ];
    }
}
