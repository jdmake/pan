<?php

namespace Modular\MemberBundle\Services;


use Symfony\Component\HttpFoundation\Session\Session;

class MemberAuth
{
    /** @var Session */
    private $session;

    /**
     * MemberAuth constructor.
     * @param $session
     */
    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * 更新用户状态
     *
     * @param $uid
     */
    public function memberStateUpdate($uid)
    {
        $this->session->set('member_state', [
            'uid' => $uid
        ]);
    }
}