<?php

namespace Dcat\Admin\MultiWidgets;

use Dcat\Admin\Extend\Setting as Form;

class Setting extends Form
{
    public function form()
    {
        $this->switch('is_multi_widgets_menu_show','关闭菜单展示')->required();
    }
}
