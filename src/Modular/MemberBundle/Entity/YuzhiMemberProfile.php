<?php

namespace Modular\MemberBundle\Entity;

/**
 * YuzhiMemberProfile
 */
class YuzhiMemberProfile
{
    /**
     * @var string
     */
    private $nickname;

    /**
     * @var string
     */
    private $portrait;

    /**
     * @var string
     */
    private $realname;

    /**
     * @var boolean
     */
    private $gender;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $address;

    /**
     * @var integer
     */
    private $birthyear;

    /**
     * @var integer
     */
    private $birthmonth;

    /**
     * @var integer
     */
    private $birthday;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set nickname
     *
     * @param string $nickname
     *
     * @return YuzhiMemberProfile
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set portrait
     *
     * @param string $portrait
     *
     * @return YuzhiMemberProfile
     */
    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;

        return $this;
    }

    /**
     * Get portrait
     *
     * @return string
     */
    public function getPortrait()
    {
        return $this->portrait;
    }

    /**
     * Set realname
     *
     * @param string $realname
     *
     * @return YuzhiMemberProfile
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;

        return $this;
    }

    /**
     * Get realname
     *
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     *
     * @return YuzhiMemberProfile
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return YuzhiMemberProfile
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return YuzhiMemberProfile
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set birthyear
     *
     * @param integer $birthyear
     *
     * @return YuzhiMemberProfile
     */
    public function setBirthyear($birthyear)
    {
        $this->birthyear = $birthyear;

        return $this;
    }

    /**
     * Get birthyear
     *
     * @return integer
     */
    public function getBirthyear()
    {
        return $this->birthyear;
    }

    /**
     * Set birthmonth
     *
     * @param integer $birthmonth
     *
     * @return YuzhiMemberProfile
     */
    public function setBirthmonth($birthmonth)
    {
        $this->birthmonth = $birthmonth;

        return $this;
    }

    /**
     * Get birthmonth
     *
     * @return integer
     */
    public function getBirthmonth()
    {
        return $this->birthmonth;
    }

    /**
     * Set birthday
     *
     * @param integer $birthday
     *
     * @return YuzhiMemberProfile
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return integer
     */
    public function getBirthday()
    {
        return $this->birthday;
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

