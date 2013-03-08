<?php

use JMS\Serializer\Metadata\ClassMetadata;
use JMS\Serializer\Metadata\PropertyMetadata;

$metadata = new ClassMetadata('JMS\Serializer\Tests\Fixtures\BlogPost');
$metadata->xmlRootName = 'blog-post';

$metadata->registerNamespace('http://example.com/namespace');
$metadata->registerNamespace('http://schemas.google.com/g/2005', 'gd');
$metadata->registerNamespace('http://www.w3.org/2005/Atom', 'atom');

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'title');
$pMetadata->setType('string');
$pMetadata->groups = array('comments','post');
$metadata->addPropertyMetadata($pMetadata);

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'createdAt');
$pMetadata->setType('DateTime');
$pMetadata->xmlAttribute = true;
$metadata->addPropertyMetadata($pMetadata);

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'published');
$pMetadata->setType('boolean');
$pMetadata->serializedName = 'is_published';
$pMetadata->groups = array('post');
$pMetadata->xmlAttribute = true;
$metadata->addPropertyMetadata($pMetadata);

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'etag');
$pMetadata->setType('string');
$pMetadata->groups = array('post');
$pMetadata->xmlAttribute = true;
$pMetadata->xmlPrefix = 'gd';
$metadata->addPropertyMetadata($pMetadata);

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'comments');
$pMetadata->setType('ArrayCollection<JMS\Serializer\Tests\Fixtures\Comment>');
$pMetadata->xmlCollection = true;
$pMetadata->xmlCollectionInline = true;
$pMetadata->xmlEntryName = 'comment';
$pMetadata->groups = array('comments');

$metadata->addPropertyMetadata($pMetadata);

$pMetadata = new PropertyMetadata('JMS\Serializer\Tests\Fixtures\BlogPost', 'author');
$pMetadata->setType('JMS\Serializer\Tests\Fixtures\Author');
$pMetadata->groups = array('post');
$pMetadata->xmlPrefix  = 'atom';

$metadata->addPropertyMetadata($pMetadata);

return $metadata;