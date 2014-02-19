Gladdress_PHP_Lib
=================

Gladdress.com PHP Client Library

How to use
----------

_Instantiate the GladdressProfile Class and retrieve the data_

```
$gladdressProfile = new GladdressProfile('046632BC-8B3A-485D-8213-9527132C97C9');
```

_Request available fields of the profile_

See http://gladdress.com/Documentation/Fields for a complete list of available fields

```
$gladdressProfile->getFields();
```

_Request Properties_

```
$gladdressProfile->get('FirstName');
```

See test.php for a test implementation.
