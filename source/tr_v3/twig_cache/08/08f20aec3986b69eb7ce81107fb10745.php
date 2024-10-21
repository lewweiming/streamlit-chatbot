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
class __TwigTemplate_f97d11eb81469566f1c99545a67080f2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui two column grid\">

    <div class=\"ui column\">
        <h1>Digital Nomad</h1>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/LYXHVva0EAM?si=ulrAd-fi7Tj5cI1Q\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>

    <div class=\"ui column\">
        <h1>Weird Science</h1>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/ywaTX-nLm6Y?si=ChMz4LXYONcmi_aW\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>


    <div class=\"ui column\">
        <h1>Van Life</h1>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/Y50QkYDoToQ?si=guoQ1tng08IXYE4L\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>

    <div class=\"ui column\">
        <h1>Social Issues</h1>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/AC-Onl5v4cs?si=a4WDeB2_3Gy5_QUV\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>

    <div class=\"ui column\">
        <h1>Educational</h1>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/AAGIi62-sAU?si=SKXknjGNc1MSrGgd\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>

    <div class=\"ui column\">
        <h2>Small Businesses</h2>
        <iframe width=\"100%\" height=\"315\" src=\"https://www.youtube.com/embed/4ankWbucEfw?si=ADg8FviMPPhcWVTE\"
            title=\"YouTube video player\" frameborder=\"0\"
            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"
            allowfullscreen></iframe>
    </div>
</div>
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
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/main.html");
    }
}
