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

/* tr-trip-bookings/views/trip_booking.html */
class __TwigTemplate_fd64c5deb0447b8e8234090f76ef3045 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-trip-bookings/views/trip_booking.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui header\">Book Your Trip/Tour</h2>
    <form class=\"ui form\" id=\"booking-form\">
        <div class=\"field\">
            <label>Full Name</label>
            <input type=\"text\" name=\"full_name\" placeholder=\"Full Name\" required>
        </div>
        <div class=\"field\">
            <label>Email Address</label>
            <input type=\"email\" name=\"email\" placeholder=\"Email Address\" required>
        </div>
        <div class=\"field\">
            <label>Phone Number</label>
            <input type=\"text\" name=\"phone_number\" placeholder=\"Phone Number\">
        </div>
        <div class=\"field\">
            <label>Trip Name</label>
            <input type=\"text\" name=\"trip_name\" id=\"trip-name\" readonly>
        </div>
        <div class=\"field\">
            <label>Total Amount</label>
            <input type=\"text\" name=\"total_amount\" id=\"total-amount\" readonly>
        </div>
        <button class=\"ui primary button\" type=\"submit\">Confirm Booking</button>
    </form>
</div>
";
    }

    // line 32
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "<script>
    // Example of populating trip details based on trip_id from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const tripId = urlParams.get('trip_id');

    // Dummy data for trip
    const tripData = {
        1: { name: \"Trip to Paris\", price: 1200.00 }
    };

    const trip = tripData[tripId];
    if (trip) {
        document.getElementById('trip-name').value = trip.name;
        document.getElementById('total-amount').value = `\$\${trip.price}`;
    }

    document.getElementById('booking-form').addEventListener('submit', function (event) {
        event.preventDefault();
        alert('Booking Confirmed!');
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-trip-bookings/views/trip_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 33,  81 => 32,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/trip_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/trip_booking.html");
    }
}
