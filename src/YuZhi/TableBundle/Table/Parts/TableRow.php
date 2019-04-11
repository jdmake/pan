<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table\Parts;


use YuZhi\TableBundle\Table\Parts\Type\ActionColumn;
use YuZhi\TableBundle\Table\Parts\Type\TableColumnType;

class TableRow
{
    protected $columns;

    /**
     * 添加一列到表格
     *
     * @param  $field   string             数据字段名称
     * @param  $title   string             列名称, 没有设置数据源时默认显示
     * @param  $type    TableColumnType    列属性
     * @param  $options array              扩展参数
     * @return $this
     */
    public function addColumn($field, $title = '', $type = null, $options = array())
    {
        /** @var TableColumnType $table_column */
        $table_column = new $type($field, $title, $options);
        $this->columns[] = $table_column;
        return $this;
    }

    /**
     * 添加表格操作列
     *
     * @param string $title     标题
     * @param array $options    扩展参数
     * @return $this
     */
    public function addActionColumn($title = '', $options = array())
    {
        $table_column = new ActionColumn('action', $title, $options);
        $this->columns[] = $table_column;
        return $this;
    }

    /**
     * 返回所有列集合
     * @return mixed
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * 获取列字段名称
     *
     * @param $index
     * @return mixed
     */
    public function getColumnField($index)
    {
        return $this->columns[$index]->getField();
    }
}