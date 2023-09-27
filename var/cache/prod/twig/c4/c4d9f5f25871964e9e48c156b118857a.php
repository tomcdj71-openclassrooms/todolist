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

/* task/manage.html.twig */
class __TwigTemplate_47739c97048a295c86c7e8ca87a71cae extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'header_img' => [$this, 'block_header_img'],
            'header_title' => [$this, 'block_header_title'],
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
        $this->parent = $this->loadTemplate("base.html.twig", "task/manage.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_header_img($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 5
    public function block_header_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo "<h1>Liste des tâches</h1>";
    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if ((twig_length_filter($this->env, ($context["tasks"] ?? null)) == 0)) {
            // line 9
            echo "        <div class=\"alert alert-warning\" role=\"alert\">
            Il n'y a pas encore de tâches enregistrées. <a href=\"";
            // line 10
            echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_create");
            echo "\" class=\"btn btn-warning pull-right\">Créer une tâche</a>
        </div>
    ";
        } else {
            // line 13
            echo "        <div class=\"row\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-striped\">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Contenu</th>
                        <th class=\"text-center\">Statut</th>
                        <th class=\"text-center\">Modification</th>
                        <th class=\"text-center\">Suppression</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tasks"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
                // line 29
                echo "                        <tr>
                            <th scope=\"row\">";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 30), "html", null, true);
                echo "</th>
                            <td>";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "title", [], "any", false, false, false, 31), "html", null, true);
                echo "</td>
                            <td>
                                ";
                // line 33
                if ((twig_get_attribute($this->env, $this->source, $context["task"], "user", [], "any", false, false, false, 33) == null)) {
                    // line 34
                    echo "                                    Anonyme
                                ";
                } else {
                    // line 36
                    echo "                                    ";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["task"], "user", [], "any", false, false, false, 36), "username", [], "any", false, false, false, 36), "html", null, true);
                    echo "
                                ";
                }
                // line 38
                echo "                            </td>
                            <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "content", [], "any", false, false, false, 39), "html", null, true);
                echo "</td>
                            <td class=\"text-center\">
                                ";
                // line 41
                if (twig_get_attribute($this->env, $this->source, $context["task"], "isDone", [], "any", false, false, false, 41)) {
                    // line 42
                    echo "                                    Terminée
                                ";
                } else {
                    // line 44
                    echo "                                    En cours
                                ";
                }
                // line 46
                echo "                            </td>
                            <td class=\"text-center\">
                                <a href=\"";
                // line 48
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 48)]), "html", null, true);
                echo "\" class=\"btn btn-success btn-sm\">Edit</a>
                            </td>
                            <td class=\"text-center\">
                                <a href=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("task_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["task"], "id", [], "any", false, false, false, 51)]), "html", null, true);
                echo "\"
                                   class=\"btn btn-danger btn-sm\" role=\"button\"
                                   onclick=\"return confirm('Voulez-vous vraiment supprimer cette tâche ?')\"
                                >Delete</a>
                            </td>
                        </tr>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                    </tbody>
                </table>
            </div>
        </div>
    ";
        }
    }

    public function getTemplateName()
    {
        return "task/manage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 58,  163 => 51,  157 => 48,  153 => 46,  149 => 44,  145 => 42,  143 => 41,  138 => 39,  135 => 38,  129 => 36,  125 => 34,  123 => 33,  118 => 31,  114 => 30,  111 => 29,  94 => 28,  77 => 13,  71 => 10,  68 => 9,  65 => 8,  61 => 7,  54 => 5,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "task/manage.html.twig", "/home/thomas/Dev/SelfHosted-GitLab/Organizations/Formations/OpenClassrooms/php_sf/Projets/todolist/templates/task/manage.html.twig");
    }
}
