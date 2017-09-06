<?php

namespace AppBehat;

use AppBehat\Page\Page;
use Behat\Behat\Context\Context;
use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

class AbstractContext extends PageObjectContext implements Context
{
    use ParameterBagDictionary;

    /**
     * @Transform :page
     */
    public function castStringToPage(string $page): Page
    {
        return $this->getPage($page);
    }

    /**
     * @Transform /^(\d+)$/
     */
    public function castStringToNumber($string)
    {
        return intval($string);
    }
}
