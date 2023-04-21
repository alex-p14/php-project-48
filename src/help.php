<?php

namespace Difference\Calculator\Help;

function output()
{
    $doc = <<<DOC
    Generate diff
    
    Usage:
      gendiff (-h|--help)
      gendiff (-v|--version)
      gendiff [--format <fmt>] <firstFile> <secondFile>
    
    Options:
      -h --help                        Show this screen
      -v --version                     Show version
      --format <fmt>                   Report format [default: stylish]

    DOC;
    
    $args = \Docopt::handle($doc, array('version'=>'gendiff 1.0'));
    foreach ($args as $k=>$v) {
        echo $k.': '.json_encode($v).PHP_EOL;
    }
}
