<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/11
// +----------------------------------------------------------------------


namespace AdminBundle\Controller;


use AdminBundle\Controller\Common\CommonController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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


        return $this->render('AdminBundle:member:index.html.twig', [
            'list' => $res,
        ]);
    }

    /**
     * @Route("/member/edit/{id}", name="admin_member_edit")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MemberBundle:YuzhiMember');

        $user = $repository->createQueryBuilder('m')
            ->select('m', 'g', 'p')
            ->innerJoin('m.group', 'g')
            ->innerJoin('m.profile', 'p')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->setFirstResult(0)
            ->getQuery()
            ->getArrayResult()[0];

        $builder = $this->createFormBuilder($user);

        $group_choices = [];
        foreach ($repository->getGroups() as $group) {
            $group_choices[$group->getTitle()] = $group->getId();
        }


        $form = $builder->setRequired(false)
            ->add('username', TextType::class, ['label' => '登录账号'])
            ->add('password', TextType::class, ['label' => '登录密码'])
            ->add('email', TextType::class, ['label' => '邮箱'])
            ->add('mobile', TextType::class, ['label' => '手机号'])
            ->add('lastLoginIp', TextType::class, ['label' => '最后登录IP'])
            ->add('lastLoginTime', TextType::class, ['label' => '最后登录时间'])
            ->add('loginCount', TextType::class, ['label' => '登录次数'])
            ->add('createAt', DateType::class, ['label' => '注册时间', 'translation_domain' => 'MemberBundle'])
            ->add('status', CheckboxType::class, [
                'label' => '禁用',
            ])
            ->add(
                $builder->create('group', FormType::class)
                ->add('title', ChoiceType::class, [
                    'label' => '会员组',
                    'choices' => $group_choices
                ])
            )
            ->add('submit', SubmitType::class, ['label' => '提交'])
            ->getForm();


        return $this->render('AdminBundle:member:edit.html.twig', [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}