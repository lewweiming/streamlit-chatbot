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

/* work-orders/views/admin/edit_request.html */
class __TwigTemplate_8cc4e8f73e83cb61731c9a8e86d20150 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "work-orders/views/admin/edit_request.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- SIMPLE MDE -->
<link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css\">
<script src=\"https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js\"></script>
";
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "<div class=\"ui breadcrumb\">
  <a href=\"/framework/admin\" class=\"section\">Admin</a>
  <i class=\"right angle icon divider\"></i>
  <a href=\"/framework/admin/work-orders\" class=\"section\">Work Orders</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Edit</div>
</div>

<h2 class=\"ui header\">Edit Work Order</h2>

<!-- VALIDATION ERRORS -->
";
        // line 21
        if (($context["errors"] ?? null)) {
            // line 22
            echo "<div class=\"ui warning message\">
  <i class=\"close icon\"></i>
  <div class=\"header\">
    Validation Errors
  </div>
  <ul>
    ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 29
                echo "    <li>";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["val"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
                echo "</li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "  </ul>
</div>
";
        }
        // line 34
        echo "
<form method=\"post\" action=\"/framework/admin/work-order/";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "id", [], "any", false, false, false, 35), "html", null, true);
        echo "/edit\" class=\"ui form\">
  <p>Edit your work order details</p>

  <!-- Requestor -->
  <div class=\"required field\">
    <label for=\"requestor\">Requestor</label>
    <input value=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "requestor", [], "any", false, false, false, 41), "html", null, true);
        echo "\" type=\"text\" id=\"requestor\" name=\"requestor\">
  </div>

  <!-- Department -->
  <div class=\"required field\">
    <label for=\"department\">Department</label>
    <input value=\"";
        // line 47
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "department", [], "any", false, false, false, 47), "html", null, true);
        echo "\" type=\"text\" id=\"department\" name=\"department\">
  </div>

  <!-- Title -->
  <div class=\"required field\">
    <label for=\"title\">Title</label>
    <input value=\"";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "title", [], "any", false, false, false, 53), "html", null, true);
        echo "\" type=\"text\" id=\"title\" name=\"title\">
  </div>

  <!-- Description -->
  <div class=\"required field\">
    <label for=\"description\">Description</label>
    <textarea id=\"simplemde-description\" name=\"description\">";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "description", [], "any", false, false, false, 59), "html", null, true);
        echo "</textarea>
  </div>

  <!-- Priority -->
  <div class=\"required field\">
    <label for=\"priority\">Priority</label>
    <select class=\"ui dropdown\" name=\"priority\">
      <option value=\"Low\" ";
        // line 66
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "priority", [], "any", false, false, false, 66) == "Low")) ? ("selected") : (""));
        echo ">Low</option>
      <option value=\"Medium\" ";
        // line 67
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "priority", [], "any", false, false, false, 67) == "Medium")) ? ("selected") : (""));
        echo ">Medium</option>
      <option value=\"High\" ";
        // line 68
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "priority", [], "any", false, false, false, 68) == "High")) ? ("selected") : (""));
        echo ">High</option>
    </select>
  </div>

  <!-- Status -->
  <div class=\"required field\">
    <label for=\"status\">Status</label>
    <select class=\"ui dropdown\" name=\"status\">
      <option value=\"Pending\" ";
        // line 76
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 76) == "Pending")) ? ("selected") : (""));
        echo ">Pending</option>
      <option value=\"In Progress\" ";
        // line 77
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 77) == "In Progress")) ? ("selected") : (""));
        echo ">In Progress</option>
      <option value=\"Completed\" ";
        // line 78
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 78) == "Completed")) ? ("selected") : (""));
        echo ">Completed</option>
      <option value=\"Rejected\" ";
        // line 79
        echo (((twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "status", [], "any", false, false, false, 79) == "Rejected")) ? ("selected") : (""));
        echo ">Rejected</option>
    </select>
  </div>

  <!-- Date Submitted -->
  <div class=\"required field\">
    <label for=\"date_submitted\">Date Submitted</label>
    <div class=\"ui calendar\" id=\"date_submitted_calendar\">
      <div class=\"ui fluid input left icon\">
        <i class=\"calendar icon\"></i>
        <input value=\"";
        // line 89
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["order"] ?? null), "date_submitted", [], "any", false, false, false, 89), "html", null, true);
        echo "\" type=\"text\" name=\"date_submitted\" placeholder=\"YYYY-MM-DD\">
      </div>
    </div>
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

";
    }

    // line 99
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 100
        echo "<script>
  var simplemdeAddModal = new SimpleMDE({ element: \$(\"#simplemde-description\")[0] });
  var simplemdeEditModal;
</script>

<script>
  \$('#date_submitted_calendar')
    .calendar({
      type: 'date',
      formatter: {
        date: 'YYYY-MM-DD'
      }
    });

/* FORM VALIDATION */
\$(document).ready(function () {
    \$('.ui.form').form({
        fields: {
            requestor: {
                identifier: 'requestor',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the requestor\\'s name'
                    }
                ]
            },
            department: {
                identifier: 'department',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the department'
                    }
                ]
            },
            title: {
                identifier: 'title',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter a title'
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
                        prompt: 'Please select the status'
                    }
                ]
            },
            date_submitted: {
                identifier: 'date_submitted',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the date submitted'
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
        return "work-orders/views/admin/edit_request.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  214 => 100,  210 => 99,  197 => 89,  184 => 79,  180 => 78,  176 => 77,  172 => 76,  161 => 68,  157 => 67,  153 => 66,  143 => 59,  134 => 53,  125 => 47,  116 => 41,  107 => 35,  104 => 34,  99 => 31,  90 => 29,  86 => 28,  78 => 22,  76 => 21,  63 => 10,  59 => 9,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "work-orders/views/admin/edit_request.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/work-orders/views/admin/edit_request.html");
    }
}
