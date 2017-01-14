<?php

namespace GGG\Http\Data\Collection;

class Sorcerer
{
  private $url;
  private $regexes;
  private $savefile;
  private $sourceCode;
  private $scrapedData;

  public function __construct()
  {
    $this->url = '';
    $this->regexes = [];
    $this->savefile = false;
    $this->sourceCode = '';
    $this->scrapedData = [];
    return $this;
  }

  private function getSourceCode()
  {
    $this->sourceCode = file_get_contents( $this->url );
    return $this;
  }

  public function configure( $url, $regexes, $savefile = false )
  {
    $this->url = $url;
    $this->regexes = $regexes;
    $this->savefile = $savefile;
    return $this->getSourceCode();
  }

  public function scrape()
  {
    foreach( $this->regexes as $index => $regex )
    {
      preg_match_all( $regex, $this->sourceCode, $matches, PREG_SET_ORDER );
      $this->scrapedData[ $index ] = $matches;
    }
    return $this->getScrapedData();
  }

  private function getScrapedData()
  {
    if( $this->savefile !== false )
    {
      $data = print_r( $this->scrapedData, true );
      file_put_contents( $this->savefile, $data );
    }
    else
    {
      return $this->scrapedData;
    }
  }
}