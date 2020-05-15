# doctrine-transaction-handler
Doctrine handler realisation for transaction manager

```yaml
services:
  Venomousboy\TransactionManager\TransactionManager:
    class: Venomousboy\TransactionManager\TransactionManager
    arguments:
      - '@Venomousboy\TransactionManager\DoctrineTransactionHandler'

  Venomousboy\TransactionManager\DoctrineTransactionHandler:
    class: Venomousboy\TransactionManager\DoctrineTransactionHandler
    arguments:
      - '@doctrine.orm.entity_manager'
```
