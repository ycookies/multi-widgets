<?php

namespace Dcat\Admin\MultiWidgets\Widgets;

use Illuminate\Contracts\Support\Renderable;

class InstallTerminal extends Widget
{
    use WidgetCommon;
    /**
     * @var string
     */
    protected $view = 'admin::plugin-store.install';

    /**
     * @var array
     */
    protected $items = [];
    
    protected $paramjson = ''; 
    

    /**
     * Collapse constructor.
     */
    public function __construct()
    {
        $this->id('Terminal-box-'.uniqid());
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
    public function param($param)
    {
        $this->items = $param;
        $this->paramjson = json_encode($param,JSON_UNESCAPED_UNICODE);
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
            'paramjson' =>  $this->paramjson,
            'attributes' => $this->formatAttributes(),
        ];
    }

}
