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

use EasyWeChat\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * @param string $method
     * @param string $uri
     * @param array  $options
     *
     * @return \WeChatPlayground\EasyWeChat\Response
     */
    public function perform($method, $uri, $options = [])
    {
        switch ($method) {
            case 'GET':
                return $this->makesHttpRequest($uri, 'GET', ['query' => $options['query']]);
            case 'POST':
                return $this->makesHttpRequest($uri, 'POST', ['json' => $options['json']]);
            case 'UPLOAD':
                $multipart = [];

                foreach ($options['multipart'] as $name => $path) {
                    $multipart[] = [
                        'name' => $name,
                        'contents' => fopen($path, 'r'),
                    ];
                }

                return $this->makesHttpRequest($uri, 'POST', ['query' => $options['query'], 'multipart' => $multipart]);
        }
    }

    /**
     * @param string $uri
     * @param string $method
     * @param array  $options
     *
     * @return \WeChatPlayground\EasyWeChat\Response
     */
    protected function makesHttpRequest($uri, $method, $options = [])
    {
        return new Response(
            $this->requestRaw($uri, $method, array_merge(['on_stats' => $statable = new Statable()], $options)), $statable
        );
    }
}
