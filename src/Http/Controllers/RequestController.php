<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use WeChatPlayground\EasyWeChat\OfficialAccount;
use WeChatPlayground\Http\Requests\RequestForm;
use WeChatPlayground\Panel;

class RequestController
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function index(Request $request)
    {
        return call_user_func_array([resolve($request->playground), Str::camel($request->key)], [new Panel()]);
    }

    /**
     * @param \WeChatPlayground\Http\Requests\RequestForm  $form
     * @param \WeChatPlayground\EasyWeChat\OfficialAccount $app
     *
     * @return mixed
     */
    public function store(RequestForm $form, OfficialAccount $app)
    {
        return $app->playground->perform(
            $form->query('method'), $form->query('uri'), $form->getOptions()
        );
    }
}
