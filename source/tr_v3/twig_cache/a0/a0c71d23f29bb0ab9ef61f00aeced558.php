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

/* tr-car-rentals/views/admin/add_booking.html */
class __TwigTemplate_0221427708dee1dacd87eacf06179788 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/add_booking.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
  <a href=\"/\" class=\"section\">Car Rental Home</a>
  <i class=\"right angle icon divider\"></i>
  <a href=\"/car-rentals/bookings\" class=\"section\">Bookings</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Add Booking</div>
</div>

<h2 class=\"ui header\">Add New Car Rental Booking</h2>

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
<form method=\"post\" action=\"/framework/admin/car-rentals/add-booking\" class=\"ui form\">
  
  <p>Add your car rental booking details</p>

  <div class=\"required field\">
    <label for=\"user_id\">User ID</label>
    <input type=\"number\" id=\"user_id\" name=\"user_id\">
  </div>

  <div class=\"required field\">
    <label for=\"car_id\">Car ID</label>
    <input type=\"number\" id=\"car_id\" name=\"car_id\">
  </div>

  <div class=\"required field\">
    <label>Start Date</label>
    <div class=\"ui calendar\" id=\"start_date_calendar\">
      <div class=\"ui fluid input left icon\">
        <i class=\"calendar icon\"></i>
        <input type=\"text\" name=\"start_date\" placeholder=\"YYYY-MM-DD\">
      </div>
    </div>
  </div>

  <div class=\"required field\">
    <label>End Date</label>
    <div class=\"ui calendar\" id=\"end_date_calendar\">
      <div class=\"ui fluid input left icon\">
        <i class=\"calendar icon\"></i>
        <input type=\"text\" name=\"end_date\" placeholder=\"YYYY-MM-DD\">
      </div>
    </div>
  </div>

  <div class=\"required field\">
    <label for=\"total_amount\">Total Amount</label>
    <input type=\"number\" step=\"0.01\" id=\"total_amount\" name=\"total_amount\" placeholder=\"0.00\">
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
  \$('#start_date_calendar, #end_date_calendar')
    .calendar({
      onChange: (date, text) => {
        // Where date is the JS object and text is the string representation of the date 
        // Do something
      },
      formatter: {
        date: 'YYYY-MM-DD'
      },
      type: 'date'
    });   
</script>
<script>
/* VALIDATION */
\$(document).ready(function () {
    \$('.ui.form').form({
        fields: {
            user_id: {
                identifier: 'user_id',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the user ID'
                    },
                    {
                        type: 'integer',
                        prompt: 'User ID must be a number'
                    }
                ]
            },
            car_id: {
                identifier: 'car_id',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the car ID'
                    },
                    {
                        type: 'integer',
                        prompt: 'Car ID must be a number'
                    }
                ]
            },
            start_date: {
                identifier: 'start_date',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the start date'
                    }
                ]
            },
            end_date: {
                identifier: 'end_date',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the end date'
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
        return "tr-car-rentals/views/admin/add_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 74,  139 => 73,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/add_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/add_booking.html");
    }
}
