<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Twig;


use Symfony\Bundle\TwigBundle\TwigEngine;

class TableExtension extends \Twig_Extension
{
    /** @var TwigEngine */
    protected $twigEngine;

    /**
     * TableExtension constructor.
     */
    public function __construct($twig)
    {
        $this->twigEngine = $twig['twig'];
    }


    public function getFunctions()
    {
        $functions = new TableTwigFunctions($this->twigEngine);
        return [
            new \Twig\TwigFunction('table_start', [$functions, 'start']),
            new \Twig\TwigFunction('table_thead', [$functions, 'thead']),
            new \Twig\TwigFunction('table_tbody', [$functions, 'tbody']),
        ];
    }
}