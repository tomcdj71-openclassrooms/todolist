## PHPUnit 10.4.1 by Sebastian Bergmann and contributors

| **Attribute**             | **Value**                                                                         |
|---------------------------|------------------------------------------------------------------------------------|
| **Runtime**               | PHP 8.2.11                                                                        |
| **Configuration**         | `../../phpunit.xml.dist` |
| **Test Summary**          | 38 / 38 (100%)                                                                    |
| **Time**                  | 00:11.064                                                                         |
| **Memory**                | 58.50 MB                                                                          |
| **Results**               | OK (26 tests, 74 assertions)                                                      |
| **Results**               | OK (38 tests, 254 assertions)                                                     |

---

### Available Test(s)

| **Test Method**                                              |
|--------------------------------------------------------------|
| `App\Tests\Security\LoginTest::testShouldAuthenticatedUserAndRedirectToIndex`      |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid username"`    |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid password"`    |
| `App\Tests\Security\LoginTest::testShouldNotAuthenticateUser"invalid username and password"` |
| `App\Tests\Security\LoginTest::testShouldLogoutUserAndRedirectToLogin`             |
| `App\Tests\Security\RegistrationTest::testShouldRegisterUserAndRedirectToIndex`    |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank username"`   |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank password"`   |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"blank email"`      |
| `App\Tests\Security\RegistrationTest::testShouldRaiseFormErrors"invalid email"`    |
| `App\Tests\Security\RegistrationTest::testShouldRaiseUsernameAlreadyUsedError`     |
| `App\Tests\Task\CreateTaskTest::testShouldCreateTaskAndRedirectToShowPage`         |
| `App\Tests\Task\CreateTaskTest::testShouldRaiseHttpAccessDeniedAndRedirectToLogin` |
| `App\Tests\Task\CreateTaskTest::testShouldRaiseFormErrors"blank title"`            |
| `App\Tests\Task\CreateTaskTest::testShouldRaiseFormErrors"blank content"`          |
| `App\Tests\Task\DeleteTaskTest::testShouldDeleteTaskAndRedirectToListPage`         |
| `App\Tests\Task\DeleteTaskTest::testShouldRaiseHttpAccessDenied`                   |
| `App\Tests\Task\DeleteTaskTest::testAdminCanDeleteOtherUserTask`                   |
| `App\Tests\Task\ListTaskTest::testShouldListTasks`                                 |
| `App\Tests\Task\ListTaskTest::testShouldRaiseHttpAccessDeniedAndRedirectToLogin`   |
| `App\Tests\Task\ToggleTaskTest::testShouldToogleTask`                              |
| `App\Tests\Task\ToggleTaskTest::testShouldRaiseHttpAccessDenied`                   |
| `App\Tests\Task\ToggleTaskTest::testAdminCanToggleOtherUserTask`                   |
| `App\Tests\Task\UpdateTaskTest::testShouldUpdateTaskAndRedirectToShowPage`         |
| `App\Tests\Task\UpdateTaskTest::testShouldRaiseFormErrors"blank title"`            |
| `App\Tests\Task\UpdateTaskTest::testShouldRaiseFormErrors"blank content"`          |
| `App\Tests\Task\UpdateTaskTest::testShouldRaiseFormErrors"too short title"`        |
| `App\Tests\Task\UpdateTaskTest::testShouldRaiseFormErrors"too short content"`      |
| `App\Tests\Task\UpdateTaskTest::testShouldRaiseFormErrors"blank title and content"`|
| `App\Tests\User\CreateUserTest::testShouldCreateUser`                              |
| `App\Tests\User\CreateUserTest::testShouldRaiseFormErrors"blank username"`         |
| `App\Tests\User\CreateUserTest::testShouldRaiseFormErrors"password not match"`     |
| `App\Tests\User\CreateUserTest::testShouldRaiseFormErrors"blank email"`            |
| `App\Tests\User\ListUserTest::testShouldListUsers`                                 |
| `App\Tests\User\ListUserTest::testShouldNotListUsersAndRedirectToLogin`            |
| `App\Tests\User\UpdateUserTest::testShouldEditUser`                                |
| `App\Tests\User\UpdateUserTest::testShouldNotEditUser`                             |
| `App\Tests\User\UpdateUserTest::testShouldRaiseFormErrors"password not match"`     |
