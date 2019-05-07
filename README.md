# SimpleTimerTask

SimpleTimerTask is an example for all developers who don't know how to do a countdown. SimpleTimerTask is an example with an array in the config.

# Config
```
# When should the countdown begin?
# In Seconds! (Default = "20")
start-time: "20"

# Decide when to send the broadcast messages.
# In Seconds!
countdown: ["15", "10", "5", "3", "2", "1"]

# Edit the time format for the broadcast message.
time-format: "{hours} Hours, {minutes} Minutes and {seconds} Seconds"

# Edit the broadcast message.
messages:
    remaining-time: "In {time-format} the task will be finished."
    end: "Task finished."
```
----------------

If problems arise, create an issue or write us on Discord.

| Discord |
| :---: |
[![Discord](https://img.shields.io/discord/427472879072968714.svg?style=flat-square&label=discord&colorB=7289da)](https://discord.gg/Ce2aY25) |