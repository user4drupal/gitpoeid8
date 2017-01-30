<?php

/* modules/contrib/views_slideshow/templates/views-slideshow-controls-text.html.twig */
class __TwigTemplate_f4f84add546e3c6b72364042cead522c1db7bc0659ec5b121b2beb7b24018d33 extends Twig_Template
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

        // line 18
        echo "<div id=\"views_slideshow_controls_text_";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["vss_id"]) ? $context["vss_id"] : null), "html", null, true));
        echo "\" ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["rendered_control_previous"]) ? $context["rendered_control_previous"] : null), "html", null, true));
        echo "
  ";
        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["rendered_control_pause"]) ? $context["rendered_control_pause"] : null), "html", null, true));
        echo "
  ";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["rendered_control_next"]) ? $context["rendered_control_next"] : null), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/views_slideshow/templates/views-slideshow-controls-text.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 21,  54 => 20,  50 => 19,  43 => 18,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for a views slideshow text controls.*/
/*  **/
/*  * Available variables:*/
/*  * - classes: Classes to apply to the control.*/
/*  * - rendered_control_next: Text next control.*/
/*  * - rendered_control_pause: Text pause control.*/
/*  * - rendered_control_previous: Text previous control.*/
/*  * - vss_id: The slideshow's id.*/
/*  **/
/*  * @see template_preprocess_views_slideshow_controls_text()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <div id="views_slideshow_controls_text_{{ vss_id }}" {{ attributes.addClass(classes) }}>*/
/*   {{ rendered_control_previous }}*/
/*   {{ rendered_control_pause }}*/
/*   {{ rendered_control_next }}*/
/* </div>*/
/* */
