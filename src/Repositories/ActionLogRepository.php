<?php

namespace dongm2ez\ActionLog\Repositories;

use dongm2ez\ActionLog\Services\clientService;

class ActionLogRepository
{
    /**
     * 记录用户操作日志.
     *
     * @param string $type       操作类型
     * @param string $content    操作内容
     * @param string $remark     备注
     * @param string $actionType 操作分类
     *
     * @return bool [description]
     */
    public static function createActionLog($type, $content, $remark = '', $actionType = 'manual')
    {
        $actionLog = D('ActionLog');
        $authToken = $_SERVER[ 'HTTP_AUTHORIZATION' ] ?: '';

        try {
            $decoded = \Org\Util\JWT\JWT::decode($authToken, C('USER_AUTH_KEY'), array('HS256'));
            $checkResult[ 'errcode' ] = 0;
            $checkResult[ 'uid' ] = $decoded->uid;
        } catch (\Exception $e) {
            $checkResult[ 'errcode' ] = -1;
            $checkResult[ 'errmsg' ] = $e->getMessage();
        }

        $data = new \stdClass();
        if ($checkResult[ 'errcode' ] === 0) {
            $data->user_id = $checkResult[ 'uid' ];
            $data->user_name = D('User')->getUserInfo($checkResult[ 'uid' ], null, 'true_name')['true_name'];
        } else {
            $data->user_id = 0;
            $data->user_name = '访客';
        }
        $data->action_type = $actionType;
        $data->remark = $remark;
        $data->browser = clientService::getBrowser($_SERVER['HTTP_USER_AGENT'], true);
        $data->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'], true);
        $data->url = $_SERVER['REQUEST_URI'];
        $data->ip = $_SERVER['REMOTE_ADDR'];
        $data->type = $type;
        $data->content = $content;
        $actionLog->create($data);

        $res = $actionLog->add();

        return $res;
    }
}
