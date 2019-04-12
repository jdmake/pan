<?php

namespace Modular\MemberBundle\Entity;

/**
 * YuzhiMemberHasCredit
 */
class YuzhiMemberHasCredit
{
    /**
     * @var integer
     */
    private $memberId;

    /**
     * @var integer
     */
    private $creditId;


    /**
     * Set memberId
     *
     * @param integer $memberId
     *
     * @return YuzhiMemberHasCredit
     */
    public function setMemberId($memberId)
    {
        $this->memberId = $memberId;

        return $this;
    }

    /**
     * Get memberId
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->memberId;
    }

    /**
     * Set creditId
     *
     * @param integer $creditId
     *
     * @return YuzhiMemberHasCredit
     */
    public function setCreditId($creditId)
    {
        $this->creditId = $creditId;

        return $this;
    }

    /**
     * Get creditId
     *
     * @return integer
     */
    public function getCreditId()
    {
        return $this->creditId;
    }
}

