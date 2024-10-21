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

/* _layout_admin.html */
class __TwigTemplate_e93c442b29bdcf4f1c252b02a92aa0bc extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "<!DOCTYPE html>
<html lang=\"en\" class=\"has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded\">

<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

  <title>Bulma@Webconxept - Admin</title>
  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css\">
  <link rel=\"stylesheet\" href=\"/css/admin.css\">

  <!-- BULMA TOAST -->
  <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css\" />
  <script src=\"https://cdn.jsdelivr.net/npm/bulma-toast@2.4.1/dist/bulma-toast.min.js\"></script>

  <!-- BLOCKQUOTE BULMA SUPPORT -->
  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/gh/Lewatoto/bulma-blockquote/css/blockquote.min.css\" />

  <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
  <link rel=\"stylesheet\" href=\"https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css\">


  <!-- ALPINEJS APP -->
  <script src=\"//unpkg.com/alpinejs\" defer></script>
  <script src=\"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js\"></script>

  <!-- GFONTS -->
  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
  <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;700&display=swap\" rel=\"stylesheet\">

<style>
  .font-raleway {
    font-family: 'Raleway', sans-serif;
  }
</style>

<style>

/* HIDE SCROLLBAR */
/* Hide scrollbar for Chrome, Safari and Opera */
.scrollbar-hide::-webkit-scrollbar {
display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.scrollbar-hide {
-ms-overflow-style: none;  /* IE and Edge */
scrollbar-width: none;  /* Firefox */
}  
</style>

  <!-- Additional Headers / Styles -->
  ";
            // line 55
            $this->displayBlock('head', $context, $blocks);
            // line 56
            echo "
</head>

<body class=\"font-raleway\">
";
            // line 60
            if ((twig_test_empty(($context["flash"] ?? null)) == false)) {
                // line 61
                echo "<div x-data=\"{show: true, flash: ";
                echo twig_escape_filter($this->env, json_encode(($context["flash"] ?? null)));
                echo " }\" x-show=\"show\" :class=\"('success' in flash)?'is-success':'is-danger'\" class=\"notification\" style=\"border-radius: 0px;\">
  <button @click=\"show = false\" class=\"delete\"></button>
  <template x-if=\"'success' in flash\">
    <template x-for=\"message in flash.success\">
      <div x-text=\"message\"></div>
    </template>
  </template>
  <template x-if=\"'error' in flash\">
    <template x-for=\"message in flash.error\">
      <div x-text=\"message\"></div>
    </template>
  </template>
</div>  
";
            }
            // line 75
            echo "
  <div id=\"app\">
    <nav id=\"navbar-main\" class=\"navbar is-fixed-top\">
      <div class=\"navbar-brand\">
        <a class=\"navbar-item is-hidden-desktop jb-aside-mobile-toggle\">
          <span class=\"icon\"><i class=\"mdi mdi-forwardburger mdi-24px\"></i></span>
        </a>
        <div class=\"navbar-item has-control\">
          <div class=\"control\"><input placeholder=\"Search everywhere...\" class=\"input\"></div>
        </div>
      </div>
      <div class=\"navbar-brand is-right\">
        <a class=\"navbar-item is-hidden-desktop jb-navbar-menu-toggle\" data-target=\"navbar-menu\">
          <span class=\"icon\"><i class=\"mdi mdi-dots-vertical\"></i></span>
        </a>
      </div>
      <div class=\"navbar-menu fadeIn animated faster\" id=\"navbar-menu\">
        <div class=\"navbar-end\">
          <div class=\"navbar-item has-dropdown has-dropdown-with-icons has-divider is-hoverable\">
            <a class=\"navbar-link is-arrowless\">
              <span class=\"icon\"><i class=\"mdi mdi-menu\"></i></span>
              <span>Sample Menu</span>
              <span class=\"icon\">
                <i class=\"mdi mdi-chevron-down\"></i>
              </span>
            </a>
            <div class=\"navbar-dropdown\">
              <a href=\"profile.html\" class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-account\"></i></span>
                <span>My Profile</span>
              </a>
              <a class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-settings\"></i></span>
                <span>Settings</span>
              </a>
              <a class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-email\"></i></span>
                <span>Messages</span>
              </a>
              <hr class=\"navbar-divider\">
              <a href=\"/framework/logout\" class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-logout\"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <div class=\"navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable\">
            <a class=\"navbar-link is-arrowless\">
              <div class=\"is-user-avatar\">
                <img src=\"https://avatars.dicebear.com/v2/initials/john-doe.svg\" alt=\"John Doe\">
              </div>
              <div class=\"is-user-name\"><span>John Doe</span></div>
              <span class=\"icon\"><i class=\"mdi mdi-chevron-down\"></i></span>
            </a>
            <div class=\"navbar-dropdown\">
              <a href=\"profile.html\" class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-account\"></i></span>
                <span>My Profile</span>
              </a>
              <a class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-settings\"></i></span>
                <span>Settings</span>
              </a>
              <a class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-email\"></i></span>
                <span>Messages</span>
              </a>
              <hr class=\"navbar-divider\">
              <a class=\"navbar-item\">
                <span class=\"icon\"><i class=\"mdi mdi-logout\"></i></span>
                <span>Log Out</span>
              </a>
            </div>
          </div>
          <a href=\"https://justboil.me/bulma-admin-template/free-html-dashboard/\" title=\"About\"
            class=\"navbar-item has-divider is-desktop-icon-only\">
            <span class=\"icon\"><i class=\"mdi mdi-help-circle-outline\"></i></span>
            <span>About</span>
          </a>
          <a title=\"Log out\" class=\"navbar-item is-desktop-icon-only\">
            <span class=\"icon\"><i class=\"mdi mdi-logout\"></i></span>
            <span>Log out</span>
          </a>
        </div>
      </div>
    </nav>
    <aside class=\"aside has-background-black is-placed-left is-expanded\">
      <div class=\"aside-tools\">
        <div class=\"aside-tools-label\">
          <span class=\"has-text-weight-bold\">Bulma@Webconxept</span>
        </div>
      </div>
      <div class=\"menu is-menu-main py-3 scrollbar-hide\" style=\"overflow-y:scroll; max-height: 100%;\">
        <p class=\"menu-label\">General</p>
        <ul class=\"menu-list\">
          <li>
            <a href=\"/framework/admin/main\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
              <span class=\"menu-item-label\">Admin</span>
            </a>
          </li>
          <li>
            <a href=\"/\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
              <span class=\"menu-item-label\">Front-end</span>
            </a>
          </li>
        </ul>
         <div class=\"menu is-menu-main\">
          <p class=\"menu-label\">Plugins</p>
          <ul class=\"menu-list\">
           <li>
              <a href=\"/framework/admin/plugins/install\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Install</span>
              </a>
            </li>
            </ul>
        </div>
         <div class=\"menu is-menu-main\">
          <p class=\"menu-label\">Configuration</p>
          <ul class=\"menu-list\">
           <li>
              <a href=\"/framework/admin/definitions\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Definitions</span>
              </a>
            </li>
                <li>
              <a href=\"/framework/admin/routes\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Routes</span>
              </a>
            </li>
            </ul>
        </div>
        <div class=\"menu is-menu-main\">
          <p class=\"menu-label\">Features</p>
          <ul class=\"menu-list\">
            <li>
              <a href=\"/framework/admin/debugger/main\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
              <span class=\"menu-item-label\">Debugger</span>
              ";
            // line 218
            if (($context["debuggerMessagesCount"] ?? null)) {
                // line 219
                echo "              <span class=\"tag is-danger\">";
                echo twig_escape_filter($this->env, ($context["debuggerMessagesCount"] ?? null), "html", null, true);
                echo "</span>
              ";
            }
            // line 220
            echo "          
              </a>
              </li>
              <li>
                <a href=\"/framework/admin/pages\" class=\"has-icon\">
                  <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                  <span class=\"menu-item-label\">Pages</span>
                </a>
              </li>
            <li>
              <a href=\"/framework/admin/database\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Database</span>
              </a>
            </li>
            <li>
              <a href=\"/framework/admin/inbox/main\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Inbox</span>
              </a>
            </li>
            <li>
              <a href=\"/framework/admin/x2-file-uploads\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">X2 File Uploads</span>
              </a>
            </li>
            <li>
              <a href=\"/framework/admin/twig\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">Twig</span>
              </a>
            </li>
            <li>
              <a href=\"/framework/admin/file-manager\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">File Manager</span>
              </a>
            </li>
            <li>
              <a href=\"/framework/admin/crud\" class=\"has-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-desktop-mac\"></i></span>
                <span class=\"menu-item-label\">CRUD Generator</span>
              </a>
            </li>
          </ul>
        </div>
        <p class=\"menu-label\">Examples</p>
        <ul class=\"menu-list\">
          <!-- /examples/graphs -->
          <li>
            <a href=\"/framework/admin/examples/graphs\" class=\"has-icon\">
              <span class=\"icon has-update-mark\"><i class=\"mdi mdi-table\"></i></span>
              <span class=\"menu-item-label\">Graphs</span>
            </a>
          </li>
          <li>
            <a href=\"tables.html\" class=\"has-icon\">
              <span class=\"icon has-update-mark\"><i class=\"mdi mdi-table\"></i></span>
              <span class=\"menu-item-label\">Tables</span>
            </a>
          </li>
          <li>
            <a href=\"forms.html\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-square-edit-outline\"></i></span>
              <span class=\"menu-item-label\">Forms</span>
            </a>
          </li>
          <li>
            <a href=\"profile.html\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-account-circle\"></i></span>
              <span class=\"menu-item-label\">Profile</span>
            </a>
          </li>
          <li>
            <a class=\"has-icon has-dropdown-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-view-list\"></i></span>
              <span class=\"menu-item-label\">Submenus</span>
              <div class=\"dropdown-icon\">
                <span class=\"icon\"><i class=\"mdi mdi-plus\"></i></span>
              </div>
            </a>
            <ul>
              <li>
                <a href=\"#void\">
                  <span>Sub-item One</span>
                </a>
              </li>
              <li>
                <a href=\"#void\">
                  <span>Sub-item Two</span>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <p class=\"menu-label\">About</p>
        <ul class=\"menu-list\">
          <li>
            <a href=\"https://github.com/vikdiesel/admin-one-bulma-dashboard\" target=\"_blank\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-github-circle\"></i></span>
              <span class=\"menu-item-label\">GitHub</span>
            </a>
          </li>
          <li>
            <a href=\"https://justboil.me/bulma-admin-template/free-html-dashboard/\" class=\"has-icon\">
              <span class=\"icon\"><i class=\"mdi mdi-help-circle\"></i></span>
              <span class=\"menu-item-label\">About</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <section class=\"section is-title-bar\">
      <div class=\"level\">
        <div class=\"level-left\">
          <div class=\"level-item\">
            <ul>
              <li>Admin</li>
              <li>";
            // line 339
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class=\"hero is-hero-bar\">
      <div class=\"hero-body\">
        <div class=\"level\">
          <div class=\"level-left\">
            <div class=\"level-item\">
              <h1 class=\"title\">
                ";
            // line 351
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "
              </h1>
            </div>
          </div>
          <div class=\"level-right\" style=\"display: none;\">
            <div class=\"level-item\"></div>
          </div>
        </div>
      </div>
    </section>
    <section class=\"section is-main-section\">
      ";
            // line 362
            $this->displayBlock('content', $context, $blocks);
            // line 363
            echo "    </section>
    <footer class=\"footer\">
      <div class=\"container-fluid\">
        <div class=\"level\">
          <div class=\"level-left\">
            <div class=\"level-item\">
              © 2022, X2F, Based on&nbsp;<a href=\"https://github.com/vikdiesel/admin-one-bulma-dashboard\"
                target=blank>Admin One Bulma Dashboard</a>
            </div>
          </div>
          <div class=\"level-right\">
            <div class=\"level-item\">
              <div class=\"logo\">
                <a href=\"#\"><img src=\"/assets/icons/x2f.svg\" alt=\"X2F\"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- Scripts below are for demo only -->
  <script type=\"text/javascript\" src=\"/js/admin/admin.js\"></script>

  <!-- ACTIVE MENU SUPPORT -->
  <script>
    function highlightActiveMenu() {

      var url = window.location.pathname

      urlRegExp = new RegExp(url.replace(/\\/\$/, '') + \"\$\"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there

      document.querySelectorAll('aside a').forEach((node) => {

        if (urlRegExp.test(node.href.replace(/\\/\$/, ''))) {
          node.classList.add('is-active')
        }
      });
    }

    window.onload = (event) => {
      highlightActiveMenu()
    };
  </script>

  <!-- Additional Scripts -->
  ";
            // line 410
            $this->displayBlock('script', $context, $blocks);
            // line 411
            echo "</body>

</html>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    // line 55
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 362
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 410
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "_layout_admin.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  509 => 410,  503 => 362,  497 => 55,  482 => 411,  480 => 410,  431 => 363,  429 => 362,  415 => 351,  400 => 339,  279 => 220,  273 => 219,  271 => 218,  126 => 75,  108 => 61,  106 => 60,  100 => 56,  98 => 55,  42 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "_layout_admin.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/_layout_admin.html");
    }
}
