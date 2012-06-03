<?php

namespace AdamQuaile\PrettyRest;

class Rst2XmlParser implements ParserInterface {

    public function __construct() {
        $this->testRequiredLibs();
    }

    /**
     * Given a filename, parse and return a Document
     * object representing the contents of that file.
     *
     * Uses the command line tool rst2xml to generate an
     * intermediate xml format, which is parsed and made
     * to fit into the Document class.
     *
     * @param $filename Path to reST file.
     * @return Document
     */
    public function createDocumentFromFile($filename)
    {

        $realPath = realpath($filename);
        if (!$realPath) {
            throw new \RuntimeException("Could not determine the full path to the given file");
        }
        if (!file_exists($realPath)) {
            throw new \InvalidArgumentException(sprintf("File does not exist: %s", $realPath));
        }
        if (!is_readable($realPath)) {
            throw new \InvalidArgumentException(sprintf("File is not readable: %s", $realPath));
        }

        exec(sprintf("rst2xml %s", escapeshellarg($realPath)), $outputLines, $returnStatus);
        $xml = implode($outputLines, '');
        var_dump($returnStatus, $xml);


    }

    private function testRequiredLibs() {
        // Zero return status in unix is good
        exec("which rst2xml", $output, $returnStatus);
        if ($returnStatus !== 0) {
            throw new \RuntimeException("Command rst2xml not found");
        }
    }

}

$parser = new \Rst2XmlParser();
$parser->createDocumentFromFile('../tests/sample-data/example.rst');