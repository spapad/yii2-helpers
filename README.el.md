# Yii2 Helpers 

Βοηθήματα για βασικές εργασίες.

## Validators 

### VatNumberValidator 

Ο [VatNumberValidator](src/validators/VatNumberValidator.php) ελέγχει εάν ένα δεδομένο κείμενο ή ακέραιος αριθμός 
είναι έγκυρος αριθμός φορολογικού μητρώου (ΑΦΜ). 
_Δεν ελέγχετε εάν ο ΑΦΜ έχει αποδοθεί σε φυσικό ή νομικό πρόσωπο._

*Παράμετροι*

* allowEmpty, boolean: Ελέγχει εάν γίνεται αποδεκτή κενή τιμή

*Δείγμα κανόνα ελέγχου εγκυρότητας*

```php
['afm', VatNumberValidator::className(), 'allowEmpty' => false],
```

### DefaultOnOtherAttributeValidator 

Ο [DefaultOnOtherAttributeValidator](src/validators/DefaultOnOtherAttributeValidator.php) 
θέτει την τιμή της ιδιότητας `otherAttribute` στην τιμή
`otherAttributeValue` εφόσον η τιμή της είναι κενή  ή εφόσον το 
`replace` είναι ίσο με true και η τιμή της ιδιότητας υπό εξέταση 
είναι ίση με την τιμή `if`.

*Παράμετροι*

* if, scalar: Η τιμή που πρέπει να έχει η ιδιότητα (χρησιμοποιείται μη αυστηρός έλεγχος ισότητας)
* otherAttributeValue, any value: Η "προκαθορισμένη" τιμή που θα αποδοθεί 
* otherAttribute, string: Το όνομα της ιδιότητας που θα λάβει την προκαθορισμένη τιμή (εάν είναι "κενή")
* replace, boolean: Καθορίστε τιμή true για να γίνει υποχρεωτική αλλαγή της τιμής της otherAttribute 

*Δείγμα κανόνα ελέγχου εγκυρότητας*

```php
[['do_action'], DefaultOnOtherAttributeValidator::className(), 'if' => 'yes', 'otherAttributeValue' => -1, 'otherAttribute' => 'selected_action_element'],
```
