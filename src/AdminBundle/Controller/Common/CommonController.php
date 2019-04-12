<?php
// +----------------------------------------------------------------------
// | Author: jdmake <503425061@qq.com>
// +----------------------------------------------------------------------
// | Date: 2019/4/10
// +----------------------------------------------------------------------


namespace AdminBundle\Controller\Common;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validation;

class CommonController extends Controller
{
    protected function render($view, array $parameters = [], Response $response = null)
    {
        $repository = $this->getDoctrine()->getRepository('MemberBundle:YuzhiMenus');
        $list = $repository
            ->createQueryBuilder('a')
            ->select('a')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        $tree = $this->getUtils()->makeTree();
        $main_menus = $tree::toLayer($list);

        return parent::render($view, array_merge($parameters, [
            'main_menus' => $main_menus
        ]), $response);
    }

    public function success($data = [], $msg = 'this request success.', $status = 'SUCCESS')
    {
        $res = [
            'result_status' => $status,
            'msg' => $msg,
            'data' => $data
        ];

        if (!$data) {
            unset($res['data']);
        }

        return $this->json($res);
    }

    public function error($code, $msg = 'this request error.', $status = 'ERROR')
    {
        $res = [
            'result_status' => $status,
            'code' => $code,
            'msg' => $msg,
        ];
        return $this->json($res);
    }

    protected function validate($rule, $data)
    {
        $errors = [];
        $validator = Validation::createValidator();
        foreach ($rule as $key => $item) {
            $violations = $validator->validate($data[$key], [$item]);
            if (0 !== count($violations)) {
                foreach ($violations as $violation) {
                    $errors[] = $violation->getMessage();
                }
            }
        }
        return $errors;
    }

    protected function getUtils()
    {
        return $this->get('admin.utils');
    }

    protected function request()
    {
        return $this->get('request_stack')->getCurrentRequest();
    }
}