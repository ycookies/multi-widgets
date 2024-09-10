<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

use Illuminate\Contracts\Support\Renderable;

class CardWidget extends Widget
{
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.card-widget';

    /**
     * @var array
     */
    protected $items = [];

    protected $box_style = '1';
    protected $shadow = 'shadow';
    /**
     * Collapse constructor.
     */
    public function __construct()
    {
        $this->id('card-widget-'.uniqid());
        $this->class('box-group');
        $this->style('margin-bottom: 20px');
    }

    public function boxStyle($style = 1){
        $this->box_style = $style;
        return $this;
    }

    // 阴影
    public function serShadow($shadow = 'shadow'){
        $this->shadow = $shadow;
        return $this;
    }

    /**
     * Add item.
     *
     * @param string $title
     * @param string $content
     *
     * @return $this $link="javascript:void(0);"
     */
    public function add($title,$avatar, $sub_title = '',$bg_img = '')
    {
        $this->items[] = [
            'title'   => $title,
            'avatar' => $avatar,
            'sub_title' => $sub_title,
            'bg_img' => $bg_img,
            'nav_item'=> [],
        ];
        return $this;
    }

    public function navItem(array $item){
        $this->items[count($this->items) - 1]['nav_item'] = $item;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables()
    {
        return [
            'id'         => $this->id,
            'shadow' => $this->shadow,
            'box_style' => $this->box_style,
            'items'      => $this->items,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
