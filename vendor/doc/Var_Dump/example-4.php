<?php
header('Content-Type: application/xhtml+xml; charset=utf-8');
header('Vary: Accept'); 
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
    <style>

        /* style for XHTML_Text */
        table.var_dump          { border-collapse:separate; border:1px solid black; border-spacing:0; }
        table.var_dump tr       { color:#006600; background:#F8F8F8; vertical-align:top; }
        table.var_dump tr.alt   { color:#006600; background:#E8E8E8; }
        table.var_dump th       { padding:4px; color:black; background:#CCCCCC; text-align:left; }
        table.var_dump td       { padding:4px; }
        table.var_dump caption  { caption-side:top; color:white; background:#339900; }
        table.var_dump i        { color: #000000; background: transparent; font-style: normal; }

        /* style for XHTML_Text */
        pre.var_dump            { line-height:1.8em; }
        pre.var_dump span.type  { color:#006600; background:transparent; }
        pre.var_dump span.value { padding:2px; color:#339900; background:#F0F0F0; border: 1px dashed #CCCCCC; }

    </style>
</head>
<body>

<?php

include_once 'Var_Dump.php';

echo '<h1>example4.php : Renderers</h1>';

/*
 * example4.php : Renderers
 *
 */

$fileHandler = tmpfile();
$linkedArray = array(TRUE, 123, 123.45);
$array = array(
    'key1' => 'The quick brown' . "\n" . 'fox jumped over' . "\n" . 'the lazy dog',
    'key2' => & $linkedArray,
    'key3' => NULL,
    'key4' => $fileHandler,
);

echo '<h2>Text</h2>';
Var_Dump::displayInit(array('display_mode' => 'Text'));
echo '<pre>';
$t = Var_Dump::display($array, TRUE);
echo str_replace('&', '&amp;', $t);
echo '</pre>';

echo '<h2>HTML4_Table</h2>';
Var_Dump::displayInit(array('display_mode' => 'HTML4_Table'));
Var_Dump::display($array);

echo '<h2>HTML4_Text</h2>';
Var_Dump::displayInit(array('display_mode' => 'HTML4_Text'));
Var_Dump::display($array);

echo '<h2>XHTML_Table</h2>';
Var_Dump::displayInit(array('display_mode' => 'XHTML_Table'));
Var_Dump::display($array);

echo '<h2>XHTML_Text</h2>';
Var_Dump::displayInit(array('display_mode' => 'XHTML_Text'));
Var_Dump::display($array);

echo '<h2>XML</h2>';
Var_Dump::displayInit(array('display_mode' => 'XML'));
echo '<pre>';
echo htmlspecialchars(Var_Dump::display($array, TRUE));
echo '</pre>';

fclose($fileHandler);

?>

</body>
</html>