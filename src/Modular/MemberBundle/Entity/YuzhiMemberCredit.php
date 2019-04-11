<?php

namespace Modular\MemberBundle\Entity;

/**
 * YuzhiMemberCredit
 */
class YuzhiMemberCredit
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $uid;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $total;

    /**
     * @var integer
     */
    private $volume;

    /**
     * @var integer
     */
    private $frozen;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     *
     * @return YuzhiMemberCredit
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return YuzhiMemberCredit
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
     * Set total
     *
     * @param integer $total
     *
     * @return YuzhiMemberCredit
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set volume
     *
     * @param integer $volume
     *
     * @return YuzhiMemberCredit
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return integer
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set frozen
     *
     * @param integer $frozen
     *
     * @return YuzhiMemberCredit
     */
    public function setFrozen($frozen)
    {
        $this->frozen = $frozen;

        return $this;
    }

    /**
     * Get frozen
     *
     * @return integer
     */
    public function getFrozen()
    {
        return $this->frozen;
    }
}
