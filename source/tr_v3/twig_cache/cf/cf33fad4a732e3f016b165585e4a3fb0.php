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

/* parts/navbar_admin.html */
class __TwigTemplate_6dd4c28c9088ec2725f518c8427f9880 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "<div id=\"primaryMenuBar\" class=\"ui inverted wrapping menu\" style=\"border-radius: 0; border-bottom: 0px; box-shadow: none; margin-bottom: 0px;\">
    <a href=\"/\" class=\"header item\">Travelgowhere V3 Admin</a>
    <a href=\"/framework/admin/articles\" class=\"item\">Manage Articles</a>
    <a href=\"/framework/admin/users\" class=\"item\">Manage Users</a>
    <a href=\"/framework/admin/user-inbox\" class=\"item\">User Inbox</a>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Documentation
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/documentation/car-rental-docsify\" class=\"item\">Car Rental Docsify</a>
            <a href=\"/documentation/flight-booking-docsify\" class=\"item\">Flight Booking Docsify</a>
            <a href=\"/documentation/hotel-booking-docsify\" class=\"item\">Hotel Booking Docsify</a>
            <a href=\"/documentation/trip-booking-docsify\" class=\"item\">Trip Booking Docsify</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Dev Tools
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/vendor/adminer/adminer_x2f.php\" class=\"item\">Adminer</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Modules
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/framework/admin/module-manager\" class=\"item\">Module Manager</a>
            <a href=\"/framework/admin/database\" class=\"item\">Database</a>
            <a href=\"/framework/admin/file-searcher\" class=\"item\">File Searcher</a>
            <a href=\"/framework/admin/support-tickets\" class=\"item\">Support Tickets</a>
            <a href=\"/framework/admin/blog\" class=\"item\">Blog</a>
            <a href=\"/framework/admin/work-orders\" class=\"item\">Work Orders</a>
            <a href=\"/framework/admin/discussion-board\" class=\"item\">Discussion Board</a>
            <a data-tooltip=\"A travel api provider\" href=\"/framework/admin/amadeus/main\" class=\"item\">Amadeus</a>
            <div class=\"item nested dropdown\">
                Email
                <i class=\"dropdown icon\"></i>
                <div class=\"menu\">
                    <a href=\"/framework/admin/email/send\" class=\"item\">Send</a>
                    <a href=\"/framework/admin/email/debug\" class=\"item\">Debug</a>
                    <a href=\"/framework/admin/email/templates\" class=\"item\">Templates</a>
                </div>
            </div>
        </div>
    </div>
    <div class=\"right menu\">
        <div class=\"item\">
            <div class=\"ui transparent inverted icon input\">
                <i class=\"search icon\"></i>
                <input type=\"text\" placeholder=\"Search\">
            </div>
        </div>
        <a href=\"/\" class=\"item\">Home</a>
        ";
            // line 54
            if ((($context["isUser"] ?? null) == true)) {
                // line 55
                echo "        <a class=\"item\">Signed In</a>
        ";
            } else {
                // line 57
                echo "        <a href=\"/login\" class=\"item\">Login</a>
        <a href=\"/register\" class=\"item\">Register</a>
        ";
            }
            // line 60
            echo "        
    </div>
</div>

<!-- SECONDARY -->
<div id=\"secondaryMenuBar\" class=\"ui white wrapping menu\" style=\"border-radius: 0; box-shadow: none; margin-top: 0px;\">
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        Car Rentals
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a data-tooltip=\"Cars Data from V1 Website\" href=\"/framework/admin/car-rentals/cars-data/main\" class=\"item\">Cars Data</a>
            <a data-tooltip=\"Cars Dashboard\" href=\"/framework/admin/car-rentals/cars-dashboard\" class=\"item\">Cars Dashboard</a>
            <a data-tooltip=\"View receipts for car rentals\" href=\"/framework/admin/car-rentals/receipts\" class=\"item\">Receipts</a>
            <a data-tooltip=\"View and manage current bookings\" href=\"/framework/admin/car-rentals/bookings-dashboard\" class=\"item\">Bookings Dashboard</a>
            <a data-tooltip=\"Booking and fleet reports (graphical or table-based)\" href=\"/framework/admin/car-rentals/reports\" class=\"item\">Reports</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        Flight Bookings
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a data-tooltip=\"Flights Dashboard\" href=\"/framework/admin/flight-bookings/flights-dashboard\" class=\"item\">Flights Dashboard</a>
            <a data-tooltip=\"View and manage current bookings\" href=\"/framework/admin/flight-bookings/bookings-dashboard\" class=\"item\">Bookings Dashboard</a>
            <a data-tooltip=\"Booking and fleet reports (graphical or table-based)\" href=\"/framework/admin/flight-bookings/reports\" class=\"item\">Reports</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        Hotel Bookings
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a data-tooltip=\"Hotels Data from V1 Website\" href=\"/framework/admin/hotel-bookings/hotels-data/main\" class=\"item\">Hotels Data</a>
            <a data-tooltip=\"Rooms Data from V1 Website\" href=\"/framework/admin/hotel-bookings/rooms-data/main\" class=\"item\">Rooms Data</a>
            <a data-tooltip=\"Hotels Dashboard\" href=\"/framework/admin/hotel-bookings/hotels-dashboard\" class=\"item\">Hotels Dashboard</a>
            <a data-tooltip=\"View and manage current bookings\" href=\"/framework/admin/hotel-bookings/bookings-dashboard\" class=\"item\">Bookings Dashboard</a>
            <a data-tooltip=\"Booking and fleet reports (graphical or table-based)\" href=\"/framework/admin/hotel-bookings/reports\" class=\"item\">Reports</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        Trip Bookings
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a data-tooltip=\"Trips Data from V1 Website\" href=\"/framework/admin/trip-bookings/trips-data/main\" class=\"item\">Trips Data</a>
            <a data-tooltip=\"Trips Dashboard\" href=\"/framework/admin/trip-bookings/trips-dashboard\" class=\"item\">Trips Dashboard</a>
            <a data-tooltip=\"View and manage current bookings\" href=\"/framework/admin/trip-bookings/bookings-dashboard\" class=\"item\">Bookings Dashboard</a>
            <a data-tooltip=\"Booking and fleet reports (graphical or table-based)\" href=\"/framework/admin/trip-bookings/reports\" class=\"item\">Reports</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        Shop
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a data-tooltip=\"Shop Inventory Data from V1 Website\" href=\"/framework/admin/shop/inventory/main\" class=\"item\">Shop Inventory Data</a>
            <a data-tooltip=\"View and manage current orders\" href=\"/framework/admin/shop/orders-dashboard\" class=\"item\">Orders Dashboard</a>
        </div>
    </div>
    <div class=\"ui dropdown item\" tabindex=\"0\" >
        More
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/framework/admin/cashier\" class=\"item\">Cashier</a>
            <a href=\"/framework/admin/customer-support/dashboard\" class=\"item\">Customer Requests Dashboard</a>
            <div class=\"divider\"></div>
            <a href=\"/framework/admin/dashboard-apps\" class=\"item\">View Dashboard Apps</a>
        </div>
    </div>
    
</div>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    public function getTemplateName()
    {
        return "parts/navbar_admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 60,  100 => 57,  96 => 55,  94 => 54,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parts/navbar_admin.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/parts/navbar_admin.html");
    }
}
