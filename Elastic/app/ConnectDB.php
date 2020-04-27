<?php 
  use Elasticsearch\ClientBuilder;
  require 'vendor/autoload.php';
  $client = ClientBuilder::create()->setHosts(['127.0.0.1:9200'])->build();
    if (!$client) {
        echo 'can not connected';
        
    }
?>

