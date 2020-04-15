## Database queries

```php
UPDATE areas SET usable = 1 where parent_id is NOT null and parent_id != 1
```

```php
UPDATE categories SET usable = 1 WHERE parent_id IS NOT null
```
