<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace AdminBundle\Services;


use AdminBundle\Utils\Tree;

class UtilsService
{
    /**
     * @return Tree
     */
    public function makeTree()
    {
       return Tree::config([
            'id' => 'id', // id名称
            'pid' => 'parentId', // pid名称
            'title' => 'title', // 标题名称
            'child' => 'child', // 子元素键名
            'html' => '┝  ', // 层级标记
            'step' => 4, // 层级步进数量
        ]);
    }
}