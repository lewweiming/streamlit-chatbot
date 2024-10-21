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

/* pages/car_rental_user_dashboard.html */
class __TwigTemplate_e6b3c506f68892ff4b598f880428d52e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/car_rental_user_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"ui container\">
    <h2 class=\"ui header\">Car Rental User Dashboard</h2>
    
    <div class=\"ui segment\">
        <h3 class=\"ui header\">Your Bookings</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Car Model</th>
                    <th>Pickup Date</th>
                    <th>Return Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>12345</td>
                    <td>Toyota Camry</td>
                    <td>2024-10-10</td>
                    <td>2024-10-15</td>
                    <td>
                        <button class=\"ui button\" onclick=\"openRequestForm('12345')\">Modify</button>
                        <button class=\"ui red button\" onclick=\"openRequestForm('12345', true)\">Cancel</button>
                    </td>
                </tr>
                <!-- Repeat for more bookings -->
            </tbody>
        </table>
    </div>

    <div class=\"ui modal\" id=\"requestModal\">
        <div class=\"header\">Modify/Cancel Booking</div>
        <div class=\"content\">
            <form class=\"ui form\" id=\"requestForm\">
                <div class=\"field\">
                    <label>Booking ID</label>
                    <input type=\"text\" name=\"bookingId\" id=\"bookingId\" readonly>
                </div>
                <div class=\"field\">
                    <label>Reason</label>
                    <textarea name=\"reason\" id=\"reason\" placeholder=\"Please provide a reason...\"></textarea>
                </div>
                <div class=\"field\">
                    <label>New Pickup Date (if modifying)</label>
                    <input type=\"date\" name=\"newPickupDate\" id=\"newPickupDate\">
                </div>
                <div class=\"field\">
                    <label>New Return Date (if modifying)</label>
                    <input type=\"date\" name=\"newReturnDate\" id=\"newReturnDate\">
                </div>
                <div class=\"actions\">
                    <div class=\"ui cancel red button\">Cancel</div>
                    <button type=\"submit\" class=\"ui green button\">Submit Request</button>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    // line 66
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 67
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

<script>
    function openRequestForm(bookingId, isCancel = false) {
        \$('#bookingId').val(bookingId);
        \$('#newPickupDate').val('');
        \$('#newReturnDate').val('');
        \$('#reason').val('');
        \$('#requestModal').modal('show');

        if (isCancel) {
            \$('#requestForm').find('input[type=\"date\"]').val(''); // Reset date fields
            \$('#requestForm').find('input[type=\"date\"]').prop('required', false);
        } else {
            \$('#requestForm').find('input[type=\"date\"]').prop('required', true);
        }
    }

    \$('.ui.modal').modal({
        onApprove: function() {
            // Handle form submission logic here
            const formData = \$('#requestForm').serialize();
            console.log(formData);
            alert('Request submitted!');
            return false; // Prevent page reload
        }
    });

    \$('.ui.cancel.button').on('click', function() {
        \$('#requestModal').modal('hide');
    });
</script>

";
    }

    public function getTemplateName()
    {
        return "pages/car_rental_user_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 67,  115 => 66,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/car_rental_user_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/car_rental_user_dashboard.html");
    }
}
