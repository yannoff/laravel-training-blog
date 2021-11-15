<?php

namespace App\View\Components;

use App\Models\Datatable as DataTableInterface;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $fields = [];

    public $actions;

    public $model;

    public $rows = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $model, $rows = [], string $modelNamespace = 'App\Models', array $fields = [])
    {
        $this->model = $model;
        $modelFQCN = sprintf('%s\%s', $modelNamespace, $model);
        if (!is_a($modelFQCN, DataTableInterface::class, true)) {
            throw new \LogicException(sprintf('Model "%s" must implement "App\Models\DataTable"', $modelFQCN));
        }

        $this->rows = $rows;
        $this->fields = $fields;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
