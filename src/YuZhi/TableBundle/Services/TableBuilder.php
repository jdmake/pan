<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Services;


use YuZhi\TableBundle\Table\Table;

class TableBuilder
{
    /**
     * @var string 表格名称
     */
    protected $name;

    /**
     * @var array 表格行
     */
    protected $row;

    /**
     * @var array 表格列
     */
    protected $col;

    /**
     * @var array 数据源
     */
    protected $data;

    protected $options = [
        'block_name' => null,
    ];

    /**
     * 创建表格
     */
    public function createTable()
    {
        return new Table();
    }
}