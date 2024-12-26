<html>
<head>
    <title>Test page - Phariable</title>
</head>
<body>

<?php

use phariable\VariableResolver;

require ('autoload.php');

function showExample( $name,$text,$data,$ns,$nsData,$marker,$open,$close,$defSep,$nsSep)
{
    $resolver = new VariableResolver();
?>
<h1><?php echo $name ?></h1>
<h2>Code</h2>
<pre>

$resolver = new VariableResolver();
$resolver->addDefaultResolver( <?php echo var_export($data) ?> );
<?php if  ( $ns ) { ?>$resolver->addResolver('<?php echo $ns ?>',<?php echo var_export($nsData) ?>);
<?php } ?>
<?php if ($resolver->marker!=$marker){?>$resolver->marker = '<?php echo $marker ?>';
<?php } ?>
<?php if ($resolver->open!=$open){?>$resolver->open = '<?php echo $open ?>';
<?php } ?>
<?php if ($resolver->close!=$close){?>$resolver->close = '<?php echo $close ?>';
<?php } ?>
<?php if ($resolver->namespaceSeparator!=$nsSep){?>$resolver->namespaceSeparator = '<?php echo $nsSep ?>';
<?php } ?>
<?php if ($resolver->defaultSeparator!=$defSep){?>$resolver->defaultSeparator = '<?php echo $defSep ?>';
<?php } ?>
echo $resolver->resolveVariables( '<?php echo htmlentities($text) ?>' );

</pre>

<h2>Result</h2>
<em><?php
    $resolver->addDefaultResolver( $data );
    if  ( $ns ) {
        $resolver->addResolver($ns,$nsData);
    }
    $resolver->open = $open;
    $resolver->close = $close;
    $resolver->marker = $marker;
    $resolver->defaultSeparator = $defSep;
    $resolver->namespaceSeparator = $nsSep;
    $result = $resolver->resolveVariables( $text );

    echo htmlentities($result);

?></em>
<?php }

showExample(
    'Simple Example',
    "Hello, my Name is \${name}.",
    ['name'=>'Jan'],
    null,
    null,
    '$',
    '{',
    '}',
    ':',
    '.'
);

showExample(
    'Simple Example with default values',
    "Hello, my Name is \${name:unknown}.",
    ['othername'=>'Jan'],
    null,
    null,
    '$',
    '{',
    '}',
    ':',
    '.'
);

showExample(
    'Example with custom separator characters',
    'Hello, my Name is %(name?unknown).',
    ['name'=>'Jan'],
    null,
    null,
    '%',
    '(',
    ')',
    '?',
    '>'
);

showExample(
    'Example with namespaces',
    "Hello, my Name is \${name} and today is \${date.weekday}.",
    ['name'=>'Jan'],
    'date',
    ['weekday'=>date('l')],
    '$',
    '{',
    '}',
    ':',
    '.'
);

showExample(
    'Complex Example with nested variables',
    "Hello, my Name is \${user_\${userid}}.",
    ['userid'=>'jan','user_jan'=>'Jan',],
    null,
    null,
    '$',
    '{',
    '}',
    ':',
    '.'
);
;


?>

</body>
</html>