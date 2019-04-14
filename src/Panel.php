<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground;

use Illuminate\Contracts\Support\Arrayable;

class Panel implements Arrayable
{
    /**
     * @var string
     */
    protected $method;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var array
     */
    protected $fields = [];

    /**
     * @param string $uri
     *
     * @return $this
     */
    public function withUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function withMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @param string $uri
     *
     * @return $this
     */
    public function withGetUri($uri)
    {
        return $this->withUri($uri)->withMethod('GET');
    }

    /**
     * @param string $uri
     *
     * @return $this
     */
    public function withPostUri($uri)
    {
        return $this->withUri($uri)->withMethod('POST');
    }

    /**
     * @param string $uri
     *
     * @return $this
     */
    public function withUploadUri($uri)
    {
        return $this->withUri($uri)->withMethod('UPLOAD');
    }

    /**
     * @param array $fields
     *
     * @return $this
     */
    public function withFields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'uri' => $this->uri,
            'method' => $this->method,
            'fields' => collect($this->fields)->map->normalize()->all(),
        ];
    }
}
