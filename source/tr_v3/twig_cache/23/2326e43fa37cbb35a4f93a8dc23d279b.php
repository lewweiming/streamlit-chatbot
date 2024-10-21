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

/* parts/navbar_admin.html */
class __TwigTemplate_7b962139c131023702c6d43156ae32eb extends Template
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
            echo "<div class=\"ui white menu\" style=\"border-radius: 0; box-shadow: none;\">
    <a href=\"/\" class=\"header item\">Admin</a>
    <a href=\"/framework/admin/articles\" class=\"item\">Manage Articles</a>
    <a href=\"/framework/admin/users\" class=\"item\">Manage Users</a>
    <a href=\"/framework/admin/user-inbox\" class=\"item\">User Inbox</a>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Dropdown
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <div class=\"item\">Action</div>
            <div class=\"item\">Another Action</div>
            <div class=\"item\">Something else here</div>
            <div class=\"divider\"></div>
            <div class=\"item\">Separated Link</div>
            <div class=\"divider\"></div>
            <div class=\"item\">One more separated link</div>
        </div>
    </div>
    <div class=\"right menu\">
        <div class=\"item\">
            <div class=\"ui transparent inverted icon input\">
                <i class=\"search icon\"></i>
                <input type=\"text\" placeholder=\"Search\">
            </div>
        </div>
        <a href=\"/\" class=\"item\">Home</a>
        ";
            // line 27
            if ((($context["isUser"] ?? null) == true)) {
                // line 28
                echo "        <a class=\"item\">Signed In</a>
        ";
            } else {
                // line 30
                echo "        <a href=\"/login\" class=\"item\">Login</a>
        <a href=\"/register\" class=\"item\">Register</a>
        ";
            }
            // line 33
            echo "        
    </div>
</div>";
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
        return "parts/navbar_admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 33,  73 => 30,  69 => 28,  67 => 27,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parts/navbar_admin.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/parts/navbar_admin.html");
    }
}
