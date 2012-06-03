<?php

namespace AdamQuaile\PrettyRest;

interface ParserInterface {

    /**
     * Given a filename, parse and return a Document
     * object representing the contents of that file.
     *
     * @abstract
     * @param $filename Path to reST file.
     * @return Document
     */
    public function createDocumentFromFile($filename);
}

// class PhpParser implements ParserInterface {};