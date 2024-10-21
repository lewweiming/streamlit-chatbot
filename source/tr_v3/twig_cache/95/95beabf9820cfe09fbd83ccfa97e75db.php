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

/* user-account/dashboard.html */
class __TwigTemplate_d71bfeb06ab2b0bab3f5caa097044c7f extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "user-account/dashboard.html", 1);
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
        <h2 class=\"ui header\">User Account Dashboard</h2>
        <div class=\"right menu\">
            <div class=\"item\">
                <button class=\"ui primary button\">Logout</button>
            </div>
        </div>
    </div>

    <!-- Dashboard Menu -->
    <div class=\"ui four item menu\">
        <a class=\"item active\" data-tab=\"car-rentals\">Car Rentals</a>
        <a class=\"item\" data-tab=\"hotel-bookings\">Hotel Bookings</a>
        <a class=\"item\" data-tab=\"flight-bookings\">Flight Bookings</a>
        <a class=\"item\" data-tab=\"trip-bookings\">Trip Bookings</a>
    </div>

    <!-- Car Rentals Tab -->
    <div class=\"ui tab active\" data-tab=\"car-rentals\">
        <h3 class=\"ui dividing header\">Car Rentals</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Car Model</th>
                    <th>Rental Period</th>
                    <th>Pick-up Location</th>
                    <th>Drop-off Location</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#CR001</td>
                    <td>Toyota Camry</td>
                    <td>3 days</td>
                    <td>Los Angeles</td>
                    <td>San Francisco</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <a href=\"/modules/car-rentals/booking-modification\" class=\"ui button\">Modify</a>
                        <a href=\"/modules/car-rentals/booking-cancellation\" class=\"ui button\">Cancel</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Hotel Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"hotel-bookings\">
        <h3 class=\"ui dividing header\">Hotel Bookings</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Hotel Name</th>
                    <th>Room Type</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#HB001</td>
                    <td>Hilton Garden Inn</td>
                    <td>Deluxe</td>
                    <td>2024-10-10</td>
                    <td>2024-10-15</td>
                    <td><div class=\"ui orange label\">Pending</div></td>
                    <td>
                        <a href=\"/modules/hotel-bookings/booking-modification\" class=\"ui button\">Modify</a>
                        <a href=\"/modules/hotel-bookings/booking-cancellation\" class=\"ui button\">Cancel</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Flight Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"flight-bookings\">
        <h3 class=\"ui dividing header\">Flight Bookings</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Flight Number</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#FB001</td>
                    <td>AA1234</td>
                    <td>New York (JFK)</td>
                    <td>London (LHR)</td>
                    <td>2024-11-01</td>
                    <td><div class=\"ui red label\">Cancelled</div></td>
                    <td>
                        <a href=\"/modules/flight-bookings/booking-modification\" class=\"ui button\">Modify</a>
                        <a href=\"/modules/flight-bookings/booking-cancellation\" class=\"ui button\">Cancel</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Trip Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"trip-bookings\">
        <h3 class=\"ui dividing header\">Trip Bookings</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Trip Name</th>
                    <th>Destination</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#TB001</td>
                    <td>Grand Canyon Adventure</td>
                    <td>Arizona, USA</td>
                    <td>2024-12-01</td>
                    <td>2024-12-05</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <a href=\"/modules/trip-bookings/booking-modification\" class=\"ui button\">Modify</a>
                        <a href=\"/modules/trip-bookings/booking-cancellation\" class=\"ui button\">Cancel</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>
";
    }

    // line 157
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 158
        echo "<script>
    \$('.menu .item').tab();
</script>
";
    }

    public function getTemplateName()
    {
        return "user-account/dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 158,  206 => 157,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user-account/dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/user-account/dashboard.html");
    }
}
