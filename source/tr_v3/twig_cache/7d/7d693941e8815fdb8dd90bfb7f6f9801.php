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

/* main.html */
class __TwigTemplate_d790e492928b4da608b2d2cdfabc3d75 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'unwrapped_content' => [$this, 'block_unwrapped_content'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<style>
  #myBanner.banner {
    height: 500px;
    background:
      linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
      url('/assets/images/background-autumn.jpg');
    /* background-position: top, bottom; */
    background-size: cover;
    /* background-blend-mode: overlay; */
  }
</style>
";
    }

    // line 17
    public function block_unwrapped_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 18
        echo "<!-- MAST HEADER -->
<div class=\"ui very padded vertical masthead center aligned basic segment\">

  <h1 class=\"ui header\">What can we you help with?</h1>

  <!-- Input Field -->
  <div class=\"ui basic segment\">
    <div class=\"ui action input\">
      <input type=\"text\" placeholder=\"Type your query...\">
      <button class=\"ui button\">Search</button>
    </div>
  </div>
</div>

<!-- BANNER -->
<div id=\"myBanner\" class=\"ui very padded inverted vertical masthead center aligned banner segment\">

  <div class=\"ui very padded vertical masthead center aligned segment banner\">
    <div class=\"ui text container\">
      <h1 class=\"ui inverted massive header\">The <u><em>Social</em></u> Travel Platform</h1>
      <h2 class=\"ui small inverted large header\">Never Stop Exploring</h2>
      <div class=\"ui spaced buttons\">
        <a href=\"/modules/car-rentals\" class=\"ui basic large inverted button\">Car Rentals</a>
        <a href=\"/modules/flight-bookings\" class=\"ui basic large inverted button\">Flight Bookings</a>
        <a href=\"/modules/trip-bookings\" class=\"ui basic large inverted button\">Trip Bookings</a>
        <a href=\"/modules/hotel-bookings\" class=\"ui basic large inverted button\">Hotel Bookings</a>
        <a href=\"/modules/shop\" class=\"ui basic large inverted button\">Shop</a>
      </div>
    </div>
  </div>
</div>
";
    }

    // line 51
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 52
        echo "
<div class=\"ui top attached tabular menu\">
  <a class=\"active item\" data-tab=\"car-rentals\">Car Rentals</a>
  <a class=\"item\" data-tab=\"flight-bookings\">Flight Bookings</a>
  <a class=\"item\" data-tab=\"hotel-bookings\">Hotel Bookings</a>
  <a class=\"item\" data-tab=\"trip-bookings\">Trip Bookings</a>
</div>

<div class=\"ui bottom attached active tab segment\" data-tab=\"car-rentals\">
  <h3>Car Rentals</h3>
  <form class=\"ui form\">
    <div class=\"field\">
      <label>Pick-up Location</label>
      <input type=\"text\" placeholder=\"Enter pick-up location\">
    </div>
    <div class=\"field\">
      <label>Pick-up Date</label>
      <input type=\"date\">
    </div>
    <div class=\"field\">
      <label>Drop-off Date</label>
      <input type=\"date\">
    </div>
    <button class=\"ui primary button\" type=\"submit\">Search</button>
  </form>
</div>

<div class=\"ui bottom attached tab segment\" data-tab=\"flight-bookings\">
  <h3>Flight Bookings</h3>
  <form class=\"ui form\">
    <div class=\"field\">
      <label>Departure Airport</label>
      <input type=\"text\" placeholder=\"Enter departure airport\">
    </div>
    <div class=\"field\">
      <label>Arrival Airport</label>
      <input type=\"text\" placeholder=\"Enter arrival airport\">
    </div>
    <div class=\"field\">
      <label>Departure Date</label>
      <input type=\"date\">
    </div>
    <div class=\"field\">
      <label>Return Date</label>
      <input type=\"date\">
    </div>
    <button class=\"ui primary button\" type=\"submit\">Search Flights</button>
  </form>
</div>

<div class=\"ui bottom attached tab segment\" data-tab=\"hotel-bookings\">
  <h3>Hotel Bookings</h3>
  <form class=\"ui form\">
    <div class=\"field\">
      <label>Destination</label>
      <input type=\"text\" placeholder=\"Enter destination\">
    </div>
    <div class=\"field\">
      <label>Check-in Date</label>
      <input type=\"date\">
    </div>
    <div class=\"field\">
      <label>Check-out Date</label>
      <input type=\"date\">
    </div>
    <button class=\"ui primary button\" type=\"submit\">Search Hotels</button>
  </form>
</div>

<div class=\"ui bottom attached tab segment\" data-tab=\"trip-bookings\">
  <h3>Trip Bookings</h3>
  <form class=\"ui form\">
    <div class=\"field\">
      <label>Destination</label>
      <input type=\"text\" placeholder=\"Enter destination\">
    </div>
    <div class=\"field\">
      <label>Start Date</label>
      <input type=\"date\">
    </div>
    <div class=\"field\">
      <label>End Date</label>
      <input type=\"date\">
    </div>
    <button class=\"ui primary button\" type=\"submit\">Search Trips</button>
  </form>
</div>


";
    }

    // line 143
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 144
        echo "<script>
  \$('.menu .item').tab();
</script>
";
    }

    public function getTemplateName()
    {
        return "main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 144,  204 => 143,  111 => 52,  107 => 51,  72 => 18,  68 => 17,  53 => 4,  49 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/main.html");
    }
}
