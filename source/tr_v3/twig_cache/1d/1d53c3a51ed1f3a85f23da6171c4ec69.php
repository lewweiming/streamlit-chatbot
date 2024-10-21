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

/* tr-trip-bookings/views/welcome.html */
class __TwigTemplate_b298d989ff86349e529cd3223f204ff7 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-trip-bookings/views/welcome.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui dividing header\">Welcome to Trip Bookings</h2>
<ul>

    <li>
        <a href=\"/modules/trip-bookings/available-trips\">Available Trips</a>
    </li>
    <li>
        <a href=\"/modules/trip-bookings/booking-details\">Booking Details</a>
    </li>
    <li>
        <a href=\"/modules/trip-bookings/trip-booking\">Trip Booking</a>
    </li>
    <li>
        <a href=\"/modules/trip-bookings/checkout\">Checkout</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Personal Details)</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Review & Payment)</a>
    </li>
    <li>
        <a href=\"/modules/trip-bookings/receipt\">Trip Booking Receipt (You should only be able to view the receipt in the user dashboard once the booking status is confirmed</a>
    </li>
    
</ul>

<!-- STEPPER -->
<div class=\"ui ordered steps\">
    <div class=\"step\">
        <div class=\"content\">
        <div class=\"title\">Select Trip</div>
        <div class=\"description\">Choose your desired trip</div>
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
    <h1 class=\"ui header\">Trip Booking Application</h1>
    <form class=\"ui inverted form\">
        <div class=\"field\">
            <label>Select a Destination</label>
            <select class=\"ui dropdown\" id=\"destinationSelect\">
                <option value=\"\">Choose a destination</option>
                <option value=\"paris\">Paris, France</option>
                <option value=\"tokyo\">Tokyo, Japan</option>
                <option value=\"newyork\">New York, USA</option>
                <option value=\"sydney\">Sydney, Australia</option>
                <option value=\"rio\">Rio de Janeiro, Brazil</option>
            </select>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Departure Date</label>
                <input type=\"date\" id=\"departureDate\">
            </div>
            <div class=\"field\">
                <label>Return Date</label>
                <input type=\"date\" id=\"returnDate\">
            </div>
        </div>
        <div class=\"field\">
            <label>Number of Travelers</label>
            <input type=\"number\" id=\"travelers\" min=\"1\" max=\"10\" value=\"1\">
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"hotelBooking\">
                <label>Include Hotel Booking</label>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"carRental\">
                <label>Include Car Rental</label>
            </div>
        </div>
        <button class=\"ui primary button\" type=\"button\" id=\"submitBtn\">Book Trip</button>
    </form>
<!-- 
    <div class=\"ui segment\" id=\"summary\" style=\"display: none;\">
        <h2 class=\"ui header\">Booking Summary</h2>
        <p><strong>Destination:</strong> <span id=\"summaryDestination\"></span></p>
        <p><strong>Departure Date:</strong> <span id=\"summaryDepartureDate\"></span></p>
        <p><strong>Return Date:</strong> <span id=\"summaryReturnDate\"></span></p>
        <p><strong>Number of Travelers:</strong> <span id=\"summaryTravelers\"></span></p>
        <p><strong>Hotel Booking:</strong> <span id=\"summaryHotel\"></span></p>
        <p><strong>Car Rental:</strong> <span id=\"summaryCar\"></span></p>
        <p><strong>Total Price:</strong> \$<span id=\"summaryPrice\"></span></p>
    </div> -->
</div>
";
    }

    // line 104
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 105
        echo "<script>
    \$(document).ready(function() {
        \$('.ui.dropdown').dropdown();
        \$('.ui.checkbox').checkbox();

        \$('#submitBtn').on('click', function() {
            const destination = \$('#destinationSelect').val();
            const departureDate = \$('#departureDate').val();
            const returnDate = \$('#returnDate').val();
            const travelers = \$('#travelers').val();
            const hotelBooking = \$('#hotelBooking').prop('checked');
            const carRental = \$('#carRental').prop('checked');

            if (!destination || !departureDate || !returnDate || !travelers) {
                alert('Please fill in all required fields.');
                return;
            }


            // Construct the URL with query parameters
            const queryParams = {
                destination,
                departureDate,
                returnDate,
                travelers,
                hotelBooking,
                carRental
            };

            const queryString = new URLSearchParams(queryParams).toString();
            const url = `/modules/trip-bookings/selection?\${queryString}`;

            // Redirect to the new URL
            window.location.href = url;

            // Calculate trip duration
            // const start = new Date(departureDate);
            // const end = new Date(returnDate);
            // const duration = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

            // // Calculate price (simplified)
            // let basePrice;
            // switch (destination) {
            //     case 'paris': basePrice = 1000; break;
            //     case 'tokyo': basePrice = 1500; break;
            //     case 'newyork': basePrice = 800; break;
            //     case 'sydney': basePrice = 1200; break;
            //     case 'rio': basePrice = 900; break;
            // }

            // let totalPrice = basePrice * travelers;
            // if (hotelBooking) totalPrice += 100 * duration * travelers;
            // if (carRental) totalPrice += 50 * duration;

            // Update summary
            // \$('#summaryDestination').text(\$('#destinationSelect option:selected').text());
            // \$('#summaryDepartureDate').text(departureDate);
            // \$('#summaryReturnDate').text(returnDate);
            // \$('#summaryTravelers').text(travelers);
            // \$('#summaryHotel').text(hotelBooking ? 'Yes' : 'No');
            // \$('#summaryCar').text(carRental ? 'Yes' : 'No');
            // \$('#summaryPrice').text(totalPrice);

            // \$('#summary').show();
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-trip-bookings/views/welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 105,  153 => 104,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/welcome.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/welcome.html");
    }
}
