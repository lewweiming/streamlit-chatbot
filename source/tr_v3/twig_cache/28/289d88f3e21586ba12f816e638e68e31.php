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

/* parts/navbar.html */
class __TwigTemplate_b6e3029e890f1aa10aeea731c9b45db3 extends Template
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
            echo "<div class=\"ui centered inverted message\" style=\"margin: 0; border: none; background-color: #2675db; border-radius: 0px;\">
    <div class=\"header\">
      Current Phase 2: Checkout. Next Phase: Car Rental Inventory, Trip Inventory, Hotel Inventory, Flight Inventory, Misc Modules Porting
    </div>
</div>

<div class=\"ui borderless menu\" style=\"margin: 0; border-top: none; border-bottom: none;\">
    <!-- Left Section: Search Bar -->
     <div class=\"left menu\">
        <div class=\"item\">
            <i class=\"home icon\"></i>
          </div>
        <div class=\"item\">
            <i class=\"search icon\"></i>
          </div>
    </div>

    <!-- Center Section: Logo -->
    <a href=\"/\" class=\"header item\"><h2><strong>TRAVEL<em>GO</em>WHERE</strong></h2></a>

    <!-- Right Section: Icons -->
    <div class=\"right menu\">
      <a href=\"/modules/shop/cart\" class=\"item\">
        <i class=\"shopping cart icon\"></i>
      </a>
      <div class=\"item\">
        <i class=\"user icon\"></i>
      </div>
    </div>
  </div>

<div class=\"ui wrapping massive borderless fluid centered menu\" style=\"border-radius: 0; border-bottom: none; box-shadow: none; margin: 0;\">
    <a href=\"/\" class=\"item\">Users</a>
    <a href=\"/chatbot\" class=\"item\">Chatbot</a>
    <a href=\"/forum/threads\" class=\"item\">Forum</a>
    <a href=\"/discussion-board\" class=\"item\">Discussion Board</a>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Work Orders
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/work-orders\" class=\"item\">View all Work Orders</a>
        </div>
    </div>
    

        <div class=\"ui dropdown inverted item\" tabindex=\"0\">
            User Account
            <i class=\"dropdown icon\"></i>
            <div class=\"menu\" tabindex=\"-1\">
                <div class=\"header\">Dashboards</div>
                <a data-tooltip=\"View and manage your customer requests\" href=\"/customer-support/my-requests\" class=\"item\">My Requests</a>
                <a data-tooltip=\"View and manage car rentals\" href=\"/modules/car-rentals/bookings-dashboard\" class=\"item\">Car Rentals</a>
                <a data-tooltip=\"View and manage flight bookings\" href=\"/modules/flight-bookings/bookings-dashboard\" class=\"item\">Flight Bookings</a>
                <a data-tooltip=\"View and manage hotel bookings\" href=\"/modules/hotel-bookings/bookings-dashboard\" class=\"item\">Hotel Bookings</a>
                <a data-tooltip=\"View and manage trip bookings\" href=\"/modules/trip-bookings/bookings-dashboard\" class=\"item\">Trip Bookings</a>
                <a data-tooltip=\"View and manage shop orders\" href=\"/modules/shop/orders-dashboard\" class=\"item\">Shop Orders</a>
            </div>
        </div>
        ";
            // line 59
            if ((($context["isUser"] ?? null) == true)) {
                // line 60
                echo "        <div class=\"ui dropdown item\" tabindex=\"1\">
            Signed in as ";
                // line 61
                echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
                echo "
            <i class=\"dropdown icon\"></i>
            <div class=\"menu\" tabindex=\"-1\">
                <a class=\"item\" href=\"/user/my-profile\">My Profile</a>
                <a class=\"item\" href=\"/user/my-inbox\">My Inbox</a>
                <div class=\"divider\"></div>
                <div class=\"header\">My Account</div>
                <a href='/user/password/change' class=\"item\">Change Password</a>
                <a href='/user/username/change' class=\"item\">Change Username</a>
                <a href='/user/email/change' class=\"item\">Change Email</a>
                <div class=\"divider\"></div>
                <a href=\"/logout\" class=\"item\">Logout</a>
            </div>
        </div>
        ";
            } else {
                // line 76
                echo "        <a href=\"/login\" class=\"item\">Login</a>
        <a href=\"/register\" class=\"item\">Register</a>
        ";
            }
            // line 79
            echo "
    
</div>

<!-- SECONDARY MENU -->
<div class=\"ui large centered fluid menu\" style=\"border-radius: 0; box-shadow: none; margin-top: 0;\">
    <a href=\"/modules/car-rentals\" class=\"item\">
        <img class=\"ui mini spaced image\" src=\"/assets/icons/car.png\" >
        <span>Car Rentals</span></a>
    <a href=\"/modules/flight-bookings\" class=\"item\">
        <img class=\"ui mini spaced image\" src=\"/assets/icons/airplane.png\" >
        <span>Flight Bookings</span></a>
    <a href=\"/modules/hotel-bookings\" class=\"item\">
        <img class=\"ui mini spaced image\" src=\"/assets/icons/hotel.png\" >
        <span>Hotel Bookings</span>
    </a>
    <a href=\"/modules/trip-bookings\" class=\"item\">
        <img class=\"ui mini spaced image\" src=\"/assets/icons/road-sign.png\" >
        <span>Trip Bookings</span>
    </a>
    <a href=\"/modules/shop\" class=\"item\">
        <img class=\"ui mini spaced image\" src=\"/assets/icons/shopping-bag.png\" >
        <span>Shop</span>
    </a>
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
        return "parts/navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 79,  122 => 76,  104 => 61,  101 => 60,  99 => 59,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parts/navbar.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/parts/navbar.html");
    }
}
