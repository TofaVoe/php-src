--TEST--
SimpleXML: modifying attributes of singular subnode
--SKIPIF--
<?php if (!extension_loaded("simplexml")) print "skip"; ?>
--FILE--
<?php 
$xml =<<<EOF
<people>
   <person name="Joe"></person>
</people>
EOF;

$people = simplexml_load_string($xml);
var_dump($people->person['name']);
$people->person['name'] = $people->person['name'] . 'Foo';
var_dump($people->person['name']);
$people->person['name'] .= 'Bar';
var_dump($people->person['name']);

echo "---[0]---\n";

$people = simplexml_load_string($xml);
var_dump($people->person[0]['name']);
$people->person[0]['name'] = $people->person[0]['name'] . 'Foo';
var_dump($people->person[0]['name']);
$people->person[0]['name'] .= 'Bar';
var_dump($people->person[0]['name']);

echo "---Done---\n";
?>
--EXPECT--
string(3) "Joe"
string(3) "JoeFoo"
string(3) "JoeFooBar"
---[0]---
string(3) "Joe"
string(3) "JoeFoo"
string(3) "JoeFooBar"
---Done---
