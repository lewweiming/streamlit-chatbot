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

/* support-tickets/views/admin/index.html */
class __TwigTemplate_6f2798aff7af0a916d01b93a92543d12 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_layout_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "support-tickets/views/admin/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Framework Admin</a>
    <i class=\"right angle icon divider\"></i>
    <a class=\"active section\">Support Tickets</a>
</div>

<h2 class=\"ui header\">List of Support Tickets</h2>

<div class=\"ui message\">
We used AI to build this component.    
</div>

<!-- TOOLBAR -->
<div>
    <a href=\"/framework/admin/support-tickets/add\" class=\"ui primary button\">Add New Ticket</a>
</div>

<!-- TABLE -->
<table class=\"ui table\">
    <thead>
        <tr>
            <th>Title</th>
            <th>Tags</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 35
        if ((twig_length_filter($this->env, ($context["rows"] ?? null)) == 0)) {
            // line 36
            echo "        <tr>
            <td colspan=\"7\">No tickets added yet</td>
        </tr>
        ";
        }
        // line 40
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 41
            echo "        <tr>
            <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, false, 42), "html", null, true);
            echo "</td>
            <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "tags", [], "any", false, false, false, 43), "html", null, true);
            echo "</td>
            <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "description", [], "any", false, false, false, 44), "html", null, true);
            echo "</td>
            <td>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "priority", [], "any", false, false, false, 45), "html", null, true);
            echo "</td>
            <td>";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 46), "html", null, true);
            echo "</td>
            <td>";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "created_at", [], "any", false, false, false, 47), "html", null, true);
            echo "</td>
            <td>
                <a href=\"/framework/admin/support-ticket/";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 49), "html", null, true);
            echo "/edit\" class=\"ui button\">Edit</a>
                <a href=\"/framework/admin/support-ticket/";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 50), "html", null, true);
            echo "/delete\" class=\"ui button\">Delete</a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    </tbody>
</table>

";
    }

    public function getTemplateName()
    {
        return "support-tickets/views/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 54,  128 => 50,  124 => 49,  119 => 47,  115 => 46,  111 => 45,  107 => 44,  103 => 43,  99 => 42,  96 => 41,  91 => 40,  85 => 36,  83 => 35,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "support-tickets/views/admin/index.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/support-tickets/views/admin/index.html");
    }
}
