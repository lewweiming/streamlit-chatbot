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

/* work-orders/views/admin/index.html */
class __TwigTemplate_7b3fb5f494714488abc6ce899dd9e37f extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "work-orders/views/admin/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/framework/admin\" class=\"section\">Admin</a>
    <i class=\"right angle icon divider\"></i>
    <a class=\"active section\">Work Orders</a>
</div>

<h2 class=\"ui header\">List of Work Orders</h2>

<!-- MESSAGE -->
<div class=\"ui message\">
    <div class=\"header\">What are Work Orders</div>
    <p>Work orders can be assigned to teams, approved, or have status changes applied.</p>
</div>

<!-- TOOLBAR -->
<div>
    <a href=\"/framework/admin/work-orders/add\" class=\"ui primary button\">Add New Work Order</a>
</div>

<!-- TABLE -->
<table class=\"ui table\">
    <thead>
        <tr>
            <th>Requestor</th>
            <th>Department</th>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 37
        if ((twig_length_filter($this->env, ($context["rows"] ?? null)) == 0)) {
            // line 38
            echo "        <tr>
            <td colspan=\"7\">No work orders added yet</td>
        </tr>
        ";
        }
        // line 42
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 43
            echo "        <tr>
            <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "requestor", [], "any", false, false, false, 44), "html", null, true);
            echo "</td>
            <td>";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "department", [], "any", false, false, false, 45), "html", null, true);
            echo "</td>
            <td>";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "title", [], "any", false, false, false, 46), "html", null, true);
            echo "</td>
            <td>";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "priority", [], "any", false, false, false, 47), "html", null, true);
            echo "</td>
            <td>";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 48), "html", null, true);
            echo "</td>
            <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date_submitted", [], "any", false, false, false, 49), "html", null, true);
            echo "</td>
            <td>
                <a href=\"/framework/admin/work-order/";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 51), "html", null, true);
            echo "/edit\" class=\"ui button\">Edit</a>
                <a href=\"/framework/admin/work-order/";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 52), "html", null, true);
            echo "/delete\" class=\"ui button\">Delete</a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 56
        echo "    </tbody>
</table>

";
    }

    // line 61
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
        echo "<script>
    const API_LIST = '/api/work-orders/list'

    document.addEventListener('alpine:init', () => {
        Alpine.data('main', () => ({
            rows: [],
            async list() {
                \$.toast({ message: 'Fetching list...' });

                let r = await axios.get(API_LIST)

                if (r.data.message == 'success') {
                    this.rows = r.data.rows
                    \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
                } else {
                    \$.toast({ class: 'error', message: 'Failed to fetch list' });
                }
            },
        }))
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "work-orders/views/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 62,  148 => 61,  141 => 56,  131 => 52,  127 => 51,  122 => 49,  118 => 48,  114 => 47,  110 => 46,  106 => 45,  102 => 44,  99 => 43,  94 => 42,  88 => 38,  86 => 37,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "work-orders/views/admin/index.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/work-orders/views/admin/index.html");
    }
}
