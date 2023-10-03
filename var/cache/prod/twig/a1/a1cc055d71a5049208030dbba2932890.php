<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* security/login.html.twig */
class __TwigTemplate_113e686e405d4da4bfdc2b62c658f018 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t";
        if (($context["error"] ?? null)) {
            // line 5
            echo "\t\t<div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageKey", [], "any", false, false, false, 5), twig_get_attribute($this->env, $this->source, ($context["error"] ?? null), "messageData", [], "any", false, false, false, 5), "security"), "html", null, true);
            echo "</div>
\t";
        }
        // line 7
        echo "
\t<div class=\"container\">
\t\t<h1 class=\"text-center mb-3\">Connexion</h1>

\t\t<div class=\"row text-center\">
\t\t\t<form action=\"";
        // line 12
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("login");
        echo "\" method=\"post\">
\t\t\t\t<div class=\"mt-3 mb-3 d-grid col-6 mx-auto text-center\">
\t\t\t\t\t<label for=\"username\">Nom d'utilisateur</label>
\t\t\t\t\t<input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["last_username"] ?? null), "html", null, true);
        echo "\"/>
\t\t\t\t</div>
\t\t\t\t<div class=\"mb-3 d-grid col-6 mx-auto text-center\">
\t\t\t\t\t<label for=\"password\">Mot de passe</label>
\t\t\t\t\t<input type=\"password\" id=\"password\" name=\"_password\"/>

\t\t\t\t</div>

\t\t\t\t<input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\">

\t\t\t\t<div class=\"mb-3 d-grid col-6 mx-auto text-center\">
\t\t\t\t\t<button class=\"btn btn-success\" type=\"submit\">Se connecter</button>
\t\t\t\t</div>
\t\t\t</form>
\t\t</div>

\t</div>
";
    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 23,  72 => 15,  66 => 12,  59 => 7,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "security/login.html.twig", "/home/thomas/Dev/SelfHosted-GitLab/Organizations/Formations/OpenClassrooms/php_sf/Projets/todolist/templates/security/login.html.twig");
    }
}
