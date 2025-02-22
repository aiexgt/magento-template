# Magento 2 Development Repository

This repository is designed to provide tools, scripts, and useful resources to facilitate development within Magento 2. It is aimed at developers working with Magento 2 who want to optimize their workflow, automate repetitive tasks, or handle specific integrations.

## Requirements

- **Docker**
- **WSL** 
- **Ubuntu** 18.10 or higher

## Installation

Install **Warden** by following the official installation guide for Magento 2 here:  
[Warden Installation Guide](https://docs.warden.dev/environments/magento2.html)

## Useful Development Commands

### Clear Cache

```bash
    php bin/magento cache:clean 
    php bin/magento cache:flush
```

### Recompile Application Code

```bash
    php bin/magento setup:di:compile
```

### Reindex Data

```bash
    php bin/magento indexer:reindex
```

### Deploy Static Content

```bash
    php bin/magento setup:static-content:deploy
```

### Enable/Disable Modules
```bash
    php bin/magento module:enable Vendor_ModuleName
    php bin/magento module:disable Vendor_ModuleName
```

### Set the Development Mode

```bash
    php bin/magento deploy:mode:set developer
    php bin/magento deploy:mode:set production
```

### Upgrade Database

```bash
    php bin/magento setup:upgrade
```

## Debugging with Xdebug

### Configure Xdebug in Visual Studio Code

1. Instal PHP Debug Extension [PHP Debug](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug)

2. Configure `.vscode/launch.json`
```json
    {
        "version": "0.2.0",
        "configurations": [
            {
                "name": "Listen for Xdebug",
                "type": "php",
                "request": "launch",
                "port": 9003,
                "pathMappings": {
                    "/var/www/html": "${workspaceFolder}"
                }
            }
        ]
    }
```

3. Start Debugging with **Run > Start Debugging** or press **F5**

### Configure Xdebug in PhpStorm

1. Set Up PHP Interpreter

    - Go to **File > Settings > PHP**.
  
    - Configure the PHP interpreter to use your Docker container (e.g., Warden).

2. Enable Xdebug

    - Go to **File > Settings > PHP > Debug**.
  
    - Set **Xdebug port** to `9003`.
  
    - Enable **Can accept external connections**.

3. Configure Server

    - Go to **File > Settings > PHP > Servers**.
  
    - Add a new server:
  
        - **Name**: Magento 2
        - **Host**: `host.docker.internal` (for Warden/Docker).
        - **Port**: `80` or `443`.
        - **Debugger**: Xdebug.
        - Map **Absolute path on the server** (`/var/www/html`) to your local project directory.

4. Start Debugging

    - Set breakpoints in your PHP files.
  
    - Click the **Start Listening for PHP Debug Connections** button.
  
    - Trigger code execution (e.g., visit Magento 2 frontend, backend, or call an API).

### Debugging Backend (PHP)

1. Set breakpoints in your PHP files (e.g., controllers, models, blocks).
   
2. Trigger the code execution by visiting the Magento 2 backend or running a CLI command.
   
3. Xdebug will pause execution at your breakpoints, allowing you to inspect variables and step through the code.

### Debugging Frontend (JavaScript)

1. Use browser developer tools (e.g., Chrome DevTools) to debug JavaScript.
   
2. Set breakpoints in your JavaScript files.
   
3. Use `console.log()` to inspect variables or debug AJAX requests.

### Debugging APIs

To debug Magento 2 APIs, include the XDEBUG_SESSION_START parameter in your API request.

```bash
    curl -X GET "http://your-magento2-api-url/endpoint?XDEBUG_SESSION_START=PHPSTORM"
```

### Troubleshooting

#### Issues

- **Xdebug not triggering**: Ensure the correct port (`9003`) is used and the `XDEBUG_SESSION_START` parameter is included in API requests.

- Path mapping errors: Verify the pathMappings in Visual Studio Code or PhpStorm match your Docker container paths.

#### Logs

- Check the Xdebug log file (/var/log/xdebug.log) for errors.

- By following this guide, you can efficiently debug Magento 2 backend, frontend, and APIs using Xdebug in Visual Studio Code or PhpStorm. Happy debugging! 🚀

