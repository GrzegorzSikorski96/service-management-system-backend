@devices

Feature: Agencies management

  @success
  Scenario: Success: Get agencies list
    Given I send request to '/api/agencies' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Get agency details
    Given I send request to '/api/agency/1' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And agency with id 1 exist
    And user role is 'manager'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Create agency
    Given I send request to '/api/agency' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And agency with id 1 exist
    And user role is 'administrator'
    And request data is:
      | key          | value                  |
      | name         | Testowa nazwa oddzialu |
      | address      | adres oddzialu         |
      | phone_number | 12311231123            |
      | service_id   | 1                      |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @fail
  Scenario: Fail: Create agency by serviceman
    Given I send request to '/api/agency' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And agency with id 1 exist
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 403
    And response success field should be false

  @fail
  Scenario: Fail: Create agency by manager
    Given I send request to '/api/agency' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And agency with id 1 exist
    And user role is 'manager'
    When request is sent
    Then the response status code should be 403
    And response success field should be false

  @success
  Scenario: Success: Delete agency
    Given I send request to '/api/agency/1' using 'DELETE' method
    And agency with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'administrator'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @fail
  Scenario: Fail: Delete agency by serviceman
    Given I send request to '/api/agency/1' using 'DELETE' method
    And agency with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 403
    And response success field should be false

  @fail
  Scenario: Fail: Delete agency by manager
    Given I send request to '/api/agency/1' using 'DELETE' method
    And agency with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'manager'
    When request is sent
    Then the response status code should be 403
    And response success field should be false

  @success
  Scenario: Success: Edit agency
    Given I send request to '/api/agency' using 'PUT' method
    And agency with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'manager'
    And request data is:
      | key          | value                  |
      | id           | 1                      |
      | name         | Testowa nazwa oddzialu |
      | address      | adres oddzialu         |
      | phone_number | 12311231123            |
      | service_id   | 1                      |
    When request is sent
    Then the response status code should be 200
    And response success field should be true
    And response data field should be in 'agency' array:
      | key          | value                  |
      | id           | 1                      |
      | name         | Testowa nazwa oddzialu |
      | address      | adres oddzialu         |
      | phone_number | 12311231123            |
      | service_id   | 1                      |

  @fail
  Scenario: Fail: Edit agency by serviceman
    Given I send request to '/api/agency' using 'PUT' method
    And agency with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key          | value                  |
      | id           | 1                      |
      | name         | Testowa nazwa oddzialu |
      | address      | adres oddzialu         |
      | phone_number | 12311231123            |
      | service_id   | 1                      |
    When request is sent
    Then the response status code should be 403
    And response success field should be false

  @fail
  Scenario: Fail: Get non existing agency details
    Given I send request to '/api/agency/999999999' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'manager'
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @success
  Scenario: Success: Get agency list when unauthenticated
    Given I send request to '/api/agencies' using 'GET' method
    And user is unauthenticated
    When request is sent
    Then the response status code should be 200
    And response success field should be true