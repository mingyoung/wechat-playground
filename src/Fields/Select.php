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

class Select extends Field
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @param array $options
     *
     * @return $this
     */
    public function options($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array
     */
    public function normalize()
    {
        return parent::normalize() + [
            'component' => 'select',
            'options' => $this->options,
        ];
    }
}
