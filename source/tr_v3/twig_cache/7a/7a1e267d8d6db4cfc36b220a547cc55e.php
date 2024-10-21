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

/* admin/main.html */
class __TwigTemplate_6a44a13bc25fc57868f8716ce85e4cde extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "admin/main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<!-- CELLED GRID -->
<div class=\"ui celled grid\">
    <div class=\"ui four wide centered column\">
        <div class=\"ui segment\">
          <h2 class=\"ui center aligned header\">Car Rental Manager</h2>
          <img src=\"/assets/icons/businessman.png\" class=\"ui small centered image\" />
          <button data-tooltip=\"This guy will help you handle car rental bookings\" class=\"ui primary button\">Click Me</button>
        </div>
    </div>
    <div class=\"ui four wide centered column\">
        <div class=\"ui segment\">
          <h2 class=\"ui center aligned header\">Flight Bookings Manager</h2>
          <img src=\"/assets/icons/businesswoman.png\" class=\"ui small centered image\" />
          <button data-tooltip=\"This gal will help you handle flight bookings\" class=\"ui primary button\">Click Me</button>
        </div>
    </div>
    <div class=\"ui four wide centered column\">
        <div class=\"ui four wide centered column\">
            <div class=\"ui segment\">
              <h2 class=\"ui center aligned header\">Hotel Bookings Manager</h2>
              <img src=\"/assets/icons/executive.png\" class=\"ui small centered image\" />
              <button data-tooltip=\"This guy will help you handle hotel bookings\" class=\"ui primary button\">Click Me</button>
            </div>
        </div>
    </div>
    <div class=\"ui four wide centered column\">
        <div class=\"ui segment\">
          <h2 class=\"ui center aligned header\">Trip Bookings Manager</h2>
          <img src=\"/assets/icons/worker.png\" class=\"ui small centered image\" />
          <button data-tooltip=\"This gal will help you handle trip bookings\" class=\"ui primary button\">Click Me</button>
        </div>
    </div>
</div>

<div class=\"ui container\">
    <!-- Page Header -->
    <div class=\"ui secondary menu\">
        <h2 class=\"ui header\">Manager/Admin Dashboard</h2>
        <div class=\"right menu\">
            <div class=\"item\">
                <button class=\"ui primary button\">Logout</button>
            </div>
        </div>
    </div>

    <!-- Dashboard Menu -->
    <div class=\"ui four item menu\">
        <a class=\"item active\" data-tab=\"manage-car-rentals\">Manage Car Rentals</a>
        <a class=\"item\" data-tab=\"manage-hotel-bookings\">Manage Hotel Bookings</a>
        <a class=\"item\" data-tab=\"manage-flight-bookings\">Manage Flight Bookings</a>
        <a class=\"item\" data-tab=\"manage-trip-bookings\">Manage Trip Bookings</a>
    </div>

    <!-- Manage Car Rentals Tab -->
    <div class=\"ui tab active\" data-tab=\"manage-car-rentals\">
        <h3 class=\"ui dividing header\">Car Rentals Management</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Car Model</th>
                    <th>User Name</th>
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
                    <td>John Doe</td>
                    <td>3 days</td>
                    <td>Los Angeles</td>
                    <td>San Francisco</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Cancel</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Manage Hotel Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"manage-hotel-bookings\">
        <h3 class=\"ui dividing header\">Hotel Bookings Management</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Hotel Name</th>
                    <th>User Name</th>
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
                    <td>Jane Smith</td>
                    <td>Deluxe</td>
                    <td>2024-10-10</td>
                    <td>2024-10-15</td>
                    <td><div class=\"ui orange label\">Pending</div></td>
                    <td>
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Cancel</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Manage Flight Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"manage-flight-bookings\">
        <h3 class=\"ui dividing header\">Flight Bookings Management</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Flight Number</th>
                    <th>User Name</th>
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
                    <td>Michael Brown</td>
                    <td>New York (JFK)</td>
                    <td>London (LHR)</td>
                    <td>2024-11-01</td>
                    <td><div class=\"ui red label\">Cancelled</div></td>
                    <td>
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Cancel</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- Manage Trip Bookings Tab -->
    <div class=\"ui tab\" data-tab=\"manage-trip-bookings\">
        <h3 class=\"ui dividing header\">Trip Bookings Management</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Trip Name</th>
                    <th>User Name</th>
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
                    <td>Lisa White</td>
                    <td>Arizona, USA</td>
                    <td>2024-12-01</td>
                    <td>2024-12-05</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Cancel</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</div>

</div>
";
    }

    // line 201
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 202
        echo "<script>
    \$('.menu .item').tab();
</script>
";
    }

    public function getTemplateName()
    {
        return "admin/main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 202,  250 => 201,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "admin/main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/admin/main.html");
    }
}
