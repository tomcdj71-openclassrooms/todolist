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

/* task/list.html.twig */
class __TwigTemplate_72546cd78eaa23293d6448ebd84342da extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header_img' => [$this, 'block_header_img'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "task/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header_img($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "<img class=\"slide-image\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/todolist_content.jpg"), "html", null, true);
        echo "\" alt=\"todo list\">
";
    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 7), "requestUri", [], "any", false, false, false, 7) == "/tasks")) {
            // line 8
            echo "\t\t<h2>Liste de l'ensemble de vos tâches</h2>
\t";
        }
        // line 10
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 10), "requestUri", [], "any", false, false, false, 10) == "/tasks/todo")) {
            // line 11
            echo "\t\t<h2>Liste de l'ensemble de vos tâches à faire</h2>
\t";
        }
        // line 13
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, false, false, 13), "requestUri", [], "any", false, false, false, 13) == "/tasks/done")) {
            // line 14
            echo "\t\t<h2>Liste de l'ensemble de vos tâches terminées</h2>
\t";
        }
        // line 16
        echo "\t<a href=\"";
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_create");
        echo "\" class=\"btn btn-info pull-right\">Créer une tâche</a>
\t<div class=\"row\">
\t\t";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tasks"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 19
            echo "\t\t\t<div class=\"col-sm-4 col-lg-4 col-md-4\">
\t\t\t\t<div class=\"thumbnail\">
\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t<h4 class=\"pull-right\">
\t\t\t\t\t\t\t";
            // line 23
            if (twig_get_attribute($this->env, $this->source, $context["task"], "isDone", [], "any", false, false, false, 23)) {
                // line 24
                echo "\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-ok\"></span>
\t\t\t\t\t\t\t";
            } else {
                // line 26
                echo "\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-remove\"></span>
\t\t\t\t\t\t\t";
            }
            // line 28
            echo "\t\t\t\t\t\t</h4>
\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t<a href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 30)]), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "title", [], "any", false, false, false, 30), "html", null, true);
            echo "</a>
\t\t\t\t\t\t</h4>
\t\t\t\t\t\t<p>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "content", [], "any", false, false, false, 32), "html", null, true);
            echo "</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<form action=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_toggle", ["id" => twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 35)]), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<button class=\"btn btn-success btn-sm pull-right\">
\t\t\t\t\t\t\t\t";
            // line 37
            if ( !twig_get_attribute($this->env, $this->source, $context["task"], "isDone", [], "any", false, false, false, 37)) {
                echo "Marquer comme faite";
            } else {
                echo "Marquer non terminée
\t\t\t\t\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t<form action=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 41)]), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<button class=\"btn btn-danger btn-sm pull-right\">Supprimer</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 48
            echo "\t\t\t<div class=\"alert alert-warning\" role=\"alert\">
\t\t\t\tIl n'y a pas encore de tâche enregistrée.
\t\t\t\t<a href=\"";
            // line 50
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_create");
            echo "\" class=\"btn btn-warning pull-right\">Créer une tâche</a>
\t\t\t</div>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "\t</div>
";
    }

    public function getTemplateName()
    {
        return "task/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 53,  158 => 50,  154 => 48,  142 => 41,  138 => 39,  131 => 37,  126 => 35,  120 => 32,  113 => 30,  109 => 28,  105 => 26,  101 => 24,  99 => 23,  93 => 19,  88 => 18,  82 => 16,  78 => 14,  75 => 13,  71 => 11,  68 => 10,  64 => 8,  61 => 7,  57 => 6,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "task/list.html.twig", "/home/thomas/Dev/SelfHosted-GitLab/Organizations/Formations/OpenClassrooms/php_sf/Projets/todolist/templates/task/list.html.twig");
    }
}
