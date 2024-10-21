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

/* tr-hotel-bookings/views/checkout.html */
class __TwigTemplate_8b52bd549dda128fab141b1b51e54531 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/checkout.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">
  <div class=\"ui container segment\">
    <h2 class=\"ui dividing header\">Hotel Booking Checkout</h2>

    <form method=\"post\" action=\"/modules/hotel-bookings/checkout\" class=\"ui form\">
      <!-- Booking Details -->
      <h4 class=\"ui dividing header\">Booking Details</h4>
      <div class=\"two fields\">
        <div class=\"field\">
          <label>Check-In Date</label>
          <div class=\"ui calendar standard_calendar\">
            <div class=\"ui fluid input left icon\">
              <i class=\"calendar icon\"></i>
              <input name=\"checkin-date\" type=\"text\" placeholder=\"Check-In Date\">
            </div>
          </div>
        </div>

        <div class=\"field\">
          <label>Check-Out Date</label>
          <div class=\"ui calendar standard_calendar\">
            <div class=\"ui fluid input left icon\">
              <i class=\"calendar icon\"></i>
              <input name=\"checkout-date\" type=\"text\" placeholder=\"Check-Out Date\">
            </div>
          </div>
        </div>
      </div>

      <!-- Room Details -->
      <h4 class=\"ui dividing header\">Room Details</h4>
      <div class=\"field\">
        <label>Selected Room Type</label>
        <select x-model=\"input.selectedRoom\" name=\"room\" class=\"ui selection dropdown\">
          <option value=''>Select Room Type</option>
          <option>Single Room</option>
          <option>Double Room</option>
          <option>Suite</option>
          <option>Family Room</option>
        </select>
      </div>
      <div class=\"field\">
        <label>Number of Guests</label>
        <input x-model=\"input.guests\" type=\"number\" name=\"guests\" placeholder=\"Number of Guests\" min=\"1\">
      </div>

      <!-- Customer Details -->
      <h4 class=\"ui dividing header\">Customer Information</h4>
      <div class=\"field\">
        <label>Full Name</label>
        <input x-model=\"input.fullName\" type=\"text\" name=\"name\" placeholder=\"Full Name\">
      </div>
      <div class=\"field\">
        <label>Email</label>
        <input x-model=\"input.email\" type=\"email\" name=\"email\" placeholder=\"Email\">
      </div>
      <div class=\"field\">
        <label>Phone Number</label>
        <input type=\"tel\" name=\"phone\" placeholder=\"Phone Number\">
      </div>

      <!-- Payment Information -->
      <h4 class=\"ui dividing header\">Payment Information</h4>
      <div class=\"field\">
        <label>Credit Card Number</label>
        <input type=\"text\" name=\"card-number\" placeholder=\"Credit Card Number\">
      </div>
      <div class=\"two fields\">
        <div class=\"field\">
          <label>Expiration Date</label>
          <input type=\"text\" name=\"expiry-date\" placeholder=\"MM/YY\">
        </div>
        <div class=\"field\">
          <label>CVV</label>
          <input type=\"text\" name=\"cvv\" placeholder=\"CVV\">
        </div>
      </div>

      <!-- Agreement and Confirmation -->
      <div class=\"field\">
        <div class=\"ui checkbox\">
          <input type=\"checkbox\" name=\"agreement\">
          <label>I agree to the Terms and Conditions</label>
        </div>
      </div>

      <button class=\"ui primary button\" type=\"submit\">Complete Booking</button>
    </form>
  </div>
</main>
";
    }

    // line 96
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 97
        echo "<script>
  \$('.ui.dropdown').dropdown();
  \$('.ui.checkbox').checkbox();
  \$('.ui.form').form({
    fields: {
      name: 'empty',
      email: 'email',
      room: 'empty',
      guests: 'empty',
      'checkin-date': 'empty',
      'checkout-date': 'empty',
      agreement: 'checked'
    }
  });

  \$('.standard_calendar')
    .calendar({
      onChange: (date, text) => {
        // Handle date selection
      },
      formatter: {
        date: 'DD/MM/YYYY'
      },
      type: 'date'
    });
</script>

<script defer>
  document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
      input: {
        fullName: 'John Smith',
        email: 'socrates3142@gmail.com',
        selectedRoom: 'Single Room',
        guests: 1
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-hotel-bookings/views/checkout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 97,  145 => 96,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/checkout.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/checkout.html");
    }
}
