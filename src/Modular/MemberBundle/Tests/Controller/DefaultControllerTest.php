<?php

namespace Modular\MemberBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * 测试用户注册成功
     */
    public function testUserRegSuccess()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/member/register_username',
            [
                'username' => 'member' . time(),
                'password' => '2130111',
            ]);

        $res = json_decode($client->getResponse()->getContent());


        $this->assertAttributeContains('SUCCESS','result_status', $res);
    }

    /**
     * 测试登录成功
     */
    public function testUserLoginSuccess()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/member/login_account',
            [
                'username' => 'jdmake',
                'password' => '2130111',
            ]);

        $json = $client->getResponse()->getContent();

        $this->assertContains($json, '{"result_status":"ERROR","code":"member.login.error","msg":"\u767b\u5f55\u8d26\u53f7\u4e0d\u80fd\u4e3a\u7a7a"}\' contains "{"result_status":"SUCCESS","msg":"\u767b\u5f55\u6210\u529f","data":{"uid":6}}');
    }

    /**
     * 测试登录失败，用户名称为空
     */
    public function testUserLoginUsernameEmpty()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/member/login_account',
            [
                'username' => '',
                'password' => '2130111',
            ]);

        $json = $client->getResponse()->getContent();

        $this->assertContains($json, '{"result_status":"ERROR","code":"member.login.error","msg":"\u767b\u5f55\u8d26\u53f7\u4e0d\u80fd\u4e3a\u7a7a"}');
    }

    /**
     * 测试登录失败密码错误
     */
    public function testUserLoginPasswordError()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/member/login_account',
            [
                'username' => 'jdmake',
            ]);

        $json = $client->getResponse()->getContent();

        $this->assertContains($json, '{"result_status":"ERROR","code":"member.login.error","msg":"\u5bc6\u7801\u9519\u8bef"}');
    }
}
