# Smartpanel Service Description Importer

## Overview

The Smartpanel Service Description Importer is a PHP script designed to automate the updating of service descriptions in a MySQL database by extracting and processing data from a specified text file. This utility simplifies the synchronization of service details with external sources.

## Features

* Automatically parses and updates service descriptions.
* Provides robust error handling for smooth troubleshooting.
* Safeguards against SQL injection through secure data handling.

## Compatibility

This script is specifically tailored for Smartpanel users utilizing the Provider API v2.

## How It Works

1. **Database Connection:**

   * Connects securely to your MySQL database using provided credentials.

2. **File Retrieval:**

   * Retrieves content from a URL pointing to a text file containing service data.

3. **Data Extraction:**

   * Employs regular expressions to identify and extract service IDs and corresponding descriptions.

4. **Database Update:**

   * Updates the database securely with the extracted service descriptions for matching service IDs.

## Obtaining the desc.txt File

To generate the required `desc.txt` file:

1. Open the service page of the provider you are using.
2. Allow the page to completely load.
3. View the page source code.
4. Copy the entire source code and save it into a `.txt` file.

The script will use this `.txt` file to import the service descriptions and IDs.

## Successful Execution

Upon successful execution, you will receive a response similar to the one in this image:

![Successful Response](https://prnt.sc/Mr6L6427r_tD)

## Requirements

* PHP 7.x or higher
* MySQL Database
* URL access (`allow_url_fopen` enabled in PHP configuration)

## Installation

1. Clone or download the repository to your server.
2. Confirm that PHP and MySQL are correctly configured.

## Configuration

Replace the placeholders in the script with your actual secure details:

```php
$servername = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
$dbname = "your_database_name";

$file_content = file_get_contents('your_text_file_url');
```

## Usage

Execute the script by accessing it via your web browser or through the PHP CLI:

```bash
php smartpanel-service-importer.php
```

## Security Best Practices

* Protect database credentials and avoid public exposure.
* Manage sensitive data using environment variables or secured configuration files.
* Keep your PHP and MySQL installations up-to-date to mitigate vulnerabilities.

## Support

For further explanation or assistance, you can contact me via WhatsApp: [+2347015367977 - Sammyloaded](https://wa.me/2347015367977).

## License

This project is licensed under the MIT License.

---

**Note:** Always maintain database backups and adhere to proper security measures during database operations.
