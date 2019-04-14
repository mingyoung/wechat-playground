# WeChat Playground

> 当前为测试体验版本，功能未完善，欢迎反馈 (Bug, Feature ...)

## 安装

```shell
$ composer require mingyoung/wechat-playground:1.0-dev
```

安装后发布前端文件

```shell
$ php artisan vendor:publish --tag=wechat-playground-assets --force
```

## 使用

#### 设置公众号（目前暂时只支持公众号）

```php
use WeChatPlayground\Playground;
use Illuminate\Http\Request;
use EasyWeChat\Factory;

Playground::use(function (Request $request) {
    return Factory::officialAccount([
        'app_id' => 'wx13123456789e20',
        'secret' => 'd88e35627234289348743ba9590c32',
    ]);
});
```

然后打开网址 http://example.com/wechat-playground

## 配置

##### 自定义路由

```
WECHAT_PLAYGROUND_PATH=awesome
```
