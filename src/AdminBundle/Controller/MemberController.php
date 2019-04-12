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
        $row_count = 10;

        $page = $this->request()->get('page', 1);

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MemberBundle:YuzhiMember');
        $res = $repository->createQueryBuilder('m')
            ->setFirstResult(($page - 1) * $row_count)
            ->setMaxResults($row_count)
            ->select('m', 'p', 'g')
            ->innerJoin('m.profile', 'p')
            ->innerJoin('m.group', 'g')
            ->getQuery()->getResult();

        //$res = $repository->createMember('wjbhk', '2130111', $this->getParameter('credits'));

        return $this->render('AdminBundle:member:index.html.twig', [
            'list' => $res,
        ]);
     }
}