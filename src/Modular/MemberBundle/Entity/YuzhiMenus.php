<?php

namespace Modular\MemberBundle\Entity;

/**
 * YuzhiMenus
 */
class YuzhiMenus
{
    /**
     * @var integer
     */
    private $parentId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var string
     */
    private $path;

    /**
     * @var boolean
     */
    private $isDelete;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return YuzhiMenus
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return YuzhiMenus
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return YuzhiMenus
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return YuzhiMenus
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set isDelete
     *
     * @param boolean $isDelete
     *
     * @return YuzhiMenus
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;

        return $this;
    }

    /**
     * Get isDelete
     *
     * @return boolean
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

