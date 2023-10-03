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
class __TwigTemplate_a1b1766704ff10ea61a987ab75c6b8a8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "task/list.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "task/list.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_header_img($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_img"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header_img"));

        echo "<img class=\"slide-image\" src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/todolist_content.jpg"), "html", null, true);
        echo "\" alt=\"todo list\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 6
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 7
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "request", [], "any", false, false, false, 7), "requestUri", [], "any", false, false, false, 7) == "/tasks")) {
            // line 8
            echo "\t\t<h2>Liste de l'ensemble de vos tâches</h2>
\t";
        }
        // line 10
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 10, $this->source); })()), "request", [], "any", false, false, false, 10), "requestUri", [], "any", false, false, false, 10) == "/tasks/todo")) {
            // line 11
            echo "\t\t<h2>Liste de l'ensemble de vos tâches à faire</h2>
\t";
        }
        // line 13
        echo "\t";
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "request", [], "any", false, false, false, 13), "requestUri", [], "any", false, false, false, 13) == "/tasks/done")) {
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
        $context['_seq'] = twig_ensure_traversable((isset($context["tasks"]) || array_key_exists("tasks", $context) ? $context["tasks"] : (function () { throw new RuntimeError('Variable "tasks" does not exist.', 18, $this->source); })()));
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
            echo "\" method=\"POST\">
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
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

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
        return array (  197 => 53,  188 => 50,  184 => 48,  172 => 41,  168 => 39,  161 => 37,  156 => 35,  150 => 32,  143 => 30,  139 => 28,  135 => 26,  131 => 24,  129 => 23,  123 => 19,  118 => 18,  112 => 16,  108 => 14,  105 => 13,  101 => 11,  98 => 10,  94 => 8,  91 => 7,  81 => 6,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block header_img %}<img class=\"slide-image\" src=\"{{ asset('img/todolist_content.jpg') }}\" alt=\"todo list\">
{% endblock %}

{% block body %}
\t{% if app.request.requestUri == '/tasks' %}
\t\t<h2>Liste de l'ensemble de vos tâches</h2>
\t{% endif %}
\t{% if app.request.requestUri == '/tasks/todo' %}
\t\t<h2>Liste de l'ensemble de vos tâches à faire</h2>
\t{% endif %}
\t{% if app.request.requestUri == '/tasks/done' %}
\t\t<h2>Liste de l'ensemble de vos tâches terminées</h2>
\t{% endif %}
\t<a href=\"{{ path('task_create') }}\" class=\"btn btn-info pull-right\">Créer une tâche</a>
\t<div class=\"row\">
\t\t{% for task in tasks %}
\t\t\t<div class=\"col-sm-4 col-lg-4 col-md-4\">
\t\t\t\t<div class=\"thumbnail\">
\t\t\t\t\t<div class=\"caption\">
\t\t\t\t\t\t<h4 class=\"pull-right\">
\t\t\t\t\t\t\t{% if task.isDone %}
\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-ok\"></span>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<span class=\"glyphicon glyphicon-remove\"></span>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</h4>
\t\t\t\t\t\t<h4>
\t\t\t\t\t\t\t<a href=\"{{ path('task_edit', {'id' : task.id }) }}\">{{ task.title }}</a>
\t\t\t\t\t\t</h4>
\t\t\t\t\t\t<p>{{ task.content }}</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<form action=\"{{ path('task_toggle', {'id' : task.id }) }}\">
\t\t\t\t\t\t\t<button class=\"btn btn-success btn-sm pull-right\">
\t\t\t\t\t\t\t\t{% if not task.isDone %}Marquer comme faite{% else %}Marquer non terminée
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t<form action=\"{{ path('task_delete', {'id' : task.id }) }}\" method=\"POST\">
\t\t\t\t\t\t\t<button class=\"btn btn-danger btn-sm pull-right\">Supprimer</button>
\t\t\t\t\t\t</form>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t{% else %}
\t\t\t<div class=\"alert alert-warning\" role=\"alert\">
\t\t\t\tIl n'y a pas encore de tâche enregistrée.
\t\t\t\t<a href=\"{{ path('task_create') }}\" class=\"btn btn-warning pull-right\">Créer une tâche</a>
\t\t\t</div>
\t\t{% endfor %}
\t</div>
{% endblock %}
", "task/list.html.twig", "/home/thomas/Dev/SelfHosted-GitLab/Organizations/Formations/OpenClassrooms/php_sf/Projets/todolist/templates/task/list.html.twig");
    }
}
