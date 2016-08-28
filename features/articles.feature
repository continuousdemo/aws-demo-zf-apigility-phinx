@articles
Feature: Articles
  As an API consumer
  I need to be able to manage the articles

  Scenario: Retrieve the unfiltered list of articles
    Given an article with name "article1" and price "25"
    And an article with name "article2" and price "35"
    When I send GET request to "/article"
    Then response should contain the article "article1" with price "25"
    And response should contain the article "article2" with price "35"

  Scenario: Retrieve the unfiltered list of articles
    Given an article with name "article1" and price "25"
    And an article with name "article2" and price "35"
    When I send GET request to "/article"
    Then response should contain the article "article1" with price "25"
    And response should contain the article "article2" with price "35"
