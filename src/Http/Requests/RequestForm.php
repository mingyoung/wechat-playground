<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $data = collect($this->post());

        $retrieveValue = function ($item, $key) {
            return [$key => $item['value'] ?? null];
        };

        $filter = function ($key) {
            return function ($item) use ($key) {
                return (json_decode(array_get($item, 'as'), true) ?? [])[$key];
            };
        };

        return [
            'query' => $data->filter($filter('query'))->flatMap($retrieveValue)->all(),
            'json' => $data->filter($filter('json'))->flatMap($retrieveValue)->all(),
            'multipart' => $data->filter($filter('binary'))->flatMap(function ($item, $key) {
                if ($this->hasFile('media.value')) {
                    return [$key => storage_path('app/'.$this->file('media.value')->store('wechat-playground-files'))];
                }
            })->all(),
        ];
    }
}
