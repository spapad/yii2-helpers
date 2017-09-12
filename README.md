# Yii2 Helpers 

Utilities for common tasks.

## Validators 

### VatNumberValidator 

[VatNumberValidator](src/validators/VatNumberValidator.php) validator validates if a string or integer can be a valid VAT number. 
_This does not validate if a VAT number is registered for use._

*Validaror Parameters*

* allowEmpty, boolean: Whether to allow empty value or not

*Example rule*

```php
['afm', VatNumberValidator::className(), 'allowEmpty' => false],
```

### DefaultOnOtherAttributeValidator 

[DefaultOnOtherAttributeValidator](src/validators/DefaultOnOtherAttributeValidator.php) 
sets a default value `otherAttributeValue` on another attibute named 
`otherAttribute`, if that attribute does not have a value and 
if the value of the checked attribute is a certain one (`if`).

*Validaror Parameters*

* if, scalar: The value to check against the attribute value (not strict operator used)
* otherAttributeValue, any value: The "default" value to set
* otherAttribute, string: The name of the attribute to set (if empty) 

*Example rule*

```php
[['do_action'], DefaultOnOtherAttributeValidator::className(), 'if' => 'yes', 'otherAttributeValue' => -1, 'otherAttribute' => 'selected_action_element'],
```
