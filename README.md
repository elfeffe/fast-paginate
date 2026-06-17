# elfeffe/fast-paginate

Fork of [hammerstonedev/fast-paginate](https://github.com/hammerstonedev/fast-paginate) (published on Packagist as `aaronfrancis/fast-paginate`).

## Why this fork exists

The upstream package caps `illuminate/database` below Laravel 13, so Composer refuses to install it on a Laravel 13 application. Our apps run **Laravel 13** and depend on `->fastPaginate()` for efficient large-table pagination (for example the NeoTeo blog posts list, which paginates tens of thousands of rows). This fork exists **only** to extend the framework constraint to Laravel 13 — the namespace, behavior and API are identical to upstream, so it is a drop-in replacement (`replace: aaronfrancis/fast-paginate`). This repository is public so consuming apps can install it via a plain VCS repository without GitHub authentication.

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
