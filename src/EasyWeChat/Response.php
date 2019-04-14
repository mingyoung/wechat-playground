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

use EasyWeChat\Kernel\Support\File;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Contracts\Support\Responsable;

class Response implements Responsable
{
    /**
     * @var \EasyWeChat\Kernel\Http\Response
     */
    protected $response;

    /**
     * @var \WeChatPlayground\EasyWeChat\Statable
     */
    protected $statable;

    /**
     * @param \EasyWeChat\Kernel\Http\Response      $response
     * @param \WeChatPlayground\EasyWeChat\Statable $statable
     */
    public function __construct($response, Statable $statable)
    {
        $this->response = $response;
        $this->statable = $statable;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        $uri = $this->statable->stats->getEffectiveUri();

        return response()->json([
            'payload' => $this->getPayload(),
            'response' => $this->getResponse(),
            'details' => [
                ['AppId' => app(OfficialAccount::class)['config']['app_id']],
                ['Method' => $this->statable->stats->getRequest()->getMethod()],
                ['API' => Uri::composeComponents($uri->getScheme(), $uri->getAuthority(), $uri->getPath(), $this->getQuery($uri), $uri->getFragment())],
                ['Duration' => $this->statable->stats->getTransferTime().' 秒'],
            ],
        ]);
    }

    /**
     * @param \GuzzleHttp\Psr7\Uri $uri
     *
     * @return string
     */
    protected function getQuery($uri)
    {
        parse_str($uri->getQuery(), $query);
        if (isset($query['access_token'])) {
            $query['access_token'] = 'ACCESS_TOKEN';
        }

        return http_build_query($query);
    }

    /**
     * @return array
     */
    protected function getPayload()
    {
        $body = $this->statable->stats->getRequest()->getBody();

        return json_decode($body, true) ?? [];
    }

    /**
     * @return array
     */
    protected function getResponse()
    {
        $response = $this->response;

        $array = json_decode($response, true);

        if (JSON_ERROR_NONE === json_last_error()) {
            return ['type' => 'json', 'content' => $array];
        }

        return [
            'type' => 'stream',
            'extension' => File::getStreamExt($response),
            'content' => base64_encode($response),
        ];
    }
}
