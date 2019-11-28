@clients

Feature: Client management

  @success
  Scenario: Success: Get clients list
    Given I send request to '/api/clients' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    When request is sent
    Then the response status code should be 200
    And response success field should be true