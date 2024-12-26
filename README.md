# Phariable

A VariableResolver for resolving variables in strings and arrays.

Supporting:
- Simple Variables like `${name}`
- Namespaces `${names:name}`
- Custom syntax like `%<name>`
- Variable variables like `${${var}}` where `var` resolves to `name`. 

## Example

### Very simple example

*My Name: ${name}* => My Name: Jan

