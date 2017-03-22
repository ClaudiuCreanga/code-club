Feature: Code Breaker
  Scenario: Trying an empty string
    Given I input a string ""
    When I run the breaker
    Then I should get:
    """
    """
  Scenario: Trying a string with one match
    Given I input a string "123"
    When I run the breaker
    Then I should get an array:
    | 0 | 1 | 1 |

  Scenario: Trying a string with 2 matches
    Given I input a string "137"
    When I run the breaker
    Then I should get an array:
    | 0 | 0 | -1 |

  Scenario: Trying a string with 3 matches
    Given I input a string "135"
    When I run the breaker
    Then I should get an array:
    | 0 | 0 | 0 |

