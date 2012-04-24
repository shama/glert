<?php
App::uses('Glert', 'Glert.Lib');

/**
 * Glert Test
 *
 * @package Glert
 * @copyright 2012 Kyle Robinson Young <kyle at dontkry.com>
 */
class GlertTest extends CakeTestCase {

/**
 * testFInd
 */
	public function testFind() {
		$path = CakePlugin::path('Glert') . 'Test' . DS . 'Fixture' . DS . 'test_feed.xml';
		$xml = file_get_contents($path);
		$result = Glert::find($xml);
		$expected = array(
			array(
				'https://github.com/mcallisto/cakephp-twitteroauth',
				'github.com/mcallisto/cakephp-twitteroauth',
				'mcallisto',
				'cakephp-twitteroauth',
			),
		);
		$this->assertEquals($expected, $result);
	}

}