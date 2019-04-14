<!doctype html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>WeChat Playground</title>
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css', 'vendor/wechat-playground') }}">
    </head>
    <body class="bg-gray-200">
        <div id="app" class="container mx-auto">
            <div class="select-none flex items-center justify-between border-b mb-6">
                <h3 class="text-xl py-8">WeChat <strong class="tracking-wide">Playground</strong></h3>
                <div class="text-gray-600">
                    <a href="https://github.com/mingyoung/wechat-playground" target="_blank" class="block flex items-center hover:text-gray-800 mr-6">
                        <svg class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>GitHub</title><path d="M10 0a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48l-.01-1.7c-2.78.6-3.37-1.34-3.37-1.34-.46-1.16-1.11-1.47-1.11-1.47-.9-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.9 1.52 2.34 1.08 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.94 0-1.1.39-1.99 1.03-2.69a3.6 3.6 0 0 1 .1-2.64s.84-.27 2.75 1.02a9.58 9.58 0 0 1 5 0c1.91-1.3 2.75-1.02 2.75-1.02.55 1.37.2 2.4.1 2.64.64.7 1.03 1.6 1.03 2.69 0 3.84-2.34 4.68-4.57 4.93.36.31.68.92.68 1.85l-.01 2.75c0 .26.18.58.69.48A10 10 0 0 0 10 0"></path></svg>
                    </a>
                </div>
            </div>

            <div class="flex">
                <div class="w-1/5">
                    <div class="pl-4">
                        <nav-links :navigations='@json(WeChatPlayground\Playground::navLinks())'></nav-links>
                    </div>
                </div>

                <div class="w-4/5">
                    <main-view />
                </div>
            </div>
        </div>
        <script>
            window.Playground = @json(WeChatPlayground\Playground::pageConfig())
        </script>
        <script src="{{ mix('js/app.js', 'vendor/wechat-playground') }}"></script>
    </body>
</html>
