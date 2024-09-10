<?php

namespace Dcat\Admin\MultiWidgets\Widgets;


class Functional extends Widget {
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.functional';

    /**
     * @var array
     */
    protected $items = [];

    protected $boxColor = '';
    /**
     * Collapse constructor.
     */
    public function __construct() {
        $this->id('accordion-' . uniqid());
        $this->class('box-group');
        $this->style('margin-bottom: 20px');
    }

    // 定义box背景色
    public function boxcolor($color = '#FFFFFF') {
        $this->boxColor = $color;
        return $this;
    }

    /**
     * Add item.
     *
     * @param string $title
     * @param string $content
     *
     * @return $this
     */
    public function add($title, $content, $img) {
        $this->items[] = [
            'title'   => $title,
            'content' => $content,
            'img'     => $img,
            'rsort'   => false,
            'round'   => '',
            'shadow'  => '',
            'bgcolor' => '',
            'btn'=> [],
        ];
        return $this;
    }

    // 是否反向
    public function rsort() {
        $this->items[count($this->items) - 1]['rsort'] = true;
        return $this;
    }
    // 主图片
    public function img($url) {
        $this->items[count($this->items) - 1]['img'] = $url;
        return $this;
    }

    // 是否圆角
    public function round($round = 'rounded') {
        $this->items[count($this->items) - 1]['round'] = $round;
        return $this;
    }

    // 阴影
    public function shadow($shadow = 'shadow') {
        $this->items[count($this->items) - 1]['shadow'] = $shadow;
        return $this;
    }

    // 背景色
    public function bgcolor($color = '') {
        $this->items[count($this->items) - 1]['bgcolor'] = $color;
        return $this;
    }

    // 按钮
    public function btn($txt,$href = '#',$style = 'btn-primary') {
        $this->items[count($this->items) - 1]['btn'] = [
            'txt' => $txt,
            'href' => $href,
            'style' => $style,
        ];
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables() {
        return [
            'id'         => $this->id,
            'boxColor'    => $this->boxColor,
            'rsort'      => $this->rsort,
            'items'      => $this->items,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
