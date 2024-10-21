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

/* tr-car-rentals/views/welcome.html */
class __TwigTemplate_ce910a79e5603977e94d8ee4e51267c7 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/welcome.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui dividing header\">Welcome to Car Rentals</h2>
<ul>
    <li>
        <a href=\"/modules/car-rentals/available-cars\">Available Cars for Rental</a>
    </li>
    <li>
        <a href=\"/modules/car-rentals/checkout/personal-details\">Checkout (Personal Details)</a>
    </li>
    <li>
        <a href=\"/modules/car-rentals/checkout/review-payment\">Checkout (Review & Payment)</a>
    </li>
    <li>
        <a href=\"/modules/car-rentals/receipt\">Car Rental Receipt (You should only be able to view the receipt in the user dashboard once the booking status is confirmed</a>
    </li>
    
</ul>

<!-- STEPPER -->
<div class=\"ui ordered steps\">
    <div class=\"step\">
        <div class=\"content\">
            <div class=\"title\">Select Car</div>
            <div class=\"description\">Choose your desired car</div>
        </div>
    </div>

    <div class=\"step\">
        <div class=\"content\">
            <div class=\"title\">Add Extras</div>
            <div class=\"description\">Add additional services</div>
        </div>
    </div>
</div>


<div class=\"ui inverted padded segment\">
    <h1 class=\"ui header\">Car Rental Application</h1>
    <form class=\"ui inverted form\">
        <div class=\"field\">
            <label>Select a Car</label>
            <select class=\"ui dropdown\" id=\"carSelect\">
                <option value=\"\">Choose a car</option>
                <option value=\"economy\">Economy</option>
                <option value=\"compact\">Compact</option>
                <option value=\"midsize\">Midsize</option>
                <option value=\"fullsize\">Full Size</option>
                <option value=\"suv\">SUV</option>
            </select>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Pick-up Location</label>
                <select class=\"ui dropdown\" id=\"pickupLocation\">
                    <option value=\"\">Select Pick-up Location</option>
                    <option value=\"changi\">Changi</option>
                    <option value=\"marina_bay\">Marina Bay</option>
                    <option value=\"orchard_road\">Orchard Road</option>
                    <option value=\"sentosa\">Sentosa</option>
                    <option value=\"jurong_east\">Jurong East</option>
                    <option value=\"woodlands\">Woodlands</option>
                    <option value=\"tampines\">Tampines</option>
                    <option value=\"bukit_timah\">Bukit Timah</option>
                    <option value=\"ang_mo_kio\">Ang Mo Kio</option>
                    <option value=\"clementi\">Clementi</option>
                </select>
            </div>
            <div class=\"field\">
                <label>Return Location</label>
                <select class=\"ui dropdown\" id=\"returnLocation\">
                    <option value=\"\">Select Return Location</option>
                    <option value=\"changi\">Changi</option>
                    <option value=\"marina_bay\">Marina Bay</option>
                    <option value=\"orchard_road\">Orchard Road</option>
                    <option value=\"sentosa\">Sentosa</option>
                    <option value=\"jurong_east\">Jurong East</option>
                    <option value=\"woodlands\">Woodlands</option>
                    <option value=\"tampines\">Tampines</option>
                    <option value=\"bukit_timah\">Bukit Timah</option>
                    <option value=\"ang_mo_kio\">Ang Mo Kio</option>
                    <option value=\"clementi\">Clementi</option>
                </select>
            </div>
        </div>


        <div class=\"two fields\">
            <div class=\"field\">
                <label>Pick-Up Date</label>
                <div class=\"ui calendar standard_calendar\">
                    <div class=\"ui fluid input left icon\">
                        <i class=\"calendar icon\"></i>
                        <input id=\"pickupDate\" type=\"text\" placeholder=\"Pick-Up Date\">
                    </div>
                </div>
            </div>

            <div class=\"field\">
                <label>Return Date</label>
                <div class=\"ui calendar standard_calendar\">
                    <div class=\"ui fluid input left icon\">
                        <i class=\"calendar icon\"></i>
                        <input id=\"returnDate\" type=\"text\" placeholder=\"Drop-Off Date\">
                    </div>
                </div>
            </div>
        </div>

        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"insurance\">
                <label>Add Insurance</label>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"gps\">
                <label>Add GPS</label>
            </div>
        </div>
        <button class=\"ui primary button\" type=\"button\" id=\"submitBtn\">Submit Rental</button>
    </form>

</div>
";
    }

    // line 129
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 130
        echo "<script>
    \$(document).ready(function () {
        \$('.ui.dropdown').dropdown();
        \$('.ui.checkbox').checkbox();

        \$('.standard_calendar')
            .calendar({
                onChange: (date, text) => {
                    // Where date is the JS object and text is the string representation of the date 
                    // Do something
                },
                // Optional formatter
                formatter: {
                    date: 'DD/MM/YYYY'
                },
                type: 'date'
            });

        \$('#submitBtn').on('click', function () {

            const carType = \$('#carSelect').val();
            const pickupLocation = \$('#pickupLocation').val();
            const returnLocation = \$('#returnLocation').val();
            const pickupDate = \$('#pickupDate').val();
            const returnDate = \$('#returnDate').val();
            
            const insurance = \$('#insurance').prop('checked');
            const gps = \$('#gps').prop('checked');

            if (!carType || !pickupDate || !returnDate) {
                alert('Please fill in all required fields.');
                return;
            }

            // Construct the URL with query parameters
            const queryParams = {
                carType,
                pickupLocation,
                returnLocation,
                pickupDate,
                returnDate,
                insurance,
                gps
            };

            const queryString = new URLSearchParams(queryParams).toString();
            const url = `/modules/car-rentals/selection?\${queryString}`;

            // Redirect to the new URL
            window.location.href = url;

        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 130,  178 => 129,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/welcome.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/welcome.html");
    }
}
