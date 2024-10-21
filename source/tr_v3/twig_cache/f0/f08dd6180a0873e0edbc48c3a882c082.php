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

/* pages/chatbot.html */
class __TwigTemplate_771528da6d41cc8f6162a1533c23e7ae extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/chatbot.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h1 class=\"ui center aligned huge header\">
Hi! How can I help you?
</h1>
<div class=\"ui centered blue segment\" style=\"border: 2px solid #2675db; border-radius: 5px;\">
    <!-- REPLIES -->

    <div class=\"ui comments\">
        <div class=\"comment\">
          <a class=\"avatar\">
            <img src='https://avataaars.io/?avatarStyle=Circle&topType=WinterHat2&accessoriesType=Kurt&hatColor=PastelYellow&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Close&eyebrowType=SadConcernedNatural&mouthType=Grimace&skinColor=Tanned'
/>
          </a>
          <div class=\"content\">
            <a class=\"author\">Tom Lukic</a>
            <div class=\"text\">
              This will be great for business reports. I will definitely download this.
            </div>
            <div class=\"actions\">
              <a class=\"reply\">Reply</a>
              <a class=\"save\">Save</a>
              <a class=\"hide\">Hide</a>
              <a>
                <i class=\"expand icon\"></i>
                Full-screen
              </a>
            </div>
          </div>
        </div>
      </div>

    <!-- FORM -->
    <form class=\"ui form\">
        <div class=\"field\">
            <textarea id=\"textarea\" rows=\"4\" placeholder=\"Ask anything. Type your message here...\"></textarea>
        </div>
        <div class=\"ui basic buttons\">
            <button class=\"ui icon button\">
                <i class=\"attach icon\"></i>
            </button>
            <button class=\"ui icon button\">
                <i class=\"image icon\"></i>
            </button>
            <button class=\"ui icon button\">
                <i class=\"microphone icon\"></i>
            </button>
        </div>
        <button class=\"ui right floated large primary button\" type=\"submit\">
            <i class=\"send icon\"></i>
            Send
        </button>
    </form>
</div>

<div class=\"ui centered basic segment\">
    <div class=\"ui vertical spaced basic fluid buttons\">
      <button class=\"ui button\">
          <i class=\"bug black icon\"></i>
          (Debug) Publish a response
      </button>
        <button class=\"ui button\">
            <i class=\"image red icon\"></i>
            Create an image
        </button>
        <button class=\"ui button\">
            <i class=\"shuttle van blue icon\"></i>
            Top 5 travel destinations</button>
        <button class=\"ui button\">
            <i class=\"image yellow icon\"></i>
            Build a travel itinerary</button>
    </div>
</div>
";
    }

    // line 77
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 78
        echo "<script type=\"importmap\">
  {
    \"imports\": {
      \"@google/generative-ai\": \"https://esm.run/@google/generative-ai\"
    }
  }
</script>
<script type=\"module\">
  import { GoogleGenerativeAI } from \"@google/generative-ai\";

  window.GoogleGenerativeAI = GoogleGenerativeAI;

</script>
<script>
  window.onload = () => {
    GoogleGenerativeAI();


    // Fetch your API_KEY
    const GOOGLE_GEMINI_API_KEY = \"AIzaSyCjugUsUouNEnNuiGmUggTWUaqDIyBjPW4\";

    // Run
    const genAI = new GoogleGenerativeAI(GOOGLE_GEMINI_API_KEY);
    const model = genAI.getGenerativeModel({ model: \"gemini-1.5-flash\" });

    const prompt = \"Write a story about a magic backpack.\";

    const result = await model.generateContent(prompt);
    console.log(result.response.text()); 
  }

</script>
";
    }

    public function getTemplateName()
    {
        return "pages/chatbot.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 78,  126 => 77,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/chatbot.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/chatbot.html");
    }
}
