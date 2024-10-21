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

/* tr-flight-bookings/views/welcome.html */
class __TwigTemplate_fbc3ad7c0f37e3a78dc127e7ecbc2a47 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-flight-bookings/views/welcome.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui dividing header\">Welcome to Flight Bookings</h2>

<ul>
    <li>
        <a href=\"/modules/flight-bookings/booking-confirmation\">Booking Confirmation</a>
    </li>
    <li>
        <a href=\"/modules/flight-bookings/flight-search\">Flight Search</a>
    </li>
    <li>
        <a href=\"/modules/flight-bookings/manage-bookings\">Manage Bookings</a>
    </li>
    <li>
        <a href=\"/modules/flight-bookings/checkout\">Checkout</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Personal Details)</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Review & Payment)</a>
    </li>
    <li>
        <a href=\"/modules/flight-bookings/receipt\">Flight Booking Receipt (You should only be able to view the receipt in the user dashboard once the booking status is confirmed</a>
    </li>
</ul>

<!-- STEPPER -->
<div class=\"ui ordered steps\">
    <div class=\"step\">
        <div class=\"content\">
        <div class=\"title\">Select Flight</div>
        <div class=\"description\">Choose your desired flight</div>
        </div>
    </div>

    <div class=\"step\">
        <div class=\"content\">
        <div class=\"title\">Add Extras</div>
        <div class=\"description\">Add additional services</div>
        </div>
    </div>
</div>

<div class=\"ui inverted padded segment\" style=\"padding-top: 20px;\">
    <h1 class=\"ui header\">Flight Booking Application</h1>
    <form class=\"ui inverted form\">
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Departure City</label>
                <select class=\"ui dropdown\" id=\"departureCity\">
                    <option value=\"\">Select Departure City</option>
                    <option value=\"newyork\">New York</option>
                    <option value=\"losangeles\">Los Angeles</option>
                    <option value=\"chicago\">Chicago</option>
                    <option value=\"miami\">Miami</option>
                    <option value=\"sanfrancisco\">San Francisco</option>
                </select>
            </div>
            <div class=\"field\">
                <label>Arrival City</label>
                <select class=\"ui dropdown\" id=\"arrivalCity\">
                    <option value=\"\">Select Arrival City</option>
                    <option value=\"london\">London</option>
                    <option value=\"paris\">Paris</option>
                    <option value=\"tokyo\">Tokyo</option>
                    <option value=\"sydney\">Sydney</option>
                    <option value=\"dubai\">Dubai</option>
                </select>
            </div>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Departure Date</label>
                <div class=\"ui calendar standard_calendar\">
                    <div class=\"ui fluid input left icon\">
                        <i class=\"calendar icon\"></i>
                        <input id=\"departureDate\" type=\"text\">
                    </div>
                </div>
            </div>
            <div class=\"field\">
                <label>Return Date</label>
                <div class=\"ui calendar standard_calendar\">
                    <div class=\"ui fluid input left icon\">
                        <i class=\"calendar icon\"></i>
                        <input id=\"returnDate\" type=\"text\">
                    </div>
                </div>
            </div>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Number of Passengers</label>
                <input type=\"number\" id=\"passengers\" min=\"1\" max=\"10\" value=\"1\">
            </div>
            <div class=\"field\">
                <label>Class</label>
                <select class=\"ui dropdown\" id=\"flightClass\">
                    <option value=\"economy\">Economy</option>
                    <option value=\"business\">Business</option>
                    <option value=\"firstclass\">First Class</option>
                </select>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"directFlight\">
                <label>Direct flights only</label>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"flexibleDates\">
                <label>Flexible dates (+/- 3 days)</label>
            </div>
        </div>
        <button class=\"ui primary button\" type=\"button\" id=\"submitBtn\">Search Flights</button>
    </form>

    <div class=\"ui segment\" id=\"summary\" style=\"display: none;\">
        <h2 class=\"ui header\">Flight Booking Summary</h2>
        <p><strong>Departure:</strong> <span id=\"summaryDeparture\"></span></p>
        <p><strong>Arrival:</strong> <span id=\"summaryArrival\"></span></p>
        <p><strong>Departure Date:</strong> <span id=\"summaryDepartureDate\"></span></p>
        <p><strong>Return Date:</strong> <span id=\"summaryReturnDate\"></span></p>
        <p><strong>Passengers:</strong> <span id=\"summaryPassengers\"></span></p>
        <p><strong>Class:</strong> <span id=\"summaryClass\"></span></p>
        <p><strong>Direct Flight:</strong> <span id=\"summaryDirectFlight\"></span></p>
        <p><strong>Flexible Dates:</strong> <span id=\"summaryFlexibleDates\"></span></p>
        <p><strong>Estimated Price:</strong> \$<span id=\"summaryPrice\"></span></p>
    </div>
</div>
";
    }

    // line 138
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 139
        echo "<script>
    \$(document).ready(function() {
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

        \$('#submitBtn').on('click', function() {

            const departureCity = \$('#departureCity').val();
            const arrivalCity = \$('#arrivalCity').val();
            const departureDate = \$('#departureDate').val();
            const returnDate = \$('#returnDate').val();
            const passengers = \$('#passengers').val();
            const flightClass = \$('#flightClass').val();
            const directFlight = \$('#directFlight').prop('checked');
            const flexibleDates = \$('#flexibleDates').prop('checked');

            if (!departureCity || !arrivalCity || !departureDate || !returnDate || !passengers || !flightClass) {
                alert('Please fill in all required fields.');
                return;
            }

            // Calculate flight duration (simplified)
            // const start = new Date(departureDate);
            // const end = new Date(returnDate);
            // const duration = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

            // // Calculate price (simplified)
            // let basePrice = 500; // Base price for economy class
            // if (flightClass === 'business') basePrice *= 2;
            // if (flightClass === 'firstclass') basePrice *= 3;

            // let totalPrice = basePrice * passengers;
            // if (directFlight) totalPrice *= 1.2; // 20% more for direct flights
            // if (flexibleDates) totalPrice *= 0.9; // 10% discount for flexible dates

            // Update summary
            // \$('#summaryDeparture').text(\$('#departureCity option:selected').text());
            // \$('#summaryArrival').text(\$('#arrivalCity option:selected').text());
            // \$('#summaryDepartureDate').text(departureDate);
            // \$('#summaryReturnDate').text(returnDate);
            // \$('#summaryPassengers').text(passengers);
            // \$('#summaryClass').text(\$('#flightClass option:selected').text());
            // \$('#summaryDirectFlight').text(directFlight ? 'Yes' : 'No');
            // \$('#summaryFlexibleDates').text(flexibleDates ? 'Yes' : 'No');
            // \$('#summaryPrice').text(totalPrice.toFixed(2));

            // Construct the URL with query parameters
            const queryParams = {
                departureCity,
                arrivalCity,
                departureDate,
                returnDate,
                passengers,
                flightClass,
                directFlight,
                flexibleDates
            };   

            const queryString = new URLSearchParams(queryParams).toString();
            const url = `/modules/flight-bookings/selection?\${queryString}`;

            // Redirect to the new URL
            window.location.href = url;
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-flight-bookings/views/welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 139,  187 => 138,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/welcome.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/welcome.html");
    }
}
