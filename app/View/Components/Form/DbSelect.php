<?php

namespace App\View\Components\Form;

class DbSelect extends DbChoice
{
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $model, string $valueColumn, string $labelColumn = 'label', $value = null)
    {
        parent::__construct($name, $model, $valueColumn, $labelColumn);

        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return view('components.form.db-select');
    }

    public function isChecked($value)
    {
        return ($value == $this->value);
    }
}
