Gladdress_PHP_Lib
=================

Gladdress.com PHP Client Library

How to use
----------

#####Instantiate the GladdressProfile Class and retrieve the data

```
$gladdressProfile = new GladdressProfile('046632BC-8B3A-485D-8213-9527132C97C9');
```

#####Request available fields of the profile

See http://gladdress.com/Documentation/Fields for a complete list of available fields

```
$gladdressProfile->getFields();
```

#####Request Properties

```
$gladdressProfile->get('FirstName');
```

See test.php for a test implementation.
