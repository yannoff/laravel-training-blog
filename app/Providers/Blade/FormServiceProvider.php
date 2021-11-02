<?php

namespace App\Providers\Blade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach(['input', 'textarea'] as $input){
            Blade::directive($input, [$this, $input]);
        }
        foreach(['text', 'email', 'password', 'hidden', 'button', 'radio', 'checkbox'] as $element) {
            Blade::directive($element, function (string $line) use ($element) { return call_user_func_array('self::input', [ $element , $line ]); });
        }
        Blade::directive('select', [$this, 'select']);
    }

    protected function parseArguments(string $line): array
    {
        eval('$args = [' . $line . '];');
        @list($name, $value, $attributes) = $args;

        return array_merge(['name' => $name, 'value' => $value], $attributes ?? []);
    }

    protected function renderAttributes(array $attrs = []): string
    {
        $parts = [];
        foreach ($attrs as $prop => $val) {
            $parts[] = sprintf('%s="%s"', $prop, $val);
        }

        return implode(' ', $parts);
    }

    /**
     * Usage: @select ($name, $options, $value, $attributes = [])
     */
    public function select(string $line): string
    {
        eval('$args = [' . $line . '];');
        @list($name, $options, $value, $attributes) = $args;

        $attrs = array_merge(['name' => $name], $attributes ?? []);

        $items = [];
        foreach ($options as $val => $label) {
            $id = sprintf('%s-option-%s', $name, Str::slug($label));
            $item = sprintf('<option value="%s" id="%s"', $val, $id);
            if ($value == $val) {
                $item .= ' selected="selected"';
            }
            $item .= sprintf('>%s</option>', $label);
            $items[] = $item;
        }

        return sprintf("<select %s>\n%s\n</select>\n", $this->renderAttributes($attrs), implode("\n\t", $items));
    }

    /**
     * Usage: @textarea ($name, $value, $attributes = [])
     */
    public function textarea(string $line): string
    {
        $attrs = $this->parseArguments($line);
        $value = $attrs['value'];
        unset($attrs['value']);

        return '<textarea ' . $this->renderAttributes($attrs) . '>' . $value . '</textarea>';
    }


    public function input(string $type, string $line): string
    {
        $attrs = array_merge(['type' => $type], $this->parseArguments($line));
        
        return '<input ' . $this->renderAttributes($attrs) . '/>';
    }
}
