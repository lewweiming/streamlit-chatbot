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

/* parts/navbar.html */
class __TwigTemplate_644c216dd46075e33e6ba512bca1e4bf extends Template
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
    <a href=\"/\" class=\"header item\">X2F Auth</a>
    <div class=\"active item\">Link</div>
    <a class=\"item\">New Joiner Form</a>
    <a class=\"item\">How It Works?</a>
    <div class=\"ui dropdown item\" tabindex=\"0\">
        Pages
        <i class=\"dropdown icon\"></i>
        <div class=\"menu\" tabindex=\"-1\">
            <a href=\"/p/_blank_page_content_loading\" class=\"item\">Content Loading</a>
        </div>
    </div>
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
        <a href=\"/framework/admin/main\" class=\"item\">Admin</a>
        ";
            // line 34
            if ((twig_get_attribute($this->env, $this->source, ($context["session"] ?? null), "is_logged_in", [], "any", false, false, false, 34) == true)) {
                // line 35
                echo "        <a href=\"/framework/logout\" class=\"item\">Admin Logout</a>
        ";
            }
            // line 37
            echo "        ";
            if ((($context["isUser"] ?? null) == true)) {
                // line 38
                echo "        <div class=\"ui dropdown item\" tabindex=\"1\">
            Signed in as ";
                // line 39
                echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
                echo "
            <i class=\"dropdown icon\"></i>
            <div class=\"menu\" tabindex=\"-1\">
                <a class=\"item\" href=\"/user/my-profile\">My Profile</a>
                <a class=\"item\" href=\"/user/my-inbox\">My Inbox</a>
                <div class=\"divider\"></div>
                <div class=\"header\">My Account</div>
                <a href='/user/password/change' class=\"item\">Change Password</a>
                <a href='/user/username/change' class=\"item\">Change Username</a>
                <a href='/user/email/change' class=\"item\">Change Email</a>
                <div class=\"divider\"></div>
                <a href=\"/logout\" class=\"item\">Logout</a>
            </div>
        </div>
        ";
            } else {
                // line 54
                echo "        <a href=\"/login\" class=\"item\">Login</a>
        <a href=\"/register\" class=\"item\">Register</a>
        ";
            }
            // line 57
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
        return "parts/navbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 57,  104 => 54,  86 => 39,  83 => 38,  80 => 37,  76 => 35,  74 => 34,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "parts/navbar.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/parts/navbar.html");
    }
}
