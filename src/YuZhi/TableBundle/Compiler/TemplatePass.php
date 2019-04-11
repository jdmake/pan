<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TemplatePass implements CompilerPassInterface
{

    /**
     * You can modify the container here before it is dumped to PHP code.
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $engines = $container->getParameter('templating.engines');

        if (!in_array('twig', $engines)) {
            foreach ($container->findTaggedServiceIds('table.templating.twig') as $id => $attr) {
                $container->removeDefinition($id);
            }
        }

        if (!in_array('php', $engines)) {
            foreach ($container->findTaggedServiceIds('table.templating.php') as $id => $attr) {
                $container->removeDefinition($id);
            }
        }
    }


}