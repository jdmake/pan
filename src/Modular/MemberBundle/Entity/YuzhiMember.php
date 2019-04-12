<?php

namespace Modular\MemberBundle\Entity;

/**
 * YuzhiMember
 */
class YuzhiMember
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $mobile;

    /**
     * @var string
     */
    private $lastLoginIp;

    /**
     * @var \DateTime
     */
    private $lastLoginTime;

    /**
     * @var integer
     */
    private $loginCount;

    /**
     * @var \DateTime
     */
    private $createAt;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Modular\MemberBundle\Entity\YuzhiMemberGroup
     */
    private $group;

    /**
     * @var \Modular\MemberBundle\Entity\YuzhiMemberProfile
     */
    private $profile;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return YuzhiMember
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return YuzhiMember
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return YuzhiMember
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     *
     * @return YuzhiMember
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set lastLoginIp
     *
     * @param string $lastLoginIp
     *
     * @return YuzhiMember
     */
    public function setLastLoginIp($lastLoginIp)
    {
        $this->lastLoginIp = $lastLoginIp;

        return $this;
    }

    /**
     * Get lastLoginIp
     *
     * @return string
     */
    public function getLastLoginIp()
    {
        return $this->lastLoginIp;
    }

    /**
     * Set lastLoginTime
     *
     * @param \DateTime $lastLoginTime
     *
     * @return YuzhiMember
     */
    public function setLastLoginTime($lastLoginTime)
    {
        $this->lastLoginTime = $lastLoginTime;

        return $this;
    }

    /**
     * Get lastLoginTime
     *
     * @return \DateTime
     */
    public function getLastLoginTime()
    {
        return $this->lastLoginTime;
    }

    /**
     * Set loginCount
     *
     * @param integer $loginCount
     *
     * @return YuzhiMember
     */
    public function setLoginCount($loginCount)
    {
        $this->loginCount = $loginCount;

        return $this;
    }

    /**
     * Get loginCount
     *
     * @return integer
     */
    public function getLoginCount()
    {
        return $this->loginCount;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     *
     * @return YuzhiMember
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return YuzhiMember
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
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

    /**
     * Set group
     *
     * @param \Modular\MemberBundle\Entity\YuzhiMemberGroup $group
     *
     * @return YuzhiMember
     */
    public function setGroup(\Modular\MemberBundle\Entity\YuzhiMemberGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Modular\MemberBundle\Entity\YuzhiMemberGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set profile
     *
     * @param \Modular\MemberBundle\Entity\YuzhiMemberProfile $profile
     *
     * @return YuzhiMember
     */
    public function setProfile(\Modular\MemberBundle\Entity\YuzhiMemberProfile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Modular\MemberBundle\Entity\YuzhiMemberProfile
     */
    public function getProfile()
    {
        return $this->profile;
    }
}

