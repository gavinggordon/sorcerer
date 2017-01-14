# GGG\Http\Data\Collection\Sorcerer

[![Version Released](https://img.shields.io/github/version/gavinggordon/sorcerer.svg)](https://github.com/gavinggordon/sorcerer/master)
[![Usage License](https://img.shields.io/github/license/gavinggordon/sorcerer.svg)](https://github.com/gavinggordon/sorcerer/blob/master/LICENSE.txt)

## Description
An easy-to-use PHP class for scraping webpages' source code.

## Usage

### Install
```
	$ composer require gavinggordon/sorcerer
```

### Autoload
``` php
	include( 'vendor/autoload.php' );
```

### Insantiate
``` php
	use GGG\Http\Data\Collection\Sorcerer as Sorcerer;
	
	$scraper = new Sorcerer;
```

### Configure
``` php
	$url = 'http://www.testurl.com/index.php';
	
	$regexes = [
		'/\<a\s?[^\>]+?\>(.+)\<\/a\>/i',
		'/\<img\s?([^\>]+?)[\s\/]*?\>/i'
	];
	
	$savefile = __DIR__ . './testurl-scrapedata.txt';
	
	$scraper->configure( $url, $regexes, $savefile );
```

### Run 
If no filepath was set for "$savefile",...
```php
	$data = $scraper->scrape();
	
	print_r( $data );
```
...the scraped data will be returned.


If a filepath was set for "$savefile",...
```php
	$scraper->scrape();
```
...the scraped data will be saved to 
the file which you specified.

## License

This PHP class package utilizes the MIT License.