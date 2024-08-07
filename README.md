# XJVS Minecraft Server Hosting and Manager
## What is this bro?
This system lets users host their minecraft servers for free, or they can host this on their own to manage their servers easily. 

## Why?
FOR FUN. To build something like Aternos is very interesting and fun. Maybe we will get to learn new things with this shit.

## Contributing
Yes, contribution is appreciated. This section gives instructions on how can you contribute to this project.
### Installation

#### Requirements Installation (Windows):
- Any Code Editor *(Prefferrably with git gui like Visual Studio Code)*
- XAMPP
- Composer
- Git
- Java 8

##### Code Editor
Any code editor will do. for simplicity, I recommend visual studio code or any text editor.

##### XAMPP
XAMPP is a software bundled with Web Server (Apache), RDBMS (Mysql), and other servers for the web. But for this project, Web Server and RDBMS is the only servers we need.

This is optional ONLY if you have these servers running. If not, then you can install it separately from other sources or just install XAMPP:

- Download XAMPP [here](https://www.apachefriends.org/). And run the setup.
- In the installation, if you have servers running like your own apache web server, or mysql server installed, just uncheck them if the installer asks you what software are to be installed.
- Then you are done.

##### Composer
Composer is a PHP package manager that offers a lot of tools that we can use for our system. XJVS uses PHP programming language for the application backend. XJVS uses Composer's class autoloading function that's why it is required.

- Download Composer [here](https://getcomposer.org/download/)
- Run the installer.
- To test it out, run `composer -V` in your terminal. This should print the Composer version you installed.

##### Git
Git is a version control system, that records the version of this project. It is currently being used by yours by looking into this github. XJVS's files are available in the Git ecosystem, and being managed with Github, like this.

- Download Git [here](https://git-scm.com/download/win)
- If you are unsure, you can just click next for everything. I recommend taking time to research what's the settings are about but clicking next with all of options will not affect the project.

  Now you are done with basic Requirements.

#### Project Installation (For Visual Studio Code Users)
##### Clone the project using Visual Studio Code.
  - Open VSC
  - Click Source Control at the top left that looks like 2 dots connected by 1 dot that looks like a tree branch.
  - Click Clone repository
  - If you are not logged in, VSC will guide you until you see your repositories available for cloning at the top.
  - Select xjvs
  - Then this will ask you for location of the clone. If you installed your xampp in `C:/`, then the location will be `C:/xampp/htdocs` 
  - After cloning, you are now ready to look at the application.
    
##### Setting Up Mysql Server
  - Create database in your server named xjvs
  - Import the `xjvs.sql` file in the root folder of the project.
  - Note : Updated sql db file should always reflect on your local machine before working on it. If there is any changes for db, please export the database .sql file in the project.
  - Please update `classes/Models/Database/Database.php` class with your server's configuration. 
    
#### Running the System 
##### XAMPP Users 
  - Open XAMPP
  - Turn on MySql and Apache
  - Enjoy :D
##### Non-XAMPP-only Users
  - Open your web server and mysql server.
  - Enjoy :D
