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

/* tr-car-rentals/views/user/booking_modification.html */
class __TwigTemplate_f4e2022a6a7ec00e6939120828cfc37e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/user/booking_modification.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui large header\">Car Rentals: Modify Booking</h2>

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
    <p>Modifications will depend on a case by case basis. Once the form has been submitted, it will be reviewed and
        processed within 3 working days.</p>
    <p>You can view the outcome of your request in \"<a href=\"/customer-support/my-requests\">My Requests</a>\"</p>
</div>

<div class=\"ui top attached header inverted segment\">
    <div class=\"\">Modification Form</div>
</div>
<div class=\"ui padded attached segment\">
    <form action=\"/customer-support/new-customer-request\" method=\"post\" class=\"ui form\" id=\"requestForm\">

        <input type=\"hidden\" value=\"";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_ref", [], "any", false, false, false, 37), "html", null, true);
        echo "\" name=\"booking_ref\" />
        <input type=\"hidden\" value=\"car_rentals\" name=\"booking_table\" />
        <input type=\"hidden\" value=\"Car Rental\" name=\"booking_type\" />
        <input type=\"hidden\" value=\"modifications\" name=\"request_type\" />
        <input type=\"hidden\" value=\"Inquiry about car rental booking modification\" name=\"details\" />
        <input type=\"hidden\" name=\"request_info\" id=\"request_info\" />

        <div class=\"field\">
            <label>Reason</label>
            <textarea name=\"reason\" id=\"reason\" placeholder=\"Please provide a reason...\"></textarea>
        </div>
        <div class=\"field\">
            <label>New Pickup Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"pickup_date\" placeholder=\"Date\" id=\"pickupDateInput\">
                </div>
            </div>
        </div>
        <div class=\"field\">
            <label>New Return Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"return_date\" placeholder=\"Date\" id=\"returnDateInput\">
                </div>
            </div>
        </div>
        <div class=\"actions\">
            <a href=\"/modules/car-rentals/bookings-dashboard\" class=\"ui cancel button\">Return to Car Rental
                Dashboard</a>
            <button type=\"submit\" class=\"ui green button\">Submit Request</button>
        </div>
    </form>
</div>

";
    }

    // line 76
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 77
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
                \"pickup_date\": 'empty',
                \"return_date\": 'empty',
            }
        });
    }); 
</script>
<script>
    /**
     * On submit form create and populate \"request_info\" with summary of new pickup date and new return date before submitting to endpoint
    */

    // Handle form submission
    \$('#requestForm').on('submit', function (e) {

        const pickupDate = \$('#pickupDateInput').val();
        const returnDate = \$('#returnDateInput').val();

        // Create the request summary
        const requestInfo = `New Pickup Date: \${pickupDate}, New Return Date: \${returnDate}`;
        \$('#request_info').val(requestInfo);

        // Allow the form to submit
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/user/booking_modification.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 77,  137 => 76,  95 => 37,  75 => 20,  71 => 19,  67 => 18,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/user/booking_modification.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/user/booking_modification.html");
    }
}
