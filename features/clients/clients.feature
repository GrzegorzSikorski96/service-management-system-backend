@clients

Feature: Client management

  @success
  Scenario: Success: Get clients list
    Given I send request to '/api/clients' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Get client details
    Given I send request to '/api/client/1' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And client with id 1 exist
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Create client
    Given I send request to '/api/client' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key          | value                        |
      | name         | CreatedUserName              |
      | email        | createdUserEmail@example.com |
      | phone_number | 111111111                    |
      | description  | Opis testowego klienta       |
      | address      | Adres testowego klienta      |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Delete client
    Given I send request to '/api/client/1' using 'DELETE' method
    And client with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Add client to agency
    Given I send request to '/api/client/number' using 'POST' method
    And client with id 1 exist
    And client with id 1 has NIP 'aaa-aaa-aa-aa'
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key    | value         |
      | number | aaa-aaa-aa-aa |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Edit client
    Given I send request to '/api/client' using 'PUT' method
    And client with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key          | value                       |
      | id           | 1                           |
      | name         | Edited User Name            |
      | email        | EditeduserEmail@example.com |
      | phone_number | 2222222222                  |
      | description  | Opis edytowanego klienta    |
      | address      | Adres edytowanego klienta   |
    When request is sent
    Then the response status code should be 200
    And response success field should be true
    And response data field should be in 'client' array:
      | key          | value                       |
      | name         | Edited User Name            |
      | email        | EditeduserEmail@example.com |
      | phone_number | 2222222222                  |
      | description  | Opis edytowanego klienta    |
      | address      | Adres edytowanego klienta   |

  @fail
  Scenario: Fail: Add client with dan NIP to agency
    Given I send request to '/api/client/number' using 'POST' method
    And client with id 1 exist
    And client with id 1 has NIP 'aaa-aaa-aa-aa'
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key    | value     |
      | number | wrong_nip |
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @fail
  Scenario: Fail: Get non existing client details
    Given I send request to '/api/client/999999999' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @fail
  Scenario: Fail: Get clients list when unauthenticated
    Given I send request to '/api/clients' using 'GET' method
    And user is unauthenticated
    When request is sent
    Then the response status code should be 401
    And response success field should be false