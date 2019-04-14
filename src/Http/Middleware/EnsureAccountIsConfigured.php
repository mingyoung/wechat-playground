<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Http\Middleware;

use Closure;
use WeChatPlayground\Exceptions\RuntimeException;
use WeChatPlayground\Playground;

class EnsureAccountIsConfigured
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        throw_unless(Playground::usingApp(), RuntimeException::class, '未配置公众号，请先配置公众号');

        return $next($request);
    }
}
