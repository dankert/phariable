# Phariable

A VariableResolver for resolving variables in strings and arrays.

Supporting:
- Simple Variables like `${name}`
- Default values `${name:unknown}`
- Namespaces `${names.name}`
- Custom syntax like `%(name)`
- Variable variables like `${${var}}` where `var` resolves to `name` and `name` to the value. 

## Usage

    $resolver = new VariableResolver();
    $resolver->addDefaultResolver( array (
    'name' => 'Jan',
    ) );
    echo $resolver->resolveVariables( 'Hello, my Name is ${name}.' );

The resolver can be an Array or a Closure.

## Example

### Very simple example

*My Name: ${name}* => My Name: Jan

### More examples

[More examples here](index.php).