
12 files with changes
=====================

1) `app/AppCache.php:1`
```diff
@@ @@
use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;

-class AppCache extends HttpCache
+final class AppCache extends HttpCache
 {
 }
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector


2) `app/AppKernel.php:2`
```diff
@@ @@
 use Symfony\Component\HttpKernel\Kernel;
 use Symfony\Component\Config\Loader\LoaderInterface;

-class AppKernel extends Kernel
+final class AppKernel extends Kernel
 {
    public function registerBundles()
    {
@@ @@
        return dirname(__DIR__).'/var/logs';
    }

-    public function registerContainerConfiguration(LoaderInterface $loader)
+    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector
 * AddVoidReturnTypeWhereNoReturnRector


`3) app/autoload.php:5`
```diff
@@ @@
/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

-AnnotationRegistry::registerLoader([$loader, 'loadClass']);
+AnnotationRegistry::registerLoader(static function (string $class) use ($loader) : ?bool {
+    return $loader->loadClass($class);
+});

return $loader;
```

Applied rules:
 * CallableThisArrayToAnonymousFunctionRector (https://www.php.net/manual/en/language.types.callable.php#117260)
 * StaticClosureRector


`4) src/AppBundle/AppBundle.php:3`
```diff
@@ @@
use Symfony\Component\HttpKernel\Bundle\Bundle;

-class AppBundle extends Bundle
+final class AppBundle extends Bundle
 {
 }
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector


`5) src/AppBundle/Controller/DefaultController.php:4`
```diff
@@ @@
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

-class DefaultController extends Controller
+final class DefaultController extends Controller
{
    /**
    * @Route("/", name="homepage")
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector


`6) src/AppBundle/Controller/SecurityController.php:5`
```diff
@@ @@
 use Symfony\Component\HttpFoundation\Request;
 use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

-class SecurityController extends Controller
+final class SecurityController extends Controller
 {
    /**
    * @Route("/login", name="login")
@@ @@
    /**
    * @Route("/login_check", name="login_check")
    */
-    public function loginCheck()
+    public function loginCheck(): void
    {
        // This code is never executed.
    }
@@ @@
    /**
    * @Route("/logout", name="logout")
    */
-    public function logoutCheck()
+    public function logoutCheck(): void
    {
        // This code is never executed.
    }
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector
 * AddVoidReturnTypeWhereNoReturnRector


`7) src/AppBundle/Controller/TaskController.php:7`
```diff
@@ @@
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

-class TaskController extends Controller
+final class TaskController extends Controller
{
    /**
    * @Route("/tasks", name="task_list")
@@ @@
    */
    public function deleteTaskAction(Task $task)
    {
-        $em = $this->getDoctrine()->getManager();
-        $em->remove($task);
-        $em->flush();
+        $objectManager = $this->getDoctrine()->getManager();
+        $objectManager->remove($task);
+        $objectManager->flush();

        $this->addFlash('success', 'La tâche a bien été supprimée.');
```

Applied rules:
 * RenameVariableToMatchMethodCallReturnTypeRector
 * FinalizeClassesWithoutChildrenRector


`8) src/AppBundle/Controller/UserController.php:7`
```diff
@@ @@
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

-class UserController extends Controller
+final class UserController extends Controller
{
    /**
    * @Route("/users", name="user_list")
```

Applied rules:
 * FinalizeClassesWithoutChildrenRector


`9) src/AppBundle/Entity/Task.php:20`
```diff
@@ @@
    /**
    * @ORM\Column(type="datetime")
    */
-    private $createdAt;
+    private \Datetime $createdAt;

    /**
    * @ORM\Column(type="string")
@@ @@
    /**
    * @ORM\Column(type="boolean")
    */
-    private $isDone;
+    private bool $isDone = false;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
-        $this->isDone = false;
    }

    public function getId()
@@ @@
        return $this->createdAt;
    }

-    public function setCreatedAt($createdAt)
+    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }
@@ @@
        return $this->title;
    }

-    public function setTitle($title)
+    public function setTitle($title): void
    {
        $this->title = $title;
    }
@@ @@
        return $this->content;
    }

-    public function setContent($content)
+    public function setContent($content): void
    {
        $this->content = $content;
    }
@@ @@
        return $this->isDone;
    }

-    public function toggle($flag)
+    public function toggle($flag): void
    {
        $this->isDone = $flag;
    }
```

Applied rules:
 * InlineConstructorDefaultToPropertyRector
 * AddVoidReturnTypeWhereNoReturnRector
 * TypedPropertyFromStrictConstructorRector


`10) src/AppBundle/Entity/User.php:48`
```diff
@@ @@
        return $this->username;
    }

-    public function setUsername($username)
+    public function setUsername($username): void
    {
        $this->username = $username;
    }
@@ @@
        return $this->password;
    }

-    public function setPassword($password)
+    public function setPassword($password): void
    {
        $this->password = $password;
    }
@@ @@
        return $this->email;
    }

-    public function setEmail($email)
+    public function setEmail($email): void
    {
        $this->email = $email;
    }
@@ @@
        return ['ROLE_USER'];
    }

-    public function eraseCredentials()
+    public function eraseCredentials(): void
    {
    }
}
```

Applied rules:
 * AddVoidReturnTypeWhereNoReturnRector


`11) src/AppBundle/Form/TaskType.php:5`
```diff
@@ @@
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

-class TaskType extends AbstractType
+final class TaskType extends AbstractType
{
-    public function buildForm(FormBuilderInterface $builder, array $options)
+    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
-        $builder
+        $formBuilder
            ->add('title')
            ->add('content', TextareaType::class)
            //->add('author') ===> must be the user authenticated
```

Applied rules:
 * RenameParamToMatchTypeRector
 * FinalizeClassesWithoutChildrenRector
 * AddVoidReturnTypeWhereNoReturnRector


`12) src/AppBundle/Form/UserType.php:8`
```diff
@@ @@
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

-class UserType extends AbstractType
+final class UserType extends AbstractType
{
-    public function buildForm(FormBuilderInterface $builder, array $options)
+    public function buildForm(FormBuilderInterface $formBuilder, array $options): void
    {
-        $builder
+        $formBuilder
            ->add('username', TextType::class, ['label' => "Nom d'utilisateur"])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
```

Applied rules:
 * RenameParamToMatchTypeRector
 * FinalizeClassesWithoutChildrenRector
 * AddVoidReturnTypeWhereNoReturnRector

> [!NOTE]
> [OK] 12 files would have changed (dry-run) by Rector                                                                   

