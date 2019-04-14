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

use Illuminate\Support\Arr;

class Text extends Field
{
    /**
     * @return array
     */
    public function normalize()
    {
        return parent::normalize() + [
            'component' => 'text',
            'placeholder' => Arr::get($this->meta, 'placeholder'),
        ];
    }
}
