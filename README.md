# AddiCate

## Intro:
This product is part of the Project Innovate and Invisible Heroes created by group IT1D. The product itself is a website and coresponding videogame which role is to educate people about the problem of addiction.

## Team members:
- Stefania Panainte
- Stefan Bryda
- Airaa Srinivasan
- Eliza Horvath
- Miriam Cerulíková

## Setup instructions:
1. Requirements
- Prepare either Docker desktop or server that supports hosting websites using PHP.
- Web browser
- phpMyAdmin (for database setup)
- Godot Engine (for editing the game — not the .NET version)

2. Clone the Repository
- clone repository to the location of your prepared environment by typing into the terminal: `git clone [repository URL]`

3. Database Setup:
   1. Open phpMyAdmin.
   2. Create a new database named `addicate`.
   3. Go to the Import tab and upload the SQL file found at:  
      `AddiCate/website/database/addicate.sql`
   4. Once imported, the required tables and data will be available in the database.

## Tips for working on the product
- All files related to the website are stored in folder "AddiCate/website" with the exception of exported game, which is stored on "AddiCate/addicate/exports/web/demo3"
- To work on the game itself it is needed to install Godot Engine (Warning! not to mistake with Godot Engine-.NET). After installation and opening the engine project can be imported from "AddiCate/addicate"
- For the game to work on the website it has to be exported in web format

## Known Errors
- the website and the game currently do not work on mobile devices, the platform is mainly optimized for desktop use. 
- The game might not work properly in some older web browsers. It is best to use a modern browser like Chrome.
- There is no login system and no content checking. When someone sends a story or message, it is shown on the website right away. This means no one checks or approves what people write before it appears online.
- If the web server is not set up correctly, story and message submissions might not work — and users might not see any error message.
