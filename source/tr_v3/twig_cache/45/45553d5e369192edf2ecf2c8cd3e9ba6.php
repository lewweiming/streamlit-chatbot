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

/* tr-trip-bookings/views/checkout.html */
class __TwigTemplate_d455932c17c7f6dacd96405890c07dd0 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-trip-bookings/views/checkout.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">
  <div class=\"ui container segment\">
    <h2 class=\"ui dividing header\">Trip Booking Checkout</h2>


  <!-- STEPPER -->
<div class=\"ui ordered steps\">

  <div class=\"active step\">
    <div class=\"content\">
      <div class=\"title\">Personal Details</div>
      <div class=\"description\">Enter your details</div>
    </div>
  </div>
  
  <div class=\"disabled step\">
    <div class=\"content\">
      <div class=\"title\">Review</div>
      <div class=\"description\">Review your booking</div>
    </div>
  </div>
  
  <div class=\"disabled step\">
    <div class=\"content\">
      <div class=\"title\">Payment</div>
      <div class=\"description\">Complete your payment</div>
    </div>
  </div>
</div>

    <form method=\"post\" action=\"/modules/trip-bookings/checkout\" class=\"ui form\">
      <!-- Trip Details -->
      <h4 class=\"ui dividing header\">Trip Details</h4>
      <div class=\"two fields\">
        <div class=\"field\">
          <label>Start Date</label>
          <div class=\"ui calendar standard_calendar\">
            <div class=\"ui fluid input left icon\">
              <i class=\"calendar icon\"></i>
              <input name=\"start-date\" type=\"text\" placeholder=\"Start Date\">
            </div>
          </div>
        </div>

        <div class=\"field\">
          <label>End Date</label>
          <div class=\"ui calendar standard_calendar\">
            <div class=\"ui fluid input left icon\">
              <i class=\"calendar icon\"></i>
              <input name=\"end-date\" type=\"text\" placeholder=\"End Date\">
            </div>
          </div>
        </div>
      </div>

      <!-- Tour Activity Details -->
      <h4 class=\"ui dividing header\">Activity Details</h4>
      <div class=\"field\">
        <label>Selected Activity</label>
        <select x-model=\"input.selectedActivity\" name=\"activity\" class=\"ui selection dropdown\">
          <option value=''>Select Activity</option>
          <option>City Tour</option>
          <option>Mountain Hiking</option>
          <option>Scuba Diving</option>
          <option>Wildlife Safari</option>
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

    // line 118
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 119
        echo "<script>
  \$('.ui.dropdown').dropdown();
  \$('.ui.checkbox').checkbox();
  \$('.ui.form').form({
    fields: {
      name: 'empty',
      email: 'email',
      activity: 'empty',
      'start-date': 'empty',
      'end-date': 'empty',
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
        selectedActivity: 'City Tour'
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-trip-bookings/views/checkout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 119,  167 => 118,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/checkout.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/checkout.html");
    }
}
