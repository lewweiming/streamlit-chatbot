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

/* tr-flight-bookings/views/checkout.html */
class __TwigTemplate_9ee03019bde9ecde3df9d7ceec926a5e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-flight-bookings/views/checkout.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">
  <div class=\"ui container segment\">
    <h2 class=\"ui dividing header\">Flight Booking Checkout</h2>

    <form method=\"post\" action=\"/modules/flight-bookings/checkout\" class=\"ui form\">
      <!-- Booking Details -->
      <h4 class=\"ui dividing header\">Flight Details</h4>

      <div class=\"field\">
        <label>Flight Number</label>
        <input x-model=\"input.flightNumber\" type=\"text\" name=\"flight_id\" placeholder=\"Flight Number\">
      </div>


      <!-- Seat Class -->
      <h4 class=\"ui dividing header\">Seat Class</h4>
      <div class=\"field\">
        <label>Selected Seat Class</label>
        <select x-model=\"input.seatClass\" name=\"seat_class\" class=\"ui selection dropdown\">
          <option value=''>Select Seat Class</option>
          <option>Economy</option>
          <option>Premium Economy</option>
          <option>Business</option>
          <option>First Class</option>
        </select>
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
        <label>Total Amount</label>
        <input x-model=\"input.totalAmount\" type=\"text\" name=\"total_amount\" placeholder=\"Total Amount\" readonly>
      </div>
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

    // line 81
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 82
        echo "<script>
  \$('.ui.dropdown').dropdown();
  \$('.ui.checkbox').checkbox();
  \$('.ui.form').form({
    fields: {
      flight_id: 'empty',
      seat_class: 'empty',
      name: 'empty',
      email: 'email',
      total_amount: 'empty',
      agreement: 'checked'
    }
  });
</script>

<script defer>
  document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
      input: {
        fullName: 'John Smith',
        email: 'johnsmith@example.com',
        seatClass: 'Economy',
        totalAmount: '200.00'
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-flight-bookings/views/checkout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 82,  130 => 81,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/checkout.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/checkout.html");
    }
}
