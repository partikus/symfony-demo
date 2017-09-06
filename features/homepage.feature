Feature: Homepage welcome screen
  As a visitor
  I need to be able choose one of app's part (frontend & backend)

  Scenario: Welcome screen
    When I visit the home page
    Then I should see "Browse the public section of the demo application."
    And I should see "Browse the admin backend of the demo application."

  Scenario: Welcome screen
    Given I visit the home page
    Then I follow "Browse application"
    And I should be on "Blog" page

