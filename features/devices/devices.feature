@devices

Feature: Devices management

  @success
  Scenario: Success: Get devices list
    Given I send request to '/api/devices' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And user agency id 1
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Get available device details
    Given I send request to '/api/device/1' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And device with id 1 exist
    And user role is 'serwisant'
    And user agency id 1
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Create device
    Given I send request to '/api/device' using 'POST' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key           | value                     |
      | name          | CreatedDeviceName         |
      | description   | Opis testowego urzadzenia |
      | serial_number | generate_serial_number    |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Delete device
    Given I send request to '/api/device/1' using 'DELETE' method
    And device with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Add device to agency
    Given I send request to '/api/device/serialNumber' using 'POST' method
    And device with id 1 exist
    And device with id 1 has serial number 'aaasdasddsfkjsdfj'
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key           | value             |
      | serial_number | aaasdasddsfkjsdfj |
    When request is sent
    Then the response status code should be 200
    And response success field should be true

  @success
  Scenario: Success: Edit device
    Given I send request to '/api/device' using 'PUT' method
    And device with id 1 exist
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key           | value                |
      | id            | 1                    |
      | serial_number | edited_serial_number |
      | description   | edited_description   |
      | name          | edited name          |
    When request is sent
    Then the response status code should be 200
    And response success field should be true
    And response data field should be in 'device' array:
      | key           | value                |
      | serial_number | edited_serial_number |
      | description   | edited_description   |
      | name          | edited name          |


  @fail
  Scenario: Fail: Add device with wrong serial number to agency
    Given I send request to '/api/device/serialNumber' using 'POST' method
    And device with id 1 exist
    And device with id 1 has serial number 'aaasdasddsfkjsdfj'
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    And request data is:
      | key           | value               |
      | serial_number | wrong_serial_number |
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @fail
  Scenario: Fail: Get non existing device details
    Given I send request to '/api/device/999999999' using 'GET' method
    And user with email 'test@example.com' and password 'secret' exists
    And authenticated by email 'test@example.com' and password 'secret'
    And user role is 'serwisant'
    When request is sent
    Then the response status code should be 404
    And response success field should be false

  @fail
  Scenario: Fail: Get devices list when unauthenticated
    Given I send request to '/api/devices' using 'GET' method
    And user is unauthenticated
    When request is sent
    Then the response status code should be 401
    And response success field should be false