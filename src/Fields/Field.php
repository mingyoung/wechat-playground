<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Fields;

class Field
{
    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $meta = [];

    /**
     * @var array
     */
    protected $as = [
        'query' => false, 'json' => false, 'binary' => false,
    ];

    /**
     * @param string $key
     * @param string $name
     */
    public function __construct($key, $name)
    {
        $this->key = $key;
        $this->name = $name;
    }

    /**
     * @return static
     */
    public static function make()
    {
        return new static(...func_get_args());
    }

    /**
     * @param array $meta
     *
     * @return $this
     */
    public function withMeta($meta)
    {
        $this->meta = $meta;

        return $this;
    }

    /**
     * @return $this
     */
    public function asQuery()
    {
        $this->as['query'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function asBinary()
    {
        $this->as['binary'] = true;

        return $this;
    }

    /**
     * @return $this
     */
    public function asJson()
    {
        $this->as['json'] = true;

        return $this;
    }

    /**
     * @return array
     */
    public function normalize()
    {
        return [
            'key' => $this->key,
            'name' => $this->name,
            'as' => $this->as,
        ];
    }
}
