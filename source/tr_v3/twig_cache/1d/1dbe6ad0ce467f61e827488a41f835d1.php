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

/* tr-car-rentals/views/admin/bookings/modify_booking.html */
class __TwigTemplate_746d9cd6c450ef6b439d16bbf161039b extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/bookings/modify_booking.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
    <a href=\"/framework/admin\" class=\"section\">Admin Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/framework/admin/car-rentals/bookings-dashboard\" class=\"section\">Car Rentals Booking Dashboard</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Modify Booking (Id: ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 9), "html", null, true);
        echo ")</div>
</div>

<h2 class=\"ui header\">Car Rental Booking Modifications</h2>

<!-- SHOW EXISTING MODIFICATIONS FOR THIS BOOKING -->
<table class=\"ui celled table\">
    <thead>
      <tr>
        <th>Modification ID</th>
        <th>Booking ID</th>
        <th>Modified By</th>
        <th>Previous Start Date</th>
        <th>Previous End Date</th>
        <th>New Start Date</th>
        <th>New End Date</th>
        <th>Modification Reason</th>
        <th>Modification Date</th>
      </tr>
    </thead>
    <tbody>
    ";
        // line 30
        if ((twig_length_filter($this->env, ($context["modifications"] ?? null)) == 0)) {
            // line 31
            echo "    <tr>
        <td colspan=\"9\">No modifications for this booking.</td>
    </tr>
    ";
        }
        // line 35
        echo "      ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modifications"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["modification"]) {
            // line 36
            echo "      <tr>
        <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "modification_id", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
        <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "booking_id", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
        <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "modified_by", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
        <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "previous_start_date", [], "any", false, false, false, 40), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "previous_end_date", [], "any", false, false, false, 41), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "new_start_date", [], "any", false, false, false, 42), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "new_end_date", [], "any", false, false, false, 43), "Y-m-d"), "html", null, true);
            echo "</td>
        <td>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "modification_reason", [], "any", false, false, false, 44), "html", null, true);
            echo "</td>
        <td>";
            // line 45
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["modification"], "modification_date", [], "any", false, false, false, 45), "Y-m-d H:i:s"), "html", null, true);
            echo "</td>
      </tr>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['modification'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "    </tbody>
  </table>
  

<!-- MODIFICATION FORM TO BE SUBMITTED -->
<div class=\"ui segment\">
    <h2 class=\"ui dividing header\">Car Rental Booking Modification Submission Form</h2>
    <form class=\"ui form\" action=\"/framework/admin/car-rentals/modify-booking/";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 55), "html", null, true);
        echo "\" method=\"POST\">
        <!-- Booking ID -->
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"number\" value=\"";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "booking_id", [], "any", false, false, false, 59), "html", null, true);
        echo "\" name=\"booking_id\" placeholder=\"Enter Booking ID\"
                readonly>
        </div>

        <!-- Modified By -->
        <div class=\"field\">
            <label>Modified By (Person Name)</label>
            <input type=\"text\" name=\"modified_by\" placeholder=\"Name of the person modifying the booking\">
        </div>

        <!-- Previous Start Date -->
        <div class=\"field\">
            <label>Previous Start Date</label>
            <input type=\"date\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "start_date", [], "any", false, false, false, 72), "html", null, true);
        echo "\" name=\"previous_start_date\" readonly>
        </div>

        <!-- Previous End Date -->
        <div class=\"field\">
            <label>Previous End Date</label>
            <input type=\"date\" value=\"";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["booking"] ?? null), "end_date", [], "any", false, false, false, 78), "html", null, true);
        echo "\" name=\"previous_end_date\" readonly>
        </div>

        <!-- New Start Date -->
        <div class=\"field\">
            <label>New Start Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"new_start_date\" placeholder=\"Date\">
                </div>
            </div>
        </div>

        <!-- New End Date -->
        <div class=\"field\">
            <label>New End Date</label>
            <div class=\"ui calendar\">
                <div class=\"ui fluid input left icon\">
                    <i class=\"calendar icon\"></i>
                    <input type=\"text\" name=\"new_end_date\" placeholder=\"Date\">
                </div>
            </div>
        </div>

        <!-- Modification Reason -->
        <div class=\"field\">
            <label>Modification Reason</label>
            <textarea name=\"modification_reason\" rows=\"3\" placeholder=\"Provide the reason for modification\"></textarea>
        </div>

        <!-- Submit Button -->
        <button type=\"submit\" class=\"ui primary button\">Submit Modification</button>
    </form>
</div>
";
    }

    // line 115
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 116
        echo "<script>
    \$('.ui.calendar')
        .calendar({
            onChange: (date, text) => {
                // Where date is the JS object and text is the string representation of the date 
                // Do something
            },
            // Optional formatter
            formatter: {
                date: 'YYYY-MM-DD'
            },
            type: 'date'
        });

    \$('.ui.form').form({
        fields: {
            \"new_start_date\": 'empty',
            \"new_end_date\": 'empty',
            \"modification_reason\": 'empty'
        }
    });

</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/bookings/modify_booking.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 116,  220 => 115,  180 => 78,  171 => 72,  155 => 59,  148 => 55,  139 => 48,  130 => 45,  126 => 44,  122 => 43,  118 => 42,  114 => 41,  110 => 40,  106 => 39,  102 => 38,  98 => 37,  95 => 36,  90 => 35,  84 => 31,  82 => 30,  58 => 9,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/bookings/modify_booking.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/bookings/modify_booking.html");
    }
}
