## PHPUnit 10.4.1 by Sebastian Bergmann and contributors

| **Attribute**             | **Value**                                                                         |
|---------------------------|------------------------------------------------------------------------------------|
| **Runtime**               | PHP 8.2.11                                                                        |
| **Configuration**         | `../../phpunit.xml.dist` |
| **Test Summary**          | 26 / 26 (100%)                                                                    |
| **Time**                  | 00:11.764                                                                         |
| **Memory**                | 50.50 MB                                                                          |
| **Results**               | OK (26 tests, 74 assertions)                                                       |

---

### Available Test(s)

| **Test Method**                                              |
|--------------------------------------------------------------|
| `App\Tests\Security\LoginTest::testShouldAuthenticatedUserAndRedirectToIndex`  |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid username"` |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid password"` |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid username and password"` |
| `App\Tests\Security\LoginTest::testShouldLogoutUserAndRedirectToLogin`          |
| `App\Tests\Security\RegistrationTest::testShouldRegisterUserAndRedirectToIndex` |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank username"`|
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank password"`|
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank email"`   |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"invalid email"` |
| `App\Tests\Security\RegistrationTest::testShouldRaiseUsernameAlreadyUsedError`  |
| `App\Tests\Task\CreateTest::testShouldCreateTaskAndRedirectToShowPage`          |
| `App\Tests\Task\CreateTest::testShouldRaiseHttpAccessDeniedAndRedirectToLogin`  |
| `App\Tests\Task\CreateTest::testShouldRaiseFormErrors"blank title"`              |
| `App\Tests\Task\CreateTest::testShouldRaiseFormErrors"blank content"`            |
| `App\Tests\Task\DeleteTest::testShouldDeleteTaskAndRedirectToListPage`          |
| `App\Tests\Task\DeleteTest::testShouldRaiseHttpAccessDenied`                     |
| `App\Tests\Task\DeleteTest::testAdminCanDeleteOtherUserTask`                    |
| `App\Tests\Task\ListTest::testShouldListTasks`                                   |
| `App\Tests\Task\ListTest::testShouldRaiseHttpAccessDeniedAndRedirectToLogin`    |
| `App\Tests\Task\ToggleTest::testShouldToogleTask`                                |
| `App\Tests\Task\ToggleTest::testShouldRaiseHttpAccessDenied`                     |
| `App\Tests\Task\ToggleTest::testAdminCanToggleOtherUserTask`                    |
| `App\Tests\Task\UpdateTest::testShouldUpdateTaskAndRedirectToShowPage`          |
| `App\Tests\Task\UpdateTest::testShouldRaiseFormErrors"blank title"`              |
| `App\Tests\Task\UpdateTest::testShouldRaiseFormErrors"blank content"`            |
