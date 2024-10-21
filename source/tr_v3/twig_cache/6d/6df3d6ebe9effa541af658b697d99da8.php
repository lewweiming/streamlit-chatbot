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

/* tr-car-rentals/views/admin/bookings/cancel_booking.html */
class __TwigTemplate_e6e2feab05cbb902f3b5d6c731a81367 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings/cancel_booking.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/framework/admin\" class=\"section\">Admin Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/framework/admin/car-rentals/bookings-dashboard\" class=\"section\">Car Rentals Booking Dashboard</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Cancel Booking (Id: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 9), "html", null, true);
        echo ")</div>
</div>

<h2 class=\"ui header\">Car Rental Booking Cancellation</h2>

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">Cancel Car Rental Booking</h4>
    <form class=\"ui form\" action=\"/framework/admin/car-rentals/cancel-booking/";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 16), "html", null, true);
        echo "\" method=\"POST\">
        <!-- Booking ID -->
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"number\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 20), "html", null, true);
        echo "\" name=\"booking_id\" placeholder=\"Enter Booking ID\" readonly>
        </div>

        <!-- Cancelled By -->
        <div class=\"field\">
            <label>Cancelled By (Person Name)</label>
            <input type=\"text\" name=\"cancelled_by\" placeholder=\"Enter your name\">
        </div>

        <!-- Cancellation Reason -->
        <div class=\"field\">
            <label>Cancellation Reason</label>
            <textarea name=\"cancellation_reason\" rows=\"3\" placeholder=\"Provide the reason for cancellation\"></textarea>
        </div>

        <!-- Refund Amount -->
        <div class=\"field\">
            <label>Refund Amount</label>
            <input type=\"number\" step=\"0.01\" name=\"refund_amount\" placeholder=\"Enter refund amount\" value=\"0.00\">
        </div>

        <!-- Cancellation Date -->
        <div class=\"field\">
            <label>Cancellation Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"cancellation_date\" placeholder=\"Cancellation Date\" readonly value=\"";
        // line 47
        echo twig_escape_filter($this->env, ($context["cancellation_date"] ?? null), "html", null, true);
        echo "\">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <button type=\"submit\" class=\"ui primary button\">Submit Cancellation</button>
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
    // Initialize calendar
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

    // Form validation
    \$('.ui.form').form({
        fields: {
            \"cancelled_by\": 'empty',
            \"cancellation_reason\": 'empty',
            \"refund_amount\": 'number'
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings/cancel_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 59,  119 => 58,  105 => 47,  75 => 20,  68 => 16,  58 => 9,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings/cancel_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings/cancel_booking.html");
    }
}
