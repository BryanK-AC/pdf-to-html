<?php

namespace Tests;

use AccuCloud\PdfToHtml\Pdf;
use AccuCloud\PdfToHtml\Config;

class PdfInfoTest extends \PHPUnit\Framework\TestCase
{
  public function setUp() : void {
    parent::setUp();

    Config::set('pdfinfo.bin', '/usr/local/bin/pdfinfo');
    Config::set('pdftohtml.bin', '/usr/local/bin/pdftohtml');
  }
  public function testGetOptions()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
  public function testAbstract()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    //$html = $pdf->getDom();
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
  public function testChangePage()
  {
    $file = dirname(__FILE__).'/source/test.pdf';
    $pdf = new Pdf($file);
    $html = $pdf->getDom();

    $this->assertEquals(1, $html->getCurrentPage());
    $html->goToPage(1);
    $this->assertEquals(1, $html->getCurrentPage());
    $this->assertEquals(1, $html->getTotalPages());
    $this->assertArrayHasKey('pages', $pdf->getInfo());
  }
}
