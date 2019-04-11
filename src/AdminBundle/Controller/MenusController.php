<?php

namespace AdminBundle\Controller;

use AdminBundle\Controller\Common\CommonController;
use AdminBundle\Entity\YuzhiMenus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class MenusController extends CommonController
{
    /**
     * @Route("/menus/", name="admin_menus")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AdminBundle:YuzhiMenus');
        $list = $repository
            ->createQueryBuilder('a')
            ->select('a')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $tree = $this->getUtils()->makeTree();

        return $this->render('AdminBundle:menus:index.html.twig', [
            'menus' => $tree::toList($list)
        ]);
    }

    /**
     * @Route("/menus/add", name="admin_menus_add")
     */
    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('AdminBundle:YuzhiMenus')->findAll();

        return $this->render('AdminBundle:menus:add.html.twig', [
            'menus' => $menus,
            'menu' => []
        ]);
    }

    /**
     * @Route("/menus/edit/{id}", name="admin_menus_edit")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $menus = $em->getRepository('AdminBundle:YuzhiMenus')->findAll();
        $menu = $em->getRepository('AdminBundle:YuzhiMenus')->find($id);

        return $this->render('AdminBundle:menus:add.html.twig', [
            'menus' => $menus,
            'menu' => $menu,
        ]);
    }

    /**
     * @Route("/menus/doAdd", name="admin_menus_do_add")
     * @Method("POST")
     */
    public function doAddAction(Request $request)
    {
        $form = $request->request->get('form');

        $violations = $this->validate([
            'title' => new NotBlank([
                'message' => '标题不能为空'
            ]),
            'path' => new NotBlank([
                'message' => 'URL不能为空'
            ]),
        ], $form);

        if (count($violations) > 0) {
            return $this->error('', join('<br />', $violations));
        }

        if($form['id']) {
            $yuzhiMenus = $this->getDoctrine()->getManager()->getRepository('AdminBundle:YuzhiMenus')
                ->find($form['id']);
        }else {
            $yuzhiMenus = new YuzhiMenus();
        }

        $yuzhiMenus->setParentId((int)$form['parent_id']);
        $yuzhiMenus->setIcon($form['icon']);
        $yuzhiMenus->setTitle($form['title']);
        $yuzhiMenus->setPath($form['path']);
        $yuzhiMenus->setIsDelete(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($yuzhiMenus);
        $em->flush();

        return $this->success([
            'id' => $yuzhiMenus->getId()
        ], '编辑菜单成功');
    }

}
