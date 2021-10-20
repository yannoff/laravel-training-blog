<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

abstract class DbChoice extends Component
{
    public $name;

    public $elements = [];

    public $valueColumn;

    public $labelColumn;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $model, string $valueColumn, string $labelColumn = 'label')
    {
        $this->name = $name;

        $this->valueColumn = $valueColumn;
        $this->labelColumn = $labelColumn;

        $modelName = $this->resolveModelFQCN($model);
        $this->elements = $modelName::all()->sortBy($labelColumn);
    }

    protected function resolveModelFQCN($shortname)
    {
        return sprintf('App\Models\%s', $shortname);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    abstract public function render();
}
