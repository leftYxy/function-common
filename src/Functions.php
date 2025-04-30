<?php
/**
 * @description: 自定义函数
 * @CreateDate 2025-04-30 11:09
 */

declare(strict_types=1);

if (! function_exists('get_format_date')) {
    /**
     * 获取格式化日期时间.
     *
     * @param int $timestamp 时间戳
     * @param string $type 日期类型
     * @return string
     */
    function get_format_date(int $timestamp = 0, string $type = ''): string
    {
        return match ($type) {
            'date' => date('Y.m.d', $timestamp),
            'sdate' => date('Y.n.j', $timestamp),
            'date2' => date('Y年n月j日', $timestamp),
            'time' => date('H:i:s', $timestamp),
            'datetime', 'datetime3' => date('Y.m.d H:i', $timestamp),
            'datetime2' => date('Y.m.d H:i', $timestamp),
            'sdatetime' => date('Y.n.j H:i', $timestamp),
            'datetime4' => date('Y-m-d H:i', $timestamp),
            default => date('Y-m-d H:i:s', $timestamp),
        };
    }
}

if (! function_exists('new_get_tree_data')) {
    /**
     * Notes: 获取树状结构数据.
     * @param array $list 数据
     * @param int|string $parent_id 父级id
     * @param string $key
     * @param string $item_key
     * @param string $children_key
     * @return array
     *
     * Date: 2024/10/11
     * Author: yaoxy
     */
    function new_get_tree_data(array $list, int|string $parent_id = 0, string $key = 'parent_id', string $item_key = 'id', string $children_key = 'children'): array
    {
        // 初始化树结构
        $tree = [];

        // 预处理数组：按 parent_id 分组
        $grouped = [];
        foreach ($list as $item) {
            $grouped[$item[$key]][] = $item;
        }

        // 使用堆栈实现迭代
        $stack = [];
        array_push($stack, [$parent_id, &$tree]);

        while (! empty($stack)) {
            // 弹出堆栈中的元素，并且使用数组解构来获取值
            $current = array_pop($stack);
            $parent = $current[0];
            $parent_tree = &$current[1];

            if (isset($grouped[$parent])) {
                foreach ($grouped[$parent] as $item) {
                    // 初始化当前项的 children 数组
                    $item[$children_key] = [];
                    // 将当前项添加到父节点的 children 数组中
                    $parent_tree[] = $item;
                    // 将当前项的 ID 和其 children 数组的引用推入堆栈，以便处理子节点
                    array_push($stack, [$item[$item_key], &$parent_tree[count($parent_tree) - 1][$children_key]]);
                }
            }
        }

        return $tree;
    }
}