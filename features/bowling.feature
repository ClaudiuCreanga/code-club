Feature: Bowling game code kata
  Scenario: Scores 0 for a gutter game
    Given Player starts a game
    When Player completes a game with "0"
    Then The score should be "0"

  Scenario: The sum of rolls with no spares or strikes
    Given Player starts a game
    When Player completes a game with "random"
    Then The score should be sum of tries

  Scenario: The sum of rolls with spares
    Given Player starts a game
    When Player completes a game with "spares"
    Then The score should be sum of tries and spares
