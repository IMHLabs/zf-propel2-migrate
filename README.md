# Propel Data Source
# ZF Propel Data Source Migrate

This library is intended to configure propel migration routes for zend framework
It provides multiple console commands to perform migration and updates on Modules using propel

## Installation

### Composer

The suggested installation method is via [composer](http://getcomposer.org/):

## Console Commands

```
php index.php propel build [NAMESPACE|[comma delimited NAMESPACES]                
 - Build the model classes based on Propel XML schemas
```

```
php index.php propel build-sql [NAMESPACE|[comma delimited NAMESPACES]            
 - Build SQL files
```

```
php index.php propel diff [NAMESPACE|[comma delimited NAMESPACES]                 
 - Generate diff classes
```

```
php index.php propel down [NAMESPACE|[comma delimited NAMESPACES]                 
 - Execute migrations down
```

```
php index.php propel migrate [NAMESPACE|[comma delimited NAMESPACES]              
 - Execute all pending migrations
```

```
php index.php propel status [NAMESPACE|[comma delimited NAMESPACES]               
 - Get migration status
```

```
php index.php propel up [NAMESPACE|[comma delimited NAMESPACES]                   
 - Execute migrations up
```

```
php index.php propel migration-diff [NAMESPACE|[comma delimited NAMESPACES]       
 - Generate diff classes
```

```
php index.php propel migration-down [NAMESPACE|[comma delimited NAMESPACES]       
 - Execute migrations down
```

```
php index.php propel migration-migrate [NAMESPACE|[comma delimited NAMESPACES]    
 - Execute all pending migrations
```

```
php index.php propel migration-status [NAMESPACE|[comma delimited NAMESPACES]     
 - Get migration status
```

```
php index.php propel migration-up [NAMESPACE|[comma delimited NAMESPACES]         
 - Execute migrations up
```

```
php index.php propel model-build [NAMESPACE|[comma delimited NAMESPACES]          
 - Build the model classes based on Propel XML schemas
```

```
php index.php propel sql-build [NAMESPACE|[comma delimited NAMESPACES]            
 - Build SQL files
```

```
php index.php propel update [NAMESPACE|[comma delimited NAMESPACES]               
 - Execute pending migrations, build SQL files, build Propel classes
```

```
php index.php propel migration [NAMESPACE|[comma delimited NAMESPACES]       
 - Generate diff classes
```

