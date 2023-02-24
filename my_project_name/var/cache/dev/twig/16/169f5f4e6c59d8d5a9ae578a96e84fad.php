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

/* conference/e-commerce/e-commerce.html.twig */
class __TwigTemplate_7c864ada4a50b929fce16239a3214ce7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conference/e-commerce/e-commerce.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "conference/e-commerce/e-commerce.html.twig"));

        // line 1
        echo "<!Doctype html>
<html>
<head>
    <title>Articles Selectionnés</title>
</head>
<body>
    <div class=\"Camping\" style=\"display:grid; grid-column: auto;\"><h1>Camping materials </h1>
      <div>
      <h2>QUECHA</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">156DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\" alt=\"Tente de camping - MH100 - 2 places\" srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\">
        <p>Tente De Camping -MH100-2 Places</p>
          <form  method=\"post\" class=\"counter\" >
          <button onclick=\"return false\" class=\"btn\" >--</button>

          <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
          <button onclick=\"return false\" >+</button>

          </form>
          <a href=\"";
        // line 20
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("cart-index");
        echo "\" > <button >Ajouter Au Panier</button></a>

      </div>

    <div >

        <h2>FORCLAZ</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">234DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-src=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-srcset=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\" alt=\"Tente dôme de trekking - 2 places - MT100\" srcset=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\">
        <p>Tente Dome De Trekking -MT100-2 Places</p>
        <form  method=\"post\" class=\"counter\" >
            <button onclick=\"return false\" class=\"btn\" >--</button>

            <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
            <button onclick=\"return false\" >+</button>

        </form>
        <a > <button >Ajouter Au Panier</button></a>
    </div>
    <div >

        <h2>QUECHA</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">26DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-src=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-srcset=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\" alt=\"Petit sac à dos de randonnée enfant 5L - MH100\" title=\"Petit sac à dos de randonnée enfant 5L - MH100\" itemprop=\"image\" srcset=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\">
        <p>Petit Sac à dos de randonnée Enfant 5L -MH100</p>
        <form  method=\"post\" class=\"counter\" >
            <button onclick=\"return false\" class=\"btn\" >--</button>

            <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
            <button onclick=\"return false\" >+</button>
        </form>
        <a> <button >Ajouter Au Panier</button></a>
    </div>
    </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "conference/e-commerce/e-commerce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 20,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!Doctype html>
<html>
<head>
    <title>Articles Selectionnés</title>
</head>
<body>
    <div class=\"Camping\" style=\"display:grid; grid-column: auto;\"><h1>Camping materials </h1>
      <div>
      <h2>QUECHA</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">156DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\" alt=\"Tente de camping - MH100 - 2 places\" srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\">
        <p>Tente De Camping -MH100-2 Places</p>
          <form  method=\"post\" class=\"counter\" >
          <button onclick=\"return false\" class=\"btn\" >--</button>

          <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
          <button onclick=\"return false\" >+</button>

          </form>
          <a href=\"{{ path('cart-index') }}\" > <button >Ajouter Au Panier</button></a>

      </div>

    <div >

        <h2>FORCLAZ</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">234DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-src=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180\" data-srcset=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\" alt=\"Tente dôme de trekking - 2 places - MT100\" srcset=\"https://contents.mediadecathlon.com/p1801167/k\$7de7cfb4280922bbcd9cb6f592477254/prod.jpg?format=auto&amp;quality=60&amp;f=250x180 1x\">
        <p>Tente Dome De Trekking -MT100-2 Places</p>
        <form  method=\"post\" class=\"counter\" >
            <button onclick=\"return false\" class=\"btn\" >--</button>

            <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
            <button onclick=\"return false\" >+</button>

        </form>
        <a > <button >Ajouter Au Panier</button></a>
    </div>
    <div >

        <h2>QUECHA</h2>
        <p style=\"color: wheat; background-color: #0d376f; background-size:20px; width: 50px;\">26DT</p>
        <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-src=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-srcset=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\" alt=\"Petit sac à dos de randonnée enfant 5L - MH100\" title=\"Petit sac à dos de randonnée enfant 5L - MH100\" itemprop=\"image\" srcset=\"https://contents.mediadecathlon.com/p1760782/k\$8a56d649dbe866ce4f761632f6a2bb54/sac-a-dos-de-randonnee-enfant-mh100-5-litres.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\">
        <p>Petit Sac à dos de randonnée Enfant 5L -MH100</p>
        <form  method=\"post\" class=\"counter\" >
            <button onclick=\"return false\" class=\"btn\" >--</button>

            <input style=\"width: 50px;\" type=\"number\" name=\"qty\" id=\"qty\" min=\"0\" max=\"99\">
            <button onclick=\"return false\" >+</button>
        </form>
        <a> <button >Ajouter Au Panier</button></a>
    </div>
    </div>
</body>
</html>", "conference/e-commerce/e-commerce.html.twig", "C:\\wamp64\\bin\\php\\php8.1.13\\my_project_name\\templates\\conference\\e-commerce\\e-commerce.html.twig");
    }
}
