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

class Playground
{
    /**
     * @var array
     */
    protected static $navLinks;

    /**
     * @var mixed
     */
    protected static $usingApp;

    /**
     * Get links for view.
     *
     * @return array
     */
    public static function navLinks()
    {
        if (static::$navLinks) {
            return static::$navLinks;
        }

        return static::$navLinks = PlaygroundFinder::create()->in(__DIR__.'/Playgrounds')->name('*.php')->toLinks();
    }

    /**
     * Get config items for view.
     *
     * @return array
     */
    public static function pageConfig()
    {
        return [
            'path' => config('wechat-playground.path'),
        ];
    }

    /**
     * @param \Closure $callback
     *
     * @return static
     */
    public static function use($callback)
    {
        static::$usingApp = $callback;

        return new static();
    }

    /**
     * @return mixed
     */
    public static function usingApp()
    {
        return static::$usingApp;
    }
}
