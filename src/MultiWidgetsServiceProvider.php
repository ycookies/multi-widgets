<?php

namespace Dcat\Admin\MultiWidgets;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class MultiWidgetsServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/index.js',
    ];
	protected $css = [
		'css/index.css',
	];

	// 定义菜单
    protected $menu = [
        [
            'title' => '页面组件示例',
            'uri'   => 'multi-widgets',
            'icon'  => 'feather icon-book',
        ]
    ];

    // 路由白名单
    protected $exceptRoutes = [
        'auth' => []
    ];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();
		//
        Admin::requireAssets('@ycookies.multi-widgets');
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
