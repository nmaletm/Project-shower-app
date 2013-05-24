Project-shower-app
==================

System to create a webapp for smartphones and tablets in few steps. 

The origen of this project was to create a webapp to complement a presentation for a competition. To give more information to the judges.


## Current type of tabs

### HTML Tab

With this tab you can add any type of content in HTML format.

### Subtabs Tab

With this type you will be able to add a tab with subtabs, and in all the subtabs you will be able to add content in HTML format.

## Installing

If you want to have the system in your server you only have to follow this steps:

### 1. Fork this project (optional)

If you want to make changes to the source code, you will have to fork it.

### 2. Get the code

Pull the code to your server using the git url, and then get all the submodules:
```
git clone https://github.com/nmaletm/Project-shower-app.git
git submodule update --init
```
### 3. Put the sample data

Change the extension of the files in the directory /data/db/ from XXX.dat.example  to XXX.dat

### 4. Login

Go to [SERVER]/login.php, and login with the username demo and the password demo. Then create a user and delete the demo user.

## Customize it
 
You can create your own type of tabs extending the class Tab.php (as is done with TabHTML.php), and creating the html form to edit it (as editFormHTML.php).

Then at the file admin/editTab.php you can add the new type at the list of types.

## Author

[Néstor Malet][0] - [GitHub profile][1]

[Project website][4]

## License
[Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)][3]

![Attribution-NonCommercial 3.0 Unported (CC BY-NC 3.0)][2]

 [0]: http://www.storn.es/en/home
 [1]: https://github.com/nmaletm
 [2]: http://i.creativecommons.org/l/by-nc/3.0/88x31.png
 [3]: http://creativecommons.org/licenses/by-nc/3.0/
 [4]: http://nmaletm.github.io/Project-shower-app/
