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

/* cart/index.html.twig */
class __TwigTemplate_37bb8b9e87908d44caf5107814dffff4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base-front.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cart/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "cart/index.html.twig"));

        $this->parent = $this->loadTemplate("base-front.html.twig", "cart/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Mon panier";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
<main class=\"page-wrapper\">

   <div class=\"container\">
      <div class=\"row\">
         <div class=\"col-lg-12\">
            <h2  style=\"color: red;\" class=\"pt-md-2\">Produits Selectionnés </h2>
            <p>Ajouter au panier d'autres articles disponibles sur le site<a href=\"\">Voir les articles</a> </p>


              <div>
                 <a href=\"#\">
                    <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\" alt=\"Tente de camping - MH100 - 2 places\" title=\"Tente de camping - MH100 - 2 places\" itemprop=\"image\" srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\"></a>                 </a>
                 <div class=\"w-100\">
                    <div class=\"d-flex\">
                       <p>Tente de camping - mh100 - 2 places</p>

                       <div class=\"me-3\">
                          <h3 class=\"h5 mb-2\"><a href=\"#\"></a></h3>
                          <p class=\"mb-2\"></p>
                       </div>
                       <div class=\"text-end\">
                          <div class=\"fs-5\">156\$</div>
                       </div>
                    </div>
                    <div class=\"count-input\">
                       <a href=\"\" class=\"btn\" data-decrement>-</a>
                       <input class=\"form-control\" style=\"width: 50px\" type=\"number\"  readonly>
                       <a href=\"\" class=\"btn\" data-increment>+</a>

                    </div>
                    <div class=\"nav\">
                       <a class=\"nav-link\" href=\"\" data-bs-toggle=\"tooltip\" title=\"Remove\">
                          <i class=\"ai-trash\"></i>
                       </a>
                    </div>

                 </div>
              </div>

            <ul class=\"List-unstyled\">
               <li class=\"d-flex\">Taille:<span></span></li>
            </ul>
            <label for=\"cars\">Choississez la Taille:</label>

            <select name=\"cars\" id=\"cars\">
               <option value=\"volvo\">1</option>
               <option value=\"saab\">2places</option>
               <option value=\"mercedes\">4places</option>
               <option value=\"audi\">6places</option>
            </select>
            <div>Total<span>£</span></div>
            <button type=\"submit\">Valider mon panier</button>


         </div>
      </div>
   </div>

   <div class=\"container\">
      <div class=\"text-center\">
         <h1>Disponibilité en magasin</h1>
         <p>Verifier la disponibilité de votre article dans tous les magasins</p>
         <a class=\"btn\" href=\"\">Voir les produits</a>
      </div>
   </div>


</main>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "cart/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 6,  78 => 5,  59 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base-front.html.twig' %}
{% block title %}Mon panier{% endblock %}


{% block body %}

<main class=\"page-wrapper\">

   <div class=\"container\">
      <div class=\"row\">
         <div class=\"col-lg-12\">
            <h2  style=\"color: red;\" class=\"pt-md-2\">Produits Selectionnés </h2>
            <p>Ajouter au panier d'autres articles disponibles sur le site<a href=\"\">Voir les articles</a> </p>


              <div>
                 <a href=\"#\">
                    <img class=\"lazy lazy--loaded\" src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-src=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200\" data-srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\" alt=\"Tente de camping - MH100 - 2 places\" title=\"Tente de camping - MH100 - 2 places\" itemprop=\"image\" srcset=\"https://contents.mediadecathlon.com/p2376634/k\$2dbb8e5eb2ff102f949a351d3bb11664/tente-de-camping-mh100-2-personnes.jpg?format=auto&amp;quality=60&amp;f=200x200 1x\"></a>                 </a>
                 <div class=\"w-100\">
                    <div class=\"d-flex\">
                       <p>Tente de camping - mh100 - 2 places</p>

                       <div class=\"me-3\">
                          <h3 class=\"h5 mb-2\"><a href=\"#\"></a></h3>
                          <p class=\"mb-2\"></p>
                       </div>
                       <div class=\"text-end\">
                          <div class=\"fs-5\">156\$</div>
                       </div>
                    </div>
                    <div class=\"count-input\">
                       <a href=\"\" class=\"btn\" data-decrement>-</a>
                       <input class=\"form-control\" style=\"width: 50px\" type=\"number\"  readonly>
                       <a href=\"\" class=\"btn\" data-increment>+</a>

                    </div>
                    <div class=\"nav\">
                       <a class=\"nav-link\" href=\"\" data-bs-toggle=\"tooltip\" title=\"Remove\">
                          <i class=\"ai-trash\"></i>
                       </a>
                    </div>

                 </div>
              </div>

            <ul class=\"List-unstyled\">
               <li class=\"d-flex\">Taille:<span></span></li>
            </ul>
            <label for=\"cars\">Choississez la Taille:</label>

            <select name=\"cars\" id=\"cars\">
               <option value=\"volvo\">1</option>
               <option value=\"saab\">2places</option>
               <option value=\"mercedes\">4places</option>
               <option value=\"audi\">6places</option>
            </select>
            <div>Total<span>£</span></div>
            <button type=\"submit\">Valider mon panier</button>


         </div>
      </div>
   </div>

   <div class=\"container\">
      <div class=\"text-center\">
         <h1>Disponibilité en magasin</h1>
         <p>Verifier la disponibilité de votre article dans tous les magasins</p>
         <a class=\"btn\" href=\"\">Voir les produits</a>
      </div>
   </div>


</main>
{% endblock %}

", "cart/index.html.twig", "C:\\wamp64\\bin\\php\\php8.1.13\\my_project_name\\templates\\cart\\index.html.twig");
    }
}
