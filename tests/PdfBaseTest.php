<?php

namespace Tests;

use AccuCloud\PdfToHtml\Base;
use AccuCloud\PdfToHtml\Config;
use AccuCloud\PdfToHtml\Pdf;

class PdfBaseTest extends \PHPUnit\Framework\TestCase
{
  public function testConfiguration()
  {
    $pdf = new Base;
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
    $this->assertEquals('/usr/local/bin/pdftohtml', $pdf->bin());
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
    $this->assertEquals('/usr/local/bin/pdftohtml', $pdf->bin());
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
  }
  public function testInfoConfiguration()
  {
  Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
    $pdf = new Pdf(dirname(__FILE__).'/source/test.pdf');
    $this->assertEquals('/usr/local/bin/pdfinfo', $pdf->bin());
    Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
    $this->assertEquals('/usr/local/bin/pdfinfo', $pdf->bin());
    Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
  }

  public function testConvertAsRaw(){

    Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
    $pdf = new Pdf(dirname(__FILE__).'/source/test.pdf');
    $html = $pdf->html();
    preg_match('/(Sample)/', $html, $matches);
    $this->assertEquals('Sample', $matches[0]);
  }
}
