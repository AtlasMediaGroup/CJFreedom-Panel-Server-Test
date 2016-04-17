<?php
/**
* CJFreedom Panel - Server Test Script
* @version 1.0.0
* 
* @copyright The CJFreedom Team 2016
* @author Matt Kent
*
* @license GNU Public License Version 3
*
* @codingStandardsIgnoreFile
*
*/

class CjTest
{
	public $version = '1.0.0';

	public $minPhp = '5.5.0';

	public $recoSql = '5.5';

	public $mods = ['mod_rewrite', 'GD', 'pdo', 'openssl'];

	public $sqlnotreco = false;

	public $allClear = false;

	public function __construct()
	{
		if (!$this->checkPhp() OR !$this->checkPdoSql() OR !$this->checkSsl() OR !$this->checkGd() OR !$this->checkPdo() OR !$this->checkModRewrite())
		{
			$this->allClear = false;
		} else {
			$this->allClear = true;
		}
	}


	public function checkPhp()
	{
		if (version_compare(PHP_VERSION, (int) $this->minPhp) >= 0)
		{
			return true;
		} else {
			return false;
		}
	}

	public function checkGd()
	{
		if (!extension_loaded('GD') AND !function_exists('GD')) {
			return false;
		} else {
			return true;
		}
	}

	public function checkPdo()
	{
		if (!extension_loaded('pdo') AND !function_exists('pdo')) {
			return false;
		} else {
			return true;
		}
	}

	public function checkPdoSql()
	{
		if (!extension_loaded('pdo_mysql') AND !function_exists('pdo_mysql')) {
			return false;
		} else {
			return true;
		}
	}

	public function checkSsl()
	{
		if (!extension_loaded('openssl') AND !function_exists('openssl')) {
			return false;
		} else {
			return true;
		}
	}

	public function checkModRewrite()
	{
		if (!in_array('mod_rewrite', apache_get_modules())) {
			return false;
		} else {
			$this->allClear = true;
			return true;
		}
	}
}

$cj = new CjTest();
?>

<!doctype html>
<html>
    <head>
        <title>CJFreedom Panel - Server Requirements</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">



        <style>
            html, body {
                height: 100%;
            }
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
                text-align: center; /* THIS IS 4 INTERNET EXPLORER >= 5.5 lol */
            }
            .container {
                text-align: center;
                display: table-cell;
                vertical-align: top;
            }
            .content {
                text-align: center;
                display: inline-block;
            }
            .title {
                font-size: 35px;
                margin-top: 5px;
            }

            .sub {
                font-size: 16px;
            }

            .mini-sub {
                font-size: 16px;
                font-weight: bold;
            }

            table.center {
                margin-left:auto; 
                margin-right:auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">CJFreedom Panel</div>
                <div class="sub">Server Requirements Test</div>
           <div class="mini-sub">
           <br />
           <hr />
           <br />     
           <small><?php if ($cj->allClear) { echo '<span style="color: green">Congratulations! Your server can run the CJFreedom Panel.</span><br /><br />'; } else { echo '<span style="color: red">Sorry! Your server cannot run the CJFreedom Panel.</span><br /><br /><a class="pure-button pure-button-primary" href="' . $_SERVER["REQUEST_URI"] . '"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</a><br /><br />'; } ?></small>
                <table class="pure-table center">
    <thead>
        <tr>
            <th>Requirement</th>
            <th>Okay?</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>PDO</td>
            <td><?php if ($cj->checkPhp()) { echo '<span style="color: green;">Yes</span>'; } else { echo '<span style="color: red;">No</span>'; } ?></td>
        </tr>

        <tr>
            <td>PDO_MySQL</td>
            <td><?php if ($cj->checkPdoSql()) { echo '<span style="color: green;">Yes</span>'; } else { echo '<span style="color: red;">No</span>'; } ?></td>
        </tr>

        <tr>
            <td>GD</td>
            <td><?php if ($cj->checkGd()) { echo '<span style="color: green;">Yes</span>'; } else { echo '<span style="color: red;">No</span>'; } ?></td>
        </tr>

        <tr>
            <td>OpenSSL</td>
            <td><?php if ($cj->checkSsl()) { echo '<span style="color: green;">Yes</span>'; } else { echo '<span style="color: red;">No</span>'; } ?></td>
        </tr>

        <tr>
            <td>mod_rewrite</td>
            <td><?php if ($cj->checkModRewrite()) { echo '<span style="color: green;">Yes</span>'; } else { echo '<span style="color: red;">No</span>'; } ?></td>
        </tr>
    </tbody>
</table>
<br />
<small><a style="text-decoration: none; color:black;" href="https://thecjgcjg.com/forum" target="_blank">Powered by CJFreedom</a></small>
</div>
            </div>
        </div>
    </body>
</html>