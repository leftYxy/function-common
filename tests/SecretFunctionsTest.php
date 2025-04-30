<?php
/**
 * @CreateDate 2025-04-30 11:34
 * @description: 测试SecretFunctions
 */

declare(strict_types=1);


namespace Yaoxy\functionCommon\tests;
use PHPUnit\Framework\TestCase;

class SecretFunctionsTest extends TestCase
{
    public function testInit()
    {
        echo '当前测试文件为：' . __CLASS__ . PHP_EOL;
        $this->assertTrue(true);
    }

    // 测试自定义加密解密函数
    public function testSelfDecrypt()
    {
        $data = 'abcdef';
        $this->assertEquals(self_decrypt($data), base64_decode($data));
    }

    // 测试自定义加密解密函数
    public function testSelfEncrypt()
    {
        $data = 'abcdef';
        $this->assertEquals(self_encrypt($data), base64_encode($data));
    }
}