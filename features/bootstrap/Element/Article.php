<?php

namespace AppBehat\Element;

use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class Article extends Element
{
    protected $selector = ['css' => 'article'];
}
