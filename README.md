# symfony-47206

This repo was created to replicate https://github.com/symfony/symfony/issues/47206

The three relevent commands are 

```
app:union-type
app:union-type-2
app:single-type
```

## Testing

When you initially set this up, you may see some errors due to the bug when it tries to cache:clear

You can try running any of the 3 commands, and see that none of them work.

From there, you can test with a few basic edits.

1. In `UnionTypeHandler`, change the method name to `__invoke`

        You will notice that everything works as intended, all 3 commands function properly

2. In `UnionTypeHandler` change the method to anytying other than `__invoke` (`foo` for example)
3. Then change the type hint from `UnionType|UnionType2` to `UnionType`.
 
        Now you will notice that `app:single-type` and `app:union-type` will work 
         (note: `app:union-type-2` will not because `UnionType2` is no longer in the signature, 
           so it wouldn't know where to route it, that's expected)
           
           
## Conclusion

Anytime there is a union type on any non `_invoke` method AND that method is designated as the handler with  `#[AsMessageHandler]` no handler, anywhere, will be able to be reached due to a failure in messenger
