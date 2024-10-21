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

/* work-orders/views/work_orders.html */
class __TwigTemplate_d80f448aba48d941db9f22fdecd1dfc6 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "work-orders/views/work_orders.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Home</a>
    <i class=\"right angle icon divider\"></i>
    <a class=\"active section\">Work Orders</a>
</div>

<h2 class=\"ui header\">List of Work Orders</h2>

<!-- MESSAGE -->
<div class=\"ui message\">
    <div class=\"header\">What are Work Orders</div>
    <p>Work orders can be assigned to teams, approved, or have status changes applied.</p>
</div>

<!-- TABLE -->
<table class=\"ui table\">
    <thead>
        <tr>
            <th>Requestor</th>
            <th>Department</th>
            <th>Description</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Date Submitted</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 32
        if ((twig_length_filter($this->env, ($context["rows"] ?? null)) == 0)) {
            // line 33
            echo "        <tr>
            <td colspan=\"7\">No work orders added yet</td>
        </tr>
        ";
        }
        // line 37
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 38
            echo "        <tr>
            <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "requestor", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
            <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "department", [], "any", false, false, false, 40), "html", null, true);
            echo "</td>
            <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "description", [], "any", false, false, false, 41), "html", null, true);
            echo "</td>
            <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "priority", [], "any", false, false, false, 42), "html", null, true);
            echo "</td>
            <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 43), "html", null, true);
            echo "</td>
            <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "date_submitted", [], "any", false, false, false, 44), "html", null, true);
            echo "</td>
            <td>
                <a href=\"/work-order/";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 46), "html", null, true);
            echo "/preview\" class=\"ui button\">Preview</a>
            </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "    </tbody>
</table>

";
    }

    // line 55
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 56
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
        return "work-orders/views/work_orders.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 56,  139 => 55,  132 => 50,  122 => 46,  117 => 44,  113 => 43,  109 => 42,  105 => 41,  101 => 40,  97 => 39,  94 => 38,  89 => 37,  83 => 33,  81 => 32,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "work-orders/views/work_orders.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/work-orders/views/work_orders.html");
    }
}
