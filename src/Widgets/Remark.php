<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

class Remark extends Widget {
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.remark';


    protected $title;
    protected $content;
    protected $placement = 'right';
    protected $icon = 'feather icon-help-circle';

    /**
     * Collapse constructor.
     */
    public function __construct($content, $title = null) {
        $this->id('remark-box-' . uniqid());
        $this->class('box-group');
        $this->style('margin-bottom: 20px');
        $this->content($content);
        $this->title($title);
    }


    /**
     * @param  string $title
     * @return $this
     */
    public function title($title) {
        $this->title = $title;

        return $this;
    }


    /**
     * @param  string  content
     * @return $this
     */
    public function content($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * @param  string  content
     * @return $this
     */
    public function placement($placement = 'right') {
        $this->placement = $placement;

        return $this;
    }

    /**
     * @param  string $title
     * @return $this
     */
    public function icon($icon ='feather icon-help-circle') {
        $this->icon = $icon;

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function defaultVariables() {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'placement'  => $this->placement,
            'btn_txt'    => $this->btn_txt,
            'icon' => $this->icon,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
