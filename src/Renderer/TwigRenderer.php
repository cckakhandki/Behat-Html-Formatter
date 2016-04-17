<?php

namespace cckakhandki\BehatHTMLFormatter\Renderer;

use cckakhandki\BehatHTMLFormatter\Formatter\BehatHTMLFormatter;
use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * Twig renderer for Behat report
 *
 * Class TwigRenderer
 * @package emuse\BehatHTMLFormatter\Renderer
 */
class TwigRenderer
{
    /**
     * Renders before an exercise.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeExercise(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after an exercise.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterExercise(BehatHTMLFormatter $obj)
    {

        $templatePath = dirname(__FILE__) . '/../../templates';
        $loader = new Twig_Loader_Filesystem($templatePath);
        $twig = new Twig_Environment($loader, array());
        $print = $twig->render('index.html.twig',
            array(
                'suites' => $obj->getSuites(),
                'failedScenarios' => $obj->getFailedScenarios(),
                'passedScenarios' => $obj->getPassedScenarios(),
                'failedSteps' => $obj->getFailedSteps(),
                'passedSteps' => $obj->getPassedSteps(),
                'failedFeatures' => $obj->getFailedFeatures(),
                'passedFeatures' => $obj->getPassedFeatures(),
                'printStepArgs' => $obj->getPrintArguments(),
                'printStepOuts' => $obj->getPrintOutputs(),
                'printLoopBreak' => $obj->getPrintLoopBreak(),
            )
        );

        return $print;
    }

    /**
     * Renders before a suite.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeSuite(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after a suite.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterSuite(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders before a feature.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeFeature(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after a feature.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterFeature(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders before a scenario.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeScenario(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after a scenario.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterScenario(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders before an outline.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeOutline(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after an outline.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterOutline(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders before a step.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderBeforeStep(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * Renders after a step.
     *
     * @param BehatHTMLFormatter $obj
     * @return string  : HTML generated
     */
    public function renderAfterStep(BehatHTMLFormatter $obj)
    {
        return '';
    }

    /**
     * To include CSS
     *
     * @return string  : HTML generated
     */
    public function getCSS()
    {
        return '';
    }

    /**
     * To include JS
     *
     * @return string  : HTML generated
     */
    public function getJS()
    {
        return '';
    }
}
