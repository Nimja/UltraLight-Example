<?php
namespace App\Controller;
use Core\Form\Field\Input;
use Core\Form\Field\Password;
use Core\Form\Field\CheckBox;
use Core\Form\Field\Text;
use Core\Form\Field\Select;
use Core\Form\Field\Upload;
use Core\Form\Field\Submit;
/**
 * Simple index page, with some buttons for show.
 */
class Form extends \App\Controller\Index
{
    protected function _run()
    {
        $example = array(1 => 'Option 1', 2 => 'Option 2', 10 => 'Option 10');
        $form = new \Core\Form();
        $form->fieldSet("Basic fields")
            ->add(new Input('name', array('label' => 'Input')))
            ->add(new Password('password', array('label' => 'Password')))
            ->add(new CheckBox('checkbox', array('label' => 'Checkbox?')))
            ->add(new Text('text', array('label' => 'Text', 'value' => '</supposedly dangerous content>')))
            ->add(new Select('select', array('label' => 'Select', 'values' => $example, 'default' => '-select-')))
            ->fieldSet("Advanced Fields")
            ->add('<div style="color: red; border: 2px solid orange;">Example of plain HTML in a form, for whatever reason.</div>')
            ->add(new Select('multiselect', array('label' => 'Multi Select', 'multiple' => true, 'values' => $example, 'default' => '-select-')))
            ->add(new Upload('upload', array('label' => 'Upload', 'value' => '')))
            ->fieldSet("Submit")
            ->add(new Submit('submit', array('value' => 'Submit')));
        return $this->_show(
            'page',
            array(
                'content' => $form,
                'title' => 'UltraLight - Example Project',
                'buttons' => $this->_getButtons()
            )
        );
    }
}