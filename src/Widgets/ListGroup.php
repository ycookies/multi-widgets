<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

use Dcat\Admin\Widgets\Widget;
use Illuminate\Contracts\Support\Renderable;
use Dcat\Admin\Widgets\WidgetCommon;

class ListGroup extends Widget
{
    use WidgetCommon;
    /**
     * @var string
     */
    protected $view = 'ycookies.multi-widgets::widgets.list-group';

    /**
     * @var array
     */
    protected $items = [];

    /**
     * Collapse constructor.
     */
    public function __construct()
    {
        $this->id('list-group-box-'.uniqid());
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
    public function add($title, $content,$link)
    {
        $this->items[] = [
            'title'   => $title,
            'content' => $content,
            'link' => $link
        ];

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
