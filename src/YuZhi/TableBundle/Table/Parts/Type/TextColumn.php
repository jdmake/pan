<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table\Parts\Type;


class TextColumn extends TableColumnType
{
    protected $field;
    protected $title;
    protected $options;

    private $allow_options = ['style', 'class'];
}