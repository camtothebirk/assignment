<?php
// this function convert array to xml
function convert_to_xml(SimpleXMLElement $obj, array $array)
{
    $attr = "Attribute_";
    // create array 
    foreach ($array as $key => $attribute) {
        // if value is array
        if (is_array($attribute)) {
            // create new group
            $new_obj = $obj->addChild($key);
            // call function recursievely with obj and arrtibute
            convert_to_xml($new_obj, $attribute);
        } else {
            // if attribute is not found
            if(strpos($key, $attr) !== false){
                // add attribute into xml file
                $obj->addAttribute(substr($key, strlen($attr)), $attribute);
            }else{
                // else add group into them
                $obj->addChild($key, $attribute);
            }
        }
    }
}
// declare array of characters
$test_array = array( array( "name" => "Peter Parker", "email" => "peterparker@mail.com", ), array( "name" => "Clark Kent", "email" => "clarkkent@mail.com", ), array( "name" => "Harry Potter", "email" => "harrypotter@mail.com", ) );
// create an object of simpleXMLElement
$xml = new SimpleXMLElement('<characters/>');
// function passing xml object and array
convert_to_xml($xml, $test_array);
$xml_document=$xml->asXML();
// open file characters.xml for writing purpose
$myfile = fopen("characters.xml", "w");
// write into file
fwrite($myfile, $xml_document);
// close file
fclose($myfile);