<?php

namespace YuZhi\TableBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use YuZhi\TableBundle\Compiler\TemplatePass;

class TableBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new TemplatePass());
    }

}
