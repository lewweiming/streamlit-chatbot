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

/* support-tickets/views/admin/add_ticket.html */
class __TwigTemplate_27270ba8b17600dce654fd2ae7ac9b08 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "support-tickets/views/admin/add_ticket.html", 1);
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
  <div class=\"active section\">Add</div>
</div>

<h2 class=\"ui header\">Add New Ticket</h2>

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
<form method=\"post\" action=\"/framework/admin/support-tickets/add\" class=\"ui form\">
  <p>Add your ticket details</p>

  <div class=\"required field\">
    <label>Title</label>
    <input type=\"text\" name=\"title\" placeholder=\"Title of the issue\">
  </div>
  <div class=\"field\">
    <label>Tags</label>
    <input type=\"text\" name=\"tags\" placeholder=\"Tags (comma-separated)\">
  </div>
  <div class=\"required field\">
    <label>Description</label>
    <textarea name=\"description\" placeholder=\"Describe your issue\"></textarea>
  </div>
  <div class=\"required field\">
    <label>Priority</label>
    <select name=\"priority\" class=\"ui dropdown\">
      <option value=\"\">Select Priority</option>
      <option value=\"Low\">Low</option>
      <option value=\"Medium\">Medium</option>
      <option value=\"High\">High</option>
      <option value=\"Urgent\">Urgent</option>
    </select>
  </div>
  <div class=\"required field\">
    <label>Status</label>
    <select name=\"status\" class=\"ui dropdown\">
      <option value=\"\">Select Status</option>
      <option value=\"Open\">Open</option>
      <option value=\"In Progress\">In Progress</option>
      <option value=\"Closed\">Closed</option>
    </select>
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

";
    }

    // line 69
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
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
                        prompt: 'Please enter the title of the issue'
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
                        prompt: 'Please select a priority level'
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
            },
        }
    });
});

</script>
";
    }

    public function getTemplateName()
    {
        return "support-tickets/views/admin/add_ticket.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 70,  135 => 69,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "support-tickets/views/admin/add_ticket.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/support-tickets/views/admin/add_ticket.html");
    }
}
