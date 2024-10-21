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

/* tr-shop/views/item_detail.html */
class __TwigTemplate_bff2de6ddecb2a15a65c229bd6ce9790 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-shop/views/item_detail.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"ui two column grid\">
    <div class=\"column\">

        <div class=\"content\">
            <h1>";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "name", [], "any", false, false, false, 9), "html", null, true);
        echo "</h1>
            <p>Lorem ipsum<sup><a>[1]</a></sup> dolor sit amet, consectetur adipiscing elit. Nulla accumsan, metus ultrices
                eleifend gravida, nulla nunc varius lectus, nec rutrum justo nibh eu lectus. Ut vulputate semper dui. Fusce erat
                odio, sollicitudin vel erat vel, interdum mattis neque. Sub<sub>script</sub> works as well!</p>
            <h2>Second level</h2>
            <p>Curabitur accumsan turpis pharetra <strong>augue tincidunt</strong> blandit. Quisque condimentum maximus mi, sit
                amet commodo arcu rutrum id. Proin pretium urna vel cursus venenatis. Suspendisse potenti. Etiam mattis sem
                rhoncus lacus dapibus facilisis. Donec at dignissim dui. Ut et neque nisl.</p>
            <ul>
                <li>In fermentum leo eu lectus mollis, quis dictum mi aliquet.</li>
                <li>Morbi eu nulla lobortis, lobortis est in, fringilla felis.</li>
                <li>Aliquam nec felis in sapien venenatis viverra fermentum nec lectus.</li>
                <li>Ut non enim metus.</li>
            </ul>
            <h3>Third level</h3>
            <p>Quisque ante lacus, malesuada ac auctor vitae, congue <a href=\"#\">non ante</a>. Phasellus lacus ex, semper ac
                tortor nec, fringilla condimentum orci. Fusce eu rutrum tellus.</p>
            <ol>
                <li>Donec blandit a lorem id convallis.</li>
                <li>Cras gravida arcu at diam gravida gravida.</li>
                <li>Integer in volutpat libero.</li>
                <li>Donec a diam tellus.</li>
                <li>Aenean nec tortor orci.</li>
                <li>Quisque aliquam cursus urna, non bibendum massa viverra eget.</li>
                <li>Vivamus maximus ultricies pulvinar.</li>
            </ol>
            <blockquote>Ut venenatis, nisl scelerisque sollicitudin fermentum, quam libero hendrerit ipsum, ut blandit est
                tellus sit amet turpis.</blockquote>
            <p>Quisque at semper enim, eu hendrerit odio. Etiam auctor nisl et <em>justo sodales</em> elementum. Maecenas
                ultrices lacus quis neque consectetur, et lobortis nisi molestie.</p>
            <p>Sed sagittis enim ac tortor maximus rutrum. Nulla facilisi. Donec mattis vulputate risus in luctus. Maecenas
                vestibulum interdum commodo.</p>
            <dl>
                <dt>Web</dt>
                <dd>The part of the Internet that contains websites and web pages</dd>
                <dt>HTML</dt>
                <dd>A markup language for creating web pages</dd>
                <dt>CSS</dt>
                <dd>A technology to make HTML look better</dd>
            </dl>
            <p>Suspendisse egestas sapien non felis placerat elementum. Morbi tortor nisl, suscipit sed mi sit amet, mollis
                malesuada nulla. Nulla facilisi. Nullam ac erat ante.</p>
            <h4>Fourth level</h4>
            <p>Nulla efficitur eleifend nisi, sit amet bibendum sapien fringilla ac. Mauris euismod metus a tellus laoreet, at
                elementum ex efficitur.</p>
            <pre>                                                                                                &lt;!DOCTYPE html&gt;
                                                                                    &lt;html&gt;
                                                                                      &lt;head&gt;
                                                                                        &lt;title&gt;Hello World&lt;/title&gt;
                                                                                      &lt;/head&gt;
                                                                                      &lt;body&gt;
                                                                                        &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra nec nulla vitae mollis.&lt;/p&gt;
                                                                                      &lt;/body&gt;
                                                                                    &lt;/html&gt;
        </pre>
            <p>Maecenas eleifend sollicitudin dui, faucibus sollicitudin augue cursus non. Ut finibus eleifend arcu ut vehicula.
                Mauris eu est maximus est porta condimentum in eu justo. Nulla id iaculis sapien.</p>
            <table>
                <thead>
                    <tr>
                        <th>One</th>
                        <th>Two</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Three</td>
                        <td>Four</td>
                    </tr>
                    <tr>
                        <td>Five</td>
                        <td>Six</td>
                    </tr>
                    <tr>
                        <td>Seven</td>
                        <td>Eight</td>
                    </tr>
                    <tr>
                        <td>Nine</td>
                        <td>Ten</td>
                    </tr>
                    <tr>
                        <td>Eleven</td>
                        <td>Twelve</td>
                    </tr>
                </tbody>
            </table>
            <p>Phasellus porttitor enim id metus volutpat ultricies. Ut nisi nunc, blandit sed dapibus at, vestibulum in felis.
                Etiam iaculis lorem ac nibh bibendum rhoncus. Nam interdum efficitur ligula sit amet ullamcorper. Etiam
                tristique, leo vitae porta faucibus, mi lacus laoreet metus, at cursus leo est vel tellus. Sed ac posuere est.
                Nunc ultricies nunc neque, vitae ultricies ex sodales quis. Aliquam eu nibh in libero accumsan pulvinar. Nullam
                nec nisl placerat, pretium metus vel, euismod ipsum. Proin tempor cursus nisl vel condimentum. Nam pharetra
                varius metus non pellentesque.</p>
            <h5>Fifth level</h5>
            <p>Aliquam sagittis rhoncus vulputate. Cras non luctus sem, sed tincidunt ligula. Vestibulum at nunc elit. Praesent
                aliquet ligula mi, in luctus elit volutpat porta. Phasellus molestie diam vel nisi sodales, a eleifend augue
                laoreet. Sed nec eleifend justo. Nam et sollicitudin odio.</p>
            <figure>
                <img src=\"https://bulma.io/images/placeholders/256x256.png\" alt=\"💯\">
                <img src=\"https://bulma.io/images/placeholders/256x256.png\" alt=\"💯\">
                <figcaption>
                    Figure 1: Some beautiful placeholders
                </figcaption>
            </figure>
            <h6>Sixth level</h6>
            <p>Cras in nibh lacinia, venenatis nisi et, auctor urna. Donec pulvinar lacus sed diam dignissim, ut eleifend eros
                accumsan. Phasellus non tortor eros. Ut sed rutrum lacus. Etiam purus nunc, scelerisque quis enim vitae,
                malesuada ultrices turpis. Nunc vitae maximus purus, nec consectetur dui. Suspendisse euismod, elit vel rutrum
                commodo, ipsum tortor maximus dui, sed varius sapien odio vitae est. Etiam at cursus metus.</p>
        </div>        
    </div>

    <div class=\"column\">
        <div class=\"ui spaced vertical buttons\">
        <a href=\"/modules/shop/add-to-cart?id=";
        // line 123
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, false, 123), "html", null, true);
        echo "\" class=\"ui primary button\">Add to cart</a>
        <a href=\"/modules/shop/cart\" class=\"ui positive button\">View cart summary</a>
        </div>
    </div>
</div>

";
    }

    // line 131
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 132
        echo "<script>
    const API_LIST = '/api/list.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            async list() {
                \$.toast({ message: 'Fetching list..' });

                let r = await axios.get(API_LIST)

                if (r.data.message == 'success') {
                    this.rows = r.data.rows
                    \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
                }
            },
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "tr-shop/views/item_detail.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  190 => 132,  186 => 131,  175 => 123,  58 => 9,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-shop/views/item_detail.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-shop/views/item_detail.html");
    }
}
