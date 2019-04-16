<?php
/**
 * Created by PhpStorm.
 * User: pro3
 * Date: 2019/4/13
 * Time: 12:28
 */

namespace Modular\MemberBundle\Controller\Traits;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validation;

trait UtilTrait
{
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

        $headers = [];

        return new JsonResponse(json_encode($res), 200, $headers, true);
    }

    public function error($code, $msg = 'this request error.', $status = 'ERROR')
    {
        $res = [
            'result_status' => $status,
            'code' => $code,
            'msg' => $msg,
        ];

        $headers = [];

        return new JsonResponse(json_encode($res), 404, $headers, true);
    }

    protected function validate($rule, $data)
    {
        $errors = [];
        $validator = Validation::createValidator();
        foreach ($rule as $key => $item) {
            $violations = $validator->validate($data[$key], $item);
            if (0 !== count($violations)) {
                foreach ($violations as $violation) {
                    $errors[] = $violation->getMessage();
                }
            }
        }
        return $errors;
    }
}