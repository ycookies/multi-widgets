<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

use Dcat\Admin\Widgets\Widget;
use Illuminate\Contracts\Support\Renderable;
use Dcat\Admin\Widgets\WidgetCommon;

class CoverCard extends Widget
{
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.cover-card';

    /**
     * @var array
     */
    protected $items = [];

    /**
     * Collapse constructor.
     */
    public function __construct()
    {
        $this->id('CoverCard-'.uniqid());
        $this->class('box-group');
        $this->style('margin-bottom: 20px');
    }

    /**
     * Add item.
     *
     * @param string $title
     * @param string $content
     *
     * @return $this
     */
    public function add($title = '', $content ='',$link="javascript:void(0);")
    {
        $this->items[] = [
            'title'   => $title,
            'content' => $content,
            'link'=> $link,
            'avatar_circle' => '',
            'shadow'  => '',
        ];
        return $this;
    }
    // 背景图片
    public function bg($img){
        $this->items[count($this->items)-1]['bg'] = $img;
        return $this;
    }

    // 头像
    public function avatar($avatar){
        $this->items[count($this->items)-1]['avatar'] = $avatar;
        return $this;
    }
    // 头像 圆形
    public function avatarCircle($bool = true){
        $this->items[count($this->items)-1]['avatar_circle'] = 'avatar-rounded';
        return $this;
    }

    /**
     * @desc 阴影
     * shadow-none 无阴影
     * shadow-sm 小阴影
     * shadow 常规阴影
     * shadow-lg 大阴影
     * @param string $shadow
     * @return $this
     * author eRic
     * dateTime 2024-09-08 20:18
     */
    public function shadow($shadow = 'shadow') {
        $this->items[count($this->items) - 1]['shadow'] = $shadow;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables()
    {
        return [
            'id'         => $this->id,
            'items'      => $this->items,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
