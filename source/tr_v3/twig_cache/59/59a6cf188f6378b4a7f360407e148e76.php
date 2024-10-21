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

/* tr-car-rentals/views/admin/bookings/booking_details.html */
class __TwigTemplate_b69bd1b1bb4f61c806f29db6fff92ce9 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings/booking_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">

    <div class=\"ui breadcrumb\">
        <a href=\"/framework/admin\" class=\"section\">Admin Home</a>
        <i class=\"right angle icon divider\"></i>
        <a href=\"/framework/admin/car-rentals/bookings-dashboard\" class=\"section\">Car Rentals Booking Dashboard</a>
        <i class=\"right angle icon divider\"></i>
        <div class=\"active section\">Booking Details (Id: ";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 11), "html", null, true);
        echo ")</div>
      </div>

    <h2 class=\"ui header\">Car Rental Booking Details</h2>

    <table class=\"ui cell table\">
        <thead>
            <tr>
                <th>Confirmation</th>
            </tr>
        </thead>
    </table>

    <table class=\"ui cell table\">
        <thead>
            <tr>
                <th>Modifications</th>
            </tr>
        </thead>
    </table>

    <table class=\"ui cell table\">
        <thead>
            <tr>
                <th>Cancellation</th>
            </tr>
        </thead>
    </table>
    
    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th colspan=\"2\">Booking Information</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Booking Reference</strong></td>
                <td>";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_ref", [], "any", false, false, false, 49), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>User ID</strong></td>
                <td>";
        // line 53
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "user_id", [], "any", false, false, false, 53), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Car ID</strong></td>
                <td>";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "car_id", [], "any", false, false, false, 57), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Car Type</strong></td>
                <td>";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "car_type", [], "any", false, false, false, 61), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Status</strong></td>
                <td>";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "status", [], "any", false, false, false, 65), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Start Date</strong></td>
                <td>";
        // line 69
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "start_date", [], "any", false, false, false, 69), "Y-m-d"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>End Date</strong></td>
                <td>";
        // line 73
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "end_date", [], "any", false, false, false, 73), "Y-m-d"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Total Amount</strong></td>
                <td>\$";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "total_amount", [], "any", false, false, false, 77), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Insurance</strong></td>
                <td>";
        // line 81
        echo ((twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "insurance", [], "any", false, false, false, 81)) ? ("Yes") : ("No"));
        echo "</td>
            </tr>
            <tr>
                <td><strong>GPS</strong></td>
                <td>";
        // line 85
        echo ((twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "gps", [], "any", false, false, false, 85)) ? ("Yes") : ("No"));
        echo "</td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td><strong>Created At</strong></td>
                <td>";
        // line 91
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "created_at", [], "any", false, false, false, 91), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <td><strong>Updated At</strong></td>
                <td>";
        // line 95
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "updated_at", [], "any", false, false, false, 95), "Y-m-d H:i:s"), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

</div>

";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings/booking_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 95,  172 => 91,  163 => 85,  156 => 81,  149 => 77,  142 => 73,  135 => 69,  128 => 65,  121 => 61,  114 => 57,  107 => 53,  100 => 49,  59 => 11,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings/booking_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings/booking_details.html");
    }
}
