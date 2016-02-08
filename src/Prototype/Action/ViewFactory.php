<?php

namespace T4web\Prototype\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ViewFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new ViewAction($container->get(TemplateRendererInterface::class));
    }
}
