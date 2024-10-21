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

/* support-tickets/views/admin/edit_ticket.html */
class __TwigTemplate_3198e348e77a8e25c141c4d0eae6cf60 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "support-tickets/views/admin/edit_ticket.html", 1);
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
  <a href=\"/framework/admin/support-tickets\" class=\"section\">Support Tickets</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Edit</div>
</div>

<h2 class=\"ui header\">Edit Support Ticket</h2>

<!-- VALIDATION ERRORS -->
";
        // line 15
        if (($context["errors"] ?? null)) {
            // line 16
            echo "<div class=\"ui warning message\">
  <i class=\"close icon\"></i>
  <div class=\"header\">
    Validation Errors
  </div>
  <ul>
    ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 23
                echo "    <li>";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["val"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
                echo "</li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "  </ul>
</div>
";
        }
        // line 28
        echo "
<form method=\"post\" action=\"/framework/admin/support-ticket/";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "id", [], "any", false, false, false, 29), "html", null, true);
        echo "/edit\" class=\"ui form\">
  <p>Edit your ticket details</p>

  <div class=\"required field\">
    <label for=\"title\">Title</label>
    <input value=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "title", [], "any", false, false, false, 34), "html", null, true);
        echo "\" type=\"text\" id=\"title\" name=\"title\">
  </div>

  <div class=\"field\">
    <label for=\"tags\">Tags</label>
    <input value=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "tags", [], "any", false, false, false, 39), "html", null, true);
        echo "\" type=\"text\" id=\"tags\" name=\"tags\">
  </div>

  <div class=\"required field\">
    <label for=\"description\">Description</label>
    <textarea name=\"description\" placeholder=\"Describe the issue\">";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "description", [], "any", false, false, false, 44), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"required field\">
    <label for=\"priority\">Priority</label>
    <select name=\"priority\" class=\"ui dropdown\">
      <option value=\"\">Select Priority</option>
      <option value=\"Low\" ";
        // line 51
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "priority", [], "any", false, false, false, 51) == "Low")) ? ("selected") : (""));
        echo ">Low</option>
      <option value=\"Medium\" ";
        // line 52
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "priority", [], "any", false, false, false, 52) == "Medium")) ? ("selected") : (""));
        echo ">Medium</option>
      <option value=\"High\" ";
        // line 53
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "priority", [], "any", false, false, false, 53) == "High")) ? ("selected") : (""));
        echo ">High</option>
      <option value=\"Urgent\" ";
        // line 54
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "priority", [], "any", false, false, false, 54) == "Urgent")) ? ("selected") : (""));
        echo ">Urgent</option>
    </select>
  </div>

  <div class=\"required field\">
    <label for=\"status\">Status</label>
    <select name=\"status\" class=\"ui dropdown\">
      <option value=\"\">Select Status</option>
      <option value=\"Open\" ";
        // line 62
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "status", [], "any", false, false, false, 62) == "Open")) ? ("selected") : (""));
        echo ">Open</option>
      <option value=\"In Progress\" ";
        // line 63
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "status", [], "any", false, false, false, 63) == "In Progress")) ? ("selected") : (""));
        echo ">In Progress</option>
      <option value=\"Closed\" ";
        // line 64
        echo (((twig_get_attribute($this->env, $this->source, ($context["ticket"] ?? null), "status", [], "any", false, false, false, 64) == "Closed")) ? ("selected") : (""));
        echo ">Closed</option>
    </select>
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

";
    }

    // line 73
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 74
        echo "<script>
  /* VALIDATION */
  \$(document).ready(function () {
    \$('.ui.form').form({
      fields: {
        title: {
          identifier: 'title',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the title'
            }
          ]
        },
        description: {
          identifier: 'description',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter a description'
            }
          ]
        },
        priority: {
          identifier: 'priority',
          rules: [
            {
              type: 'empty',
              prompt: 'Please select a priority'
            }
          ]
        },
        status: {
          identifier: 'status',
          rules: [
            {
              type: 'empty',
              prompt: 'Please select a status'
            }
          ]
        }
      }
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "support-tickets/views/admin/edit_ticket.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 74,  172 => 73,  160 => 64,  156 => 63,  152 => 62,  141 => 54,  137 => 53,  133 => 52,  129 => 51,  119 => 44,  111 => 39,  103 => 34,  95 => 29,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "support-tickets/views/admin/edit_ticket.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/support-tickets/views/admin/edit_ticket.html");
    }
}
