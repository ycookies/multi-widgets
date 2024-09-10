<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

class Timeline extends Widget {

    use WidgetCommon;
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.timeline';

    /**
     * @var array
     */
    protected $items = [];

    protected $start_date;
    protected $end_date;

    /**
     * Collapse constructor.
     */
    public function __construct() {
        $this->id('timeline-box-' . uniqid());
        $this->class('box-group');
        $this->style('margin-bottom: 20px');
    }

    public function startDate($start_date){
        $this->start_date = $start_date;
        return $this;
    }

    public function endDate($end_date){
        $this->end_date = $end_date;
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
    public function add($title, $content, $time, $date_label = '', $icon = 'fa fa-bullseye bg-green') {
        $this->items[] = [
            'title'      => $title,
            'content'    => $content,
            'time'       => $time, // card time
            'date_label' => $date_label,  // line time
            'icon'       => $icon,
            'footer' => '',
        ];
        return $this;
    }

    // 图标
    public function icons($strings) {
        $this->items[count($this->items) - 1]['icon'] = $strings;
        return $this;
    }
    // 图标
    public function footer($footer) {
        $this->items[count($this->items) - 1]['footer'] = $footer;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function defaultVariables() {
        return [
            'id'         => $this->id,
            'start_date' => $this->start_date,
            'end_date'   => $this->end_date,
            'items'      => $this->items,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
