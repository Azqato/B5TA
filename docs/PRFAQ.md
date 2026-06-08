# PR/FAQ — B5TA Clan Website

---

## Press Release

**FOR IMMEDIATE RELEASE**

### Clan B5TA Launches Rebuilt Website as Permanent Home for RuneScape Community

*Static site replaces aging WordPress installation; available at b5ta.com with no login required*

**September 30, 2026** — Clan B5TA, a RuneScape community founded in 2014, today announced the relaunch of its official website at [b5ta.com](https://www.b5ta.com). The new site is a fully rebuilt, fast-loading reference hub for current members, prospective recruits, and RuneScape players looking for community guides.

The rebuilt site offers everything visitors need to know about the clan: what Clan B5TA is, how to join via Discord, the clan's rules and culture, and a library of community guides covering bossing, money making, questing, and skilling. The site requires no account, no login, and no app download.

"I found the Discord invite in about ten seconds," said Marcus, a RuneScape player who joined the clan after discovering the site. "It's straightforward — no fluff, just the info I needed."

The site matches the original b5ta.com design that long-time members remember, built on a modern static hosting stack that requires no ongoing server maintenance. New guide content will be added by clan members over time.

Visit [b5ta.com](https://www.b5ta.com) or [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/).

---

## Internal FAQ

**Q: Why rebuild the site as static HTML instead of keeping WordPress?**  
WordPress requires a PHP server, a database, plugin updates, and ongoing security patches. GitHub Pages is free, never goes down, and requires no maintenance beyond pushing commits. For a site with no dynamic content, static HTML is the correct choice.

**Q: Why Bootstrap 3.3.6 and not Bootstrap 5 or something modern?**  
Bootstrap 3.3.6 was already in use in the codebase and the ipage/WikiWP design was built against it. Upgrading would mean reworking CSS selectors and layout across all 9 pages with no visible improvement for users. The correct time to upgrade is during a planned visual redesign.

**Q: What happens if GitHub Pages goes down?**  
The repository is a full backup of the site. Any team member can serve it locally in seconds with `python -m http.server`. The site could also be re-deployed to Netlify, Vercel, or any static host without code changes.

**Q: How do we update the navigation across all pages?**  
Currently by editing all 9 HTML files manually. This is the primary known technical debt. The correct long-term fix is a static site generator (SSG) with shared partials. For now, each nav change requires careful find-and-replace across all pages.

**Q: What assumptions must be true for this to succeed?**  
(1) The Discord invite link must remain permanent. (2) GitHub Pages must stay free. (3) Clan members must contribute guide content over time — stale guides reduce the site's value to visitors. (4) The clan remains active enough that the Discord is worth linking to.

**Q: Who is responsible for maintaining content?**  
Any clan member with repository access can submit a pull request. Clan leadership controls merges. There is no CMS, no admin panel — content changes are git commits.

**Q: Is there a staging environment?**  
No. The only environment is production (GitHub Pages). Test changes locally with `python -m http.server` before pushing.

**Q: What is the risk if guide content becomes outdated?**  
Stale guides damage trust. A visitor who follows outdated money-making advice may not return. Content freshness is a higher risk than technical failure for this site.

---

## External FAQ

**Q: How do I join Clan B5TA?**  
Visit the [Discord page](https://www.b5ta.com/discord.html) and follow the two-step instructions. Step 1: download Discord. Step 2: click the B5TA invite link. That's it — no application form, no waiting list.

**Q: Is this the official B5TA website?**  
Yes. The site is maintained by clan leadership and lives at the primary domain `b5ta.com`.

**Q: Do I need to create an account to use this site?**  
No. The site is fully public. No login, no registration, no cookies.

**Q: Is this site for Old School RuneScape (OSRS) or RuneScape 3 (RS3)?**  
The clan and guides are focused on RuneScape 3 (RS3). OSRS players are welcome in the community but guide content reflects RS3 gameplay.

**Q: How current are the guides?**  
Guide content reflects community knowledge at the time of writing. RuneScape updates frequently — always cross-reference guides with the RuneScape wiki for the latest information.

**Q: What does B5TA stand for?**  
Not officially documented. The name has been in use since the clan's founding in 2014.

**Q: Is there a membership fee or any cost to join?**  
No. The clan is free to join. The merchandise store (Zazzle) sells optional branded items, but purchase is never required.

**Q: How do I contact someone if the Discord invite doesn't work?**  
Try the RuneScape Official Clan Page linked in the site's navigation. Alternatively, search "B5TA" in the RuneScape clan finder in-game.

**Q: Can I contribute to the guides?**  
Yes. The site is open source at [github.com/Azqato/B5TA](https://github.com/Azqato/B5TA). Submit a pull request with your changes. Alternatively, ask a clan member with repository access to add content on your behalf.
