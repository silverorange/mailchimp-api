<?php

require_once 'PEAR/PackageFileManager2.php';

$version = '1.3.2so1';
$notes = <<<EOT
MailChimp API version 1.3.2
EOT;

$description =<<<EOT
Packages the MailChimp MCAPI mini API PHP Wrapper.
EOT;

$package = new PEAR_PackageFileManager2();
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$package->setOptions(
	array(
		'filelistgenerator' => 'svn',
		'simpleoutput'      => true,
		'baseinstalldir'    => '/',
		'packagedirectory'  => './',
		'exceptions'        => array(
			'README'        => 'doc',
		),
	)
);

$package->setPackage('MailChimpAPI');
$package->setSummary('MailChimp API Wrapper');
$package->setDescription($description);
$package->setChannel('pear.silverorange.com');
$package->setPackageType('php');
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.html');

$package->setReleaseVersion($version);
$package->setReleaseStability('stable');
$package->setAPIVersion('1.3.2');
$package->setAPIStability('stable');
$package->setNotes($notes);

$package->addIgnore('package.php');

$package->addMaintainer('lead', 'isaac', 'Isaac Grant', 'isaac@silverorange.com');

$package->setPhpDep('5.1.5');
$package->setPearinstallerDep('1.4.0');
$package->generateContents();

if (isset($_GET['make']) || (isset($_SERVER['argv']) && @$_SERVER['argv'][1] == 'make')) {
	$package->writePackageFile();
} else {
	$package->debugPackageFile();
}

?>
