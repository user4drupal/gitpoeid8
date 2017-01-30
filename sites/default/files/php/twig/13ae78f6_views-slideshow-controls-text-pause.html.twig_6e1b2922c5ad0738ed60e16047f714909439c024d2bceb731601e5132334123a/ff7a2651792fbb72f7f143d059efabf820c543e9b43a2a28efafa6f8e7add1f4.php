<?php

/* modules/contrib/views_slideshow/templates/views-slideshow-controls-text-pause.html.twig */
class __TwigTemplate_ea4abdd77bd374c5b3328a0f206159169e839bda43c237091c9ebc400b687a62 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 16
        echo "<span id=\"views_slideshow_controls_text_pause_";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["vss_id"]) ? $context["vss_id"] : null), "html", null, true));
        echo "\" ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  <a href=\"#\">";
        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["start_text"]) ? $context["start_text"] : null), "html", null, true));
        echo "</a>
</span>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/views_slideshow/templates/views-slideshow-controls-text-pause.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 17,  43 => 16,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for a views slideshow text pause control.*/
/*  **/
/*  * Available variables:*/
/*  * - classes: Classes to apply to the control.*/
/*  * - start_text: Text to display while playing.*/
/*  * - vss_id: The slideshow's id.*/
/*  **/
/*  * @see template_preprocess_views_slideshow_controls_text_pause()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <span id="views_slideshow_controls_text_pause_{{ vss_id }}" {{ attributes.addClass(classes) }}>*/
/*   <a href="#">{{ start_text }}</a>*/
/* </span>*/
/* */
