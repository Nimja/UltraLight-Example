<?php
namespace App\Controller;
use Core\Form\Field;
/**
 * Simple index page, with some buttons for show.
 */
class Form extends Index
{
    protected function _run()
    {
        $example = [1 => 'Option 1', 2 => 'Option 2', 10 => 'Option 10'];
        $values = ['foo' => 'The Foo!', 'bar' => 'The bar?', 'other' => 'The other option...'];
        $form = new \Core\Form(null, ['class' => 'form-horizontal']);
        $form->fieldSet("Basic fields")
            ->add(new Field\Value('name', ['label' => 'Value', 'value' => "A static value."]))
            ->add(new Field\Input('name', ['label' => 'Input']))
            ->add(new Field\Password('password', ['label' => 'Password']))
            ->add(new Field\Text('text', ['label' => 'Text', 'value' => '<script>supposedly dangerous content</script>']))
            ->add(new Field\Select('select', ['label' => 'Select', 'values' => $example, 'default' => '-select-']))
            ->add(new Field\Radio('radio', ['label' => 'Radio', 'values' => $example]))
            ->add(new Field\CheckBox('checkbox', ['label' => 'Checkbox?']))
            ->fieldSet("Advanced Fields")
            ->add(new Field\Raw('html', ['label' => "Raw", 'html' => $this->_show('page/html')]))
            ->add(
                new Field\Select(
                    'multiselect',
                    ['label' => 'Multi Select', 'multiple' => true, 'values' => $example, 'default' => '-select-']
                )
            )
            ->add(new Field\CheckBoxes('checkboxes', ['label' => 'Multi checkboxes', 'values' => $values]))
            ->add(new Field\Upload('upload', ['label' => 'Upload', 'value' => '']))
            ->fieldSet("Submit button")
            ->add(new Field\Submit('submit', ['value' => 'Submit', 'class' => 'btn btn-primary']));
        return $this->_output('Form example', "$form");
    }
}