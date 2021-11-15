<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class CrudController extends Controller
{
    /**
     * Default field to be used for data sorting
     * This value can be overriden in child classes
     * SORT constant or by supplying the apposite
     * 2nd argument when invoking getRows()
     *
     * @var string
     */
    const SORT = 'label';

    /**
     * {@inheritdoc}
     */
    public function index(Request $request)
    {
        $model = $this->getModelName();
        $items = $this->getRows($model);

        return view('crud-list', [ 'model' => $this->getShortname($model), 'rows' => $items ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $view = sprintf('%s.edit', $this->getViewsNS());
        return view($view);
    }

    /**
     * Get all the rows from the given model
     *
     * @param string $mapper The mapper (ie model) FQCN
     * @param string $sort   Optional sort field override
     *
     * @return mixed
     */
    protected function getRows(string $mapper, $sort = null)
    {
        $rows = $mapper::all()
            ->sortBy($sort ?? static::SORT);

        return $rows;
    }

    /**
     * @return string
     */
    protected function getViewsNS(): string
    {
        $base = preg_replace('/Controller$/', '', $this->getShortname(static::class));
        return strtolower('back.' . $base);
    }


    /**
     * Get the class shortname from its fully-qualified classname
     *
     * @param string $FQCN
     *
     * @return string|null
     */
    protected function getShortname(string $FQCN): string
    {
        $parts = explode('\\', $FQCN);

        return array_pop($parts);
    }

    /**
     * @return string
     */
    abstract protected function getModelName(): string;
}
