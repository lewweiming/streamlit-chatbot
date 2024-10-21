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

/* tr-car-rentals/views/user/booking_cancellation.html */
class __TwigTemplate_e693d32d7abc213e7bb57453ab9e57c0 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/user/booking_cancellation.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui large header\">Car Rentals: Cancel Booking</h2>

<!-- BOOKING SUMMARY INSERT HERE -->
<h3 class=\"ui header\">Summary</h3>
<table class=\"ui celled table\">
    <thead>
        <tr>
            <th>Booking Ref</th>
            <th>Pickup Date</th>
            <th>Return Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_ref", [], "any", false, false, false, 18), "html", null, true);
        echo "</td>
            <td>";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "start_date", [], "any", false, false, false, 19), "html", null, true);
        echo "</td>
            <td>";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "end_date", [], "any", false, false, false, 20), "html", null, true);
        echo "</td>
        </tr>
    </tbody>
</table>

<div class=\"ui message\">
    <p>Cancellations will depend on a case by case basis. Once the form has been submitted, it will be reviewed and
        processed within 3 working days. Refunds will be issued depending on circumstance.</p>
    <p>You can view the outcome of your request in \"<a href=\"/customer-support/my-requests\">My Requests</a>\"</p>
</div>

<div class=\"ui top attached header inverted segment\">
    <div class=\"\">Cancellation Form</div>
</div>
<div class=\"ui padded attached segment\">
    <form action=\"/customer-support/new-customer-request\" method=\"post\" class=\"ui form\" id=\"requestForm\">

        <input type=\"hidden\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_ref", [], "any", false, false, false, 37), "html", null, true);
        echo "\" name=\"booking_ref\" />
        <input type=\"hidden\" value=\"car_rentals\" name=\"booking_table\" />
        <input type=\"hidden\" value=\"Car Rental\" name=\"booking_type\" />
        <input type=\"hidden\" value=\"cancellations\" name=\"request_type\" />
        <input type=\"hidden\" value=\"Inquiry about car rental booking cancellation\" name=\"details\" />
        <input type=\"hidden\" name=\"request_info\" id=\"request_info\" />

        <div class=\"field\">
            <label>Reason</label>
            <textarea name=\"reason\" id=\"reason\" placeholder=\"Please provide a reason...\"></textarea>
        </div>

        <div class=\"actions\">
            <a href=\"/modules/car-rentals/bookings-dashboard\" class=\"ui cancel button\">Return to Car Rental Dashboard</a>
            <button type=\"submit\" class=\"ui green button\">Submit Request</button>
        </div>
    </form>
</div>

";
    }

    // line 58
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 59
        echo "<script>
    \$('.ui.calendar')
        .calendar({
            onChange: (date, text) => {
                // Where date is the JS object and text is the string representation of the date 
                // Do something
            },
            // Optional formatter
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
                \"reason\": 'empty',
            }
        });
    }); 
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/user/booking_cancellation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 59,  119 => 58,  95 => 37,  75 => 20,  71 => 19,  67 => 18,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/user/booking_cancellation.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/user/booking_cancellation.html");
    }
}
