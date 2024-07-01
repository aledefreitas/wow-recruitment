# CI Pipeline

# Summary
- [CI Pipeline](#ci-pipeline)
- [Summary](#summary)
- [GitHub Actions](#github-actions)
  - [Lint](#lint)
      - [Steps](#steps)
  - [Tests](#tests)
      - [Steps](#steps-1)

# GitHub Actions
Currently this project performs all checks in its CI Pipeline in this repository Github Actions.

> [!IMPORTANT]
> All actions in this project produce annotations when errors are thrown in its pipeline.

## Lint
- Source: [`.github/workflows/lint.yml`](../../.github/workflows/lint.yml)

#### Steps
- Lints `config/*.yml` files
- Lints Symfony Container
- Validates `composer.json`
- Audits composer dependencies with `composer audit`
- Runs PHPStan
- Runs PHP_CodeSniffer with configured rules
- Runs PHP CS Fixer with configured rules

## Tests
- Source: [`.github/workflows/tests.yml`](../../.github/workflows/tests.yml)

#### Steps
- Runs PHPUnit tests