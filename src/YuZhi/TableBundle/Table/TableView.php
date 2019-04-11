<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table;


use Symfony\Bundle\WebProfilerBundle\Profiler\TemplateManager;
use Traversable;

class TableView implements \ArrayAccess, \Countable
{
    /**
     * @var array   分配给此视图的变量
     */
    protected $vars = [];

    /**
     * TableView constructor.
     * @param array $vars
     */
    public function __construct(array $vars = [])
    {
        $this->vars = $vars;
    }

    public function offsetExists($offset)
    {
        return isset($this->vars[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->vars[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->vars[$offset] = $value;
        return true;
    }

    public function offsetUnset($offset)
    {
        unset($this->vars[$offset]);
        return true;
    }

    public function count()
    {
        return count($this->vars);
    }
}