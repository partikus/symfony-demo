<?php

namespace AppBehat\Page;

use Behat\Mink\Element\NodeElement;
use Rize\UriTemplate;
use SensioLabs\Behat\PageObjectExtension\PageObject\Exception\UnexpectedPageException;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page as BasePage;

class Page extends BasePage
{
    const CSS_SELECTOR = 'css';
    const XPATH_SELECTOR = 'xpath';

    const REDIRECT_URI = '/&redirect_uri=.{1,}/';
    const QUERY = 'query';

    public function getCollection($label): NodeElement
    {
        return $this->find('xpath', sprintf('//div[@data-prototype]/ancestor::*[@class = "form-group"]/label[text() = "%s"]/..//div[@data-prototype]', $label));
    }

    public function getNoneditableCollection($label): NodeElement
    {
        return $this->find('xpath', sprintf('//div[@data-prototype-name]/ancestor::*[@class = "form-group"]/label[text() = "%s"]/..//div[@data-prototype-name]', $label));
    }

    public function openWithoutVerifying(array $urlParameters = []): self
    {
        $url = $this->getUrl($urlParameters);
        $this->getDriver()->visit($url);

        return $this;
    }

    public function getStatusCode(): int
    {
        return (int) $this->getDriver()->getStatusCode();
    }

    public function isOpen(array $urlParameters = []): bool
    {
        $this->verify($urlParameters);

        return true;
    }

    protected function verifyUrl(array $urlParameters = []): void
    {
        $uriTemplate = new UriTemplate();
        $expectedUri = $uriTemplate->expand($this->path, $urlParameters);

        if (strpos($this->getDriver()->getCurrentUrl(), $expectedUri) === false) {
            throw new UnexpectedPageException(sprintf(
                'Expected to be on "%s" but found "%s" instead',
                $expectedUri,
                $this->getDriver()->getCurrentUrl()
            ));
        }
    }
}
