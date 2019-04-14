<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Playgrounds;

use WeChatPlayground\Fields\Select;
use WeChatPlayground\Fields\Text;
use WeChatPlayground\Playground;

class UserPlayground extends Playground
{
    public static $name = '用户管理';

    public static $links = [
        'user-list' => '获取用户列表',
        'user-info' => '获取用户基本信息',
        'update-user-remark' => '修改用户备注名',
    ];

    public function userList($panel)
    {
        return $panel->withGetUri('cgi-bin/user/get')->withFields([
            Text::make('next_openid', 'Next Openid')->withMeta(['placeholder' => '请输入 Next Openid'])->asQuery(),
        ]);
    }

    public function userInfo($panel)
    {
        return $panel->withGetUri('cgi-bin/user/info')->withFields([
            Text::make('openid', 'Openid')->withMeta(['placeholder' => '请输入 Openid'])->asQuery(),
            Select::make('lang', '语言版本')->options([
                'zh_CN' => '简体',
                'zh_TW' => '繁体',
                'en' => '英语',
            ])->asQuery(),
        ]);
    }

    public function updateUserRemark($panel)
    {
        return $panel->withPostUri('cgi-bin/user/info/updateremark')->withFields([
               Text::make('openid', 'Openid')->withMeta(['placeholder' => '请输入 Openid'])->asJson(),
               Text::make('remark', '备注名')->withMeta(['placeholder' => '请输入备注名'])->asJson(),
        ]);
    }
}
