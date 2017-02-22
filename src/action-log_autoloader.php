<?php
/*
 * 此文件用于不使用composer加载类文件时手动载入包文件
 */

$mapping = array(
    'dongm2ez\ActionLog\Repositories\ActionLogRepository' => __DIR__ . '/Repositories/ActionLogRepository.php',
    'dongm2ez\ActionLog\Services\clientService' => __DIR__ . '/Services/clientService.php',
    'dongm2ez\ActionLog\Traits\ModelAfterTrait' => __DIR__ . '/ThinkPHP/Traits/ModelAfterTrait.class.php',
);

spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);
