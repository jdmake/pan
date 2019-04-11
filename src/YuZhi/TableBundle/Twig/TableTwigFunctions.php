<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Twig;


use Symfony\Bundle\TwigBundle\TwigEngine;
use Twig\Error\Error;

/**
 * table 标签函数
 *
 * Class TableTwigFunctions
 * @package YuZhi\TableBundle\Twig
 */
class TableTwigFunctions
{
    protected $twigEngine;

    /**
     * TableTwigFunctions constructor.
     * @param TwigEngine $twigEngine
     */
    public function __construct(TwigEngine $twigEngine)
    {
        $this->twigEngine = $twigEngine;
    }

    public function start($vars = [])
    {
        return $this->twigEngine->render('TableBundle::start.html.twig', [
            'view' => $vars
        ]);
    }

    public function thead($vars = [])
    {
        return $this->twigEngine->render('TableBundle::thead.html.twig', [
            'view' => $vars
        ]);
    }

    public function tbody($vars = [])
    {
        return $this->twigEngine->render('TableBundle::tbody.html.twig', [
            'view' => $vars
        ]);
    }
}