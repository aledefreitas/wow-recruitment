# WoW Recruitment BackEnd
 An (purposefully) over-engineered piece of code intended for applying technologies and patterns in order add to my tech stack skill set while attempting to solve problems I came across in my hobby!

 Since I've been playing World of Warcraft as a hobby for quite some time (more than I'm willing to admit :laughing:) and I'm a guild _- and raid -_ leader, I have the constant need to recruit new players to fill in our team's roster. While there are countless tools to manage guild rosters, I decided it would be a great project to develop as a way to train my skills and explore technologies I would not be able to use in any of the projects I'm currently working on, while applying those to a real world problem.

 By creating this project and tackling the problems I face in my hobby and recreating some of the existing solutions adding my personal touch, I hope to both experiment with technologies I've already used, been wanting to use, or have only heard of AND showcase my expertise (or lack thereof :laughing:) in Web Development, System Design and problem solving.

> [!NOTE]
> This project is focused in being a way to keep myself up-to-date to the state of PHP Web Development and Best Practices in 2024 while also exploring some new exciting technologies :)
>
> There are already solutions for this problem out there, and given the scale and scope of the market for those solutions it might not necessarily need the over-engineering (hopefully) applied to this project. The purpose of this project is `NOT` to Keep It Simple, but rather apply technologies to study them and feel comfortable using them on professional projects.

# Summary
- [WoW Recruitment BackEnd](#wow-recruitment-backend)
- [Summary](#summary)
- [Project Main Goals](#project-main-goals)
- [Tech Stack Wishlist](#tech-stack-wishlist)
    - [Databases](#databases)
    - [In-Memory Store](#in-memory-store)
    - [Language](#language)
    - [Framework](#framework)
    - [Standards Compliance](#standards-compliance)
    - [Message Broker](#message-broker)
    - [Automation](#automation)
    - [Debugging](#debugging)
    - [CI/CD](#cicd)
    - [Workflow](#workflow)
- [Requirements](#requirements)
- [Installation](#installation)
    - [Development](#development)
    - [Staging](#staging)
    - [Production](#production)
- [Documentation](#documentation)
- [Running Tests](#running-tests)

# Project Main Goals
> [!WARNING]
> This might never - _and probably will never_ - actually be deployed into production

It `SHOULD` accomplish the following:
- Showcase **SOME** of what I can offer as a developer :sunglasses:
- Replicate and extend on current solutions for the same problem
- Follow SOLID Principles
- Follow [PHP Best Practices](https://phptherightway.com/)
- Follow [Symfony's Best Practices](https://symfony.com/doc/current/best_practices.html)
- Integrate [Battle.net REST API](https://develop.battle.net/documentation)
- Be easy to deploy a dev environment
- Have tests in its CI Pipeline

# Tech Stack Wishlist
> [!IMPORTANT]
> These are subject to change throughout the development of this project
### Databases
- [x] [MongoDB](https://www.mongodb.com/docs/)
- [x] [PostgreSQL](https://www.postgresql.org/docs/)
- [ ] [ElasticSearch](https://www.elastic.co/guide/en/elasticsearch/reference/current/index.html)

### In-Memory Store
- [x] [KeyDB](https://docs.keydb.dev/)

### Language
- [x] [PHP 8.3](https://www.php.net/releases/8.3/en.php)

### Framework
- [x] [Symfony @ latest](https://symfony.com/doc/current/index.html)

### Standards Compliance
- [ ] [PHP CS Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)
- [ ] [PHPStan](https://phpstan.org/)
- [ ] [PHP Mess Detector](https://phpmd.org/)
- [x] [commitlint](https://commitlint.js.org/)

### Message Broker
- [ ] [Apache Kafka](https://kafka.apache.org/documentation/)

### Automation
- [x] [Taskfile](https://taskfile.dev/)
- [x] [Husky](https://typicode.github.io/husky/)
- [ ] ~~[PKL](https://pkl-lang.org/index.html)~~
(_can't justify this not reinventing the wheel on this project_)
- [x] [Docker](https://docs.docker.com/)

### Debugging
- [x] [XDebug](https://xdebug.org/)

### CI/CD
- [x] [Secret Vault (Infisical)](https://infisical.com/)
- [ ] [Github Actions](https://docs.github.com/en/actions)

### Workflow
- [x] Gitflow

# Requirements
- [Taskfile](https://taskfile.dev/installation/)
- [Docker](https://docs.docker.com/get-docker/) installed with [Compose V2](https://docs.docker.com/compose/install/)

# Installation

Simply run the following command in your terminal

### Development
```sh
$ task up-dev
```

### Staging
```sh
$ task up-staging
```

### Production
```sh
$ task up-prod
```

# Documentation
You can see the [documentation here!](./docs)

Please, bear in mind that this will evolve alongside the project, so it might be pretty incomplete by the time you see it :frowning:

# Running Tests
TBD
