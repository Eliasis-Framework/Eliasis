# Eliasis PHP Framework

[![Latest Stable Version](https://poser.pugx.org/eliasis-framework/eliasis/v/stable)](https://packagist.org/packages/eliasis-framework/eliasis) [![Total Downloads](https://poser.pugx.org/eliasis-framework/eliasis/downloads)](https://packagist.org/packages/eliasis-framework/eliasis) [![Latest Unstable Version](https://poser.pugx.org/eliasis-framework/eliasis/v/unstable)](https://packagist.org/packages/eliasis-framework/eliasis) [![License](https://poser.pugx.org/eliasis-framework/eliasis/license)](https://packagist.org/packages/eliasis-framework/eliasis)

[Versión en español](README-ES.md)

![image](resources/eliasis-php-framework.png)

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Developed with Eliasis](#developed-with-eliasis)
- [Contribute](#contribute)
- [License](#license)
- [Copyright](#copyright)

---

<p align="center"><strong>Take a look at the code</strong></p>

<p align="center">
  <a href="https://youtu.be/TYGcOPhhtb0" title="Take a look at the code">
  	<img src="https://raw.githubusercontent.com/Josantonius/PHP-Algorithm/master/resources/youtube-thumbnail.jpg">
  </a>
</p>

---

### Installation

You can install Eliasis PHP Framework into your project using [Composer](http://getcomposer.org/download/). If you're starting a new project, we
recommend using the [basic app](https://github.com/eliasis-framework/app) as
a starting point. For existing applications you can run the following:

    $ composer require Eliasis-Framework/Eliasis

The previous command will only install the necessary files, if you prefer to download the entire source code (including tests, vendor folder, exceptions not used, docs...) you can use:

    $ composer require Eliasis-Framework/Eliasis --prefer-source

Or you can also clone the complete repository with Git:

	$ git clone https://github.com/Eliasis-Framework/Eliasis.git

### Requirements

This framework is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this framework, simply:

```php
$DS = DIRECTORY_SEPARATOR;

require __DIR__ . $DS . 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use Eliasis\App\App;

App::run(__DIR__);

// App::run(__DIR__, 'app', 'unique_id');

// App::run(__DIR__, 'wordpress-plugin', 'unique_id');
```

## Developed with Eliasis

| Module | Description | Type
| --- | --- | --- |
| [Search Inside](https://github.com/Josantonius/Search-Inside.git) | Easily search text within your pages or blog posts. | WordPress Plugin
| [Extensions For Grifus](https://github.com/Josantonius/Extensions-For-Grifus.git) | Extensions for the Grifus theme. | WordPress Plugin

### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).