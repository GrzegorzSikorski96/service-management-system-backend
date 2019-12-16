@devices

Feature: Tickets management

  @success
  Scenario: Success: Get tickets list
    Given I send request to '/api/tickets' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Get ticket details
    Given I send request to '/api/ticket/1' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And ticket with id 1 exist
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Create ticket
    Given I send request to '/api/ticket' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And ticket with id 1 exist
    And client with id 1 exist
    And device with id 1 exist
    And user role is 'serwisant'
    And request data is:
      | key                    | value                           |
      | description            | Opis testowego zgloszenia       |
      | additional_information | dodatkowe informacje zgloszenia |
      | token                  | generate_token                  |
      | client_id              | 1                               |
      | device_id              | 1                               |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Delete ticket
    Given I send request to '/api/ticket/1' using 'DELETE' method
    And ticket with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Edit ticket
    Given I send request to '/api/ticket' using 'PUT' method
    And ticket with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key                    | value                         |
      | id                     | 1                             |
      | description            | edited_description            |
      | additional_information | edited additional_information |
      | message                | edited message                |
      | ticket_status_id       | 3                             |
      | client_id              | 1                               |
      | device_id              | 1                               |
    When request is sent
    Then the response status code should be 200
    And response success field should be true
    And response data field should be in 'ticket' array:
      | key                    | value                         |
      | id                     | 1                             |
      | description            | edited_description            |
      | additional_information | edited additional_information |
      | message                | edited message                |
      | ticket_status_id       | 3                             |

  @fail
  Scenario: Fail: Get non existing device details
    Given I send request to '/api/ticket/999999999' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @fail
  Scenario: Fail: Get tickets list when unauthenticated
    Given I send request to '/api/devices' using 'GET' method
    And user is unauthenticated
    When request is sent
    Then the response status code should be 401
    And response success field should be false