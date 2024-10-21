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

/* customer-support/views/customer_request_dashboard.html */
class __TwigTemplate_a82eb1aaa9a417441a2b53da5e3ef2ef extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "customer-support/views/customer_request_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    
    <h2 class=\"ui header\">Customer Requests Dashboard</h2>

    <div class=\"ui message\">
      <p>You can view the status of your request(s) here.</p>
    </div>
    
    <div class=\"ui top attached tabular menu\">
      <a class=\"item active\" data-tab=\"enquiries\">Enquiries</a>
    </div>
  
    <!-- Enquiries Tab -->
    <div class=\"ui bottom attached tab segment active\" data-tab=\"enquiries\">
      <table class=\"ui celled table\">
        <thead>
          <tr>
            <th>Booking Ref</th>
            <th>Booking Type</th>
            <th>Date of Enquiry</th>
            <th>Details</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 31
            echo "          <tr>
            <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_ref", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
            <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_type", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
            <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "request_date", [], "any", false, false, false, 34), "d M Y"), "html", null, true);
            echo "</td>
            <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "details", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
            <td><div class=\"ui label\">";
            // line 36
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 36)), "html", null, true);
            echo "</div></td>
            <td><a href=\"/customer-support/request-details/";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 37), "html", null, true);
            echo "\" class=\"ui button\">View</buttaon></td>
          </tr>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "          <!-- Additional rows here -->
        </tbody>
      </table>
    </div>

  </div>
";
    }

    // line 48
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 49
        echo "<script>
\$('.menu .item').tab();
</script>
";
    }

    public function getTemplateName()
    {
        return "customer-support/views/customer_request_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 49,  125 => 48,  115 => 40,  106 => 37,  102 => 36,  98 => 35,  94 => 34,  90 => 33,  86 => 32,  83 => 31,  79 => 30,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "customer-support/views/customer_request_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/customer-support/views/customer_request_dashboard.html");
    }
}
