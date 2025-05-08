# Usage Examples

## Basic Usage

The simplest way to use the counter:

```markdown
![Nixie Tube Counter](http://yourserver.com/yourusername)
```

This will show a 6-digit counter starting from 0.

## Customized Display

### Set the number of digits

If you want to display more or fewer digits:

```markdown
![Nixie Tube Counter](http://yourserver.com/yourusername?digits=4)
```

This will show a 4-digit counter.

### Start with a specific base value

If you're migrating from another counter and want to start with your existing count:

```markdown
![Nixie Tube Counter](http://yourserver.com/yourusername?base=5000)
```

This will add 5000 to your actual count.

### Combine parameters

You can combine multiple parameters:

```markdown
![Nixie Tube Counter](http://yourserver.com/yourusername?digits=8&base=10000)
```

This will show an 8-digit counter with a base value of 10000 added to your count.

## Local Testing Examples

When testing locally:

```markdown
![Nixie Tube Counter](http://localhost:8080/testuser)
```

To simulate a profile with many views:

```markdown
![Nixie Tube Counter](http://localhost:8080/popular-user?base=1234567)
``` 