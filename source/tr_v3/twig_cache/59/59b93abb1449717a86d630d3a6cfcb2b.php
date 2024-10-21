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

/* tr-car-rentals/views/user/bookings_dashboard.html */
class __TwigTemplate_d41fac3e0b3f4b79dae96ff570393045 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/user/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <!-- Page Header -->
    <div class=\"ui secondary menu\">
        <h2 class=\"ui header\">Customer Car Rentals Dashboard</h2>
    </div>

    <!-- Car Rentals Tab -->
    <div>
        <h3 class=\"ui dividing header\">Car Rentals</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking Ref</th>
                    <th>Car Model</th>
                    <th>Rental Period</th>
                    <th>Pick-up Location</th>
                    <th>Drop-off Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 27
            echo "                <tr>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_ref", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>Toyota Camry</td>
                    <td>3 days</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "pickup_location", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "return_location", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <a href=\"/modules/car-rentals/booking-modification/";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_ref", [], "any", false, false, false, 35), "html", null, true);
            echo "\" class=\"ui button\">Modify</a>
                        <a href=\"/modules/car-rentals/booking-cancellation/";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_ref", [], "any", false, false, false, 36), "html", null, true);
            echo "\" class=\"ui button\">Cancel</a>
                        <a href=\"/modules/car-rentals/receipt\" class=\"ui button\">Receipt</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "                <!-- Add more rows as needed -->
                 ";
        // line 42
        if ((twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "length", [], "any", false, false, false, 42) == 0)) {
            // line 43
            echo "                 <tr>
                    <td colspan=\"7\">No bookings found</td>
                 </tr>
                 ";
        }
        // line 47
        echo "            </tbody>
        </table>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/user/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 47,  117 => 43,  115 => 42,  112 => 41,  101 => 36,  97 => 35,  91 => 32,  87 => 31,  81 => 28,  78 => 27,  74 => 26,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/user/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/user/bookings_dashboard.html");
    }
}
