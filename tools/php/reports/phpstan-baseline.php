<?php declare(strict_types = 1);

$ignoreErrors = [];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\DefaultController\\:\\:render\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/DefaultController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\DefaultController\\:\\:indexAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/DefaultController.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Component\\\\Routing\\\\Annotation\\\\Route does not exist\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\SecurityController\\:\\:render\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method getLastAuthenticationError\\(\\) on an unknown class Symfony\\\\Component\\\\Security\\\\Http\\\\Authentication\\\\AuthenticationUtils\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method getLastUsername\\(\\) on an unknown class Symfony\\\\Component\\\\Security\\\\Http\\\\Authentication\\\\AuthenticationUtils\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\SecurityController\\:\\:loginAction\\(\\) has invalid return type Symfony\\\\Component\\\\HttpFoundation\\\\Response\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$authenticationUtils of method App\\\\Controller\\\\SecurityController\\:\\:loginAction\\(\\) has invalid type Symfony\\\\Component\\\\Security\\\\Http\\\\Authentication\\\\AuthenticationUtils\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/SecurityController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\TaskController\\:\\:addFlash\\(\\)\\.$#',
	'count' => 4,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\TaskController\\:\\:createForm\\(\\)\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\TaskController\\:\\:getDoctrine\\(\\)\\.$#',
	'count' => 5,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\TaskController\\:\\:redirectToRoute\\(\\)\\.$#',
	'count' => 4,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\TaskController\\:\\:render\\(\\)\\.$#',
	'count' => 3,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\TaskController\\:\\:createAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\TaskController\\:\\:deleteTaskAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\TaskController\\:\\:editAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\TaskController\\:\\:listAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\TaskController\\:\\:toggleTaskAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$request of method App\\\\Controller\\\\TaskController\\:\\:createAction\\(\\) has invalid type Symfony\\\\Component\\\\HttpFoundation\\\\Request\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$request of method App\\\\Controller\\\\TaskController\\:\\:editAction\\(\\) has invalid type Symfony\\\\Component\\\\HttpFoundation\\\\Request\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/TaskController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\UserController\\:\\:addFlash\\(\\)\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\UserController\\:\\:createForm\\(\\)\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\UserController\\:\\:redirectToRoute\\(\\)\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Controller\\\\UserController\\:\\:render\\(\\)\\.$#',
	'count' => 3,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method hashPassword\\(\\) on an unknown class Symfony\\\\Component\\\\PasswordHasher\\\\Hasher\\\\UserPasswordHasherInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\UserController\\:\\:createAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\UserController\\:\\:editAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Controller\\\\UserController\\:\\:listAction\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$entityManager of method App\\\\Controller\\\\UserController\\:\\:__construct\\(\\) has invalid type Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$request of method App\\\\Controller\\\\UserController\\:\\:createAction\\(\\) has invalid type Symfony\\\\Component\\\\HttpFoundation\\\\Request\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$request of method App\\\\Controller\\\\UserController\\:\\:editAction\\(\\) has invalid type Symfony\\\\Component\\\\HttpFoundation\\\\Request\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$userPasswordHasher of method App\\\\Controller\\\\UserController\\:\\:__construct\\(\\) has invalid type Symfony\\\\Component\\\\PasswordHasher\\\\Hasher\\\\UserPasswordHasherInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$userPasswordHasher of method App\\\\Controller\\\\UserController\\:\\:createAction\\(\\) has invalid type Symfony\\\\Component\\\\PasswordHasher\\\\Hasher\\\\UserPasswordHasherInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Controller\\\\UserController\\:\\:\\$entityManager has no type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Controller\\\\UserController\\:\\:\\$userPasswordHasher has no type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Controller/UserController.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant DATE_IMMUTABLE on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant INTEGER on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant STRING on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant TEXT on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Column does not exist\\.$#',
	'count' => 5,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Entity does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\GeneratedValue does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Id does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\ManyToOne does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Table does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Component\\\\Validator\\\\Constraints\\\\NotBlank does not exist\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Component\\\\Validator\\\\Constraints\\\\Type does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\Task\\:\\:getCreatedAt\\(\\) has invalid return type App\\\\Entity\\\\DateTime\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\Task\\:\\:toggle\\(\\) has parameter \\$flag with no type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @return with type App\\\\Entity\\\\DateTime is not subtype of native type DateTimeInterface\\|null\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @return with type bool\\|null is not subtype of native type App\\\\Entity\\\\User\\|null\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @return with type void is incompatible with native type App\\\\Entity\\\\Task\\.$#',
	'count' => 3,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$createdAt of method App\\\\Entity\\\\Task\\:\\:setCreatedAt\\(\\) has invalid type App\\\\Entity\\\\DateTime\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Entity\\\\Task\\:\\:\\$content has no type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Entity\\\\Task\\:\\:\\$createdAt \\(DateTimeInterface\\|null\\) does not accept App\\\\Entity\\\\DateTime\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/Task.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant INTEGER on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to constant STRING on an unknown class Doctrine\\\\DBAL\\\\Types\\\\Types\\.$#',
	'count' => 3,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Column does not exist\\.$#',
	'count' => 5,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Entity does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\GeneratedValue does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Id does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\OneToMany does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Doctrine\\\\ORM\\\\Mapping\\\\Table does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Bridge\\\\Doctrine\\\\Validator\\\\Constraints\\\\UniqueEntity does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Component\\\\Validator\\\\Constraints\\\\Email does not exist\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Attribute class Symfony\\\\Component\\\\Validator\\\\Constraints\\\\NotBlank does not exist\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method add\\(\\) on an unknown class Doctrine\\\\Common\\\\Collections\\\\Collection\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method contains\\(\\) on an unknown class Doctrine\\\\Common\\\\Collections\\\\Collection\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method removeElement\\(\\) on an unknown class Doctrine\\\\Common\\\\Collections\\\\Collection\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Instantiated class Doctrine\\\\Common\\\\Collections\\\\ArrayCollection not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\User\\:\\:eraseCredentials\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\User\\:\\:getEmail\\(\\) should return string but returns string\\|null\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\User\\:\\:getRoles\\(\\) return type has no value type specified in iterable type array\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Entity\\\\User\\:\\:getTasks\\(\\) has invalid return type Doctrine\\\\Common\\\\Collections\\\\Collection\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\#1 \\$array of function array_unique expects array, mixed given\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Entity\\\\User\\:\\:\\$email \\(string\\|null\\) does not accept mixed\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Entity\\\\User\\:\\:\\$tasks \\(Doctrine\\\\Common\\\\Collections\\\\Collection\\) does not accept Doctrine\\\\Common\\\\Collections\\\\ArrayCollection\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Entity\\\\User\\:\\:\\$tasks has unknown class Doctrine\\\\Common\\\\Collections\\\\Collection as its type\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Entity/User.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method add\\(\\) on an unknown class Symfony\\\\Component\\\\Form\\\\FormBuilderInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/TaskType.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Form\\\\Extension\\\\Core\\\\Type\\\\TextareaType not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/TaskType.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Form\\\\TaskType\\:\\:buildForm\\(\\) has parameter \\$options with no value type specified in iterable type array\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/TaskType.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$builder of method App\\\\Form\\\\TaskType\\:\\:buildForm\\(\\) has invalid type Symfony\\\\Component\\\\Form\\\\FormBuilderInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/TaskType.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method add\\(\\) on an unknown class Symfony\\\\Component\\\\Form\\\\FormBuilderInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Form\\\\Extension\\\\Core\\\\Type\\\\EmailType not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Form\\\\Extension\\\\Core\\\\Type\\\\PasswordType not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Form\\\\Extension\\\\Core\\\\Type\\\\RepeatedType not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Form\\\\Extension\\\\Core\\\\Type\\\\TextType not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Form\\\\UserType\\:\\:buildForm\\(\\) has parameter \\$options with no value type specified in iterable type array\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$builder of method App\\\\Form\\\\UserType\\:\\:buildForm\\(\\) has invalid type Symfony\\\\Component\\\\Form\\\\FormBuilderInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Form/UserType.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to an undefined property App\\\\Kernel\\:\\:\\$debug\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Kernel.php',
];
$ignoreErrors[] = [
	'message' => '#^Access to an undefined property App\\\\Kernel\\:\\:\\$environment\\.$#',
	'count' => 4,
	'path' => __DIR__ . '/../../../src/Kernel.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method import\\(\\) on an unknown class Symfony\\\\Component\\\\Routing\\\\Loader\\\\Configurator\\\\RoutingConfigurator\\.$#',
	'count' => 3,
	'path' => __DIR__ . '/../../../src/Kernel.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Kernel\\:\\:registerBundles\\(\\) return type has no value type specified in iterable type iterable\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Kernel.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$routes of method App\\\\Kernel\\:\\:configureRoutes\\(\\) has invalid type Symfony\\\\Component\\\\Routing\\\\Loader\\\\Configurator\\\\RoutingConfigurator\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Kernel.php',
];
$ignoreErrors[] = [
	'message' => '#^App\\\\Repository\\\\TaskRepository\\:\\:__construct\\(\\) calls parent\\:\\:__construct\\(\\) but App\\\\Repository\\\\TaskRepository does not extend any class\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Repository\\\\TaskRepository\\:\\:getEntityManager\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method flush\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method persist\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method remove\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @extends has invalid type Doctrine\\\\Bundle\\\\DoctrineBundle\\\\Repository\\\\ServiceEntityRepository\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$registry of method App\\\\Repository\\\\TaskRepository\\:\\:__construct\\(\\) has invalid type Doctrine\\\\Persistence\\\\ManagerRegistry\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Repository\\\\TaskRepository\\:\\:\\$entityManager has unknown class Doctrine\\\\ORM\\\\EntityManagerInterface as its type\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/TaskRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^App\\\\Repository\\\\UserRepository\\:\\:__construct\\(\\) calls parent\\:\\:__construct\\(\\) but App\\\\Repository\\\\UserRepository does not extend any class\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Repository\\\\UserRepository\\:\\:getEntityManager\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method flush\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 2,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method persist\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method remove\\(\\) on an unknown class Doctrine\\\\ORM\\\\EntityManagerInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method setPassword\\(\\) on an unknown class Symfony\\\\Component\\\\Security\\\\Core\\\\User\\\\PasswordAuthenticatedUserInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Instantiated class Symfony\\\\Component\\\\Security\\\\Core\\\\Exception\\\\UnsupportedUserException not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @extends has invalid type Doctrine\\\\Bundle\\\\DoctrineBundle\\\\Repository\\\\ServiceEntityRepository\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$registry of method App\\\\Repository\\\\UserRepository\\:\\:__construct\\(\\) has invalid type Doctrine\\\\Persistence\\\\ManagerRegistry\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Parameter \\$user of method App\\\\Repository\\\\UserRepository\\:\\:upgradePassword\\(\\) has invalid type Symfony\\\\Component\\\\Security\\\\Core\\\\User\\\\PasswordAuthenticatedUserInterface\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Property App\\\\Repository\\\\UserRepository\\:\\:\\$entityManager has unknown class Doctrine\\\\ORM\\\\EntityManagerInterface as its type\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Throwing object of an unknown class Symfony\\\\Component\\\\Security\\\\Core\\\\Exception\\\\UnsupportedUserException\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../src/Repository/UserRepository.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Tests\\\\Controller\\\\DefaultControllerTest\\:\\:assertEquals\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/Controller/DefaultControllerTest.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined method App\\\\Tests\\\\Controller\\\\DefaultControllerTest\\:\\:assertStringContainsString\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/Controller/DefaultControllerTest.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to an undefined static method static\\(App\\\\Tests\\\\Controller\\\\DefaultControllerTest\\)\\:\\:createClient\\(\\)\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/Controller/DefaultControllerTest.php',
];
$ignoreErrors[] = [
	'message' => '#^Method App\\\\Tests\\\\Controller\\\\DefaultControllerTest\\:\\:testIndex\\(\\) has no return type specified\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/Controller/DefaultControllerTest.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to function method_exists\\(\\) with \'Symfony\\\\\\\\Component\\\\\\\\Dotenv\\\\\\\\Dotenv\' and \'bootEnv\' will always evaluate to false\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/bootstrap.php',
];
$ignoreErrors[] = [
	'message' => '#^Call to method bootEnv\\(\\) on an unknown class Symfony\\\\Component\\\\Dotenv\\\\Dotenv\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/bootstrap.php',
];
$ignoreErrors[] = [
	'message' => '#^Class Symfony\\\\Component\\\\Dotenv\\\\Dotenv not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/bootstrap.php',
];
$ignoreErrors[] = [
	'message' => '#^Instantiated class Symfony\\\\Component\\\\Dotenv\\\\Dotenv not found\\.$#',
	'count' => 1,
	'path' => __DIR__ . '/../../../tests/bootstrap.php',
];

return ['parameters' => ['ignoreErrors' => $ignoreErrors]];
