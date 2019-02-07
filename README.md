# help
##### Its a web based cardinal keeper for people with bunch of accounts
##### Works with xampp / lampp on both (linux & windows)
##### It gives possible number of fields for accounts to be added !
# To Install:
* Go to htdocs folder for xampp/lampp.
* create a newfolder named 'help' (you must give it that name) else it won't work.
* Inside that 'help' folder extract all the files.
* then perform following commands (linux users)
```
$ cd help
$ chmod -R 777 *
```
# To run the program
##### Run you xampp/lampp server
```
$ sudo /opt/lampp/lampp start
```
> In firefox or in any other browser what ever you are using visit **localhost/help**
## Now the program will run

> It will create automaticly 1 database named `ghona`.

> Will auto create 4 database tables `helpdesk`, `helper`, `trashed`, `snaps`
# How it works?
##### It has three sections `Welcome`,`Add snippet`,`View Trash`.
## Welcome section
* It lists all your accounts.
* It has import demo feature.
* It lists the accounts details in tables.
* It lists single site multiple accounts details in separate table.
* It lists all single sites single account in one table and that appears at end.
* Accounts Updating and Deletion Feature included.
* Deleting a file removes file from this section and add it to **View Trash** section.
##### A `db/history.txt` file is present in program.
> Account adding record and updating record both gets saved in history
##### A `db/helpdeskdb.txt` file is present in program.
> Whenever you are on welcome section it gets updated.
> It includes all results (in form of insert query) shown on welcome page.
## Add snippet section
> Sometimes you may face a condition when there is a account which requires some more info,
and you may not have all those possible fields in welcome section to keep that account, thats where,
Snippet Section comes in handy. OR you can consider it as a MEMO PAD !
* It includes a text area field and 6 password fields.
* You can add the account details in text area and use password fields if you want.
#### A `snippets` folder is present in program
> It has snap.txt files upto 1-to-50.
> Whenever you add a snap the password fields updates in database while just text saves in those snap files.
* Adding record and updating record both gets saved in history
* Deleting a snap deletes passwords from database and cleans its snap.txt file ! (no trash here)
* if you accidently deleted an account see that history file. ( its proper orgranized )
## View Trash section
* Deleted contents of welcome section appears here.
* You can restore it back or delete it completely.
* Deleting a cardinal will delete the cardinal from database.
#### A `junk/trashjunk.txt` file is present in program
> The deleted record will be written to it in form of insert query.
* It containes a button 'table dropper'
* It will take you to table management section
* It's restricted to go there ('unless you know what you are doing').
> It containes four sections `drop tables`,`clean tables`,`clean history/junk`,`local stored files`
## Drop Tables section:
* It Will drop tables only. They don't deal with cleaning local stored files.
* if 3 tables dropped, dropping 4th will auto create all tables by sending you back to welcome section.
> Bug: ( if you drop `snaps` you may face errors with snippets )

> Bug fix: ( clean 'snaps' first from **Clean Tables** section, then drop )
## Clean Tables section:
* `helpdesk` one will clean helpdesk database only.
* `helper` one will clean helper database only.
* `trashed` one will clean trashed databased only.
* `snaps` one will clean snaps database along with local stored snaps.
## Clean History/Junk section
* `clean history` will clean `db/history.txt` file.
* `clean junk` will clean `junk/trashjunk.txt` file.
## Local Stored Files section
* You can see through some saved Local files here as mentioned there
> Bug or not: ( some times you may see nothing in those files but they contain info )

> Its just due to browser caching.

> You can view that file in program directory with your text editor to get accurate result.
# What is demo?
> Its good to import it once to check the functionality of program.
```
* It adds several accounts in `welcome` section.
* It adds several accounts in `trash` section.
* It adds 6 snippets in `snippet` section.
````
> NOTHING WILL BE ADDED IN HISTORY !

> After importing, all else will work.
## HOW TO USE IT AS FRESH ( if you imported demo )
* Go to `TRASH SECTION`
* CLICK `TABLE DROPPER`
> START PRESSING ALL BUTTONS FROM BOTTOM TO TOP AS SHOWN
```
* CLICK `CLEAN JUNK`
* CLICK `CLEAN HISTORY`
* CLICK `CLEAN SNAPS`
* CLICK `CLEAN TRASHED`
* CLICK `CLEAN HELPER`
* CLICK `CLEAN HELPDESK`
* CLICK `DROP SNAPS`
* CLICK `DROP TRASHED`
* CLICK `DROP HELPER`
* CLICK `DROP HELPDESK`
```
> Now you are on welcome page ! Rock Now !
# ADVANTAGES:
* Extremely Fast !
* Completely Secure ( only for linux users )
> For Windows Users Too: Unless your window got compromised !
* You can view it in front of your friends ( WHY? )
> It uses CSS style for password fields to make password too tiny ( can't be read ! )
* How can i copy it if i can't see it ?
> Triple or double mouse click in password box, CTRL+C to copy !
* You Will Never Lose your Data.
# DISADVANTAGES:
No DISADVANTAGE !
##### Q: what if i deleted a cardinal from welcome and trash section but i wanted it?
> IN `TABLE DROPPER` > SEE `JUNK` AND `HISTORY`
##### Q: what if i deleted a snippet but i wanted it back?
> IN `TABLE DROPPER` > SEE `HISTORY`
##### Q: What if my windows got broken?
```
* Use any live boot disk and copy 'help' folder to somewhere safe.
* Install Windows > Install Xampp 
* START SERVER
* In that 'help` folder Open File 'db/helpdeskdb.txt'
* Copy Every thing !
* Go to Xampp/htdocs/
* Create New Folder 'help'
* Go into 'help'
* Create New File 'helpdeskdb.php'
* Open that file in text editor
* in first line write <?php
* paste here
* on last line write ?>
* Now it must be looking like this
<?php
pasted content
?>
* Now Save file and visit localhost/help/helpdeskdb.php ( ONLY VISIT IT ONCE  and QUIT BROWSER)
* Delete that 'helpdeskdb.php' file.
* Repeat The Same With 'db/trashed.txt' file.
* Get Your Snippets Text and Passwords From 'db/history.txt'
* install classy-helper > Go to 'Add Snippet' Section.
* Fill Fields (Modify Text) and Submit.
```
# Hope So You Will Love It ! its currently (STABLE)
