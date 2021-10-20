<?php

namespace App\View\Components\Form;

class DbCheckList extends DbChoice
{
    public $selected = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $model, string $valueColumn, string $labelColumn = 'label', array $selected = [])
    {
        parent::__construct($name, $model, $valueColumn, $labelColumn);

        $this->selected = $selected;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return view('components.form.db-check-list');
    }

    public function isSelected($value)
    {
        return in_array($value, $this->selected);
    }
}
