<?php

namespace cckakhandki\BehatHTMLFormatter\Context;

use Behat\Behat\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

/**
 * Class BehatFormatterContext
 */
class ScreenshotContext implements SnippetAcceptingContext {
    private $output_path;
    private $print_url;
    
    /** @var string $text_color Hex color code */
    private $text_color;
    
    /** @var int $x X-coordinate */
    private $x;
    
    /** @var int $x Y-coordinate */
    private $y;
    
    /** @var \Drupal\DrupalExtension\Context\MinkContext */
    private $minkContext;
    
    /**
     * @param string $screenshot_path
     */
    public function __construct($screenshot_path, $print_url = 'no', $text_color = '#ffffff', $x=50, $y=25) {
        $this->output_path = $screenshot_path;
        $this->print_url = $print_url;
        if (strcasecmp($this->print_url, 'yes') == 0) {
            $this->text_color = $text_color;
            $this->x = $x;
            $this->y = $y;
        }
    }
    
    /**
     * @BeforeScenario
     */
    public function gatherContexts(BeforeScenarioScope $scope) {
        $environment = $scope->getEnvironment();
        $this->minkContext = $environment->getContext('Drupal\DrupalExtension\Context\MinkContext');
    }
    
    /**
     * @Then /^I take screenshot of current page$/
     */
    public function getScreenshot($return = FALSE) {
        if (!is_dir($this->output_path)) {
            mkdir ($this->output_path, 0755, TRUE);
        }
        $browser = $this->minkContext->getMinkParameter('browser_name');
        $fileName = $browser . '-' . date('Y-m-d-H-i-s') . '.png';
        $this->minkContext->saveScreenshot($fileName, $this->output_path);
        $screenshot_path = $this->output_path . '/' . $fileName;
        print "Screenshot saved at : " . realpath($screenshot_path) . PHP_EOL;
        // Print url of the cuurent page on the screenshot.
        if (strcasecmp($this->print_url, 'yes') == 0) {
            $url = $this->minkContext->getSession()->getCurrentUrl();
            $image = imagecreatefrompng(realpath($screenshot_path));
            list($r, $g, $b) = sscanf($this->text_color, "#%02x%02x%02x");
            $color = imagecolorallocate($image, $r, $g, $b);
            // Write page url on the screenshot.
            if (imagestring($image, 5, $this->x, $this->y, $url, $color)) {
                // Save the file.
                imagepng($image, realpath($screenshot_path));
            }
            // Clear Memory
            imagedestroy ($image);
        }
        if ($return)
            return $fileName;
    }
}
