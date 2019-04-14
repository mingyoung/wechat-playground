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

use Illuminate\Support\Str;
use ReflectionClass;
use Symfony\Component\Finder\Finder;

class PlaygroundFinder extends Finder
{
    /**
     * @return array
     */
    public function toLinks()
    {
        return $this->playgrounds()->map(function ($playground) {
            return [
                'playground' => $playground,
                'name' => $playground::$name,
                'links' => $playground::$links,
            ];
        })->all();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    protected function playgrounds()
    {
        return collect($this)->map(function ($file) {
            $file = __NAMESPACE__.'\\'.str_replace(
                ['/', '.php'], ['\\', ''], Str::after($file->getPathname(), __DIR__.DIRECTORY_SEPARATOR)
            );
            if (is_subclass_of($file, Playground::class) && !(new ReflectionClass($file))->isAbstract()) {
                return $file;
            }
        })->filter()->values();
    }
}
