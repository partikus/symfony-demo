Feature: Blog

  Scenario: Login to admin panel
    Given I try to visit "admin\Post" page
    When I log in as an admin
    Then I should be on "admin\Post" page
