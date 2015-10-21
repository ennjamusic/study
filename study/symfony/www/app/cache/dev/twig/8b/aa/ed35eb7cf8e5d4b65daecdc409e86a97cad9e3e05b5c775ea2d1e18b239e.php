<?php

/* blogBlogBundle:Default:view.html.twig */
class __TwigTemplate_8baaed35eb7cf8e5d4b65daecdc409e86a97cad9e3e05b5c775ea2d1e18b239e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "     <h2>";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "title", array()), "html", null, true);
        echo "</h2>
     <div>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "text", array()), "html", null, true);
        echo "</div>
     <a href=\"#\">back</a>
 ";
    }

    public function getTemplateName()
    {
        return "blogBlogBundle:Default:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
