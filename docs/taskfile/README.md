# Taskfile

This project uses [Taskfile<sup>(:link:)</sup>](https://taskfile.dev/) to automate many of the commands needed to run, test, build, and deploy the project.

The goal with this documentation is to keep an organized view of all current tasks included in the project.

# Summary
- [Taskfile](#taskfile)
- [Summary](#summary)
- [Tasks](#tasks)
  - [Root Taskfile](#root-taskfile)
    - [`up-*`](#up-)
    - [`bash`](#bash)
    - [`cache-cli`](#cache-cli)
  - [Docker Taskfile (docker:\*)](#docker-taskfile-docker)
    - [`docker:compose`](#dockercompose)
    - [`docker:build`](#dockerbuild)
    - [`docker:up`](#dockerup)
    - [`docker:exec`](#dockerexec)
    - [`docker:down`](#dockerdown)
  - [Secrets Taskfile (secrets:\*)](#secrets-taskfile-secrets)
    - [`secrets:authenticate`](#secretsauthenticate)
    - [`secrets:export-*`](#secretsexport-)
    - [`secrets:generate-dev-dotenv`](#secretsgenerate-dev-dotenv)
    - [`secrets:generate-*-dotenv`](#secretsgenerate--dotenv)
  - [CI Taskfile (ci:\*)](#ci-taskfile-ci)
    - [`ci:commitlint`](#cicommitlint)
    - [`ci:phpcs`](#ciphpcs)
    - [`ci:phpstan`](#ciphpstan)
    - [`ci:psalm`](#cipsalm)

# Tasks

## Root Taskfile

> [!IMPORTANT]
> All tasks in this namespace have the `ENVIRONMENT` env variable that receives whichever value `{{.ENV}}` has and defaults to `"dev"` if it isn't set
### `up-*`
Sets up the environment depending on taskname.

- **Accepted Tasknames:** `up-dev`, `up-staging`, `up-prod`

**Example:** Set-up dev environment
```sh
$ task up-<env>
```

### `bash`
Accesses the application's docker container bash
```sh
$ task bash
```

### `cache-cli`
Launches `keydb-cli` for the current running keyDB container
```sh
$ task cache-cli
```

## Docker Taskfile (docker:*)

> [!IMPORTANT]
> All tasks in this namespace have the following:
>
> **Variables:**
> - `{{.ENV}}` variable that defaults to `dev`
>
> **ENV Variables:**
>
> - `ENV`: receives `{{.ENV}}` variable value
> - `UID`: receives the current user id from shell command `id -u`
> - `GID`: receives the current group id from shell command `id -g`

### `docker:compose`
Executes `docker compose` with a given command, configured for current env
> [!CAUTION]
> **Internal task**
```sh
$ task docker:compose COMMAND=<command|"build">
```

### `docker:build`
Builds all containers
> [!CAUTION]
> **Internal task**
```sh
$ task docker:build
```
### `docker:up`
Runs containers and daemonizes them
> [!CAUTION]
> **Internal task**
```sh
$ task docker:up
```
### `docker:exec`
Executes a given command inside a given container, using given user
> [!CAUTION]
> **Internal task**
```sh
$ task docker:exec DOCKER_USER=<user|"root"> DOCKER_CONTAINER=<container|"app"> EXEC_COMMAND=<command|"bash">
```
### `docker:down`
Shuts down containers
```sh
$ task docker:down
```

## Secrets Taskfile (secrets:*)
> [!IMPORTANT]
> All tasks in this namespace have the following:
>
> **Variables:**
> - `{{.ENV}}` variable that defaults to `dev`
>
> **ENV Variables:**
> - `ENV`: receives `{{.ENV}}` variable value

### `secrets:authenticate`
Interactively authenticates user to [Infisical<sup>(:link:)</sup>](https://infisical.com/)
> [!CAUTION]
> **Internal task**
```sh
$ task secrets:authenticate
```
### `secrets:export-*`
Exports secrets and configurations for a given environment fetched from Infisical to a given file
- **Accepted Tasknames:** `export-dev`, `export-staging`, `export-prod`
- **Depends on:** [`authenticate`<sup>(:link:)</sup>](#authenticate)

> [!CAUTION]
> **Internal task**

```sh
$ task export-<env> FILE=<file|".env">

```
### `secrets:generate-dev-dotenv`
Copies `.env.example` into `.env`
```sh
$ task generate-dev-dotenv
```

### `secrets:generate-*-dotenv`
Generates the `.env` file for a given environment.
> [!WARNING]
> Only overwrites the current `.env` file if the checksums between Infisical and local `.env` don't match!
```sh
$ task generate-<env>-dotenv
```
## CI Taskfile (ci:*)
### `ci:commitlint`
Runs commitlint
```sh
$ task ci:commitlint
```
### `ci:phpcs`
Runs `phpcs` inside the container with any cli args passed
```sh
$ task ci:phpcs -- CLI_ARGS=*
```

### `ci:phpstan`
Runs `phpstan` inside the container with any cli args passed
```sh
$ task ci:phpstan -- CLI_ARGS=*
```

### `ci:psalm`
Runs `psalm` inside the container against all application code
```sh
$ task ci:psalm
```
