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

use GuzzleHttp\TransferStats;

class Statable
{
    /**
     * @var \GuzzleHttp\TransferStats
     */
    public $stats;

    /**
     * @param \GuzzleHttp\TransferStats $stats
     */
    public function __invoke(TransferStats $stats)
    {
        $this->stats = $stats;
    }
}
