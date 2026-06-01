# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-06-01

First tagged release.

### Added

- `RobotsFilter` hook provider — runs configurable `OutputFilterInterface`s over Yoast SEO's
  `wpseo_robots` output, with `NoIndex` / `NoFollow` filters and an `OutputFilterPipeline`. Wired by
  `ConfigProvider` from the `yoast.robots` config key.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Modernized the dev toolchain (PHPStan 2, PHPUnit 11 schema); **added** `maglnet/composer-require-checker ^4`
  with a `check-deps` script; now depends on `kaiseki/php-coding-standard: ^1.0` with the shared PHPStan
  config (Yoast SEO stubs kept via `scanFiles`); `kaiseki/config` and `kaiseki/wp-hook` pinned to `^2.0`.
  CI now runs via the reusable workflow in `kaisekidev/.github`.
