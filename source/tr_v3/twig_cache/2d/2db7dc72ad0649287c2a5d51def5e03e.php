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

/* tr-car-rentals/views/pdf/packing_list.html */
class __TwigTemplate_9cc0bc1b5bded17e9df8c25ce72f0601 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"/>

<style>
body {
font-family: 'helvetica', arial, sans-serif;
line-height: 1.2em;
font-size: 11px;
}

table {
width: 100%;
border-collapse:collapse; 
}

td {
vertical-align: top;
}
</style>

<h4>Packing List</h4>
<table>
<tr>
<td>
<h5>DIVING EQUIPMENT</h5>
<input type=\"checkbox\"/> DIVING EQUIPMENT<br/>
<input type=\"checkbox\"/> BCD<br/>
<input type=\"checkbox\"/> REGULATOR<br/>
<input type=\"checkbox\"/> WETSUIT<br/>
<input type=\"checkbox\"/> BOOTS/HOOD/GLOVES<br/>
<input type=\"checkbox\"/> FINS<br/>
<input type=\"checkbox\"/> TORCH<br/>
<input type=\"checkbox\"/> MASK<br/>
<input type=\"checkbox\"/> SNORKEL<br/>
<input type=\"checkbox\"/> SWIMSUIT/RASHGUARD<br/>
<input type=\"checkbox\"/> DIVE COMPUTER & COMPASS<br/>
<input type=\"checkbox\"/> POINTER<br/>
<input type=\"checkbox\"/> SIGNAL DEVICE<br/>
</td>
<td>
<h5>LIVEABOARD EXTRA</h5>
<input type=\"checkbox\"/> SUN BLOCK<br/>
<input type=\"checkbox\"/> SUNGLASSES<br/>
<input type=\"checkbox\"/> CAP<br/>
<input type=\"checkbox\"/> DRY BAG<br/>
<input type=\"checkbox\"/> CAMERA<br/>
<input type=\"checkbox\"/> TOWEL<br/>
<input type=\"checkbox\"/> CLOTHING<br/>
<input type=\"checkbox\"/> EXTRA SWIMSUIT<br/>
<input type=\"checkbox\"/> TOOTHBRUSH/PASTE<br/>
<input type=\"checkbox\"/> CAMERA CHARGER<br/>
<input type=\"checkbox\"/> ALLERGY PILLS<br/>
<input type=\"checkbox\"/> MOTION SICKNESS<br/>
<input type=\"checkbox\"/> FIRST AID KITS<br/>
<input type=\"checkbox\"/> BODY WASH<br/>
<input type=\"checkbox\"/> DIVING LICENSE<br/>
<input type=\"checkbox\"/> CASH<br/>
<input type=\"checkbox\"/> CREDIT CARD<br/>
<input type=\"checkbox\"/> SHAMPOO<br/>
<input type=\"checkbox\"/> MOBILE CHARGER<br/>
</td>
</tr>
</table>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/pdf/packing_list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/pdf/packing_list.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/pdf/packing_list.html");
    }
}
