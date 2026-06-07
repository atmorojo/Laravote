# Laravote

A web-based voting system built with Laravel for organizational elections and decision-making processes.

## Background

Laravote was developed to support voting activities in local community organizations, replacing manual vote counting and simplifying election administration.

## Features

* Secure voter authentication
* Voting session management
* Real-time vote counting

## Under Development
* Candidate management
* Result reporting
* Dashboard

## Use Cases

This system has been used for organizational voting activities, including youth and community organizations.

## Technology Stack

* Laravel
* PHP
* sqlite
* Bootstrap
* HTMX

## Screenshots

### Voting Page

[insert screenshot]

### Live-count Page

[insert screenshot]

## Installation

```bash
git clone https://github.com/atmorojo/Laravote.git
cd Laravote

composer install
cp .env.example .env

php artisan key:generate
php artisan migrate

php artisan serve
```

## Project Status

There are a lot to improve, but it's used in real organizational voting workflows.

## Acknowledgements
[Mazer](https://github.com/zuramai/mazer)
