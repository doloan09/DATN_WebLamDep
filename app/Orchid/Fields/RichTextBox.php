<?php
namespace App\Orchid\Fields;

/**
 * @method RichTextBox autofocus($value = true)
 * @method RichTextBox disabled($value = true)
 * @method RichTextBox form($value = true)
 * @method RichTextBox name(string $value = null)
 * @method RichTextBox placeholder(string $value = null)
 * @method RichTextBox readonly($value = true)
 * @method RichTextBox required(bool $value = true)
 * @method RichTextBox value($value = true)
 * @method RichTextBox height($value = 800)
 * @method RichTextBox title(string $value = null)
 */
class RichTextBox extends \Orchid\Screen\Field
{
    /**
     * @var string
     */
    protected $view = 'admin.fields.rich_textbox';

    /**
     * All attributes that are available to the field.
     *
     * @var array
     */
    protected $attributes = [
        'value'   => null,
        'height'  => 800,
    ];

    /**
     * Attributes available for a particular tag.
     *
     * @var array
     */
    protected $inlineAttributes = [
        'autofocus',
        'disabled',
        'form',
        'name',
        'placeholder',
        'readonly',
        'required',
        'height',
    ];
}
