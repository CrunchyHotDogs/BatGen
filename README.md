# BatGen
## BatGen (FOR VIDEOS). A small website that generates batch files based on options the user chooses. Currently only supports .mkv.
### A working example can be found at this address. (http://batgen-batgen.193b.starter-ca-central-1.openshiftapps.com)


I was getting annoyed at having to create a new batch file for every series I would want to re-tag, so I decided to create BatGen.
BatGen allows you to choose which tracks you have in the video and add tag information to them. A useful program to see the tracks
is MKVMergeGUI.
![Image #1](https://i.imgur.com/aPb84aj.png)

As seen in this screenshot, the video file has the video, audio, and subtitle tracks. To set up BatGen for this file you would add
one of each track type.

If done correctly BatGen should look like the screenshot below.
![Image #2](https://i.imgur.com/XWBLQoq.png)

Next we will add the information you want for the video. We will start with the title, there are some preset values you can use.
* %ep_name%
* %ep_num%
* %ep_seas%

In order to use these values you must have your video in the format "S[00]E[00] - [EPISODE NAME]".
You may use any length of numbers for season and episode (S777E7, or S7E777, or S7777E7777).
The values will be these values in the format S(%ep_seas%)E(%ep_num%) - (%ep_name%).


Next we will move onto the language. This is a simple dropdown. I have only included the languages that I use, if you require
a different language just open an issue.


Next is the default track. This will determine if video players like VLC, or Plex, will choose this track to be used at the start
of the video. Usually you want to have a video and an audio track with 'YES' as the default choice.


Lastly is the forced track, which I have only made available for subtitles. For example, this is used when the video you are watching
has subtitles that only show for signs, but not every dialog. If you have subtitles that are like that, make sure this track has
'YES' in the forced category.

For my example, I will be using these values in BatGen.
![Image #3](https://i.imgur.com/ZwmDZEN.png)

Once everything is configured how you want, either save the batch file using the button, or copy the text into your own .bat.
Just run the batch file in the same directory as your videos. The batch file will create a new folder in the same directory named
'Muxing' where the edited files will be saved.

The end result will look like this in MKVToolNix.
![Image #4](https://i.imgur.com/IhPTSVE.png)

Hopefully this helps everyone use BatGen. I have tried to make this fairly simple to use but if you come across any problems or get
stuck, feel free to create an issue here on GitHub and I can assist you.
