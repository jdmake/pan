<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table;

use YuZhi\TableBundle\Table\Parts\TableColumn;
use YuZhi\TableBundle\Table\Parts\TableColumnInterface;
use YuZhi\TableBundle\Table\Parts\TableRow;

/**
 * 表格。
 * Interface TableInterface
 * @package YuZhi\TableBundle\Table
 */
interface TableInterface
{
    /**
     * 添加一行
     * @param TableRow $row
     * @return mixed
     */
    public function addRow(TableRow $row);

    /**
     * 返回表错误信息
     * @return array
     */
    public function getErrors();

    /**
     * 使用默认数据更新表
     * @param $modelData
     * @return mixed
     */
    public function setData($modelData);

    /**
     * 返回基础对象所需格式的数据。
     * @return mixed
     */
    public function getData();

    /**
     * 返回值转换器转换的数据
     *
     * @return mixed
     */
    public function getViewData();

    /**
     * 返回表的配置
     */
    public function getConfig();

    /**
     * 返回表格名称.
     *
     * @return string
     */
    public function getName();

    /**
     * 返回表格映射到的属性路径
     */
    public function getPropertyPath();

    /**
     * 添加表格错误信息
     * @param $error
     * @return mixed
     */
    public function addError($error);

    /**
     * 创建表格视图
     * @return TableView
     */
    public function createView();
}