<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/12
// +----------------------------------------------------------------------


namespace Modular\MemberBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Modular\MemberBundle\Entity\YuzhiMember;
use Modular\MemberBundle\Entity\YuzhiMemberCredit;
use Modular\MemberBundle\Entity\YuzhiMemberProfile;
use Modular\MemberBundle\Error;

/**
 * 实体仓库层
 *
 * Class YuzhiMemberRepository
 * @package Modular\MemberBundle\Repository
 */
class YuzhiMemberRepository extends EntityRepository
{
    protected $error = '';

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param $username
     * @param $password
     * @param array $credit_list credit 种类
     * @return int
     */
    public function createMember($username, $password, $credit_list = [])
    {
        $this->getEntityManager()->beginTransaction();

        try {

            $em = $this->getEntityManager();
            $profile = new YuzhiMemberProfile();
            $profile->setNickname('');
            $em->persist($profile);
            $em->flush();

            $member = new YuzhiMember();
            $member->setUsername($username);
            $member->setPassword(password_hash($password, PASSWORD_BCRYPT));
            $member->setGroup($this->getDefGroup());
            $member->setLoginCount(0);
            $member->setCreateAt(new \DateTime());
            $member->setProfile($profile);
            $member->setStatus(0);

            $em->persist($member);
            $em->flush();

        } catch (\Exception $exception) {
            if (strpos($exception->getMessage(), 'Duplicate')) {
                $this->error = Error::user_already_exists;
            } else {
                $this->error = $exception->getMessage();
            }

            $this->getEntityManager()->rollback();
            return false;
        }

        // 创建 credit
        foreach ($credit_list as $item) {
            try {
                $credit = new YuzhiMemberCredit();
                $credit->setTitle($item['title']);
                $credit->setUid($member->getId());
                $credit->setVolume($item['volume']);
                $credit->setTotal(0);
                $credit->setFrozen(0);

                $em = $this->getEntityManager();
                $em->persist($credit);
                $em->flush();
            } catch (\Exception $exception) {
                $this->error = $exception->getMessage();

                $this->getEntityManager()->rollback();
                return false;
            }
        }

        $this->getEntityManager()->commit();

        return $member->getId();
    }

    /**
     * @return \Modular\MemberBundle\Entity\YuzhiMemberGroup|object|null
     */
    public function getDefGroup()
    {
        $em = $this->getEntityManager();
        return $em->getRepository('MemberBundle:YuzhiMemberGroup')
            ->findOneBy([
                'isDefault' => 1
            ]);
    }

    public function getGroups()
    {
        $em = $this->getEntityManager();
        return $em->getRepository('MemberBundle:YuzhiMemberGroup')
            ->findAll();
    }

    /**
     * 用户登录
     *
     * @param $username
     * @param $pawssord
     * @return bool
     */
    public function userLogin($username, $pawssord)
    {
        $rep = $this->getEntityManager()->getRepository('MemberBundle:YuzhiMember');
        $user = $rep->findOneBy([
            'username' => $username
        ]);

        if(!$user) {

            $this->error = '登录账号不存在';
            return false;
        }


        if (!password_verify($pawssord, $user->getPassword())) {

            $this->error = '密码错误';
            return false;
        }

        return $user->getId();
    }
}