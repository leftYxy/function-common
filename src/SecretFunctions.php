<?php
/**
 * @description: 自定义加密解密函数
 * @CreateDate 2025-04-30 11:11
 */

declare(strict_types=1);

if (!function_exists('self_decrypt')) {
    /**
     * Notes: 自定义解密函数
     * @param string $data
     * @return string
     *
     * Date: 2025/4/30
     * Author: yaoxy
     */
    function self_decrypt(string $data): string
    {
        return base64_decode($data);
    }

}

if (!function_exists('self_encrypt')) {
    /**
     * Notes: 自定义加密函数
     * @param string $data
     * @return string
     *
     * Date: 2025/4/30
     * Author: yaoxy
     */
    function self_encrypt(string $data): string
    {
        return base64_encode($data);
    }

}