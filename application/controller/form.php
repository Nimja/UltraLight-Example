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
        $example = array(1 => 'Option 1', 2 => 'Option 2', 10 => 'Option 10');
        $form = new \Core\Form(null, array('class' => 'form-horizontal'));
        $form->fieldSet("Basic fields")
            ->add(new Field\Value('name', array('label' => 'Value', 'value' => "A static value.")))
            ->add(new Field\Input('name', array('label' => 'Input')))
            ->add(new Field\Password('password', array('label' => 'Password')))
            ->add(new Field\Text('text', array('label' => 'Text', 'value' => '</supposedly dangerous content>')))
            ->add(new Field\Select('select', array('label' => 'Select', 'values' => $example, 'default' => '-select-')))
            ->add(new Field\Radio('radio', array('label' => 'Radio', 'values' => $example)))
            ->add(new Field\CheckBox('checkbox', array('label' => 'Checkbox?')))
            ->fieldSet("Advanced Fields")
            ->add('<div style="color: red; border: 2px solid orange; margin: 20px; padding: 10px;">Example of plain HTML in a form, for whatever reason.</div>')
            ->add(new Field\Select('multiselect', array('label' => 'Multi Select', 'multiple' => true, 'values' => $example, 'default' => '-select-')))
            ->add(new Field\Upload('upload', array('label' => 'Upload', 'value' => '')))
            ->fieldSet("Submit button")
            ->add(new Field\Submit('submit', array('value' => 'Submit', 'class' => 'btn btn-primary')));
        return $this->_output('Form example', "$form");
    }
}