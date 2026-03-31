# elfeffe/fast-paginate

Fork of [hammerstonedev/fast-paginate](https://github.com/hammerstonedev/fast-paginate) (published on Packagist as `aaronfrancis/fast-paginate`).

## Changes from upstream

- `illuminate/database` constraint extended to **^13.0** for Laravel 13.
- `orchestra/testbench` dev constraint includes **^11.0** (Laravel 13).

Namespace and API are unchanged (`AaronFrancis\FastPaginate`), so existing `->fastPaginate()` / `->simpleFastPaginate()` calls keep working.

## Composer (deploy without local path)

In the consuming Laravel app, list the **path** repository first (for local dev), then the **VCS** repository:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "packages/elfeffe/fast-paginate",
            "options": { "symlink": true }
        },
        {
            "type": "vcs",
            "url": "https://github.com/elfeffe/fast-paginate.git"
        }
    ],
    "require": {
        "elfeffe/fast-paginate": "dev-main"
    }
}
```

## License

MIT (same as upstream).
