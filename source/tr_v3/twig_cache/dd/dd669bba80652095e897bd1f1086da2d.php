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

/* tr-car-rentals/views/admin/bookings/confirm_booking.html */
class __TwigTemplate_b4689f7eb4fc4df6af2100ef7c8da2d3 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings/confirm_booking.html", 1);
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
    <div class=\"active section\">Confirm Booking (Id: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 9), "html", null, true);
        echo ")</div>
</div>

<h2 class=\"ui header\">Car Rental Booking Confirmation</h2>

<div class=\"ui segment\">
    <h4 class=\"ui dividing header\">Confirm Car Rental Booking</h4>
    
    <form class=\"ui form\" action=\"/framework/admin/car-rentals/confirm-booking/";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 17), "html", null, true);
        echo "\" method=\"POST\">

        <!-- Booking ID -->
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"number\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 22), "html", null, true);
        echo "\" name=\"booking_id\" readonly>
        </div>

        <!-- Confirmed By -->
        <div class=\"required field\">
            <label>Confirmed By (Person Name)</label>
            <input type=\"text\" name=\"confirmed_by\" placeholder=\"Enter your name\" required>
        </div>

        <!-- Payment Reference -->
        <div class=\"field\">
            <label>Payment Reference</label>
            <input type=\"text\" name=\"payment_reference\" placeholder=\"Enter payment reference (optional)\">
        </div>

        <!-- Cashier Payment ID -->
        <div class=\"required field\">
            <label>Cashier Payment ID</label>
            <input type=\"number\" name=\"cashier_payment_id\" placeholder=\"Enter cashier payment ID\">
        </div>

        <!-- Confirmation Date -->
        <div class=\"field\">
            <label>Confirmation Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"confirmation_date\" placeholder=\"Confirmation Date\" readonly value=\"";
        // line 49
        echo twig_escape_filter($this->env, ($context["confirmation_date"] ?? null), "html", null, true);
        echo "\">
                </div>
            </div>
        </div>

        <!-- Confirmation Notes -->
        <div class=\"field\">
            <label>Confirmation Notes</label>
            <textarea name=\"confirmation_notes\" rows=\"3\" placeholder=\"Additional notes about the confirmation for this booking\"></textarea>
        </div>

        <!-- Submit Button -->
        <button type=\"submit\" class=\"ui primary button\">Submit Confirmation</button>
    </form>
</div>
";
    }

    // line 66
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 67
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
            \"confirmed_by\": 'empty',
            \"cashier_payment_id\": 'integer',
            \"confirmation_date\": 'empty',
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings/confirm_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 67,  127 => 66,  107 => 49,  77 => 22,  69 => 17,  58 => 9,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings/confirm_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings/confirm_booking.html");
    }
}
