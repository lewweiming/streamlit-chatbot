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

/* tr-car-rentals/views/checkout.html */
class __TwigTemplate_77d9dca764641a6431d9f99bb1e152e8 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/checkout.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">

  <div class=\"ui container segment\">
    <h2 class=\"ui dividing header\">Car Rental Checkout</h2>

    <form method=\"post\" action=\"/modules/car-rentals/checkout\" class=\"ui form\">
      <!-- Rental Details -->
      <h4 class=\"ui dividing header\">Rental Details</h4>
      <div class=\"two fields\">
        <div class=\"field\">
          <label>Pick-Up Date</label>
          <div class=\"ui calendar standard_calendar\">
            <div class=\"ui fluid input left icon\">
              <i class=\"calendar icon\"></i>
              <input name=\"pickup-date\" type=\"text\" placeholder=\"Pick-Up Date\">
            </div>
          </div>
        </div>

        <div class=\"field\">
        <label>Drop-Off Date</label>
        <div class=\"ui calendar standard_calendar\">
          <div class=\"ui fluid input left icon\">
            <i class=\"calendar icon\"></i>
            <input name=\"dropoff-date\" type=\"text\" placeholder=\"Drop-Off Date\">
          </div>
        </div>
      </div>

  </div>

  <!-- Car Details -->
  <h4 class=\"ui dividing header\">Car Details</h4>
  <div class=\"field\">
    <label>Selected Car</label>
    <select x-model=\"input.selectedCar\" name=\"car\" class=\"ui selection dropdown\">
      <option value=''>Select Car</option>
      <option>Sedan</option>
      <option>SUV</option>
      <option>Convertible</option>
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

  <button class=\"ui primary button\" type=\"submit\">Complete Checkout</button>
  </form>
  </div>
</main>
";
    }

    // line 94
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 95
        echo "<script>
  \$('.ui.dropdown').dropdown();
  \$('.ui.checkbox').checkbox();
  \$('.ui.form').form({
    fields: {
      name: 'empty',
      email: 'email',
      car: 'empty',
      'pickup-date': 'empty',
      'dropoff-date': 'empty',
      agreement: 'checked'
    }
  });

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
</script>

<script defer>
  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      input: {
        fullName: 'John Smith',
        email: 'socrates3142@gmail.com',
        selectedCar: 'Sedan'
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/checkout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 95,  143 => 94,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/checkout.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/checkout.html");
    }
}
