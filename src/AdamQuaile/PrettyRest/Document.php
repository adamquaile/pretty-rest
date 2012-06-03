<?php

namespace AdamQuaile\PrettyRest;

/**
 * Representation of an reST document, which can be manipulated,
 * formatted, modified, etc...
 */
class Document {

}

$doc = new Document;

$doc->getTitle();
$doc->getAuthor();

/*


<h1>{{title}}</h1>
{{#section1}}
formatting mustache etc
{{/section1}}


 *
 */