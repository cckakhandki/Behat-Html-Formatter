## BehatHtmlFormatterPlugin

Behat 3 extension for generating HTML reports from your test results.

This is a fork from https://github.com/dutchiexl/BehatHtmlFormatterPlugin
I have updated the plugin for screenshots. It can take screenshot on failure.

### Twig report

![Twig Screenshot](http://i.imgur.com/o0zCqiB.png)

### Behat 2 report
![Behat2 Screenshot](http://i68.tinypic.com/15p5nox.jpg)


## How?

* The tool can be installed easily with composer.
* Defining the formatter in the `behat.yml` file
* Modifying the settings in the `behat.yml`file

## Installation

### Prerequisites

This extension requires:

* PHP 5.3.x or higher
* Behat 3.x or higher

### Through composer

The easiest way to keep your suite updated is to use [Composer](http://getcomposer.org>):

#### Install with composer:

```bash
$ composer require --dev cckakhandki/behat-html-formatter
```

#### Install using `composer.json`

Add BehatHtmlFormatterPlugin to the list of dependencies inside your `composer.json`.

```
Not yet available on packagist.org
```

```json
{
    "require": {
        "behat/behat": "3.*@stable",
        "cckakhandki/behat-html-formatter": "0.2.*",
    },
    "minimum-stability": "dev",
    "config": {
        "bin-dir": "bin/"
    }
}
```

Then simply install it with composer:

```bash
$ composer install --dev --prefer-dist
```

You can read more about Composer on its [official webpage](http://getcomposer.org).

## Basic usage

Activate the extension by specifying its class in your `behat.yml`:

```json
# behat.yml
default:
  suites:
    ... # All your awesome suites come here
  
  formatters: 
    html:
      output_path: %paths.base%/../Reports
      
  extensions:
    cckakhandki\BehatHTMLFormatter\BehatHTMLFormatterExtension:
      name: html
      renderer: Twig,Behat2
      file_name: index
      print_args: true
      print_outp: true
      loop_break: true
      screenshot_folder: Reports/`screenshot_folder`
```

## Configuration

* `output_path` - The location where Behat will save the HTML reports. The path defined here is relative to `%paths.base%` and, when omitted, will be default set to the same path.
* `renderer` - The engine that Behat will use for rendering, thus the types of report format Behat should output (multiple report formats are allowed, separate them by commas). Allowed values are:
 * *Behat2* for generating HTML reports like they were generated in Behat 2.
 * *Twig* A new and more modern format based on Twig.
 * *Minimal* An ultra minimal HTML output.
* `file_name` - (Optional) Behat will use a fixed filename and overwrite the same file after each build. By default, Behat will create a new HTML file using a random name (*"renderer name"*_*"date hour"*).
* `print_args` - (Optional) If set to `true`, Behat will add all arguments for each step to the report. (E.g. Tables).
* `print_outp` - (Optional) If set to `true`, Behat will add the output of each step to the report. (E.g. Exceptions).
* `loop_break` - (Optional) If set to `true`, Behat will add a separating break line after each execution when printing Scenario Outlines.
* `screenshot_folder` - Screenshots will be stored in this folder.

## Screenshot

The facility exists to embed a screenshot into test failures.
Currently png is the only supported image format

In order to embed a screenshot, you have to use the provided screenshot context:

```
In yml add following:

- cckakhandki\BehatHTMLFormatter\Context\BehatScreenshotContext:
    screenshot_path: %paths.base%/../Reports/`screenshot_folder`
    
```
Screenshots will be stored at path:
     %paths.base%/../Reports/`screenshot_folder`/{{screenshot_name}}.png
     
Additionally you can use step: `I take screenshot pf current page` to take screenshot at any time in scenario.

`screenshot_name` will be in the following format:
BrowserName-Y-m-d-H-i-s.png
e.g - firefox-2016-04-17-15-06-16.png

## Issue Submission

When you need additional support or you discover something *strange*, feel free to [Create a new issue](https://github.com/cckakhandki/BehatHtmlFormatterPlugin/issues/new).


## TO DO
1. Embed Screenshots in TWIG report
2. Fix argument display in reports

## License and Authors

Authors: https://github.com/dutchiexl/BehatHtmlFormatterPlugin/contributors


