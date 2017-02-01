# Sorcerer

[![Packagist Version](https://img.shields.io/packagist/v/gavinggordon/sorcerer.svg)](https://packagist.com/gavinggordon/sorcerer)
[![Github Release](https://img.shields.io/github/release/gavinggordon/sorcerer.svg)](https://github.com/gavinggordon/sorcerer/master)
[![Usage License](https://img.shields.io/github/license/gavinggordon/sorcerer.svg)](https://github.com/gavinggordon/sorcerer/blob/master/LICENSE.txt)

## Description
An easy-to-use PHP class for scraping webpages' source code.

## Usage

### Installation

```shellscript
	$ composer require gavinggordon/sorcerer
```

### Examples

#### Insantiation

``` php
	include( 'vendor/autoload.php' );

	use GGG\Http\Data\Collection\Sorcerer as Sorcerer;
	
	$scraper = new Sorcerer();
```

#### Configuration

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

#### Issues

If you have any issues at all, please post your findings in the issues page at [https://github.com/gavinggordon/sorcerer/issues](https://github.com/gavinggordon/sorcerer/issues).

#### License

This package utilizes the MIT License.