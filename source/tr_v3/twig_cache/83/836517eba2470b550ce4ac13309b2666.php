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

/* customer-support/views/customer_request_details.html */
class __TwigTemplate_ba3683d5d80cb0bf21b63af819d57f85 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "customer-support/views/customer_request_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui header\">Customer Request Details</h2>
  
    <div class=\"ui segment\">
      <table class=\"ui celled table\">
        <thead>
          <tr>
            <th colspan=\"2\">
              <h3 class=\"ui header\">Request ID: ";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</h3>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>Booking Reference:</strong></td>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "booking_ref", [], "any", false, false, false, 19), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Booking Type:</strong></td>
            <td>";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "booking_type", [], "any", false, false, false, 23), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Request Type:</strong></td>
            <td>";
        // line 27
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "request_type", [], "any", false, false, false, 27)), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Status:</strong></td>
            <td>
              <div class=\"ui label\">";
        // line 32
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "status", [], "any", false, false, false, 32)), "html", null, true);
        echo "</div>
            </td>
          </tr>
          <tr>
            <td><strong>Reason:</strong></td>
            <td>";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "reason", [], "any", false, false, false, 37), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Request Info:</strong></td>
            <td>";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "request_info", [], "any", false, false, false, 41), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Manager Notes:</strong></td>
            <td>";
        // line 45
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "manager_notes", [], "any", false, false, false, 45), "html", null, true);
        echo "</td>
          </tr>
          <tr>
            <td><strong>Request Date:</strong></td>
            <td>";
        // line 49
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "request_date", [], "any", false, false, false, 49), "d M Y"), "html", null, true);
        echo "</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan=\"2\">
              <a href=\"/customer-support/my-requests\" class=\"ui button\">Return to My Requests</a>
              ";
        // line 56
        if ((twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "status", [], "any", false, false, false, 56) == "pending")) {
            // line 57
            echo "                <a href=\"/customer-support/request-details/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["request"] ?? null), "id", [], "any", false, false, false, 57), "html", null, true);
            echo "/cancel\" class=\"ui red button\">Cancel The Request</a>
              ";
        }
        // line 59
        echo "            </td>
          </tr>
        </tfoot>
      </table>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "customer-support/views/customer_request_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 59,  133 => 57,  131 => 56,  121 => 49,  114 => 45,  107 => 41,  100 => 37,  92 => 32,  84 => 27,  77 => 23,  70 => 19,  60 => 12,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "customer-support/views/customer_request_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/customer-support/views/customer_request_details.html");
    }
}
