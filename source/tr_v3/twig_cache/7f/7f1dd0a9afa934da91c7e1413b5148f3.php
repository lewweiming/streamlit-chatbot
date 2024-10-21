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

/* tr-car-rentals/views/admin/bookings_dashboard.html */
class __TwigTemplate_2d455eaea05b4141631dde258e4330d3 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    
    <h2 class=\"ui dividing header\">Car Rental Booking Dashboard</h2>

    <div class=\"ui grid\">
        <div class=\"sixteen wide column\">
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Bookings Overview</h3>
                <div>
                    <a href=\"/framework/admin/car-rentals/add-booking\" class=\"ui primary button\">Add New Booking</a>
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 30
            echo "                        <tr>
                            <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                            <td>User Id: ";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "user_id", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                            <td>Car Id: ";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "car_id", [], "any", false, false, false, 33), "html", null, true);
            echo " / Car Type: ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "car_type", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                            <td>Insurance: ";
            // line 34
            echo (((twig_get_attribute($this->env, $this->source, $context["row"], "insurance", [], "any", false, false, false, 34) == 1)) ? ("True") : ("False"));
            echo " / GPS: ";
            echo (((twig_get_attribute($this->env, $this->source, $context["row"], "gps", [], "any", false, false, false, 34) == 1)) ? ("True") : ("False"));
            echo "</td>
                            <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "start_date", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                            <td>";
            // line 36
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "end_date", [], "any", false, false, false, 36), "html", null, true);
            echo "</td>
                            <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
                            <td>
                                <div class=\"ui buttons\">
                                    <a href=\"/framework/admin/car-rentals/booking-details\" class=\"ui button\">View</a>
                                    <a href=\"/framework/admin/car-rentals/modify-booking\" class=\"ui button\">Modify</a>
                                    <a href=\"/framework/admin/car-rentals/cancel-booking\" class=\"ui button\">Cancel</a>
                                </div>
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
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
</div>
";
    }

    // line 70
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 71
        echo "<script>
    const API_LIST = '/api/list.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            async list() {
                \$.toast({ message: 'Fetching list..' });

                let r = await axios.get(API_LIST)

                if (r.data.message == 'success') {
                    this.rows = r.data.rows
                    \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
                }
            },
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 71,  154 => 70,  129 => 47,  113 => 37,  109 => 36,  105 => 35,  99 => 34,  93 => 33,  89 => 32,  85 => 31,  82 => 30,  78 => 29,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings_dashboard.html");
    }
}
