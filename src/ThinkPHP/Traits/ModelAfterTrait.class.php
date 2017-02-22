<?php

namespace dongm2ez\ActionLog\Traits;

use dongm2ez\ActionLog\Repositories\ActionLogRepository;

trait ModelAfterTrait
{
    // 插入成功后的回调方法
    protected function _after_insert($data, $options)
    {
        ActionLogRepository::createActionLog('add', '表 '.$options['table'].' 添加的id:'.$data['id'].' | '.json_encode($data), '', 'auto');
    }

    // 更新成功后的回调方法
    protected function _after_update($data, $options)
    {
        ActionLogRepository::createActionLog('update', '表 '.$options['table'].' 更新的条件:'.json_encode($options['where']).' | '.json_encode($data), '', 'auto');
    }

    // 删除成功后的回调方法
    protected function _after_delete($data, $options)
    {
        ActionLogRepository::createActionLog('delete', '表 '.$options['table'].'删除条件:'.json_encode($options['where']).' 删除的id:'.$data['id'], '', 'auto');
    }
}
