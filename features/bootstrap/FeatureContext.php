<?php

namespace AppBehat;

use AppBehat\Page\Home;
use AppBehat\Page\Login;
use AppBehat\Page\Page;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 *
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext extends AbstractContext
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /** @var Page */
    private $page;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given I am on the :page page
     * @When I visit the :page page
     */
    public function iVisitPage(Page $page)
    {
        $this->page = $page;
        $page->open(['locale' => 'en']);

        expect($page->isOpen(['locale' => 'en']))->toBe(true);
    }

    /**
     * @Given I try to visit :page page
     */
    public function iTryToVisitPage(Page $page)
    {
        $this->page = $page;
        $page->openWithoutVerifying(['locale' => 'en']);
    }

    /**
     * @Then I should see :sentence
     */
    public function iShouldSee($sentence)
    {
        $page = $this->getPage(Home::class);

        expect($page->hasContent($sentence))->toBe(true);
    }

    /**
     * @Then /^(?:|I )follow "(?P<link>(?:[^"]|\\")*)"$/
     */
    public function iFollow($elementName)
    {
        $this->page->clickLink($elementName);
    }

    /**
     * @Then I should be on :page page
     */
    public function iShouldBeOn(Page $page)
    {
        expect($page->isOpen(['locale' => 'en']))->toBe(true);
    }

    /**
     * @When I log in as an admin
     */
    public function iLogInAsAnAdmin()
    {
        /** @var Login $page */
        $page = $this->getPage(Login::class);
        $page->open();
        $page->logIn('jane_admin', 'kitten');
    }
}
