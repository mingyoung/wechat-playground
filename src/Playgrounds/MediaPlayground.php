<?php

/*
 * This file is part of the mingyoung/wechat-playground.
 *
 * (c) 张铭阳 <mingyoungcheung@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace WeChatPlayground\Playgrounds;

use WeChatPlayground\Fields\File;
use WeChatPlayground\Fields\Select;
use WeChatPlayground\Fields\Text;
use WeChatPlayground\Playground;

class MediaPlayground extends Playground
{
    public static $name = '素材管理';

    public static $links = [
        'add-media' => '新增临时素材',
        'get-media' => '获取临时素材',
        'add-material' => '新增永久素材',
        'get-material' => '获取永久素材',
        'delete-material' => '删除永久素材',
        'material-count' => '获取素材总数',
        'materials' => '获取素材列表',
    ];

    public function addMedia($panel)
    {
        return $panel->withUploadUri('cgi-bin/media/upload')->withFields([
            Select::make('type', '类型')->options(['image' => '图片', 'voice' => '语音', 'video' => '视频', 'thumb' => '缩略图'])->asQuery(),
            File::make('media', '媒体文件')->asBinary(),
        ]);
    }

    public function getMedia($panel)
    {
        return $panel->withGetUri('cgi-bin/media/get')->withFields([
            Text::make('media_id', 'Media Id')->withMeta(['placeholder' => '请输入媒体文件 ID'])->asQuery(),
        ]);
    }

    public function addMaterial($panel)
    {
        return $panel->withUploadUri('cgi-bin/material/add_material')->withFields([
            Select::make('type', '类型')->options(['image' => '图片', 'voice' => '语音', 'video' => '视频', 'thumb' => '缩略图'])->asQuery(),
            File::make('media', '媒体文件')->asBinary(),
        ]);
    }

    public function getMaterial($panel)
    {
        return $panel->withPostUri('cgi-bin/material/get_material')->withFields([
            Text::make('media_id', 'Media Id')->withMeta(['placeholder' => '请输入媒体文件 ID'])->asJson(),
        ]);
    }

    public function deleteMaterial($panel)
    {
        return $panel->withPostUri('cgi-bin/material/del_material')->withFields([
            Text::make('media_id', 'Media Id')->withMeta(['placeholder' => '请输入媒体文件 ID'])->asJson(),
        ]);
    }

    public function materialCount($panel)
    {
        return $panel->withGetUri('cgi-bin/material/get_materialcount');
    }

    public function materials($panel)
    {
        return $panel->withPostUri('cgi-bin/material/batchget_material')->withFields([
            Select::make('type', '类型')->options(['image' => '图片', 'voice' => '语音', 'video' => '视频', 'news' => '图文'])->asJson(),
            Text::make('offset', '偏移位置')->asJson(),
            Text::make('count', '数量')->asJson(),
        ]);
    }
}
