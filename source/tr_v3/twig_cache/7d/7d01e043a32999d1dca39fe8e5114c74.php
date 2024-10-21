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

/* module-manager/views/admin/index.html */
class __TwigTemplate_a0e6de0657b03ee07de5ffad479a71f2 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "module-manager/views/admin/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\" data-modules=\"";
        echo twig_escape_filter($this->env, json_encode(($context["modules"] ?? null)));
        echo "\" data-installed-modules=\"";
        echo twig_escape_filter($this->env, json_encode(($context["installed_modules"] ?? null)));
        echo "\">
    <h2 class=\"ui header\">Module Manager</h2>
    <div class=\"ui info message\">
        The module installer automatically installs DB Tables, unpacks files into the modules folder and updates the routes and Core class.
    </div>

    <div>
        <a href=\"/framework/admin/module-manager/workflow\" class=\"ui basic button\">View workflow</a>
    </div>

    <h3 class=\"ui header\">Available Modules</h3>
    <table class=\"ui table\">
        <thead>
            <tr>
                <th>Title</th>
                <th>Folder</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <template x-for=\"i in modules\">
                <tr>
                    <td x-text=\"i.module_title\"></td>
                    <td x-text=\"i.module_folder\"></td>
                    <td>
                        <div class=\"ui buttons\">
                            <button @click=\"installModule(i, \$event)\" class=\"ui button\">Install</button>
                            <button @click=\"uninstallModule(i, \$event)\" class=\"ui button\">Remove</button>
                        </div>
                    </td>
                </tr>
            </template>

        </tbody>
    </table>

    <h3 class=\"ui header\">Installed Modules</h3>
    <table class=\"ui table\">
        <thead>
            <tr>
                <th>Title</th>
                <th>Folder</th>
            </tr>
        </thead>
        <tbody>

            <template x-for=\"i in installedModules\">
                <tr>
                    <td x-text=\"i.module_title\"></td>
                    <td x-text=\"i.module_folder\"></td>
                </tr>
            </template>

        </tbody>
    </table>

</main>
";
    }

    // line 64
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 65
        echo "<script>

    const API_INSTALL_MODULE = '/modules/module-manager/api/admin/install_module.php'
    const API_UNINSTALL_MODULE = '/modules/module-manager/api/admin/uninstall_module.php'
    

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            modules: [],
            installedModules: [],
            init() {
                this.loadModules();
                this.loadInstalledModules();
            },
            loadModules() {

                let r = document.querySelector('[data-modules]');
                this.modules = JSON.parse(r.dataset.modules)
            },
            loadInstalledModules() {

                let r = document.querySelector('[data-installed-modules]');
                this.installedModules = JSON.parse(r.dataset.installedModules)
            },
            async installModule(module, e) {

                e.srcElement.classList.add('loading')

                let fd = new FormData();
                fd.append('module_title', module.module_title);
                fd.append('module_folder', module.module_folder);
                fd.append('download_path', module.download_path);
                let r = await axios.post(API_INSTALL_MODULE, fd);

                console.log(r);
                e.srcElement.classList.remove('loading')

                if (r.data.error) {
                    \$.toast({ class: 'error', message: r.data.message });
                }


                if (r.data.message == 'success') {
                    this.installedModules.push({
                        'module_title': module.module_title,
                        'module_folder': module.module_folder
                    })
                    \$.toast({ class: 'success', message: 'Module installed successfully' });
                }
            },
            async uninstallModule(module, e) {

                e.srcElement.classList.add('loading')

                let fd = new FormData();
                fd.append('module_title', module.module_title);
                fd.append('module_folder', module.module_folder);
                fd.append('download_path', module.download_path);
                let r = await axios.post(API_UNINSTALL_MODULE, fd);

                e.srcElement.classList.remove('loading')

                if (r.data.error) {
                    \$.toast({ class: 'error', message: r.data.message });
                }

                if (r.data.message == 'success') {
                    let index = this.installedModules.findIndex(i => i.module_title == module.module_title)
                    if (index !== -1) {
                        this.installedModules.splice(index, 1);
                    }
                    \$.toast({ class: 'success', message: 'Module uninstalled successfully' });
                }
            },
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "module-manager/views/admin/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 65,  117 => 64,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "module-manager/views/admin/index.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/module-manager/views/admin/index.html");
    }
}
