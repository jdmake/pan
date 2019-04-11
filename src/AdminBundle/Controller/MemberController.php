<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace AdminBundle\Controller;


use AdminBundle\Controller\Common\CommonController;
use Modular\MemberBundle\Error;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * 会员管理控制器
 *
 * Class MemberController
 * @package AdminBundle\Controller
 */
class MemberController extends CommonController
{
    /**
     * @Route("/member/", name="admin_member")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MemberBundle:YuzhiMember');

        $res = $repository->createMember('jdamke', '2130111', [
            ['title' => '积分', 'volume' => 1],
            ['title' => '余额', 'volume' => 100],
        ]);
        if(!$res) {
           return $this->error($repository->getError());
        }

        return $this->render('AdminBundle:member:index.html.twig', [

        ]);
     }
}