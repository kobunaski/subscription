# subscription plugin for Craft CMS 3.x

this is a plugin used for subscribing email

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1.  Open your terminal and go to your Craft project:

        cd /path/to/project

2.  Then tell Composer to load the plugin:

        composer require kobunaski/subscription

3.  In the Control Panel, go to Settings → Plugins and click the “Install” button for subscription.

## subscription Overview

-Insert text here-

## Configuring subscription

-Insert text here-

## Using subscription

        ```twig
        <form method="post" action="subscribe" accept-charset="UTF-8">
                {{ csrfInput() }}

                <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="emailHelp"
                        name="email">
                </div>
                <input type="submit" value="Send" class="btn btn-dark">
        </form>
        ```

## subscription Roadmap

Some things to do, and ideas for potential features:

-   Release it

Brought to you by [Kobu](kobu.com)
