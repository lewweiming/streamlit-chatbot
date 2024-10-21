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

/* tr-car-rentals/views/available_cars.html */
class __TwigTemplate_ca4f6cafd3636ce8b9b3e5924ceafe47 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/available_cars.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Available Cars for Rental</h2>
    <div class=\"ui three stackable cards\">
        <div class=\"card\" id=\"car-card-template\" style=\"display: none;\">
            <div class=\"image\">
                <img src=\"car_image_url\" alt=\"Car Image\">
            </div>
            <div class=\"content\">
                <div class=\"header\">Car Name</div>
                <div class=\"meta\">Car Model</div>
                <div class=\"description\">
                    Type: <span class=\"car-type\">Sedan</span> <br>
                    Daily Rent: \$<span class=\"daily-rent\">50</span>
                </div>
            </div>
            <div class=\"extra content\">
                <button class=\"ui primary button rent-car-btn\">Rent Now</button>
            </div>
        </div>
        <!-- Add additional car cards dynamically using JS -->
    </div>
</div>
";
    }

    // line 28
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 29
        echo "<script>
    // Populate car data dynamically via JavaScript
    \$(document).ready(function() {
        const cars = [
            { name: 'Toyota Camry', model: '2022', type: 'Sedan', rent: 60, imageUrl: 'toyota_camry.jpg' },
            { name: 'Ford Mustang', model: '2021', type: 'Sports', rent: 120, imageUrl: 'ford_mustang.jpg' },
            { name: 'Honda CRV', model: '2020', type: 'SUV', rent: 80, imageUrl: 'honda_crv.jpg' },
        ];
        
        cars.forEach(car => {
            const carCard = \$('#car-card-template').clone().show().removeAttr('id');
            carCard.find('.header').text(car.name);
            carCard.find('.meta').text(car.model);
            carCard.find('.car-type').text(car.type);
            carCard.find('.daily-rent').text(car.rent);
            carCard.find('img').attr('src', car.imageUrl);
            \$('.ui.cards').append(carCard);
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/available_cars.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 29,  77 => 28,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/available_cars.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/available_cars.html");
    }
}
