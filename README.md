# 自用的php类库调用工具

文档地址：https://www.xyg.cool/doc/tool.html

xyg父命名空间下的调用
$tool = \xyg\tool\Loader::class('alibaba.alipay.f2f');

其它命名空间下的调用
$tool = \xyg\tool\Loader::class('other.alipay.f2f', false);

curl类
用法：$data = \xyg\tool\Request::instance()->curl($url, $params, $header = [], $showResponseHeader = false, $location = false);