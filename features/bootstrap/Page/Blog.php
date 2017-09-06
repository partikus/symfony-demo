<?php

namespace AppBehat\Page;

use AppBehat\Element\Article;
use SensioLabs\Behat\PageObjectExtension\PageObject\Element;

class Blog extends Page
{
    protected $path = '/en/blog';

    public function followArticle()
    {
        /** @var Article $articles */
        $articles = $this->getElement(\AppBehat\Element\Article::class);
        $articles->find('css', 'a')->click();

        return $this->getPage(Post::class);
    }
}
