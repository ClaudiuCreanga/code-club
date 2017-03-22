Feature: Bowling game code kata
  Scenario: Scores 0 for a gutter game
    Given Player starts a game
    When Player completes a game
    Then The score should be "0"

  Scenario: The sum of rolls with no spares or strikes
    Given Player starts a game
    When Player completes a game
    Then The score should be "0"
