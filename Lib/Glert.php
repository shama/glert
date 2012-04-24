<?php
App::uses('Xml', 'Utility');

/**
 * Google Alert Xml Extension
 *
 * @package Glert
 * @copyright 2012 Kyle Robinson Young <kyle at dontkry.com>
 */
class Glert extends Xml {

/**
 * Find specific URLs within an Google Alert feed
 *
 * @param string $url Google Alert feed URL
 * @param string $pattern A regex to filter URLs
 * @return array List of URLs
 */
	public static function find($url = null, $pattern = '@github\.com\/(.*)\/(.*)@i') {
		$xml = self::build($url);
		$urls = array();
		foreach ($xml->entry as $entry) {
			$params = array();
			parse_str((string)$entry->link['href'], $params);
			$link = !empty($params['q']) ? $params['q'] : false;
			preg_match($pattern, $link, $matches);
			if (!empty($matches)) {
				array_unshift($matches, $link);
				$urls[] = $matches;
			}
		}
		return $urls;
	}

}