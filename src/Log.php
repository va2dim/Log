<?php declare (strict_types = 1);
namespace memCrab\Log;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

/**
 *  Log for core project
 *
 *  @author Oleksandr Diudiun
 */
class Log {

	private static $instance;

	function __construct($name) {
		$logger = new Logger('name');

		$logger->pushHandler(new RotatingFileHandler('logs/' . $name . '/' . $name . '.log'));
	}

	public static function stream($name) {
		if (!isset(self::$instance[$name])) {
			self::$instance[$name] = new self($name);
		}

		return self::$instance[$name];
	}
}
