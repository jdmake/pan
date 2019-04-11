<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace YuZhi\TableBundle\Table\Parts\Type;


use Symfony\Component\Form\DataTransformerInterface;

abstract class TableColumnType implements TableColumnTypeInterface, DataTransformerInterface
{
    protected $field;
    protected $title;
    protected $options;

    private $allow_options = ['style', 'class'];

    /**
     * TableColumnType constructor.
     * @param $field
     * @param $title
     * @param $options
     */
    public function __construct($field, $title, $options = [])
    {
        $this->field = $field;
        $this->title = $title;
        $this->options = $options;
    }

    /**
     * 获取字段名称
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    public function buildForm()
    {
        return [
            'field' => $this->field,
            'title' => $this->title,
            'options' => $this->options,
        ];
    }

    public function transform($value)
    {
        // TODO: Implement transform() method.
    }

    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
    }
}