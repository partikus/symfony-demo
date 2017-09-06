<?php

namespace AppBehat;

use AppBehat\Page\Blog;

class BlogContext extends AbstractContext
{
    /**
     * @When I choose first news
     */
    public function iChooseFirstNews()
    {
        /** @var Blog $page */
        $page = $this->getPage(Blog::class);
        $page->followArticle();
    }


}
