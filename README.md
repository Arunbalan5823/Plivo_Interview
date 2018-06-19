


I have created new AWS account and started new ubuntu server.  

Installed FreeSwitch on that server and registered two extensions.  

I have tried to to limit the call functionality only for extension 1001 and 1000 using ACL CIDR configuration. that's not worked well  

After that i have tried to add seperate dialplan for 1000 and 1001. but that also didn't work.  

Next, I have created a api server with clean URL. But the .htaccess and apache configuration has some problem. So instead of giving clean url (http://18.188.212.222/api/call) we have to provide path with file extension("http://18.188.212.222/api/call.php")

When sending POST JSON data({"destination":"1000"}) to this url http://18.188.212.222/api/call.php. it will create call. The audio playing functionality is not completed.   

Actually I have started to purchase server after 12pm and I pretty sure that if i have few more hours I could complete all the requirements.

API server code and FreeSwitch code are added to github.
