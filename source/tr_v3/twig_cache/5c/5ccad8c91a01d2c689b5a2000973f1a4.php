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

/* tr-trip-bookings/views/admin/bookings_dashboard.html */
class __TwigTemplate_a2c8ef9249735da668fa8c846f1dae53 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-trip-bookings/views/admin/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Trip Booking Dashboard</h2>

    <div class=\"ui segment\">
        <h3 class=\"ui header\">Bookings Overview</h3>
        <div>
            <a href=\"/framework/admin/trip-bookings/add-booking\" class=\"ui primary button\">Add New Booking</a>
        </div>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Traveler Name</th>
                    <th>Trip Package</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 27
            echo "                <tr>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "booking_id", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>Customer Id: ";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "customer_id", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                    <td>Trip Id: ";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "trip_id", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "start_date", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "end_date", [], "any", false, false, false, 32), "html", null, true);
            echo "</td>
                    <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "total_amount", [], "any", false, false, false, 33), "html", null, true);
            echo "</td>
                    <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "status", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                    <td>
                        <div class=\"ui buttons\">
                            <a href=\"/framework/admin/trip-bookings/booking-details\" class=\"ui button\">View</a>
                            <a href=\"/framework/admin/trip-bookings/modify-booking\" class=\"ui button\">Modify</a>
                            <a href=\"/framework/admin/trip-bookings/cancel-booking\" class=\"ui button\">Cancel</a>
                        </div>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "                <!-- <tr>
                    <td>TR-501</td>
                    <td>Susan Miller</td>
                    <td>European Adventure</td>
                    <td>2024-10-10</td>
                    <td>2024-10-20</td>
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

    // line 65
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
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
        return "tr-trip-bookings/views/admin/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 66,  145 => 65,  122 => 44,  106 => 34,  102 => 33,  98 => 32,  94 => 31,  90 => 30,  86 => 29,  82 => 28,  79 => 27,  75 => 26,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/admin/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/admin/bookings_dashboard.html");
    }
}
