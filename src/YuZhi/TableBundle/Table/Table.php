<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table;


use YuZhi\TableBundle\Table\Parts\TableRow;
use YuZhi\TableBundle\Table\Parts\Type\TableColumnType;

class Table implements TableInterface
{
    protected $config;
    protected $rows;
    protected $name;

    /**
     * @var 数据源
     */
    protected $data;

    /**
     * 添加一行
     * @param TableRow $row
     * @return mixed
     */
    public function addRow(TableRow $row)
    {
        $this->rows[] = $row;
    }

    /**
     * 返回表错误信息
     * @return array
     */
    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    /**
     * 使用默认数据更新表
     * @param $modelData
     * @return mixed
     */
    public function setData($modelData)
    {
        $this->data = $modelData;
        return $this;
    }

    /**
     * 返回基础对象所需格式的数据。
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 返回值转换器转换的数据
     *
     * @return mixed
     */
    public function getViewData()
    {
        // TODO: Implement getViewData() method.
    }

    /**
     * 返回表的配置
     */
    public function getConfig()
    {
        // TODO: Implement getConfig() method.
    }

    /**
     * 设置表格名称
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * 返回表格名称.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 返回表格映射到的属性路径
     */
    public function getPropertyPath()
    {
        // TODO: Implement getPropertyPath() method.
    }

    /**
     * 添加表格错误信息
     * @param $error
     * @return mixed
     */
    public function addError($error)
    {
        // TODO: Implement addError() method.
    }

    /**
     * 创建表格视图
     * @return TableView
     */
    public function createView()
    {
        /**
         *  组织静态行
         * @var $row TableRow
         * @var $column TableColumnType
         */
        $table_thead = [];
        foreach ($this->rows as $row) {
            foreach ($row->getColumns() as $column) {
                $table_thead[] = $column->buildForm();
            }
        }

        /**
         *  组织数据行
         */
        $table_tbody = [];
        /** @var TableRow $mapping */
        $mapping = $this->rows[0];

        foreach ($this->data as $key => $item) {
            $row = [];
            foreach ($mapping->getColumns() as $column) {
                $field = $column->getField();
                if(isset($item[$field])) {
                    $row[$field] = [
                        'value' => $item[$field],
                        'options' => $column->buildForm()['options']
                    ];
                }else if($field === 'action') {
                    $row['action'] = [
                        'param' => $item,
                        'options' => $column->buildForm()['options']
                    ];
                }
            }
            $table_tbody[] = $row;
        }

        $view = new TableView([
            'table_thead' => $table_thead,
            'table_tbody' => $table_tbody
        ]);

        return $view;
    }
}