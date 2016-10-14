Feature: test1
  In order to update library
  As a customer
  I need to add a new book to the library

  Scenario: try test1
    Given I have a new book named
      | name         | status   |
      | nosferatu    | Ok       |
      | dracula      | Ok       |
      | batman       | OK       |
    When fill input with string :name
    And  click save button
    Then I see OK
