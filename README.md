IE-Checker for PHP
==========

Internet Explorer version check via PHP

---

Download file or Install via composer

	composer require unk/ie-checker

If you don't use composer, require php file yourself.

	require_once( 'IEChecker.php' );

Sample code:

	use Unk\IEChecker;

	$checker = new IEChecker();
	$checker->isIE; // true or false
	$checker->version; // integer. if browser is not IE, return -1

If you need html class names, use getClass() method.

	<html class="<?php echo $checker->getClass(); ?>">
	<!--
		render example :
		<html class="is-ie ie-9 lt-ie10 lt-ie11">
	-->
