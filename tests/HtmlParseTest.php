<?php

namespace Tests;

use AccuCloud\PdfToHtml\Html;
use AccuCloud\PdfToHtml\Config;
class HtmlParseTest extends \PHPUnit\Framework\TestCase
{
  public function testConvertAndCatch()
  {
    Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
    $pdf = dirname(__FILE__).'/source/test.pdf';
    $html = new Html($pdf);
    $this->assertInstanceOf('PHPHtmlParser\\Dom', $html);
  }
}
