<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Screen\Field;
use Orchid\Filters\Filter;
use Orchid\Screen\Fields\Input;

class TextFilter extends Filter
{
    private string $fieldName;
    private string $title;
    private string $operation;

    public static function make(string $fieldName, string $title, string $operation = '='): TextFilter
    {
        return new self($fieldName, $title, $operation);
    }

    public function __construct(string $fieldName, string $title, string $operation)
    {
        parent::__construct();
        $this->fieldName = $fieldName;
        $this->title     = $title;
        $this->operation = $operation;
    }

    /**
     * @inheritDoc
     */
    public function run(Builder $builder): Builder
    {
        if ($this->operation == 'like') {
            return $builder->where($this->fieldName, 'like', '%' . $this->request->input($this->fieldName) . '%');
        }
        return $builder->where($this->fieldName, $this->request->input($this->fieldName));
    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display(): iterable
    {
        return [
            Input::make($this->fieldName)
                ->type('text')
                ->value($this->request->input($this->fieldName))
                ->title($this->title),

        ];
    }
}
