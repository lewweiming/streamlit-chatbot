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

/* tr-hotel-bookings/views/welcome.html */
class __TwigTemplate_687d5e74f551ae091b5560581249e1b9 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/welcome.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui dividing header\">Welcome to Hotel Bookings</h2>
<ul>

    <li>
        <a href=\"/modules/hotel-bookings/available-rooms\">Available Rooms</a>
    </li>
    <li>
        <a href=\"/modules/hotel-bookings/book-room\">Book Room</a>
    </li>
    <li>
        <a href=\"/modules/hotel-bookings/booking-details\">Booking Details</a>
    </li>
    <li>
        <a href=\"/modules/hotel-bookings/modify-booking\">Modify Booking</a>
    </li>
    <li>
        <a href=\"/modules/hotel-bookings/checkout\">Checkout</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Personal Details)</a>
    </li>
    <li>
        <a href=\"#\">Checkout (Review & Payment)</a>
    </li>
    <li>
        <a href=\"/modules/hotel-bookings/receipt\">Hotel Booking Receipt (You should only be able to view the receipt in the user dashboard once the booking status is confirmed</a>
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

<div class=\"ui inverted padded segment\" style=\"padding-top: 20px;\">
    <h1 class=\"ui header\">Hotel Booking Application</h1>
    <form class=\"ui inverted form\">
        <div class=\"field\">
            <label>Select a Hotel</label>
            <select class=\"ui dropdown\" id=\"hotelSelect\">
                <option value=\"\">Choose a hotel</option>
                <option value=\"grandluxe\">Grand Luxe Hotel</option>
                <option value=\"seasideresort\">Seaside Resort</option>
                <option value=\"mountainretreat\">Mountain Retreat</option>
                <option value=\"citycenter\">City Center Inn</option>
                <option value=\"historicmanor\">Historic Manor</option>
            </select>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Check-in Date</label>
                <input type=\"date\" id=\"checkInDate\">
            </div>
            <div class=\"field\">
                <label>Check-out Date</label>
                <input type=\"date\" id=\"checkOutDate\">
            </div>
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Number of Guests</label>
                <input type=\"number\" id=\"guests\" min=\"1\" max=\"4\" value=\"1\">
            </div>
            <div class=\"field\">
                <label>Room Type</label>
                <select class=\"ui dropdown\" id=\"roomType\">
                    <option value=\"standard\">Standard</option>
                    <option value=\"deluxe\">Deluxe</option>
                    <option value=\"suite\">Suite</option>
                </select>
            </div>
        </div>
        <div class=\"field\">
            <label>Additional Amenities</label>
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"breakfast\">
                <label>Breakfast</label>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"parking\">
                <label>Parking</label>
            </div>
        </div>
        <div class=\"field\">
            <div class=\"ui checkbox\">
                <input type=\"checkbox\" id=\"wifi\">
                <label>Wi-Fi</label>
            </div>
        </div>
        <button class=\"ui primary button\" type=\"button\" id=\"submitBtn\">Book Now</button>
    </form>
<!-- 
    <div class=\"ui segment\" id=\"summary\" style=\"display: none;\">
        <h2 class=\"ui header\">Booking Summary</h2>
        <p><strong>Hotel:</strong> <span id=\"summaryHotel\"></span></p>
        <p><strong>Check-in Date:</strong> <span id=\"summaryCheckIn\"></span></p>
        <p><strong>Check-out Date:</strong> <span id=\"summaryCheckOut\"></span></p>
        <p><strong>Number of Guests:</strong> <span id=\"summaryGuests\"></span></p>
        <p><strong>Room Type:</strong> <span id=\"summaryRoomType\"></span></p>
        <p><strong>Amenities:</strong> <span id=\"summaryAmenities\"></span></p>
        <p><strong>Total Price:</strong> \$<span id=\"summaryPrice\"></span></p>
    </div> -->
</div>
";
    }

    // line 123
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 124
        echo "<script>
    \$(document).ready(function() {
        \$('.ui.dropdown').dropdown();
        \$('.ui.checkbox').checkbox();

        \$('#submitBtn').on('click', function() {
            const hotel = \$('#hotelSelect').val();
            const checkInDate = \$('#checkInDate').val();
            const checkOutDate = \$('#checkOutDate').val();
            const guests = \$('#guests').val();
            const roomType = \$('#roomType').val();
            const breakfast = \$('#breakfast').prop('checked');
            const parking = \$('#parking').prop('checked');
            const wifi = \$('#wifi').prop('checked');

            if (!hotel || !checkInDate || !checkOutDate || !guests || !roomType) {
                alert('Please fill in all required fields.');
                return;
            }

            // Construct the URL with query parameters
            const queryParams = {
                
                hotel,
                checkInDate,
                checkOutDate,
                guests,
                roomType,
                breakfast,
                parking,
                wifi
            };

            const queryString = new URLSearchParams(queryParams).toString();
            const url = `/modules/hotel-bookings/selection?\${queryString}`;

            // Redirect to the new URL
            window.location.href = url;

            // Calculate stay duration
            // const start = new Date(checkInDate);
            // const end = new Date(checkOutDate);
            // const duration = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

            // Calculate price (simplified)
            // let basePrice;
            // switch (hotel) {
            //     case 'grandluxe': basePrice = 200; break;
            //     case 'seasideresort': basePrice = 180; break;
            //     case 'mountainretreat': basePrice = 150; break;
            //     case 'citycenter': basePrice = 120; break;
            //     case 'historicmanor': basePrice = 160; break;
            // }

            // let roomMultiplier;
            // switch (roomType) {
            //     case 'standard': roomMultiplier = 1; break;
            //     case 'deluxe': roomMultiplier = 1.5; break;
            //     case 'suite': roomMultiplier = 2; break;
            // }

            // let totalPrice = basePrice * duration * roomMultiplier;
            // if (breakfast) totalPrice += 15 * guests * duration;
            // if (parking) totalPrice += 10 * duration;
            // if (wifi) totalPrice += 5 * duration;

            // Update summary
            // \$('#summaryHotel').text(\$('#hotelSelect option:selected').text());
            // \$('#summaryCheckIn').text(checkInDate);
            // \$('#summaryCheckOut').text(checkOutDate);
            // \$('#summaryGuests').text(guests);
            // \$('#summaryRoomType').text(\$('#roomType option:selected').text());
            
            // let amenities = [];
            // if (breakfast) amenities.push('Breakfast');
            // if (parking) amenities.push('Parking');
            // if (wifi) amenities.push('Wi-Fi');
            // \$('#summaryAmenities').text(amenities.join(', ') || 'None');
            
            // \$('#summaryPrice').text(totalPrice.toFixed(2));
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-hotel-bookings/views/welcome.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 124,  172 => 123,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/welcome.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/welcome.html");
    }
}
