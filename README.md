# Encrypted Message Sharing App

This is a Laravel application for sharing encrypted messages securely with colleagues.

## Live Demo

[Live Demo](https://encrypted.kashifali.me/)

## Developer

**Developer Name**: Kashif Ali Rabbani
**Portfolio Website**: [kashifali.me](https://kashifali.me)

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js and npm

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/KashifWebDev/secrete-message.git
2. Install Composer packages
   ```sh
   composer install
3. Install npm packages
   ```sh
   npm install && npm run dev
4. Copy the .env.example file and rename it to .env
   ```sh
   cp .env.example .env
5. Generate application key
   ```sh
   php artisan key:generate
6. Install npm packages
   ```sh
   Run database migrations
7. Install npm packages
   ```sh
   php artisan migrate

### Usage

1. Start the development server
   ```sh
   php artisan serve
2. Access the application in your web browser
   ```sh
   http://localhost:8000

### Perform Tests

1. Start the development server
   ```sh
   php artisan test tests/Unit/MessageTest.php
