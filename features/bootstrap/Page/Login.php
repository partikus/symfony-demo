<?php

namespace AppBehat\Page;

use AppBehat\Element\Form;

class Login extends Page
{
    protected $path = '/en/login';

    public function logIn($username, $password)
    {
        $form = $this->getElement(Form::class);
        $form->fillField('username', $username);
        $form->fillField('password', $password);
        $form->submit();

//        return $this->getPage(\AppBehat\Page\Admin\Post::class);
    }
}
