Feature: Blog

  Scenario: Blog list page
    When I visit the blog page
    Then I should be on blog page

  Scenario: Show article page
    Given I am on the blog page
    When I choose first news
    Then I should be on post page
