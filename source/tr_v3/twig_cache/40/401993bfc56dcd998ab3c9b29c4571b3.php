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

/* tr-flight-bookings/views/admin/add_booking.html */
class __TwigTemplate_3839c0cc4417be192b2f62a83bfcfa01 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-flight-bookings/views/admin/add_booking.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
  <a href=\"/\" class=\"section\">Flight Booking Home</a>
  <i class=\"right angle icon divider\"></i>
  <a href=\"/flights/bookings\" class=\"section\">Bookings</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Add Booking</div>
</div>

<h2 class=\"ui header\">Add New Flight Booking</h2>

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
<form method=\"post\" action=\"/framework/admin/flight-bookings/add-booking\" class=\"ui form\">
  <p>Add your flight booking details</p>

  <div class=\"required field\">
    <label for=\"customer_id\">Customer ID</label>
    <input type=\"number\" id=\"customer_id\" name=\"customer_id\">
  </div>

  <div class=\"required field\">
    <label for=\"flight_id\">Flight ID</label>
    <input type=\"number\" id=\"flight_id\" name=\"flight_id\">
  </div>

  <div class=\"required field\">
    <label for=\"seat_class\">Seat Class</label>
    <select name=\"seat_class\" id=\"seat_class\" class=\"ui dropdown\">
      <option value=\"\">Select Seat Class</option>
      <option value=\"Economy\">Economy</option>
      <option value=\"Business\">Business</option>
      <option value=\"First Class\">First Class</option>
    </select>
  </div>

  <div class=\"required field\">
    <label for=\"total_amount\">Total Amount</label>
    <input type=\"number\" step=\"0.01\" id=\"total_amount\" name=\"total_amount\" placeholder=\"0.00\">
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

";
    }

    // line 62
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
        echo "<script>
/* VALIDATION */
\$(document).ready(function () {
    \$('.ui.dropdown').dropdown();
    \$('.ui.form').form({
        fields: {
            customer_id: {
                identifier: 'customer_id',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the customer ID'
                    },
                    {
                        type: 'integer',
                        prompt: 'Customer ID must be a number'
                    }
                ]
            },
            flight_id: {
                identifier: 'flight_id',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the flight ID'
                    },
                    {
                        type: 'integer',
                        prompt: 'Flight ID must be a number'
                    }
                ]
            },
            seat_class: {
                identifier: 'seat_class',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please select the seat class'
                    }
                ]
            },
            total_amount: {
                identifier: 'total_amount',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the total amount'
                    },
                    {
                        type: 'decimal',
                        prompt: 'Please enter a valid amount'
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
        return "tr-flight-bookings/views/admin/add_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 63,  128 => 62,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/admin/add_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/admin/add_booking.html");
    }
}
