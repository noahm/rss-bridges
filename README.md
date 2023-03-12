# rss-bridges

RSS is still cool, but some websites out there don't seem to think so. That's fine, because [rss-bridge]() fixes that. These are some custom bridges I've made that do handy things for me.

## How to use

Setup a running copy of `rss-bridge` for yourself. I used [YunoHost](https://yunohost.org/) to install it on my home server. Find the `bridges` folder wherever it may be (`/var/www/rss-bridge/bridges/` for me) and add the ones you like you want to it. Edit the allow-list to allow them to run (found one folder up from the bridges, `/var/www/rss-bridge/whitelist.txt` for me).

## Bridges

- LeaguePatchNotes - Just a simple RSS feed conversion of (League's official patch notes)[https://www.leagueoflegends.com/en-us/news/tags/patch-notes/]

### TODO

- [ ] Split out Dollop podcast so regular episodes and Past Times come in separate feeds
