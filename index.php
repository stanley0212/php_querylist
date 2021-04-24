<?php
require 'vendor/autoload.php';

use QL\QueryList;

$data = QueryList::get('https://ausluv.com/bbs/search.php?mod=forum&searchid=4&orderby=lastpost&ascdesc=desc&searchsubmit=yes&kw=covid')->rules([
    'link' => ['h3>a','href','',function($content){
        $baseUrl = 'https://ausluv.com/bbs/';
        return $baseUrl.$content;
    }],
    'text' => ['h3>a','text']
])->range('.tl li')->query()->getData();
print_r($data->all());
