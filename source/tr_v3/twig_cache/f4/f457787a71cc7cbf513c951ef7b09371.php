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

/* tr-flight-bookings/views/admin/bookings_dashboard.html */
class __TwigTemplate_900d26f2290fbd673103d5cd8194afe6 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-flight-bookings/views/admin/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Flight Booking Dashboard</h2>

    <div class=\"ui segment\">
        <h3 class=\"ui header\">Bookings Overview</h3>
        <div>
            <a href=\"/framework/admin/flight-bookings/add-booking\" class=\"ui primary button\">Add New Booking</a>
        </div>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Passenger Name</th>
                    <th>Flight</th>
                    <th>Seat Class</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 26
            echo "                <tr>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 27), "html", null, true);
            echo "</td>
                    <td>User Id: ";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "customer_id", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>Flight Id: ";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "flight_id", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "seat_class", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "total_amount", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"ui buttons\">
                            <a href=\"/framework/admin/flight-bookings/booking-details\" class=\"ui button\">View</a>
                            <a href=\"/framework/admin/flight-bookings/modify-booking\" class=\"ui button\">Modify</a>
                            <a href=\"/framework/admin/flight-bookings/cancel-booking\" class=\"ui button\">Cancel</a>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                <!-- <tr>
                    <td>FL-201</td>
                    <td>Alice Johnson</td>
                    <td>Flight AI-101</td>
                    <td>2024-09-25</td>
                    <td>2024-09-26</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <div class=\"ui buttons\">
                            <button class=\"ui button\">View</button>
                            <button class=\"ui button\">Edit</button>
                            <button class=\"ui button\">Cancel</button>
                        </div>
                    </td>
                </tr> -->
              
            </tbody>
        </table>
    </div>
</div>
";
    }

    // line 64
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
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
        return "tr-flight-bookings/views/admin/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 65,  141 => 64,  117 => 42,  101 => 32,  97 => 31,  93 => 30,  89 => 29,  85 => 28,  81 => 27,  78 => 26,  74 => 25,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/admin/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/admin/bookings_dashboard.html");
    }
}
