<?php

namespace AppBehat\Element;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class Form extends Element
{
    protected $selector = ['xpath' => '//form'];
}
