# EuroHarmony Website

## Pre-reqs

In order to contribute to the development effort, you'll need a running Git install. You'll also need a running Apache install (2.2.x), PHP install (5.2.X) and a MySQL install (5.1.X). You'll also need the euroharm_euroharmonydb from the live website in your MySQL.

## Configuration

In the system/application/config folder you'll find two config files that have "-dist" in their name; config-dist.php and database-dist.php. Copy these two files and remove the "-dist" prior to adjusting the content to match your development environment.

## Running

We're agnostic about how you manage your local development MySQL database; if you like Adminer, use it, if you prefer PHPMyAdmin, good for you. Much the same goes for IDE; use whatever tools you are comfortable with. Only rule is don't add any of it into the repository (we're trying to keep the repository clean of these sorts of non-core things) - ensure you modify .gitignore for your toolset.
