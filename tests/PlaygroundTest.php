<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Tests;

use WeChatPlayground\Playground;

class PlaygroundTest extends TestCase
{
    /** @test */
    public function navLinks()
    {
        $links = Playground::navLinks();

        $this->assertTrue(is_array($links));
    }
}
