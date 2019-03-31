<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateUserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'rules' => 'required|min:3'
            ])
            ->add('email', Field::TEXT, [
                'rules' => 'required|min:5'
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}
