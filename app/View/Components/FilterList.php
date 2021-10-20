<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterList extends Component
{
    public $name;

    public $model;

    public $labelCol;

    public $filterCol;

    public $items = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $model = null, string $filterCol = 'id', string $labelCol = 'label')
    {
        $model = $model ?? ucfirst($name);
        $mapper = sprintf('App\Models\%s', $model);

        $this->name = $name;
        $this->labelCol = $labelCol;
        $this->filterCol = $filterCol;
        $this->items = $mapper::all()->sortBy($labelCol);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter-list');
    }
}
