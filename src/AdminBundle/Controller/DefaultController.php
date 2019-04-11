<?php

namespace AdminBundle\Controller;

use AdminBundle\Controller\Common\CommonController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * 默认控制器
 *
 * Class DefaultController
 * @package AdminBundle\Controller
 */
class DefaultController extends CommonController
{
    /**
     * @Route("/", name="admin_home")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('@Admin/Default/index.html.twig', [

        ]);
    }
}
