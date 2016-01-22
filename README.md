## Razorfish Client Preview v3.2

The Razorfish Client Preview platform is a media content managment system built by Razorfish Portland. This system is available for use to all Publicis brands. For instructions on how to use this platform once it is setup, login to your site and view the user guide (example.com/user-guide/). 


#### Installation

1. Download the most recent build of the Razorfish Client Preview platform from Github at [https://github.com/razorfish-west/razorfish-rcp](https://github.com/razorfish-west/razorfish-rcp) and unzip it to your desktop.
2. Open the file "_includes/ssi/siteconfig.php" with a text editor and edit the usernames and passwords of the 3 login accounts and then save the file. You will need to write down these login accounts for later use.
3. Upload all of the files that were downloaded from the Github repository to the root folder of the domain that you would like to setup using FTP. This can be either a Linux server or a Windows server running PHP.
4. Open your site in a browser and login using the admin account. Once you are logged in, immediatly go to the setup page to define the settings for this staging site. 
5. Once this is done, the site is ready to use. While you are logged into the site, refer to the page labeled "User Guide" (http://example.com/user-guide/) for further instructions on how to use the Razorfish Client Preview platform.


#### FAQ

- Q: Do I need to upload html files with my SWFs so that they can play in the browser?
- A: No. They play inline on the project page so all that you need to upload is raw SWFs. 

- Q: What languages is the Razorfish Client Preview platform built on?
- A: This platform is built using PHP & Javscript. However, it uses several other tools and libraries such as jQuery, BonobosCMS, jScrollPane, jReject & SWFObject.

- Q: Does this platform use a database?
- A. No. All of the media is stored locally and all of the settings are stored in dynamically generated PHP files. 

- Q: Wouldn't it be way better if you just built this thing using a database?
- A: Yes. Due to the nature of Razorfish's IT policies though, it was actually quite hard to get both a webserver and some way to access a database. This platform was created, in part, to navigate "around" certain corporate IT policies that were making things difficult for me.

- Q: Where can I get this platform's latest source code?
- A: It can be pulled down from [https://github.com/razorfish-west/razorfish-rcp](https://github.com/razorfish-west/razorfish-rcp).

- Q: Where can I see the full changelog for this project?
- A: The project was origionally tracked at [https://github.com/GarrettGillas/RFStaging](https://github.com/GarrettGillas/RFStaging) and the origional changelog can be found there. More recent changes can be found at the current repository: [https://github.com/razorfish-west/razorfish-rcp](https://github.com/razorfish-west/razorfish-rcp).

- Q: What software license is this platform published under?
- A: None. Since this platform was built by employees of Razorfish Portland, it belongs to Razorfish LLC and is not available to license the public currently. However, it is available for use to all Razorfish sister companies under the Publicis/Omnicom umbrella.


#### Troubleshooting

- Problem: I have uploaded the files for this platform and when I visit the site in a browser, all I see is a bunch of files listed. 
- Solution: Check your server for default document types. If you are on a Windows server you will need to add "index.php" as a default document type in IIS.

- Problem: The setup page doesn't seem to be changing anything. 
- Solution: Check the file permission settings on your server. They should be set to 777 for any files and folders that are used by this platform. 

- Problem: I can't delete project folders from the web interface.
- Solution: See the solution listed above. 

- Problem: When I upload files using the web interface, they do not show up on the project page.
- Solution: Again, check the file permission settings. 

- Problem: When I click on a SWF to view it on a project page, it seems to be playing the wrong flash file.
- Solution: Check the "uploads" folder inside the project folder you are working on. If someone has manually uploaded HTML files (via FTP), this problem sometimes occurs. You'll need to delete the HTML files and they shouldn't be there in the first place. You will need to use FTP to do this.

- Problem: I have a problem that is not listed here.
- Solution: You can contact support by emailing garrett.gillas@razorfish.com. If you have a bug or feature that you would like addressed, please explain it in detail and I will be happy to include it in the next release. 


#### Contributors

Garrett Gillas // 
Technical Production Manager - 
garrett.gillas@razorfish.com

Kevin Jones // 
Senior Presentation Layer Engineer - 
kevin.jones@razorfish.com

Todd Mellors // 
QA Lead - 
todd.mellors@razorfish.com

Brooks Pleninger // 
Senior Designer - 
brooks.pleninger@razorfish.com

Matt Bouchard // 
Program Manager - 
matt.bouchard@razorfish.com

