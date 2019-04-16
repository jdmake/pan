<?php
/**
 * Created by PhpStorm.
 * User: pro3
 * Date: 2019/4/13
 * Time: 12:19
 */

namespace Modular\MemberBundle\Controller;


use Modular\MemberBundle\Controller\Traits\UtilTrait;
use Modular\MemberBundle\Error;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * 会员控制器
 * Class MemberController
 * @package Modular\MemberBundle\Controller
 */
class MemberController extends Controller
{

    use UtilTrait;

    /**
     * @Route("/register_username", methods={"POST"}, name="member_register_username")
     */
    public function registerForUsernameAndPassWordAction()
    {
        $username = $this->get('request_stack')->getCurrentRequest()
            ->get('username');
        $password = $this->get('request_stack')->getCurrentRequest()
            ->get('password');


        $violations = $this->validate(array(
            'username' => [
                new NotBlank(array(
                    'message' => '登录账号不能为空'
                )),
                new Length(array(
                    'min' => 8,
                    'max' => 16,
                    'minMessage' => '登录账号长度不能小于8个字符',
                    'maxMessage' => '登录账号长度不能大于16个字符',
                ))
            ],
            'password' => [
                new NotBlank(array(
                    'message' => '登录密码不能为空'
                ))
            ],

        ), [
            'username' => $username,
            'password' => $password,
        ]);


        if (count($violations) > 0) {
            return $this->error(Error::user_register_error, join(',', $violations));
        }

        $rep = $this->getDoctrine()
            ->getRepository('MemberBundle:YuzhiMember');

        $res = $rep->createMember($username, $password, $this->getParameter('credits'));
        if (!$res) {
            return $this->error(Error::user_register_error, $rep->getError());
        }

        return $this->success([
            'uid' => $res
        ]);
    }

    /**
     * @Route("/login_account", name="member_login_account", methods={"POST"})
     */
    public function loginForAccount()
    {
        $username = $this->get('request_stack')->getCurrentRequest()
            ->get('username');
        $password = $this->get('request_stack')->getCurrentRequest()
            ->get('password');

        $violations = $this->validate(array(
            'username' => [
                new NotBlank(array(
                    'message' => '登录账号不能为空'
                ))
            ],
        ), [
            'username' => $username,
        ]);

        if (count($violations) > 0) {
            return $this->error(Error::user_login_error, join(',', $violations));
        }

        $rep = $this->getDoctrine()
            ->getRepository('MemberBundle:YuzhiMember');

        $uid = $rep->userLogin($username, $password);
        if(!$uid) {
            return $this->error(Error::user_login_error, $rep->getError());
        }

        $member_auth = $this->get('member.auth');
        $member_auth->memberStateUpdate($uid);

        return $this->success([
            'uid' => $uid
        ], '登录成功');
    }
}