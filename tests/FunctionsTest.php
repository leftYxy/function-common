<?php
/**
 * @CreateDate 2025-04-30 11:15
 * @description: 测试Functions
 */

declare(strict_types=1);

namespace Yaoxy\functionCommon\tests;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testInit()
    {
        echo '当前测试文件为：' . __CLASS__ . PHP_EOL;
        $this->assertTrue(true);
    }

    // 测试时间格式函数
    public function testGetFormatDate()
    {
        $timestamp = time();
        $this->assertEquals(date('Y.m.d', $timestamp),get_format_date($timestamp, 'date'));
    }

    // 测试树状结构函数
    public function testNewGetTreeData()
    {
        $data = [
            ['id' => 1,  'name' => '根节点',     'pid' => 0],
            ['id' => 2,  'name' => '一级分类A',  'pid' => 1],
            ['id' => 3,  'name' => '一级分类B',  'pid' => 1],
            ['id' => 4,  'name' => '二级分类A1', 'pid' => 2],
            ['id' => 5,  'name' => '二级分类A2', 'pid' => 2],
            ['id' => 6,  'name' => '二级分类B1', 'pid' => 3],
            ['id' => 7,  'name' => '三级分类A1-1', 'pid' => 4],
            ['id' => 8,  'name' => '三级分类A2-1', 'pid' => 5],
            ['id' => 9,  'name' => '孤立节点',     'pid' => 0],
            ['id' => 10, 'name' => '孤立子节点',   'pid' => 9],
        ];
        $res = new_get_tree_data(list:$data,key: 'pid');
        $this->assertIsArray($res);
    }
}
