<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\EasyWeChat;

use EasyWeChat\OfficialAccount\Application;
use WeChatPlayground\Playground;

class OfficialAccount extends Application
{
    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    /**
     * @param \Illuminate\Foundation\Application $laravel
     */
    public function __construct($laravel)
    {
        $this->laravel = $laravel;

        parent::__construct($this->getPlaygroundConfig());

        $this->register(new PlaygroundServiceProvider());
    }

    /**
     * @return array
     */
    protected function getPlaygroundConfig()
    {
        $resolved = Playground::usingApp()->__invoke($this->laravel['request']);

        return [
            'app_id' => $resolved['config']['app_id'],
            'secret' => $resolved['config']['secret'],
        ];
    }
}
