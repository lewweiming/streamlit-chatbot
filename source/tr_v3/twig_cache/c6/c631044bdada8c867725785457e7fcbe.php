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

/* tr-car-rentals/views/admin/bookings/bookings_dashboard.html */
class __TwigTemplate_7a9b5bb8e50732c6aa46f2614bce538d extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">

    <h2 class=\"ui dividing header\">Car Rental Booking Dashboard</h2>

    <div class=\"ui message\">
        <div class=\"header\">
          Notes
        </div>
        <ul>
            <li>Modifications will update the booking status to \"Modified\" and to new values.</li>
            <li>For modifications only certain fields are modifiable.</li>
            <li>Cancellations will update the booking status to \"Cancelled\".</li>
            <li>Confirmations will update the booking status to \"Confirmed\".</li>
            <li>For confirmation, you'll need to provide a valid cashier payment id pointing to a payment made by a user.</li>
        </ul>
      </div>

    <div class=\"ui grid\">
        <div class=\"sixteen wide column\">
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Bookings Overview</h3>
                <!-- TOOLBAR -->
                <div class=\"ui secondary menu\">
                    <div class=\"item\">
                        <div>
                            <a href=\"/framework/admin/car-rentals/add-booking\" class=\"ui primary button\">Add New Booking</a>
                        </div>
                    </div>
                    <div class=\"item\">
                        <div class=\"ui toggle checkbox\">
                            <input @click=\"deleteMode = !deleteMode\" type=\"checkbox\">
                            <label>Toggle delete mode</label>
                        </div>
                    </div>
                </div>
                <table class=\"ui celled table\">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Customer Name</th>
                            <th>Car</th>
                            <th>Addons</th>
                            <th>Pickup Date</th>
                            <th>Return Date</th>
                            <th>Pickup Location</th>
                            <th>Return Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 56
            echo "                        <tr>
                            <td>";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 57), "html", null, true);
            echo "</td>
                            <td>";
            // line 58
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "customer_name", [], "any", false, false, false, 58), "html", null, true);
            echo "</td>
                            <td>Car Id: ";
            // line 59
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "car_id", [], "any", false, false, false, 59), "html", null, true);
            echo " / Car Type: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "car_type", [], "any", false, false, false, 59), "html", null, true);
            echo "</td>
                            <td>Insurance: ";
            // line 60
            echo (((twig_get_attribute($this->env, $this->source, $context["row"], "insurance", [], "any", false, false, false, 60) == 1)) ? ("True") : ("False"));
            echo " / GPS:
                                ";
            // line 61
            echo (((twig_get_attribute($this->env, $this->source, $context["row"], "gps", [], "any", false, false, false, 61) == 1)) ? ("True") : ("False"));
            echo "</td>
                            <td>";
            // line 62
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "start_date", [], "any", false, false, false, 62), "html", null, true);
            echo "</td>
                            <td>";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "end_date", [], "any", false, false, false, 63), "html", null, true);
            echo "</td>
                            <td>";
            // line 64
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "pickup_location", [], "any", false, false, false, 64), "html", null, true);
            echo "</td>
                            <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "return_location", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                            <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 66)), "html", null, true);
            echo "</td>
                            <td>
                                <div class=\"ui buttons\">
                                    <a href=\"/framework/admin/car-rentals/booking-details/";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 69), "html", null, true);
            echo "\" class=\"ui button\">View</a>
                                    ";
            // line 70
            if ((twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 70) != "confirmed")) {
                // line 71
                echo "                                    <a href=\"/framework/admin/car-rentals/confirm-booking/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 71), "html", null, true);
                echo "\" class=\"ui button\">Confirm</a>
                                    ";
            }
            // line 73
            echo "                                    <a href=\"/framework/admin/car-rentals/modify-booking/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 73), "html", null, true);
            echo "\" class=\"ui button\">Modify</a>
                                    ";
            // line 74
            if ((twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 74) != "cancelled")) {
                // line 75
                echo "                                    <a href=\"/framework/admin/car-rentals/cancel-booking/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 75), "html", null, true);
                echo "\" class=\"ui button\">Cancel</a>
                                    ";
            }
            // line 77
            echo "                                    <a x-show=\"deleteMode == true\" href=\"/framework/admin/car-rentals/delete-booking/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 77), "html", null, true);
            echo "\" class=\"ui negative icon button\">
                                    <i class=\"trash icon\"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 84
        echo "                        <!-- <tr>
                            <td>BK-101</td>
                            <td>John Doe</td>
                            <td>Toyota Camry</td>
                            <td>2024-09-23</td>
                            <td>2024-09-30</td>
                            <td><div class=\"ui green label\">Confirmed</div></td>
                            <td>
                                <div class=\"ui buttons\">
                                    <button class=\"ui button\">View</button>
                                    <button class=\"ui button\">Modify</button>
                                    <button class=\"ui button\">Cancel</button>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
";
    }

    // line 107
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 108
        echo "<script>

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            deleteMode: false
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 108,  219 => 107,  194 => 84,  180 => 77,  174 => 75,  172 => 74,  167 => 73,  161 => 71,  159 => 70,  155 => 69,  149 => 66,  145 => 65,  141 => 64,  137 => 63,  133 => 62,  129 => 61,  125 => 60,  119 => 59,  115 => 58,  111 => 57,  108 => 56,  104 => 55,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings/bookings_dashboard.html");
    }
}
