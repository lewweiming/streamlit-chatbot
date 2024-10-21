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

/* tr-hotel-bookings/views/admin/bookings_dashboard.html */
class __TwigTemplate_5237f5edbde68428bbe0484c2887b54a extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-hotel-bookings/views/admin/bookings_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Hotel Booking Dashboard</h2>

    <div class=\"ui segment\">
        <h3 class=\"ui header\">Bookings Overview</h3>
        <div>
            <a href=\"/framework/admin/hotel-bookings/add-booking\" class=\"ui primary button\">Add New Booking</a>
        </div>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Guest Name</th>
                    <th>Room</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>HT-301</td>
                    <td>Emily Brown</td>
                    <td>Room 402 (Deluxe)</td>
                    <td>2024-09-25</td>
                    <td>2024-09-28</td>
                    <td><div class=\"ui green label\">Confirmed</div></td>
                    <td>
                        <div class=\"ui buttons\">
                            <button class=\"ui button\">View</button>
                            <button class=\"ui button\">Edit</button>
                            <button class=\"ui button\">Cancel</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>HT-302</td>
                    <td>David Wilson</td>
                    <td>Room 305 (Standard)</td>
                    <td>2024-09-26</td>
                    <td>2024-09-30</td>
                    <td><div class=\"ui yellow label\">Pending</div></td>
                    <td>
                        <div class=\"ui buttons\">
                            <button class=\"ui button\">View</button>
                            <button class=\"ui button\">Edit</button>
                            <button class=\"ui button\">Cancel</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
";
    }

    // line 61
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 62
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
        return "tr-hotel-bookings/views/admin/bookings_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 62,  110 => 61,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/admin/bookings_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/admin/bookings_dashboard.html");
    }
}
