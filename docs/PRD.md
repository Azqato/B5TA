# Product Requirements Document - B5TA Clan Website

**Version:** 2.1.0
**Date:** 2026-08-25
**Status:** Active
**Supersedes:** PRD.md v2.0.0, and the seven documents merged into this one (TRD.md, RUNBOOK.md, SECURITY.md, METRICS.md, ROADMAP.md, TENETS.md, PRFAQ.md)

---

## How To Read This Document

This is the single reference for the B5TA clan website. It carries the product
intent, the technical detail, the operational runbook, the security posture, the
conventions, and the record of what this audit found. It is deliberately long. A
reader who arrives at one section directly should be able to act on it without
reading the other twenty, so sections restate context rather than cross-referencing
into a chain.

Two other documents exist and neither duplicates this one:

- [DESIGN.md](DESIGN.md) is the visual system: colours, type, spacing, breakpoints,
  component rules, accessibility measurements, motion.
- [PATCHNOTES.md](PATCHNOTES.md) is the dated change history.

[README.md](../README.md) at the repository root is written for a general reader and
carries no technical detail by design.

Throughout this document, **the code is treated as the truth about what is and the
documentation as the truth about what was intended.** Where the two disagreed, both
are recorded and the disagreement is listed in Documentation Versus Reality rather
than silently resolved.

---

## Problem Statement

Clan B5TA is a RuneScape community that has been active since 30 September 2014. The
original clan website (`b5ta.com`, running WordPress with the WikiWP theme) is no
longer actively maintained and relies on server-side infrastructure that introduces
maintenance overhead, hosting cost, and downtime risk. Members and prospective
members had no reliable, permanent public home where they could find clan
information, join the Discord, or reach community guides.

The problem is not that the clan lacks a place to talk. Discord already serves that
purpose well. The problem is that Discord is invisible from outside: a RuneScape
player who hears the clan name in-game, or finds it through a search, has no way to
learn what the clan is or how to reach it without already being inside it. A public,
permanent, zero-maintenance web presence closes that gap.

This project rebuilds the clan website as a fully static site that requires no
server, no database, and no ongoing maintenance beyond pushing commits to a GitHub
repository.

---

## Target Users

| Persona | Context | Primary need |
|---|---|---|
| **Prospective member** | Heard of B5TA in-game or through a friend. Wants to know what the clan is before committing to joining anything. Likely on mobile. | Understand the clan's culture, rules, and how to join, without having to ask a stranger in chat |
| **Current member** | Already in the clan. Arrives with a specific target in mind. Often mid-session, wanting one link fast. | Fast access to a specific page: the Discord link to share with a recruit, or a guide to reference during play |
| **Returning member** | Was in the clan previously, has been away, wants to reconnect. May be checking whether the clan still exists at all. | Find a working Discord invite and confirm recent activity |
| **Casual visitor** | RuneScape player who found the site through search. Has no intention of joining and may never return. | Browse guides for useful RuneScape information |
| **Contributor** | A clan member who wants to add or correct guide content. Comfortable with GitHub or willing to ask someone who is. | Understand the file to edit and how a change reaches the live site |
| **Maintainer** | The repository owner. Makes structural changes rarely and needs to reload full context each time. | A complete written record so that a change six months from now does not require rediscovering how the site works |

The last two personas are the reason this document exists in the form it does.

---

## Goals

- Provide a permanent, always-accessible public home for Clan B5TA
- Preserve the look and feel of the original `b5ta.com` WordPress design, because
  long-time members recognise it
- Require zero server-side infrastructure, so the site is deployable and maintainable
  through GitHub alone and cannot go down because a database did
- Give current members the fastest possible path to the Discord link and the guides
- Host community-authored guides for new and returning players
- Keep the site editable by someone who knows only HTML, with no build step to learn

---

## Non-Goals

Explicitly out of scope. Each of these has been considered and declined, not
overlooked.

- **User authentication or member accounts.** No use case justifies the
  infrastructure.
- **Database integration or dynamic content generation.** The content changes a few
  times a year.
- **Functional site-wide search.** A non-functional search bar existed and was
  removed in v1.5.0. Nine pages do not need search.
- **Real-time data** of any kind: Grand Exchange prices, live XP tracking, clan
  activity feeds. All require a backend or a client-side API integration.
- **Forum or community posting features.** Discord already does this better.
- **Analytics or user tracking.** Currently unimplemented. Planned but not present.
- **Email subscription or newsletter.** No publishing cadence exists to support it.
- **Merchandise store functionality.** The Zazzle link is sufficient.
- **A mobile app.** The site is responsive; that is the whole requirement.
- **A build step, bundler, template engine, or static site generator.** See the
  Durability Over Elegance tenet. This is the most frequently proposed change and
  the answer is currently no.

---

## User Stories

**Prospective member**

- As a prospective member, I want to read what Clan B5TA is about so I can decide if
  the culture and gameplay focus is a good fit for me.
- As a prospective member, I want a working Discord invite link so I can join the
  community immediately without asking someone in-game.
- As a prospective member, I want to read the clan rules so I understand what is
  expected of me before joining.
- As a prospective member on a phone, I want the navigation to be reachable without
  zooming so I can browse the site the way I actually found it.

**Current member**

- As a current member, I want to find the bossing guide quickly so I can reference it
  during a session.
- As a current member, I want the Discord link on every page so I can copy it to a
  recruit without hunting for it.
- As a current member, I want to know what the promotion requirements are so I can
  work toward them.
- As a current member, I want a Flip Chart page so I have a starting point for Grand
  Exchange flipping strategies.

**Returning member**

- As a returning member, I want to see that the site is active and the Discord link
  still works so I know the clan is still running.
- As a returning member, I want to know the inactivity policy so I can tell whether I
  am still in the clan.

**Casual visitor**

- As a visitor, I want to browse money-making and skilling guides so I can get useful
  RuneScape tips even if I never join the clan.
- As a visitor, I want the site to load fast on a slow connection so I do not
  abandon it before it renders.

**Contributor**

- As a contributor, I want to know which file holds a given piece of content so I can
  submit a change without reading the whole repository.
- As a contributor, I want to know what happens after I push so I can confirm my
  change went live.

**Maintainer**

- As the maintainer, I want a complete written record of the site's structure and
  decisions so that returning after months away does not require rediscovery.
- As the maintainer, I want the known problems written down with their correct fixes
  so that I do not re-derive the same analysis each time.

---

## Feature List

### MVP (shipped)

All of the following are live and verified present in the code.

- **Homepage** (`index.html`) with a clan overview and four game sections: RuneScape,
  League of Legends, Summoners War, Minecraft. Includes the RuneScape conduct and
  inactivity policy inline.
- **About page** (`about.html`) with an eight-item list covering founding history,
  the two clan rules, the promotion path, the inactivity threshold, and the conduct
  policy quoted directly from zoop.
- **Discord page** (`discord.html`) with a two-step numbered join process (download
  Discord, use the invite) and an animated banner.
- **Guides index** (`guides.html`) linking the four category pages and five
  community-authored guides hosted externally.
- **Four guide category pages**: Bossing, Money Making, Quests, Skilling. Each has an
  introduction, a "What We Offer" or tips section, a Community Guides list, and a
  back-link to the index.
- **Flip Chart page** (`flip-chart.html`), a placeholder that states the tracker is
  under construction and points at the community Flipping Guide.
- **Left sidebar navigation** with a hardcoded active state per page, an expandable
  Guides sub-menu, a section divider, and four external links.
- **Right aside** with a Pages widget and an External Links widget.
- **Mobile responsive layout** with both sidebars off-canvas below 1200px, two
  hamburger toggles, a dimming overlay, and outside-click dismissal.
- **Scroll-to-top button** appearing after 300px of scroll.
- **GitHub Pages deployment** from the `master` branch root, with Jekyll disabled.

### Future (post-launch, not built)

- **Dedicated Join page.** Present in the original `MVP.docx` content plan and in the
  original site's page list, never built. Currently the Discord page carries this
  role.
- **New Member Guide as a first-party page.** Currently an external link to
  `b5ta.com/new-member-guide/`, which is a WordPress path this repository does not
  serve. See discrepancy D1.
- **User EXP Tracker.** Present in the original `MVP.docx` page list. Scope
  undefined. Would need either a backend or a client-side integration with a
  RuneScape data source, which conflicts with the Static Is A Feature tenet, so the
  realistic form is a link to an external tracker.
- **Guide content expansion** contributed by clan members.
- **Analytics installation** to make the Metrics section below measurable.
- **Shared navigation component** to eliminate the nine-file duplication. Deferred
  deliberately; see the Durability Over Elegance tenet.

---

## Constraints

| Constraint | Detail |
|---|---|
| **Static HTML only** | GitHub Pages executes no server-side code. Every page is a self-contained HTML file. Any feature requiring a server is out of reach without changing host. |
| **Bootstrap 3.3.6 is locked** | Upgrading would require reworking selectors and layout across all nine pages. Bootstrap 3 reached end of life in 2019 and receives no patches. |
| **jQuery 1.12.3 is locked** | Required by Bootstrap 3's JavaScript plugins. Security support for the jQuery 1.x line ended around 2021. |
| **No build tooling** | No bundler, preprocessor, template engine, or package manager. Content changes are edits to raw HTML. There is no `package.json`. |
| **Navigation is duplicated nine times** | Header, nav, aside, footer, and the scroll-to-top anchor are inlined in all nine HTML files. Any change to any of them is a nine-file change. |
| **No analytics** | No measurement tool is installed. Every metric in this document is currently unmeasurable. |
| **No Node.js on the maintenance machine** | Verified: `node` is not on PATH. Python 3.14.3 and Git 2.54.0 are present. Any tooling suggestion that assumes npm will not run as written. |
| **No staging environment** | The only environment is production. Changes are verified locally and then pushed. |
| **Single maintainer** | Effectively one person with push access. There is no review gate beyond that person's own judgement. |

---

## Assumptions

Decisions made without full information, accepted as true. Each is a place where the
project would need rework if the assumption turns out to be false.

- The Discord invite URL (`discord.gg/0qfZioFZLSnmWMs7`) is permanent. It was
  explicitly confirmed as permanent in a commit on 2026-06-07. If it lapses, the
  site's primary call to action breaks silently on all nine pages.
- The RuneScape clan page URL
  (`services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA`) remains stable.
- GitHub Pages remains a free, available hosting option.
- Clan members will contribute guide content over time. The site's value degrades if
  they do not, because stale RuneScape advice is worse than no advice.
- The WikiWP/ipage design is the correct visual reference and should not be
  significantly altered.
- The clan remains active enough that linking to the Discord is worth doing.
- **Resolved during this audit, previously listed as uncertain:** `b5ta.com` does
  **not** currently resolve to this repository. The author confirmed on 2026-08-25
  that the domain will be pointed at this site at a later date, not yet scheduled.
  Until that cutover happens, `azqato.github.io/B5TA/` is the only address that
  serves this site, and any documentation statement written as though the custom
  domain were live is describing an intention rather than a fact. The cutover is
  Roadmap milestone v2.6. See discrepancy D1 and open question Q1.
- **Still uncertain:** what `b5ta.com` serves in the meantime, and therefore whether
  the four in-site links to `b5ta.com/new-member-guide/` currently work. They will
  definitely break at cutover unless handled; see open question Q8.

---

## Success Criteria

| Criterion | Measure | Currently |
|---|---|---|
| All pages load without errors | Manual check of all nine pages in Microsoft Edge (see Browser Testing) | Met |
| Discord link is reachable and valid | Manual verification of the invite URL | Met as of 2026-06-07 |
| No broken internal links | Manual link check across all nine pages | Met; all internal `href` targets exist |
| Left nav shows the correct active item | Manual review of all nine pages | Met; exactly one active item per page |
| Mobile sidebars function correctly | Manual test at 375px and 768px viewport widths | Met by inspection of the CSS and JS; not verified in a live browser during this audit |
| Site loads in under 3 seconds | Lighthouse performance score of 85 or better | **Unverified and at risk.** Measured homepage transfer weight is approximately 1.4 MB, dominated by an 891 KB logo and a 144 KB favicon. The Discord page is approximately 2.9 MB. See discrepancy D3. |
| Keyboard-only users can operate the site | Tab through every page and open both drawers | **Not met.** Both hamburger toggles are `<div>` elements with click-only handlers. See DESIGN.md. |

---

## Tenets

Five tenets, ordered by priority. **When two conflict, the lower-numbered one wins.**
They exist to settle real tradeoffs, which means each of them costs something; a
tenet nobody could disagree with would be decoration.

### 1. Content before chrome

The website exists to deliver clan information, not to showcase design craft. When a
design decision competes with the speed or clarity of reaching content, whether that
is a heavier layout, an animated entrance, or a visual flourish, the content wins. A
visitor who finds the Discord link in three seconds is worth more than one who
admires the homepage.

*Resolves:* choosing between a more visually polished feature and a simpler, faster
implementation. Default to the simpler one.

### 2. Static is a feature, not a constraint

Avoiding server-side infrastructure means no maintenance overhead, no downtime from
backend failures, and no attack surface beyond static files. Resist pressure to add
dynamic features. The value must clearly and substantially outweigh the operational
cost of maintaining a server, a database, or a build pipeline. "It would be cool to
have" is not sufficient justification.

*Resolves:* whether to add a feature requiring a backend (live GE prices, user
profiles, a contact form). The default answer is no.

### 3. Loyal to the original design

The original `b5ta.com` WordPress/WikiWP site is the design authority. Long-time
members hold a mental model of what the site looks like. Deviation from that
reference in colour, layout, or navigation structure requires explicit
justification. Keeping up with current design trends is not a valid reason to change.

*Resolves:* whether to modernise a visual pattern because it looks dated. Defer to
the original unless there is a functional reason to change. Note that tenets 1 and 2
outrank this one, so an accessibility fix beats visual fidelity.

### 4. Current members before prospective members

When two choices conflict, optimise for the person who already knows what they are
looking for, whether that is the Bossing guide or the Discord link, over someone
discovering the clan for the first time. The site's primary job is serving the
community it already has. Recruitment copy is secondary.

*Resolves:* navigation depth versus quick access, homepage marketing copy versus
direct links, SEO-oriented content versus member-useful content.

### 5. Durability over elegance

A repeated nav block that works forever beats a clever templating system that
requires specialised knowledge to maintain and can silently break. Prefer redundant
but obvious solutions over abstractions. Any contributor should be able to understand
and edit the site by opening a single HTML file with no prior context.

*Resolves:* whether to introduce a build step, a static site generator, or shared
partials to eliminate nav duplication. The right time to do that is when the
duplication is actively costing the team, not as a preemptive improvement.

---

## Roadmap

### Current phase: v2.x - Documented and maintained

The site is live on GitHub Pages. All nine pages are built and populated. No feature
work is in progress. The active work is documentation accuracy and, when it happens,
content contributed by clan members.

> **Note on a contradiction resolved in this audit.** The v2.0.0 ROADMAP.md described
> the current phase as "v1.x - Production" while the same release shipped as v2.0.0.
> The phase name has been corrected to match the version series. Nothing about the
> project's actual state changed.

### Milestone table

| Milestone | Target | Status |
|---|---|---|
| v1.0 - Static site launch | 2026-06-07 | Complete |
| v1.x - Nav and content polish | 2026-06-07 | Complete |
| v2.0 - First documentation audit | 2026-06-08 | Complete |
| v2.1 - Second documentation audit and consolidation | 2026-08-25 | Complete |
| v2.2 - Image weight reduction | When prioritised | Planned |
| v2.6 - Custom domain cutover to `b5ta.com` | When prioritised, confirmed as planned 2026-08-25 | Planned |
| v2.3 - Accessibility pass | When prioritised | Planned |
| v2.4 - Analytics setup | When prioritised | Planned |
| v2.5 - Guide content expansion | When members contribute | Planned |
| v3.0 - Join page | When prioritised | Planned |
| v3.x - XP tracker | Future | Planned |
| v4.0 - Templating or static site generator | When nav duplication becomes painful | Planned |

Nothing is Blocked. Nothing is In Progress.

### Feature breakdown per milestone

**v1.0 - Static site launch (complete)**
- Homepage, About, Discord, Guides index
- Four guide category pages
- Flip Chart page
- Left nav with active state, sub-menu, hamburger toggle
- Right aside with Pages and External Links widgets
- Mobile responsive layout with off-canvas drawers
- GitHub Pages deployment with `.nojekyll`

**v1.x - Nav and content polish (complete)**
- Guide pages filled with real content (v1.2.0)
- The `ipage/` WordPress archive merged and removed (v1.3.0)
- Image assets consolidated into `img/` (v1.4.0)
- Flip Chart removed from nav, Support link added, non-functional search bar removed
  (v1.5.0 and v1.6.0)
- Header and content spacing fixes (v1.7.0 and v1.8.0)

**v2.0 - First documentation audit (complete)**
- Root markdown files moved into `/docs/` and renamed to uppercase
- Six new documents created
- README rewritten as a developer reference

**v2.1 - Second documentation audit (complete)**
- Ten documents consolidated into three plus the README
- README rewritten for a general reader
- Writing style, browser testing, and removal policies adopted and recorded
- Sixteen documentation-versus-code discrepancies recorded

**v2.2 - Image weight reduction**
- Resize `img/0jK9PZV.png` (891 KB) to its rendered height of 60px
- Replace `img/favicon.png` (144 KB) with a favicon under 10 KB
- Compress or replace `img/wfbCHon.gif` (1.5 MB) on the Discord page
- Target: homepage under 500 KB, matching the stated performance requirement
- This is the highest-value non-content change available and touches four files

**v2.3 - Accessibility pass**
- Convert both hamburger toggles to real buttons with `aria-expanded`
- Darken the link colour to `#1a5fa0` to reach WCAG AA
- Darken the header tagline from `#aaa`
- Add a skip-to-content link
- Focus management on drawer open and close
- Honour `prefers-reduced-motion`
- Note: this touches all nine files and partially conflicts with tenet 3

**v2.4 - Analytics setup**
- Install Plausible Analytics or Google Analytics 4
- Configure outbound click tracking on the Discord invite link
- Establish baselines for the Metrics section below

**v2.5 - Guide content expansion**
- Bossing: boss-specific sections, team-finding tips, gear recommendations
- Skilling: skill-by-skill levelling paths
- Quests: a priority quest list for new members
- Contributed by clan members through pull requests

**v2.6 - Custom domain cutover to `b5ta.com`**

The clan owns `b5ta.com` and intends to point it at this site. As of 2026-08-25 the
domain does not serve this repository: there is no CNAME file here, and the site is
reachable only at `azqato.github.io/B5TA/`. This milestone is that cutover.

- Set the custom domain under GitHub repository Settings, then Pages, then Custom
  domain. GitHub writes a `CNAME` file into the repository root when you do this.
  Commit it; do not delete it.
- Add or confirm the DNS record: a CNAME for `www.b5ta.com` pointing at
  `azqato.github.io`. For the apex `b5ta.com`, GitHub requires A or ALIAS records
  rather than a CNAME, so confirm which form the DNS provider supports.
- Enable Enforce HTTPS once the certificate provisions. This can take up to 24 hours
  after the DNS record resolves.
- Allow up to 48 hours for propagation before treating a failure as real.

**Blocking dependency, and the reason this is not a pure infrastructure change.**
Four pages (`guides.html`, `guides-bossing.html`, `guides-quests.html`,
`guides-skilling.html`) link to `https://b5ta.com/new-member-guide/`, a WordPress
path that this repository does not serve. The moment the domain points here, those
four links break. They cannot be left as they are. Resolve before or during cutover
by one of:

1. Build the New Member Guide as a first-party page in this repository and repoint
   the four links at it. This is the best outcome and is already listed as a Future
   feature.
2. Repoint the four links at whatever the guide's real current home is, if the
   content lives somewhere that survives the cutover.
3. Remove the four links, which loses recommended-starting-path content on four
   pages and is the worst of the three.

**Verify after cutover:** load all nine pages on the new domain, confirm HTTPS,
confirm the four New Member Guide links resolve, and confirm the header logo and
favicon load (they are the two largest assets and the most obvious cache-related
failures). Update this document, the README, and the Runbook's Environment Configs
table to state the domain as live rather than intended.

**Rollback:** removing the custom domain in GitHub Pages Settings and deleting the
`CNAME` file restores `azqato.github.io/B5TA/` as the sole address. DNS changes take
their own propagation time to unwind.

**v3.0 - Join page**
- Membership requirements, what to expect, how promotion works
- Supplements rather than replaces the Discord page
- Restores a page from the original `MVP.docx` content plan

**v3.x - XP tracker**
- Scope undefined. Most likely a link to an external tracker rather than a built
  tool, since building one conflicts with tenet 2.

**v4.0 - Templating or static site generator**
- Eleventy is the current recommendation, on the grounds that it needs no
  configuration to render plain HTML with includes
- Prerequisite: Node.js on the maintenance machine, which is not currently installed
- Prerequisite: acceptance of a build step in the deploy workflow, which tenet 5
  currently rejects

### Explicitly deferred items

| Item | Why it is deferred |
|---|---|
| User accounts and login | No use case justifies the infrastructure for a static clan site |
| Dynamic Grand Exchange price data | Requires a backend or a client-side API call; complexity outweighs value |
| Real-time XP leaderboard | Same reasoning; a manually updated table would serve if anyone wanted it |
| Functional search | The non-functional bar was removed in v1.5.0. Nine pages do not need search. |
| In-house merchandise store | The Zazzle link is sufficient |
| Forum or community posting | Discord serves this |
| Blog or news feed | No publishing cadence; would need a CMS or a build pipeline |
| Bootstrap 5 upgrade | Requires reworking CSS across nine pages; acceptable to defer until a planned visual refresh |
| Deleting the 36 unreferenced images | Retained deliberately as a brand archive. Consolidating them was the purpose of v1.4.0, and they cost nothing at rest since they are never requested. |
| Removing dead CSS and dead JS | `.meta`, `.meta-search-form`, `.entryMeta`, and all of `js/externalscript.js`. Harmless at runtime, cheap to delete, but each deletion is a change with no user-visible benefit. Bundle into v2.2 or v2.3 rather than doing alone. |

---

## Metrics

**Current status: nothing below is being measured.** No analytics tool is installed.
Every target is a plan for after v2.4 ships. Recorded honestly rather than presented
as data.

Recommended tool: [Plausible Analytics](https://plausible.io), which is
privacy-first, cookie-free, and lightweight, and therefore does not force the site to
add a cookie banner. Google Analytics 4 is the alternative if cost is decisive.

### North star metric

**Discord invite link clicks per month.**

A click on the Discord invite is the clearest signal that the site is doing its
primary job: connecting a visitor to the clan. Everything else on the site, including
the guides, is supporting content. If this number is healthy, the site is delivering
value even if every other number is flat.

| Target | Timeframe |
|---|---|
| Establish a baseline | First 30 days after analytics install |
| 20 or more clicks per month | 60 days after analytics install |

### Acquisition metrics

| Metric | Description | Target | Timeframe | Method |
|---|---|---|---|---|
| Monthly unique visitors | Distinct users per month | Establish baseline | 30 days | Analytics tool |
| Search engine referrals | Arrivals from Google or Bing | Establish baseline | 30 days | Referrer tracking |
| Direct traffic | Typed URL or bookmark | Establish baseline | 30 days | Referrer tracking |
| Referral traffic | Arrivals from Discord, Reddit, RuneScape forums | Establish baseline | 30 days | Referrer tracking |

### Engagement metrics

| Metric | Description | Target | Timeframe | Method |
|---|---|---|---|---|
| Most-visited pages | Which pages get the most views | Identify the top three | 30 days | Pageview tracking |
| Guide page share | Views on the four guide pages as a share of all views | Over 30% | 60 days | Pageview tracking |
| Discord link clicks | Clicks on the invite across all pages | See north star | 60 days | Outbound click event |
| Homepage bounce rate | Visitors leaving from the homepage without navigating | Under 60% | 90 days | Analytics tool |

### Retention metrics

| Metric | Description | Target | Timeframe | Method |
|---|---|---|---|---|
| Returning visitor rate | Share of monthly visitors who have visited before | Over 20% | 90 days | Returning-visitor dimension |
| Repeat guide views | Whether guide pages get repeat visits, indicating reference use | Establish baseline | 60 days | Returning-visitor dimension |

Retention measurement requires a session-identifying tool. Plausible derives
returning visitors by hashing without cookies; GA4 uses cookies. Choose on privacy
preference, and note that choosing GA4 means the site starts setting cookies, which
contradicts the current External FAQ answer stating that it does not.

### Performance metrics

| Metric | Description | Target | Currently | Method |
|---|---|---|---|---|
| Lighthouse performance score | Automated audit | 85 or better | Unmeasured | Lighthouse, driven against Microsoft Edge (see Browser Testing) |
| First Contentful Paint | Time to first visible content | Under 1.5s | Unmeasured | Lighthouse or PageSpeed Insights |
| Homepage total weight | All homepage resources combined | Under 500 KB | **~1.4 MB, failing** | Browser DevTools network panel |
| Discord page total weight | All Discord page resources combined | Under 500 KB | **~2.9 MB, failing** | Browser DevTools network panel |
| Uptime | GitHub Pages availability | 99.9% | Unmonitored | GitHub Status, or UptimeRobot free tier |
| Broken internal links | Internal links returning 404 | 0 | 0 as of this audit | Manual check or a link checker |

The two weight figures are measured, not estimated. Breakdown of the homepage:
`img/0jK9PZV.png` 891 KB, `img/favicon.png` 144 KB, `css/bootstrap.css` 153 KB,
`js/jquery.min.js` 97 KB, `js/bootstrap.js` 71 KB, `img/clan.png` 45 KB,
`css/site.css` 11 KB, `index.html` 7 KB, `js/site.js` 2 KB,
`js/externalscript.js` 0.9 KB. The Discord page adds a 1.5 MB GIF and drops
`clan.png`. These are uncompressed on-disk sizes; GitHub Pages gzips text assets, so
the CSS and JS figures will be smaller in transit, but the images will not compress
further and they are the bulk of the problem.

### Reporting cadence

| Metric group | Review frequency |
|---|---|
| North star (Discord clicks) | Monthly |
| Acquisition and engagement | Monthly |
| Retention | Monthly |
| Performance (Lighthouse and page weight) | Quarterly |
| Broken link check | Quarterly |
| Outbound link validity, especially the Discord invite | Quarterly |

---

## Runbook

Everything needed to run, build, deploy, and recover the project. Assume the reader
has just cloned the repository and has nothing else.

### Prerequisites

| Requirement | Version the project actually needs | Present on the maintenance machine |
|---|---|---|
| Git | Any recent version. 2.x is fine. | Git 2.54.0.windows.1 |
| A web browser | Any modern browser | Microsoft Edge, at `C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe` |
| Python 3 | Optional, only for the local HTTP server. Any Python 3 with `http.server`, so 3.0 or later. | Python 3.14.3 |
| Node.js | **Not required and not installed.** Only relevant if you choose the `npx serve` option, or if the project ever adopts a static site generator. | Not on PATH |

There is no package manager, no `package.json`, no lockfile, and no `.env` file.

### Local setup

From a fresh machine, in order:

1. **Install Git** from https://git-scm.com/downloads.

2. **Clone the repository.**
   ```bash
   git clone https://github.com/Azqato/B5TA.git
   cd B5TA
   ```

3. **Serve the site.** There is nothing to install and nothing to compile.

   *Primary method (Python, and the one that works on the maintenance machine):*
   ```bash
   python -m http.server 8000
   ```
   Then open `http://localhost:8000`. **Default port: 8000.**

   *Alternative (only if Node.js is installed, which it currently is not):*
   ```bash
   npx serve .
   ```
   Then open `http://localhost:3000`.

   *Quickest, with a caveat:* open `index.html` directly in a browser. Relative paths
   resolve for CSS, JS, and images, so the page renders, but some browsers restrict
   behaviour under the `file://` protocol. Use the HTTP server for anything you
   intend to verify.

### Build

There is no build step. The source files are the production files. What is in the
repository is byte-for-byte what GitHub Pages serves. There is no output directory.

### Deploy

**Production is the only environment.** There is no staging.

1. Make the change to HTML, CSS, JS, or an image.
2. Verify locally at `http://localhost:8000` (see Local setup).
3. Stage and commit:
   ```bash
   git add <changed-files>
   git commit -m "v1.2.3 - short description of change"
   ```
4. Push:
   ```bash
   git push origin master
   ```
5. GitHub Pages rebuilds and serves within roughly 30 seconds.
6. Verify at https://azqato.github.io/B5TA/.

**Manual step that is easy to miss:** any change to the header, navigation, aside,
footer, or scroll-to-top anchor must be applied to **all nine** HTML files. Nothing
enforces this. Before committing such a change, confirm the count:

```bash
grep -c "the-string-you-changed" *.html
```

Nine files should report the new string and none should report the old one.

### First-time GitHub Pages setup

Only needed if deploying from scratch.

1. Push the repository to `github.com/Azqato/B5TA`.
2. In GitHub, go to Settings, then Pages, and set Source to the `master` branch,
   `/ (root)` folder.
3. The site becomes available at `azqato.github.io/B5TA/` within a few minutes.
4. For a custom domain, set it under Settings, then Pages, then Custom domain.
   GitHub writes a `CNAME` file into the repository when you do this. DNS must have a
   CNAME record for `www.b5ta.com` pointing at `azqato.github.io`.

   > **This repository contains no CNAME file, and that is currently correct.** The
   > author confirmed on 2026-08-25 that `b5ta.com` does not point here yet and that
   > the cutover is planned for later. Step 4 above is exactly that cutover: it is
   > Roadmap milestone v2.6, and it has a blocking dependency (four in-site links to
   > `b5ta.com/new-member-guide/` that break the moment the domain moves). Read v2.6
   > before performing step 4.

### Rollback

**Option A, revert the last commit. Safe, preserves history, and the default choice.**
```bash
git revert HEAD
git push origin master
```

**Option B, reset to a specific commit. Rewrites history; use only if the bad commit
has not been widely distributed.**
```bash
git log --oneline          # find the target hash
git reset --hard <hash>
git push --force origin master
```

**Option C, the GitHub UI.** There is no one-click rollback for GitHub Pages. Use
Option A.

After any rollback, hard-refresh the live site and confirm it reflects the intended
state. The GitHub Pages CDN can hold the previous version for a minute or two.

### Environment configs

| Environment | URL | Source |
|---|---|---|
| Local | http://localhost:8000 | Files in the working directory |
| Production | https://azqato.github.io/B5TA/ | `master` branch root on GitHub |
| Production, planned | https://www.b5ta.com, after the v2.6 custom domain cutover. Not live as of 2026-08-25. | Same branch and files; only the address changes |

Nothing differs between them except the host. There are no environment-specific
config files, no feature flags, and no `.env` files. All configuration, including
nav links and the Discord invite URL, is hardcoded in the HTML.

### Environment variable reference

**There are none.** The project has no server, no build process, and no runtime
configuration. No key needs to be set in any environment. If a future change
introduces one, add it to a table here with the key name, its purpose, and whether it
is required, and never record its value.

### Common errors

| Error | Likely cause | Fix |
|---|---|---|
| Images or scripts fail when opening `index.html` directly | Browser restrictions under the `file://` protocol | Serve over HTTP: `python -m http.server 8000` |
| Sidebar does not slide open on mobile | JavaScript blocked, or jQuery failed to load | Open the console. Confirm `js/jquery.min.js` loads before `js/site.js`. Both must be present. |
| Guides sub-menu does not expand on tap | The 1200px check in `js/site.js` does not match the CSS breakpoint | Both must be 1200. Check `site.js` and the media query in `site.css`. |
| Wrong nav item highlighted | `current-menu-item current_page_item` set on the wrong `<li>` | In that file's `<ul class="main-menu">`, ensure exactly one `<li>` carries both classes |
| Page does not update after push | GitHub Pages CDN cache | Wait one to two minutes, then hard-refresh with Ctrl+Shift+R |
| Custom domain not resolving | CNAME DNS record missing, or no CNAME file in the repository | See discrepancy D1. Confirm the DNS record and confirm GitHub Pages has the custom domain set. Propagation can take up to 48 hours. |
| 404 on GitHub Pages after a fresh deploy | `.nojekyll` missing from the repository root | Confirm `.nojekyll` exists at root and is committed |
| Glyphicon font files return 404 | Jekyll is processing the `fonts/` directory | Confirm `.nojekyll` exists. Jekyll skips directories beginning with an underscore and can interfere with asset serving; `.nojekyll` disables it entirely. |
| Content renders underneath the fixed header | `.container-fluid { margin-top: 113px }` removed or overridden | Restore that rule in `css/site.css`. It was added in v1.7.0 for exactly this. |
| A nav change appears on some pages only | The edit was applied to fewer than nine files | `grep -c` the changed string across `*.html`. All nine must match. |
| `npx: command not found` | Node.js is not installed on this machine | Use `python -m http.server 8000` instead |

### Monitoring

| What | Where | Access |
|---|---|---|
| Hosting status | https://www.githubstatus.com | Public |
| Uptime alerting | UptimeRobot free tier, monitoring the live URL | Requires a free account; not currently configured |
| Deploy status | GitHub repository, Actions tab, or Settings then Pages for the last deployment timestamp | Requires repository access |
| Server error logs | **Not available.** GitHub Pages exposes no server logs to site owners. | n/a |
| Client errors | Browser console only, and only for whoever is looking | n/a |
| Analytics | Not installed. See Metrics. | n/a |

The practical consequence: **the site has no automated failure detection.** If the
Discord invite expires or an external link rots, nothing will tell you. That is what
the quarterly outbound link check in the reporting cadence is for.

---

## Technical Requirements

### System architecture

Fully static HTML. No server-side processing, no build step, no database, no API, no
client-server communication at runtime. All content is pre-rendered.

All nine pages are self-contained `.html` files with the header, navigation, aside,
and footer inlined directly into each one. CSS and JavaScript load from local files
in the same repository. Nothing is fetched from a CDN.

```
Browser
  └── requests a .html file
        ├── css/bootstrap.css        (in <head>)
        ├── css/site.css             (in <head>, after bootstrap)
        ├── js/jquery.min.js         (in <head>)
        ├── js/bootstrap.js          (in <head>, after jQuery)
        ├── js/site.js               (before </body>)
        └── js/externalscript.js     (before </body>, dead code)
```

Load-order rules that matter: `site.css` must load after `bootstrap.css` because it
overrides it, and `jquery.min.js` must load before `bootstrap.js` and `site.js`
because both depend on it. jQuery and Bootstrap load in the `<head>` and are
therefore render-blocking, which is not ideal but is how the site is built.

### Tech stack

| Layer | Technology | Version | Notes |
|---|---|---|---|
| Markup | HTML5 | n/a | Static, no templating, nine files |
| CSS framework | Bootstrap | 3.3.6 | Vendored at `css/bootstrap.css`, 153 KB. Includes normalize.css 3.0.3. Never edited. |
| Custom CSS | `css/site.css` | n/a | 11 KB. The three-column ipage layout. Loads after Bootstrap and overrides it. |
| JavaScript library | jQuery | 1.12.3 | Vendored at `js/jquery.min.js`, 97 KB. Required by Bootstrap 3 and used by `site.js`. |
| Bootstrap JS | `js/bootstrap.js` | 3.3.6 | 71 KB. Loaded on every page. No Bootstrap JS component is actually used by any page. |
| Custom JS | `js/site.js` | n/a | 2 KB, about 65 lines. Drawer toggles, sub-menu toggle, overlay, scroll-to-top. |
| Dead JS | `js/externalscript.js` | n/a | 0.9 KB. Loaded on every page. Binds to selectors that exist nowhere. |
| Icon font | Bootstrap Glyphicons | 3.3.6 | In `fonts/`, 224 KB across five formats. Referenced by `bootstrap.css`, used by no page. |
| Hosting | GitHub Pages | n/a | Serves the `master` branch root |
| Jekyll | Disabled | n/a | Via `.nojekyll` at the repository root |
| Licence | MIT | n/a | `LICENSE`, copyright "b5ta", 2017 |

No language other than HTML, CSS, and JavaScript is used. There is no TypeScript, no
preprocessor, and no transpilation.

### Folder structure

```
B5TA/
├── index.html                   Homepage. Clan overview plus RuneScape, LoL,
│                                Summoners War, and Minecraft sections. The only
│                                page with no .entryHeader.
├── about.html                   Founding history, rules, promotion, conduct policy
├── discord.html                 Two-step join instructions plus animated banner
├── guides.html                  Guides index: four categories, five external guides
├── guides-bossing.html          Bossing guides
├── guides-money-making.html     Money making guides. The only page linking flip-chart.html.
├── guides-quests.html           Quest guides
├── guides-skilling.html         Skilling guides
├── flip-chart.html              Placeholder for the GE flipping tracker. Deployed
│                                but absent from the navigation since v1.5.0.
│
├── css/
│   ├── bootstrap.css            Bootstrap 3.3.6 core, vendored, never edited
│   └── site.css                 Custom layout. Loads second. The file you edit.
│
├── js/
│   ├── jquery.min.js            jQuery 1.12.3, vendored
│   ├── bootstrap.js             Bootstrap 3.3.6 plugins, vendored, unused in practice
│   ├── site.js                  All live site behaviour, ~65 lines
│   └── externalscript.js        Dead code. Loaded everywhere, does nothing.
│
├── img/                         40 files, ~9.1 MB. Four are referenced:
│   ├── 0jK9PZV.png              Header logo, 891 KB, rendered at 60px tall
│   ├── favicon.png              Tab icon, 144 KB
│   ├── clan.png                 Homepage float-right image, 45 KB, 280x126
│   ├── wfbCHon.gif              Discord page banner, 1.5 MB
│   └── (36 others)              Historical brand and gameplay assets, unreferenced,
│                                retained deliberately as an archive
│
├── fonts/                       Bootstrap Glyphicons, five formats, 224 KB total.
│                                Referenced by bootstrap.css, used by no page.
│
├── docs/
│   ├── PRD.md                   This document
│   ├── DESIGN.md                Visual system
│   └── PATCHNOTES.md            Dated change history
│
├── .nojekyll                    Empty file. Disables Jekyll on GitHub Pages.
├── LICENSE                      MIT, 2017, "b5ta"
├── README.md                    Public front door, general reader
├── MVP.docx                     Original 2020 content plan. Source of the homepage
│                                copy and the record of two never-built pages
│                                (Join, User EXP Tracker).
└── Screenshot.JPG               Reference screenshot of the original WordPress site
```

There is no `CNAME` file. See discrepancy D1.

### Data models

**This project has no data models.** There is no database, no JSON store, no
structured data, and no schema markup. All content is literal text in HTML.

The closest analogue is the structural pattern every page follows, which is worth
writing down because it is what a contributor must reproduce:

```
Page
├── title            string    <title>, always "B5TA | <PageName>"
├── description      string    <meta name="description">, identical on all nine pages
├── favicon          path      img/favicon.png, identical on all nine pages
├── activeNavItem    class     current-menu-item current_page_item on exactly one <li>
├── activeAsideItem  class     current_page_item on exactly one aside <li>
├── entryTitle       string    <h1>, omitted on index.html
└── content          HTML      inner HTML of .entryContent, the only part that varies
```

Every active state is hardcoded per file. There is no variable, no server include,
and nothing that computes it.

### API design

**There is no API.** No `fetch`, no `XMLHttpRequest`, no WebSocket, no form
submission, no third-party script. The site makes zero network requests beyond
fetching its own assets. Documented below instead is the internal data flow: how user
interaction becomes visible change.

**Drawer open and close**
1. User clicks `#navMenuButton` or `#asideMenuButton`.
2. `site.js` reads whether the target drawer already has `.is-open`, toggles
   `.is-open` on it, removes `.is-open` from the *other* drawer, and sets
   `.is-visible` on `#siteOverlay` to match whether it is opening.
3. CSS transitions the drawer from its off-canvas position (`left: -265px` or
   `right: -320px`) to `left: 0` or `right: 0` over 250ms.
4. Closing happens three ways: clicking the same toggle again, clicking the overlay,
   or clicking anywhere outside the drawer and its toggle. The outside-click handler
   returns immediately at viewport widths of 1200px and above.

*Only one drawer can be open at a time.* Opening one closes the other. That is
deliberate and is implemented by the `removeClass` calls in both handlers.

**Guides sub-menu**
1. User clicks the Guides parent link.
2. If the viewport is narrower than 1200px, `site.js` calls `preventDefault()`, so
   the tap expands rather than navigates. At 1200px and above the link navigates
   normally *and* the class still toggles.
3. `.sub-open` is toggled on the closest `.menu-item-has-children`, which CSS uses to
   switch `.sub-menu` between `display: none` and `display: block` and to rotate the
   chevron.

**Scroll-to-top**
1. `$(window).on('scroll')` fires. Past 300px, `#scrollTop` fades in over 200ms;
   below it, fades out.
2. Clicking it prevents default and animates `scrollTop` to 0 over 400ms.

**Error states:** there are none, because there is nothing that can fail. If
JavaScript does not load, the drawers cannot open below 1200px and the site is
effectively navigable only at desktop widths. There is no fallback for that, and it
is worth knowing.

### State management

Client-side only, stored entirely as CSS classes on DOM elements. There is no state
object, no store, and no persistence of any kind.

| State | Element | Class |
|---|---|---|
| Left drawer open | `#primaryMenu` | `.is-open` |
| Right drawer open | `#siteAside` | `.is-open` |
| Overlay visible | `#siteOverlay` | `.is-visible` |
| Guides sub-menu expanded | `.menu-item-has-children` | `.sub-open` |
| Current page, nav | `li.menu-item` | `.current-menu-item .current_page_item` |
| Current page, aside | `li.page_item` | `.current_page_item` |

No `localStorage`, no `sessionStorage`, no cookies, no IndexedDB, no global
JavaScript variables beyond the three jQuery element caches at the top of `site.js`.
**All UI state is lost on navigation or refresh**, which is correct for this site:
every page load starts with both drawers closed.

### Third-party integrations

All integrations are outbound links. Nothing is called, nothing is authenticated,
and no user data is transmitted by the site. Clicking a link sends the user's browser
to the third party directly; this site is not in the path.

| Service | URL | Purpose | Auth | Appears on |
|---|---|---|---|---|
| Discord (invite) | discord.gg/0qfZioFZLSnmWMs7 | Clan Discord invite | None, public link | discord.html |
| Discord (download) | discord.com/download | Client download | None | discord.html |
| RuneScape Clan Home | services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA | Official RS clan page | None | Nav and aside, all 9 pages |
| RunePixels | runepixels.com/clans/b5ta/about | Clan stats and member list | None | Nav and aside, all 9 pages |
| Support page | azqato.github.io/support.html | Creator support page | None | Nav and aside, all 9 pages |
| Zazzle | zazzle.com/clanb5ta/products | Clan merchandise | None | Nav and aside, all 9 pages |
| b5ta.com New Member Guide | b5ta.com/new-member-guide/ | Community guide | None | guides.html and 3 guide pages |
| Google Docs: Dark Beasts | docs.google.com/document/d/1PCBtcy7... | Community guide | None, public doc | guides.html, guides-bossing.html |
| Google Docs: Flipping | docs.google.com/document/d/1gOl01Ig... | Community guide | None, public doc | guides.html, guides-money-making.html, flip-chart.html |
| Google Docs: How To Not Be A N00B | docs.google.com/document/d/1m9GRZYt... | Community guide | None, public doc | guides.html, guides-quests.html, guides-skilling.html |
| runescape.guide Free Runecoins | runescape.guide/free-runecoins/ | Community guide | None | guides.html, guides-money-making.html |

Every one of these carries `target="_blank" rel="noopener"`. Two use plain `http://`
rather than `https://`: the RuneScape clan home link and the Zazzle link. Both
targets support HTTPS and both should be upgraded; they are recorded here rather than
changed because that is a nine-file edit.

### Performance requirements

| Requirement | Target | Measured | Verdict |
|---|---|---|---|
| HTML plus CSS plus JS, per page | Under 100 KB | ~342 KB uncompressed, less after gzip | Fails uncompressed; Bootstrap and jQuery are 321 KB of it |
| Total page weight, homepage | Under 500 KB | ~1.4 MB | **Fails** |
| Total page weight, Discord page | Under 500 KB | ~2.9 MB | **Fails** |
| First Contentful Paint | Under 2s on standard broadband | Unmeasured | Unknown |
| Lighthouse performance | 85 or better | Unmeasured | Unknown |
| JavaScript execution | jQuery init plus `site.js` on `DOMContentLoaded` | As specified | Met |

There is no bundler, no minifier, and no image optimisation. Two of the three
JavaScript files (`bootstrap.js` and `externalscript.js`, 72 KB combined) do nothing
at all on any page and could be removed today with zero risk. The images are the real
problem; see the v2.2 milestone.

### Known technical debt

| Issue | Current approach | Correct solution | Priority |
|---|---|---|---|
| Header, nav, aside, and footer duplicated across nine files | Full markup inlined in each | A static site generator with includes, or a small build script. One source of truth for the nav. | Low. Tenet 5 accepts this deliberately. |
| Unoptimised images | Raw PNG and GIF served at source resolution | Resize each to its rendered size; replace the favicon; compress or drop the GIF | **High.** This is the largest measurable defect. |
| `js/bootstrap.js` loaded but unused | 71 KB shipped on every page | Remove the `<script>` tag from all nine files. No page uses a Bootstrap JS component. | Medium. Free 71 KB win. |
| `js/externalscript.js` is dead code | 0.9 KB shipped on every page, binds to four selectors that exist nowhere | Delete the file and the nine `<script>` tags | Medium |
| Dead CSS: `.meta`, `.meta-search-form` | Search bar removed in v1.5.0, rules remained | Delete both blocks from `site.css` | Low |
| Dead CSS: `.entryMeta` | Rule exists, no page renders the element | Delete, or add the element if an article footer is wanted | Low |
| Bootstrap 3.3.6, end of life since 2019 | Pinned and vendored | Bootstrap 5, or replace with hand-written CSS. `site.css` already carries the layout; Bootstrap supplies the reset, the typography scale, and unused components. | Low. Deferred to a visual refresh. |
| jQuery 1.12.3 for ~65 lines of DOM logic | Vendored, required by Bootstrap 3 | Vanilla JS. `site.js` uses only `addClass`, `removeClass`, `toggleClass`, `on`, `closest`, `width`, `fadeIn`, `fadeOut`, `animate`. All have short native equivalents. Blocked only by Bootstrap 3's dependency, which disappears if `bootstrap.js` is removed first. | Medium |
| `.menu-section-divider` is a `<div>` inside a `<ul>` | Invalid HTML, renders correctly everywhere observed | Use `<li class="menu-section-divider" role="separator">` | Low |
| 1200px breakpoint hardcoded in two files | A number in `site.css` and the same number twice in `site.js` | No clean fix without a build step. Document it, which this audit does. | Low |
| The 768px to 1199px media query is a no-op | Re-states the base rule verbatim | Delete it | Low |
| Two external links use `http://` | RuneScape clan home and Zazzle | Change to `https://` in all nine files | Low |
| Scroll-to-top styled inline | ~200 characters of inline style in each of nine files | Move to `site.css` | Low |
| Nothing detects a broken outbound link | Manual quarterly check | A scheduled link checker, if one can run without a build step | Low |

---

## Conventions

Derived from the code and the git history, not from any style guide. The project
contains no linter config, no `.editorconfig`, and no contributing guide, so
everything here is observed practice. Where practice is inconsistent, the dominant
form is named and the deviations listed.

### Naming

| Thing | Convention | Examples | Deviations |
|---|---|---|---|
| HTML page files | lowercase, hyphenated, `.html` | `guides-money-making.html`, `flip-chart.html` | None |
| Sub-page prefixing | The parent page name, then a hyphen, then the sub-topic | `guides-bossing.html` under `guides.html` | None |
| CSS and JS files | lowercase, no separators | `site.css`, `site.js`, `externalscript.js` | `jquery.min.js` uses a dot, but that is the vendor's name |
| Documentation files | SCREAMING_CASE `.md` inside `/docs`, plus `README.md` and `LICENSE` at root | `PRD.md`, `DESIGN.md` | None since v2.0.0. Before that they were `PatchNotes.md` and `Design.md`. |
| Directories | lowercase, single word | `css`, `js`, `img`, `fonts`, `docs` | None |
| CSS layout classes | camelCase, inherited from the WikiWP theme | `.pageContainer`, `.entryContent`, `.entryTitle`, `.widgetTitle`, `.headerMain`, `.navMenuButton` | This is the dominant form for structural elements |
| CSS state and modifier classes | lowercase, hyphenated, `is-` prefix for boolean state | `.is-open`, `.is-visible`, `.sub-open` | `.sub-open` lacks the `is-` prefix. `.is-` is dominant; match it for anything new. |
| CSS WordPress-inherited classes | lowercase with underscores | `.current_page_item`, `.page_item` | Kept verbatim from WordPress and paired with hyphenated equivalents (`.current-menu-item`). Do not normalise; the pairs are load-bearing. |
| HTML IDs | camelCase | `#primaryMenu`, `#siteAside`, `#siteOverlay`, `#navMenuButton`, `#scrollTop` | `#logo` and `#site-logo` are lowercase, from the original theme |
| JS variables | camelCase, jQuery objects prefixed with `$` | `var $nav`, `var $aside`, `var $overlay`, `var opening` | None |
| Images | Whatever the source gave them, unchanged | `0jK9PZV.png`, `wfbCHon.gif` are imgur-style hashes; `clan.png` and `favicon.png` are descriptive | Both forms exist. **Descriptive is preferred for anything new**, but existing names are never renamed because renaming means editing nine files. |

### Formatting

| Aspect | Convention | Notes |
|---|---|---|
| Indentation | 2 spaces, everywhere, HTML and CSS and JS | Consistent across every hand-written file |
| Quote style, HTML | Double quotes on every attribute | No exceptions |
| Quote style, JS | Single quotes for selectors and strings | Consistent in `site.js` and `externalscript.js` |
| Semicolons, JS | Always | No ASI reliance |
| Line length | No enforced limit. HTML lines run long where markup is nested; CSS and JS lines stay under ~90 characters. | |
| CSS declarations | One per line for multi-property rules; single-line form for one-property or two-property rules (`article { margin: 0; }`) | Both forms are intentional and both are common in `site.css` |
| CSS shorthand pairing | Related positional properties on one line (`top: 0; left: 0; right: 0;`) | A `site.css` idiom, used consistently |
| CSS section headers | A banner comment of equals signs, uppercase title | Nine of them in `site.css`. Match the format exactly if adding a section. |
| Blank lines | Two between CSS sections, one between rules | |
| `<script>` placement | jQuery and Bootstrap in `<head>`; `site.js` and `externalscript.js` before `</body>` | Fixed order, identical in all nine files |
| `<link>` order | `bootstrap.css` then `site.css` | Load order is load-bearing; site.css overrides |
| Import ordering | n/a. No module system, no imports. | |
| Markdown | ATX headings, `---` between major sections, tables for anything enumerable, fenced code blocks with a language tag | |
| Line endings | CRLF, from a Windows checkout | Do not fight it |

### Organisation

- **File size norms.** `site.css` is 488 lines and is the largest hand-written file.
  `site.js` is 65 lines. HTML pages are 130 to 175 lines, of which roughly 110 are
  identical boilerplate. Nothing here is close to needing to be split.
- **When logic is split out.** It is not. All live behaviour is in `site.js`, in one
  `$(document).ready()` block, divided by comment headers rather than functions.
  There is one function per event handler and no helper functions at all. For a file
  this size that is correct; do not add an abstraction layer to 65 lines.
- **How modules export.** They do not. There is no module system. `site.js` and
  `externalscript.js` both attach handlers as a side effect of loading, and both
  leak nothing into the global scope beyond that.
- **CSS organisation.** `site.css` is ordered by page region top to bottom: base,
  header, meta bar, hamburgers, left nav, content, aside, footer, overlay, then the
  two media queries last. Media queries are grouped at the end rather than colocated
  with their rules. Follow that; do not introduce colocated media queries.

### Comments

Comment density is low and purposeful. Roughly one comment per ten lines in
`site.css` and one per eight lines in `site.js`, almost all of them structural
signposts rather than explanations.

What earns a comment in this codebase:

- A section boundary in `site.css` (the banner style) or a behaviour group in
  `site.js` (`/* ---- Left nav toggle ---- */`)
- A non-obvious number, always with its derivation: `margin-top: 113px` is annotated
  `/* clear the fixed header */`, and `padding: 10px 60px` is annotated
  `/* horizontal room for the hamburger buttons */`
- A closing tag on a long block: `</div><!-- /.container-fluid -->`
- A note about provenance, as at the top of `site.css`

What does not earn a comment: anything the code already says. There is no
`/* set the colour */` anywhere, and there should not be.

### Error handling, logging, and validation

There is none, and that is a deliberate consequence of the architecture rather than
an omission. Specifically:

- **No `try`/`catch` anywhere.** Nothing can throw: the code reads DOM elements that
  are guaranteed present in the markup and toggles classes on them.
- **No `console.log`, no logging of any kind**, in production or otherwise. Do not
  add any; there is nowhere for it to go and no one reading it.
- **No input validation**, because there is no input. No forms, no query string
  parsing, no URL fragment handling beyond the browser's own.
- **No null checks in `site.js`.** jQuery's collection semantics mean a selector
  matching nothing is a no-op rather than an error, which is why the dead handlers in
  `externalscript.js` cause no console errors despite binding to nothing.

If a future change does introduce something that can fail, the pattern to adopt is a
guard clause that degrades silently rather than an exception. A clan website should
never show a user an error.

### Commit messages and branching

Read from the git history, which has three distinct eras.

**Current convention, established at v0.5 and used consistently since:**

```
v<MAJOR>.<MINOR> - <short imperative description>
```

Examples from the history: `v1.8 - Fix content top spacing for consistency across
pages`, `v1.5 - Support link, remove Flip Chart nav, remove search bar`,
`v1.3 - Merge ipage archive, consolidate assets, clean repository`.

Observed rules:
- The version prefix is two components (`v1.8`), even though PATCHNOTES.md records
  three (`v1.8.0`). Both forms are correct in their own place.
- A commit covering two releases names both: `v1.6-1.7 - Support in aside External
  Links; header spacing fix`.
- Multiple changes in one commit are separated by semicolons or commas.
- The subject line is the whole message. There are no commit bodies anywhere in the
  history.
- **Note:** the historical messages used an em dash after the version. The writing
  style adopted in v2.1.0 replaces it with a single hyphen. Past commits are not
  rewritten; new ones use the hyphen.

**Non-version commits** exist for work that did not warrant a release:
`Resolve Discord invite URL - confirmed permanent link`. Sentence case, imperative,
no prefix.

**Branching.** `master` is the default and the deploy branch. Work is committed
directly to `master`; there is one merge commit in the entire history, from a
`claude/` prefixed branch in 2026-06-06. Eight `patch-N` branches exist on the remote
from the 2017 GitHub web-UI era and are stale. **There is no branching workflow in
practice.** If you introduce one, say so here.

**Cadence.** Releases are frequent and small. Fourteen versions shipped on 2026-06-07
alone. A version number is spent freely; do not batch changes to save one.

---

## Writing Style

The project stated no prose rule before this audit. The following is adopted as the
default and is now the project's rule, applying to documentation, UI copy, and code
comments alike.

### The em dash prohibition

**Em dashes are prohibited in all three forms:**

1. The literal Unicode character U+2014.
2. The `&mdash;` HTML entity.
3. A double hyphen used as punctuation.

The Unicode character and the HTML entity must be searched for independently. A
search for one will not find the other.

CSS custom properties (`--color-bg` and similar) are valid syntax, not punctuation,
and are never touched by this rule. This project currently defines no custom
properties, so the exemption is theoretical here, but it holds if any are added.

### Replacements

Replace each instance with whichever alternative fits:

| Situation | Use | Example |
|---|---|---|
| Most running prose | A comma | "loads fast, and it does not showcase design ambition" |
| Introducing a list or an elaboration after a complete clause | A colon | "Rules for this block: active state is hardcoded" |
| Joining two closely related independent clauses | A semicolon | "It renders correctly; it is still invalid HTML" |
| An aside or supplementary detail | Parentheses | "the drawers (both of them) close" |
| A sentence doing two jobs | A full stop, splitting it in two | |
| A document title, section heading, or version line | A single hyphen | `## v1.2.0 - 2026-01-01` |

**The single hyphen is permitted and encouraged.** The prohibition does not cover it,
and it is the closest visual match to the em dash it replaces, so prefer it in
titles, headings, and version lines where a comma or colon reads awkwardly. In
running prose the other replacements usually read better.

### The exception

Leave any instance the text needs in order to mean anything: a rule that names the
character, a table showing it, an example demonstrating it. Replacing those destroys
the line. This section is itself the main place that exception applies.

### Tone

Direct and functional. Plain declarative sentences. No marketing language, no filler
openings ("In this section we will..."), no restating the heading as the first
sentence. State the fact and move on.

Where something is uncertain, say so in the text. A confident sentence outlives the
session that produced it, and a guess presented as a fact is worse than an
acknowledged gap.

### Verification

```bash
# Unicode em dash, excluding vendored files
grep -rn "—" --include=*.html --include=*.css --include=*.js --include=*.md . \
  | grep -v "bootstrap\|jquery"

# HTML entity, which the search above will not find
grep -rn -- "&mdash;" --include=*.html --include=*.md .

# Double hyphen used as punctuation
grep -rn -- " -- " --include=*.html --include=*.md .
```

All three must return nothing outside vendored files and outside the exception
described above.

---

## Browser Testing

The project stated no rule before this audit. The following is adopted as the default
and is now the project's rule.

**Use Microsoft Edge. Never Chrome.**

The reasoning: there is no JavaScript runtime on the maintenance machine (Node.js is
not installed), so end-to-end testing means driving a headless browser directly.
Chrome is the owner's day-to-day browser and driving it would disturb a live session.
Edge runs the same engine, is already installed on Windows, and is free to use.

This applies to **every browser a test drives**, not only one named in a config file.
An ad hoc headless invocation from a shell command or a script is testing and falls
under the same rule. Practically, on this project that means:

- Manual verification of a page change: open it in Edge.
- Lighthouse or PageSpeed runs: drive Edge.
- Any future screenshot, smoke test, or link check that launches a browser: Edge.

### Resolved binary path

Recorded here because it differs by platform and is the first thing that breaks on a
new machine.

| Platform | Path | Verified |
|---|---|---|
| Windows 11 (this maintenance machine) | `C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe` | Confirmed present, 2026-08-25 |
| Windows, alternative install location | `C:\Program Files\Microsoft\Edge\Application\msedge.exe` | Not present on this machine; check it first on a different one |
| macOS | `/Applications/Microsoft Edge.app/Contents/MacOS/Microsoft Edge` | Not verified; no macOS machine in use |
| Linux | `/usr/bin/microsoft-edge` | Not verified; no Linux machine in use |

Example headless invocation:

```bash
"/c/Program Files (x86)/Microsoft/Edge/Application/msedge.exe" \
  --headless --disable-gpu --screenshot=out.png --window-size=1280,900 \
  "http://localhost:8000/index.html"
```

### Second engines

The site targets no second engine and runs no cross-browser test suite. The
production audience uses whatever they use, and the site is plain HTML with
Bootstrap 3, which is compatible far further back than anything in current use.

The v2.0.0 PRD's success criteria named "Chrome, Firefox, Edge" for manual QA. That
predates this rule and is superseded: **Edge is the browser to drive**. If a genuine
cross-engine problem is ever suspected, Firefox is the second engine to reach for,
because it is the only non-Chromium engine with meaningful share. Say so explicitly
in the patch notes rather than dropping this rule silently.

---

## Security

**Summary:** a fully static, read-only HTML site. It collects no user data, has no
authentication, runs no server-side code, sets no cookies, and stores nothing. The
attack surface is close to the theoretical minimum for a website.

### Authentication model

None. No login, no sessions, no identity of any kind. Every page is public to
everyone. There is nothing to authenticate against and no session to manage.

### Authorization model

Not applicable at the application level: no roles, no restricted pages, no gated
content.

The only meaningful authorization boundary is **GitHub repository write access**.
Anyone with push access to `Azqato/B5TA` can change the live site within about
30 seconds, with no review gate. That is currently one person. Treat repository
access as equivalent to site-defacement access, because it is.

### Data storage

| Data type | Stored? | Where | Protection |
|---|---|---|---|
| User accounts | No | n/a | n/a |
| Visitor personal data | No | n/a | n/a |
| Cookies | No | n/a | n/a |
| localStorage / sessionStorage | No | n/a | n/a |
| Form submissions | No. There are no forms. | n/a | n/a |
| Access logs | Yes, by GitHub | GitHub infrastructure | Not accessible to the site owner and not configurable |

No user data is collected, stored, or transmitted by this site. Note that this
changes the moment analytics are installed (milestone v2.4). If GA4 is chosen it will
set cookies, which will contradict the External FAQ answer below and will likely
require a cookie notice depending on the audience's jurisdiction. Plausible avoids
both problems, which is why it is the recommendation.

### Environment variables

**There are none, and there are no secrets in the repository.**

Verified during this audit: a case-insensitive search for `api key`, `apikey`,
`api_key`, `secret`, `password`, `token`, and `bearer` across all HTML, CSS, and
non-vendored JavaScript returned nothing. Re-run it before any release that adds a
third-party script:

```bash
grep -rniE "api[_-]?key|secret|password|token|bearer" \
  --include=*.html --include=*.css --include=*.js . \
  | grep -v "bootstrap\|jquery"
```

No variable needs to be set in any environment. If one is ever introduced, list its
key name and purpose in the Runbook's environment variable reference, mark it
required or optional, and never commit its value.

### Third-party trust

Every third party in the list under Technical Requirements receives, when a user
clicks through, exactly what any HTTP request carries: IP address, user agent,
referrer, and the requested URL. The site forwards nothing of its own, because it has
nothing to forward.

Two entries deserve specific note:

- **Google Docs.** Three community guides are hosted there. Google will set cookies
  and may associate the visit with a signed-in Google account. This is outside the
  site's control and is disclosed here so the reader knows.
- **GitHub Pages.** The host itself collects standard access logs for every request
  to the site, not only outbound clicks. This is not configurable and not visible to
  the site owner.

Every outbound link uses `target="_blank" rel="noopener"`, which prevents the opened
page from reaching `window.opener`. That is verified present on all of them. It is a
hard requirement, not a preference: adding an external link without `rel="noopener"`
is a defect.

### Known attack surface

| Area | Risk | Mitigation |
|---|---|---|
| Static HTML files | Very low. Read-only, no server execution, no user input reaches any code path. | The architecture is the mitigation |
| GitHub repository access | A contributor with push access can change the live site in seconds with no review | Limit push access to trusted clan members. This is the highest-severity risk in the project. |
| Outbound link rot or hijack | The Discord invite expiring, or an external domain being sold and repointed at hostile content. Users trust links on this site. | Quarterly verification of every outbound link, per the reporting cadence. Nothing automated exists. |
| `b5ta.com` domain control | If the domain lapses and is re-registered by someone else, four in-site links (`b5ta.com/new-member-guide/`) would point at content the clan does not control | Confirm domain ownership and renewal. See discrepancy D1. |
| jQuery 1.12.3 | Known XSS CVEs exist in the jQuery 1.x line, primarily affecting `.html()` and DOM manipulation with untrusted input | This site never passes untrusted input to jQuery. `site.js` only toggles classes on known elements. Practical risk is effectively zero, but the version is unpatched and that fact does not change. |
| Bootstrap 3.3.6 | End of life since 2019, no security patches | No Bootstrap JS component is used by any page. The file could be removed entirely, which would eliminate this row. |
| Two `http://` outbound links | RuneScape clan home and Zazzle. A user on a hostile network could be redirected. | Upgrade both to `https://`. Low severity, trivial fix, nine-file edit. |
| GitHub Pages compromise | Would affect availability and integrity | Outside the owner's control. GitHub Pages has a strong track record. |
| No Content-Security-Policy | GitHub Pages cannot set response headers, and no `<meta http-equiv>` CSP is present | A meta-tag CSP is possible and would be a genuine improvement if a third-party script is ever added. Not worth it while the site loads only its own files. |

### Dependency policy

All dependencies are **vendored**: checked into the repository as files rather than
fetched from a CDN at runtime. That removes CDN-compromise and CDN-outage risk
entirely, at the cost of never receiving upstream fixes automatically.

| File | Version | End of life | Last reviewed |
|---|---|---|---|
| `css/bootstrap.css` and `js/bootstrap.js` | 3.3.6 | Yes, 2019 | 2026-08-25 |
| `js/jquery.min.js` | 1.12.3 | Yes, approximately 2021 | 2026-08-25 |
| `fonts/glyphicons-halflings-regular.*` | Bootstrap 3.3.6 | With Bootstrap | 2026-08-25 |

**Policy:**

- Dependencies are pinned by being vendored. There is no lockfile because there is no
  package manager.
- No automated scanning is configured. Dependabot needs a manifest file and there is
  none.
- Both dependencies are end-of-life. Both are accepted as-is, on the reasoning that
  neither processes untrusted input on this site. That reasoning must be re-examined
  the moment any page accepts input, embeds third-party content, or renders anything
  derived from a URL.
- Review cadence: annually, or immediately on adding any new dependency.
- **Adding a new dependency requires vendoring it.** Do not add a CDN `<script>` tag.
  That would introduce a third-party runtime trust relationship the site currently
  does not have, and it would break the "loads only its own files" property that
  makes the CSP row above a non-issue.
- If the project ever gains a `package.json`, enable Dependabot the same day.

---

## Deprecation and Removal

The project stated no removal rule before this audit, though the handling of
`flip-chart.html` in v1.5.0 (removed from navigation, page retained and still
deployed) is consistent with the policy adopted below. That precedent is the reason
the policy takes the form it does.

### The rule

Whether a removal needs a redirect is decided by **whether the thing being removed is
public facing**, not by the fact that it is being removed.

- **Public facing:** the deployed artifact and the addresses it serves. On this
  project that means a URL that GitHub Pages resolves. Removing one retires the
  address behind a redirect, alias, or equivalent compatibility shim pointing at
  whatever replaces it, so the old address keeps resolving.
- **Internal:** the source that builds the artifact, and anything else not reachable
  from outside. Removing one is a plain delete. No redirect, no alias, no stub file,
  no tombstone. Nothing external points at it, so there is no address to preserve,
  and a permanent compatibility entry would be maintenance in exchange for nothing.

### Where this project's deploy boundary sits

This is the part a reader cannot apply the rule without, because the boundary is
unusual here: **there is no build step, so the source files are the deployed
artifact.** An HTML file in this repository is public facing in a way that a source
file in a compiled project is not.

The boundary is therefore drawn by **what GitHub Pages will serve at a URL someone
could have linked to**, not by file type:

| Side | What is on it |
|---|---|
| **Public facing** | The nine `.html` files, `css/site.css`, `css/bootstrap.css`, all four `js/*.js` files, every file in `img/` and `fonts/`, `.nojekyll`, `LICENSE`, `README.md` |
| **Internal** | The three files in `docs/`, `MVP.docx`, `Screenshot.JPG`, and anything in `.git/` |

The `docs/` files sit on the internal side even though GitHub Pages will technically
serve `azqato.github.io/B5TA/docs/PRD.md` as a raw file. They are development
documentation, nothing on the site links to them, they are read on GitHub rather than
on the deployed site, and treating them as public would mean never being able to
reorganise documentation. **This is a judgement call and it is the one most likely to
be disputed;** it is logged as open question Q3.

`MVP.docx` and `Screenshot.JPG` are likewise servable but are historical references
that nothing links to.

### The redirect mechanism

**This project has no redirect mechanism.** GitHub Pages serving a static repository
cannot issue a 301 or a rewrite rule: there is no server config, no `_redirects`
file support, and no `.htaccess`.

What it does instead, and what any future public-facing removal must do:

1. **Keep the file at its old address** and replace its content with a short page
   explaining where the content moved, linking to the new location. This is a
   compatibility shim in the only form available.
2. Optionally add `<meta http-equiv="refresh" content="0; url=new-page.html">` in the
   `<head>` for an automatic redirect, with the visible link retained as a fallback
   for anyone with meta-refresh disabled.
3. Record the retirement in the Retired Items table below and in PATCHNOTES.md.

This is worse than a real 301: search engines treat meta refresh less cleanly, and
the shim page is a file someone has to maintain. It is what the platform allows. If
the project ever moves to a host that supports redirect rules, replace the shims and
say so here.

### Public surface, item by item

Specific enough to answer the question for any given file. This is the list either
policy is applied against.

**Pages (nine URLs, all resolvable today):**

| URL | Linked from |
|---|---|
| `/index.html` and `/` | Nav, aside, footer, logo, on all nine pages |
| `/about.html` | Nav, aside, footer, on all nine pages; homepage body |
| `/discord.html` | Nav, aside, footer, on all nine pages; homepage body; about page; two guide pages |
| `/guides.html` | Nav, aside, footer, on all nine pages; four back-links from guide sub-pages |
| `/guides-bossing.html` | Guides sub-menu on all nine pages; guides index |
| `/guides-money-making.html` | Guides sub-menu on all nine pages; guides index |
| `/guides-quests.html` | Guides sub-menu on all nine pages; guides index |
| `/guides-skilling.html` | Guides sub-menu on all nine pages; guides index |
| `/flip-chart.html` | **One link only**, from `guides-money-making.html`. Not in the nav or the aside since v1.5.0. |

**Assets (every one is a public URL):**

- `/css/site.css`, `/css/bootstrap.css`
- `/js/site.js`, `/js/bootstrap.js`, `/js/jquery.min.js`, `/js/externalscript.js`
- `/img/0jK9PZV.png`, `/img/favicon.png`, `/img/clan.png`, `/img/wfbCHon.gif`, plus
  36 unreferenced files that are nonetheless served if requested
- `/fonts/glyphicons-halflings-regular.{eot,svg,ttf,woff,woff2}`
- `/.nojekyll`, `/LICENSE`, `/README.md`

**Applying the rule to the two most likely future removals:**

- *Deleting `js/externalscript.js` and `js/bootstrap.js`.* Both are public URLs, but
  the only thing pointing at them is this site's own nine `<script>` tags, which are
  removed in the same change. Nothing external links a `.js` file. **Plain delete.**
  Recorded here so the question is settled in advance.
- *Deleting `flip-chart.html`.* It is a public URL that has existed since v1.1.0 and
  a member may have bookmarked it. **Shim, do not delete:** replace its content with
  a pointer to `guides-money-making.html`.

### Compatibility entries

Where the project has them (it currently has none):

- They are **permanent**. A shim is never removed on the grounds that "enough time
  has passed", because there is no way to know that no one still holds the link.
- They are **never chained**. A shim always points at a real, live target in one hop.
  If a shim's target is itself later retired, update the first shim to point at the
  final destination rather than pointing it at the second shim.
- They are **never reused**. An address that once served one thing is never
  repurposed to serve different content later. A reused address silently serves the
  wrong thing to whoever held the old link, which is worse than a broken link,
  because a broken link tells the user something is wrong and a wrong page does not.

### Retired items

A reader who finds a reference to something that no longer exists should be able to
resolve it here.

| Item | Removed in | Date | Replaced by |
|---|---|---|---|
| `index.php`, `about.php`, `discord.php`, `guides.php`, and all guide `.php` files | v1.0.0 | 2026-06-07 | The nine `.html` equivalents |
| `includes/header.php`, `includes/footer.php` | v1.0.0 | 2026-06-07 | Markup inlined into each HTML file |
| PHP `$activePage` variable | v1.0.0 | 2026-06-07 | Hardcoded `current-menu-item current_page_item` classes |
| `ipage/` directory (~120 files, the WordPress archive) | v1.3.0 | 2026-06-07 | Nothing. Its content was migrated into the static pages first. `wfbCHon.gif` was moved to `img/` before deletion. |
| `bootstrap-theme.css`, `bootstrap.min.css`, `dropdownhover.css`, `dropdownmenu.css`, `externalstyle.css` and their map files | v1.3.0 | 2026-06-07 | Nothing. Unreferenced by any page. |
| `bootstrap.min.js`, `jquery.js`, `npm.js`, `destroyvid.js` | v1.3.0 | 2026-06-07 | Nothing. Unreferenced by any page. |
| `Logos/` and `images/` directories | v1.4.0 | 2026-06-07 | `img/`, with all HTML references updated |
| Search bar (`.meta.clearfix` block) | v1.5.0 | 2026-06-07 | Nothing. It was non-functional. The `.meta` and `.meta-search-form` CSS rules were left behind and are still present. |
| Flip Chart from the nav and the aside Pages widget | v1.5.0 | 2026-06-07 | The page itself was retained at its URL and is still linked from `guides-money-making.html`. This is the precedent the policy above formalises. |
| Runeclan links | v1.1.0 | 2026-06-07 | RunePixels (`runepixels.com/clans/b5ta/about`) |
| `discordapp.com` download URL | v0.5.0 | 2026-06-07 | `discord.com/download` |
| Root `PRD.md`, `TRD.md`, `Design.md`, `PatchNotes.md` | v2.0.0 | 2026-06-08 | `docs/PRD.md`, `docs/TRD.md`, `docs/DESIGN.md`, `docs/PATCHNOTES.md` |
| `docs/TRD.md` | v2.1.0 | 2026-08-25 | The Technical Requirements section of this document |
| `docs/RUNBOOK.md` | v2.1.0 | 2026-08-25 | The Runbook section of this document |
| `docs/SECURITY.md` | v2.1.0 | 2026-08-25 | The Security section of this document |
| `docs/METRICS.md` | v2.1.0 | 2026-08-25 | The Metrics section of this document |
| `docs/ROADMAP.md` | v2.1.0 | 2026-08-25 | The Roadmap section of this document |
| `docs/TENETS.md` | v2.1.0 | 2026-08-25 | The Tenets section of this document |
| `docs/PRFAQ.md` | v2.1.0 | 2026-08-25 | The Press Release and Frequently Asked Questions sections of this document |

### Historical records are not rewritten

PATCHNOTES.md entries and version history rows describing a deleted item stay exactly
as they are. They record what happened at the time; they do not describe the current
state. The v1.5.0 entry still says the search bar was removed, and the v2.0.0 entry
still lists `docs/TRD.md` as created, even though this release deletes it. Both are
correct records of their own moment. Do not edit them to match the present.

---

## Documentation Versus Reality

Every discrepancy found between the documentation and the code during this audit,
with the source trusted and why. **Resolved entries stay in this table** with a note
on how they were resolved, so the record shows what was found and what was decided
rather than only the current state.

Treat the code as the truth about what is, and the documentation as the truth about
what was intended. Where the intent is right and the code is wrong, the code is the
thing to fix, not the document.

| ID | Discrepancy | Documentation said | Code shows | Trusted | Resolution |
|---|---|---|---|---|---|
| **D1** | Live site address | README v2.0.0, PRD, ROADMAP, RUNBOOK, and PRFAQ all state the site is live at `b5ta.com` and that a CNAME DNS record points there | No `CNAME` file exists anywhere in the repository. GitHub Pages writes one when a custom domain is configured. Separately, `guides.html` and three guide pages link to `https://b5ta.com/new-member-guide/`, a WordPress-style path this repository does not serve. | **Code.** The author confirmed the code was right. | **Resolved 2026-08-25.** The author confirmed the domain does not currently point at this repository and that the cutover is planned for later. The v2.0.0 documents were describing an intention as if it were a fact. All references now state `azqato.github.io/B5TA/` as the live address and `b5ta.com` as planned, and the cutover is Roadmap milestone v2.6 with the four broken-link dependency written out. Q1 answered; Q8 remains open and is now a blocking dependency of v2.6. |
| **D2** | `js/externalscript.js` | TRD v2.0.0 called it a "Placeholder; no active behaviors" in two places | It contains four `$(document).ready()` blocks binding click handlers to `.tutorials-div`, `.review-div`, `.impression-div`, and `#Top`. None of those selectors exist in any HTML file. | **Code.** A placeholder implies nothing is there. | **Resolved.** Now documented as dead code from a previous site, retained but non-functional, and listed in technical debt with "delete the file and the nine script tags" as the fix. |
| **D3** | Page weight | TRD and METRICS v2.0.0 both set a target of under 500 KB total and stated the site is "small enough that raw file sizes are acceptable" | Homepage is approximately 1.4 MB and the Discord page approximately 2.9 MB, on disk. `img/0jK9PZV.png` alone is 891 KB and renders at 60px tall. `img/favicon.png` is 144 KB. `img/wfbCHon.gif` is 1.5 MB. | **Code**, for the measurement. **Documentation**, for the target. | **Resolved.** The 500 KB target is retained as a target; the measured figures are recorded beside it and marked as failing. Milestone v2.2 exists to close the gap. |
| **D4** | Local server instructions | README and RUNBOOK v2.0.0 offered `npx serve` as an equal alternative to Python | `node` is not on PATH on the maintenance machine. Python 3.14.3 is present. | **Code**, meaning the machine. | **Resolved.** Python is now the primary documented method with the port stated; the Node option is marked conditional on Node being installed. A `npx: command not found` row was added to Common Errors. |
| **D5** | Link contrast ratio | DESIGN v2.0.0 gave `#2487d7` on `#ffffff` as 3.87:1 | Recomputation with the WCAG relative luminance formula gives approximately 3.80:1 | **Code**, meaning the recomputation | **Resolved.** Corrected to ~3.8:1 with a note that the earlier figure should not be quoted as exact. The original conclusion, that it fails AA for normal text, was correct and stands. |
| **D6** | Keyboard navigation | DESIGN v2.0.0 recorded keyboard navigation as "Not tested" | Both hamburger toggles are `<div>` elements with no `tabindex` and no `role`, bound to `click` only. They are unreachable by keyboard, which is a confirmed failure rather than an untested state. | **Code** | **Resolved.** Changed from "not tested" to a confirmed failure and promoted to the top accessibility priority in DESIGN.md and milestone v2.3. |
| **D7** | Accessibility colour coverage | DESIGN v2.0.0 measured contrast for two colours | Three further colours fail: `#aaa` header tagline at 2.3:1, `#999` entry meta at 2.9:1, `#bbb` aside icons at 1.9:1 against a 3:1 non-text requirement | **Code** | **Resolved.** Full contrast table added to DESIGN.md covering nine foreground/background pairs. |
| **D8** | Current roadmap phase | ROADMAP v2.0.0 headed the current phase "v1.x - Production" | The same release shipped as v2.0.0, and PATCHNOTES and PRD both carried 2.0.0 | **Documentation**, internally inconsistent with itself | **Resolved.** Phase renamed "v2.x - Documented and maintained". Nothing about the project's state changed. |
| **D9** | Browser QA targets | PRD v2.0.0 success criteria named "Chrome, Firefox, Edge" for manual QA. METRICS named "Chrome DevTools / Lighthouse CLI" for performance. | No test harness exists in the repository at all, so neither statement was ever enforced | **Documentation** for the intent, superseded by policy | **Resolved.** The Browser Testing policy adopted in this release makes Edge the browser to drive. Both references updated. The change is stated explicitly rather than made silently. |
| **D10** | Tablet breakpoint | DESIGN v2.0.0 described 768px to 1199px as a distinct layout state | The `@media (min-width: 768px) and (max-width: 1199px)` block re-states `width: 250px; left: -265px`, which are already the base values. It changes nothing. | **Code** | **Resolved.** DESIGN.md now states the query is a no-op and lists deleting it under technical debt. |
| **D11** | Breakpoint duplication | Not documented anywhere | 1200px appears in `site.css` (one media query) and in `js/site.js` (two `$(window).width()` comparisons) with no shared constant | **Code** | **Resolved.** Documented in DESIGN.md, in the Runbook's Common Errors, and in technical debt. |
| **D12** | Nav divider markup | Not documented anywhere | `.menu-section-divider` is a `<div>` placed as a direct child of a `<ul>` in all nine files, which is invalid HTML | **Code** | **Resolved.** Recorded in DESIGN.md as a known markup defect and in technical debt with the correct fix, deliberately not changed. |
| **D13** | Bootstrap JavaScript usage | TRD v2.0.0 listed `js/bootstrap.js` as providing "Dropdown and component plugins" | No page uses any Bootstrap JS component. The Guides dropdown is implemented entirely by `site.js` and CSS. The 71 KB file does nothing. | **Code** | **Resolved.** Documented as loaded but unused, with removal listed as a medium-priority, zero-risk 71 KB win. |
| **D14** | Glyphicons | TRD listed the icon font under the tech stack without qualification; DESIGN noted it was "not actively used" | No page contains a `glyphicon` class. The 224 KB of font files is referenced only by `bootstrap.css` and is downloaded only if such a class appears. | **Code**, and DESIGN was already right | **Resolved.** Both documents now state it plainly. |
| **D15** | `img/` contents | TRD v2.0.0 said "~40 files" and named four of them | Exactly 40 files, ~9.1 MB, of which exactly four are referenced by any HTML or CSS. The other 36 are unreferenced. | **Code** | **Resolved.** DESIGN.md now gives the full accounting and states the 36 are retained deliberately as an archive rather than by oversight. |
| **D16** | Flip Chart status | PRD v2.0.0 listed "Flip Chart page linking to community Flipping Guide" as a shipped MVP feature, and v1.5.0 recorded it removed from the nav | Both are true and the combination is confusing: the page is deployed and reachable, but only from a single link inside `guides-money-making.html`. A reader could conclude either that it does not exist or that it is in the nav. | **Code**, for the state. **Documentation**, for the intent to keep it. | **Resolved.** Stated explicitly in the feature list, the folder structure, and the public surface list, each noting it is deployed but absent from the nav since v1.5.0. It is also the precedent for the removal policy. |

### Documented features that do not exist in the code

- The Join page and the User EXP Tracker, both listed in `MVP.docx` as pages of the
  original site. Neither has ever been built in this repository. They appear in the
  Future feature list and the roadmap, correctly labelled as unbuilt.
- A functional search bar. Documented as removed in v1.5.0; the CSS remains.

### Implemented features that appeared in no documentation

- The overlay's outside-click dismissal behaviour, and the rule that opening one
  drawer closes the other. Both are now in the internal data flow description.
- The `z-index` layering scheme. Now in DESIGN.md.
- The `.alignright` / `.pull-right` float pair, and the global
  `img { max-width: 100% }` responsive rule. Now in DESIGN.md.
- The mixed British and American spelling in page copy. Now in DESIGN.md.

### Contradictions between two documents

- ROADMAP said "v1.x" while PRD, TRD, DESIGN, and PATCHNOTES all said "2.0.0". See
  D8. Consolidating into one document removes the class of problem entirely, which is
  a significant part of why this audit consolidated.
- README described itself as a "developer reference" and duplicated the RUNBOOK's
  setup instructions in an abbreviated form, so the two could drift apart. Resolved
  by making README a general-reader document with no commands in it.

---

## Risks and Open Questions

The edges of this analysis, stated honestly. This section is worth more than the
confident parts of the document.

### What was not fully understood

- **Whether `b5ta.com` currently serves this repository, the old WordPress site, or
  nothing.** This cannot be determined from the repository. There is no CNAME file,
  and four in-site links point at a `b5ta.com` WordPress path. This is the single
  largest unknown in the audit and several statements elsewhere are conditional on
  it.
- **Whether the Discord invite is still valid.** It was confirmed permanent in a
  commit on 2026-06-07. Verifying it requires opening it, which was not done.
- **What the 36 unreferenced images were for.** Their filenames suggest historical
  banners, logos, and gameplay screenshots, and several have `_OLD` suffixes
  indicating superseded versions. The inference that they are a deliberate archive
  rests on v1.4.0's commit message ("Consolidate all images into img/"), not on any
  statement of intent. It may be wrong.
- **Whether the eight stale `patch-N` remote branches contain anything.** They date
  from the 2017 GitHub web-UI era. Their contents were not inspected.
- **`MVP.docx` and `Screenshot.JPG`** were read for content but their exact
  provenance and their intended ongoing role are not documented anywhere.

### Fragile areas

- **There are no tests of any kind.** No unit tests, no integration tests, no linting,
  no CI. Every verification in this project is a human opening a page and looking at
  it. This is the single biggest structural fragility, and it is a consequence of
  having no build step rather than an oversight.
- **The nine-file duplication is the main source of realistic bugs.** A nav change
  applied to eight files produces a site that is subtly inconsistent and that nothing
  will flag. Every nav-related version in the history (v1.1.0, v1.5.0, v1.6.0)
  carried this risk.
- **The 1200px breakpoint lives in two files.** Changing one without the other
  produces a state where the drawers are visible but the JavaScript still intercepts
  clicks, or the reverse.
- **`site.js` assumes its elements exist.** It caches `#primaryMenu`, `#siteAside`,
  and `#siteOverlay` at load with no guard. jQuery makes a missing element a silent
  no-op rather than an error, which means a typo in an ID would produce a page where
  the menu simply does not open, with nothing in the console.
- **No `TODO`, `FIXME`, `HACK`, or `XXX` marker exists anywhere in the codebase.**
  Verified. That is unusual and it means known problems are recorded only here, so
  this document going stale is itself a risk.
- **Heavy coupling to Bootstrap 3's defaults.** `site.css` never sets a base font
  size, never resets box-sizing, and relies on Bootstrap's typography scale for h2
  and h3. Removing or upgrading Bootstrap would change type sizes and spacing across
  every page in ways that are not obvious from reading `site.css`.

### Dangerous to change without more context

| Change | What would break |
|---|---|
| Removing or upgrading `css/bootstrap.css` | Base font size, heading scale, `line-height`, box model, `.container-fluid`, `.clearfix`, `.pull-right`. `site.css` depends on all of them without restating any. |
| Reordering the two stylesheet `<link>` tags | `site.css` overrides Bootstrap and must load second. Reversing them reverts the entire layout. |
| Moving `jquery.min.js` after `bootstrap.js` or `site.js` | Both would throw immediately on load |
| Changing the 1200px breakpoint in one file only | Drawer behaviour and layout desynchronise |
| Renaming any of `#primaryMenu`, `#siteAside`, `#siteOverlay`, `#navMenuButton`, `#asideMenuButton`, `#scrollTop` | Silent breakage. `site.js` matches nothing and no error is raised. |
| Renaming `.current_page_item` or `.current-menu-item` | Active states disappear on all nine pages. Both class names are used together and both are styled. |
| Deleting `.nojekyll` | Jekyll would process the repository and may fail to serve `fonts/` correctly |
| Editing the About page conduct quotation | It is a direct quotation attributed to a person. Changing it misattributes words. |
| Renaming an image in `img/` | Nine files reference the logo and the favicon. Renaming means finding all of them. |

### Work in progress

- **Working tree:** clean. `git status` reports nothing uncommitted as of the start
  of this audit.
- **Unmerged branches:** eight stale `patch-N` branches and one
  `claude/b5ta-readme-updates-VcsoG` branch on the remote, all from earlier eras.
  None appear to be active work.
- **Half-finished features:** `flip-chart.html` is an explicit placeholder. Its own
  copy says the tracker is under construction. It is the only one.
- **Stubbed functions:** none. `js/externalscript.js` is not stubbed; it is complete
  code for a page that no longer exists.

### Open questions for the author

Numbered so they can be answered by reference. When one is answered, fold the answer
into the relevant section and mark it answered here rather than deleting it.

**Q1. Where does `b5ta.com` point?** Does it serve this repository, the old WordPress
site, or nothing? If it should serve this repository, the custom domain needs setting
in GitHub Pages (which will create a CNAME file) and the DNS record needs verifying.
If it still serves WordPress, then the four in-site links to
`b5ta.com/new-member-guide/` are correct and this repository is a second site rather
than a replacement, which changes the framing of the entire Problem Statement.

*Status: **answered 2026-08-25** by the author. The domain does not currently serve
this repository. The intent is to point `b5ta.com` at this site later; it is not yet
scheduled. Folded into the Roadmap as milestone v2.6, into Assumptions, into the
Runbook's Environment Configs and first-time-setup notes, and into the README. This
resolves the "which of the three" half of D1. It does not resolve what `b5ta.com`
serves in the meantime, which still matters only for Q8.*

**Q2. Is the Discord invite `discord.gg/0qfZioFZLSnmWMs7` still live?** It is the
site's primary call to action and appears on the Discord page. A commit in June 2026
confirmed it as permanent. Please re-verify.
*Status: open.*

**Q3. Should `docs/*.md` be treated as public surface?** GitHub Pages will serve them
at a URL. This audit classified them as internal, on the grounds that nothing links
to them and they are read on GitHub. That judgement determines whether future
documentation reorganisation requires shim files. If you disagree, the Deprecation
and Removal section needs revising and this release should have left stub files for
the seven deleted documents.
*Status: open. This is the judgement in this audit most likely to be wrong.*

**Q4. Are the 36 unreferenced images in `img/` a deliberate archive or leftovers?**
They cost ~9 MB of repository size and nothing at runtime. If they are leftovers,
deleting them is a one-line change. If they are an archive, they should stay and this
document is correct as written.
*Status: open.*

**Q5. Can `js/bootstrap.js` and `js/externalscript.js` be removed?** Neither does
anything on any page. Removing both saves 72 KB per page load and eliminates the
Bootstrap 3 dependency from the security surface. The only risk is a Bootstrap JS
behaviour somewhere that this audit did not spot. Confirm and it becomes the cheapest
improvement available.
*Status: open.*

**Q6. Does accessibility outrank design fidelity?** Fixing the link contrast means
changing `#2487d7` to `#1a5fa0`, which visibly changes every link on the site and
conflicts with the Loyal To The Original Design tenet. Tenet ordering says
accessibility wins, but the tenets were written before this specific tradeoff was
identified. Please confirm before v2.3 proceeds.
*Status: open.*

**Q7. Does the clan still play League of Legends, Summoners War, and Minecraft?** The
homepage advertises all three with specific activities (Clash Teams, Tartarus'
Labyrinth, Factions). That copy comes from `MVP.docx`, dated 2020. If those sections
are stale, the homepage is making promises the clan no longer keeps, which is a
content risk rather than a technical one and is invisible to any code-level audit.
*Status: open.*

**Q8. Is `b5ta.com/new-member-guide/` reachable?** Four pages link to it as the
recommended starting point for new members. If Q1 resolves to "the domain now serves
this repository", this link is broken on four pages and there is no replacement,
because the New Member Guide has never been built here.

*Status: **still open, and now time-boxed.** Q1's answer confirms the domain will be
pointed at this repository at some future date. That makes this question a blocking
dependency of the v2.6 cutover rather than an open curiosity: on the day the domain
moves, these four links break unless the guide is built here first or the links are
repointed. The three options are written out under v2.6 in the Roadmap. What is still
unknown is whether the link resolves today, which determines whether the four pages
are currently serving a working link or an already-broken one.*

---

## Working Practice

Concrete instructions for future work in this project, human or model. Not
principles.

### Before editing anything

1. **Run `git status`.** The working tree should be clean. If it is not, understand
   why before adding to it.
2. **Read the relevant document first**, using the table below. This document,
   DESIGN.md, and PATCHNOTES.md are the only three, and the right one is usually
   obvious.
3. **Read the file you are about to change, in full.** These files are 65 to 175
   lines. There is no excuse for inferring their contents.
4. **Determine whether the change is a one-file change or a nine-file change.**
   Anything outside `.entryContent` is a nine-file change. Getting this wrong is the
   most common defect in this project's history.

### Where to look first

| Kind of work | Open first | Then |
|---|---|---|
| Changing page copy | The single `.html` file, inside `.entryContent` | DESIGN.md for the writing style rules |
| Adding or removing a nav item | All nine `.html` files | DESIGN.md, Left Navigation component pattern |
| Changing a colour, size, or spacing value | DESIGN.md to find the token and every place it is used | `css/site.css` |
| Changing layout or responsive behaviour | DESIGN.md, Breakpoints | `css/site.css`, then `js/site.js` for the 1200px checks |
| Changing interactive behaviour | `js/site.js` | This document, Technical Requirements, API design |
| Adding an external link | This document, Third-Party Integrations and Security | The nine `.html` files if it goes in the nav or aside |
| Adding or replacing an image | DESIGN.md, Imagery and Media | `img/`, and check the size before committing |
| Anything about deployment | This document, Runbook | |
| Anything about what to build next | This document, Roadmap, then Tenets | |
| Understanding why something is the way it is | This document, Tenets and Documentation Versus Reality | PATCHNOTES.md for when it changed |
| Removing a file or a page | This document, Deprecation and Removal | |
| Answering "is this a bug or intentional?" | This document, Documentation Versus Reality, then Known Technical Debt | |

### Never do these

Each has its reason attached, because a rule without a reason does not survive
meeting someone who thinks they have an exception.

- **Never edit `css/bootstrap.css`, `js/bootstrap.js`, or `js/jquery.min.js.`** They
  are vendored third-party files. An edit is invisible to anyone reading the version
  number and is lost the moment anyone replaces the file. Override in `site.css`
  instead, which loads second and is designed for exactly this.
- **Never apply a nav, header, aside, or footer change to fewer than nine files.**
  Nothing enforces it and nothing will warn you. The result is a site that behaves
  differently depending on which page the user landed on, which is very hard to
  notice and very confusing to a visitor.
- **Never change the 1200px breakpoint in only one file.** It exists in `site.css`
  and twice in `site.js`. Half a change produces drawers that are visible but whose
  clicks are still intercepted.
- **Never add a CDN `<script>` or `<link>` tag.** Every dependency in this project is
  vendored, which is why there is no CDN outage risk, no third-party runtime trust,
  and no Content-Security-Policy problem. One CDN tag gives all three of those back.
- **Never add a build step, bundler, preprocessor, or static site generator without
  an explicit decision recorded in the Roadmap.** Tenet 5 rejects it by default. The
  cost is not the tool; it is that every future contributor must then install and
  understand it before changing a paragraph of text.
- **Never use an em dash**, in any of its three forms, in a document, in page copy,
  or in a code comment. See Writing Style for the replacements and the verification
  commands.
- **Never drive Chrome for testing.** See Browser Testing. Use Edge.
- **Never rewrite a historical PATCHNOTES entry.** It records what happened at the
  time. Add a new entry instead.
- **Never delete a public-facing URL without a shim.** See Deprecation and Removal
  for what counts as public facing on this project and what a shim looks like when
  the platform has no redirect mechanism.
- **Never commit an image without checking its file size.** The site already carries
  an 891 KB logo rendered at 60px tall. Do not make it worse.
- **Never add `console.log` or any logging.** There is no log destination and no one
  reading it. It will be shipped to every visitor's console.

### How to verify a change

**Every change, without exception:**

```bash
python -m http.server 8000
```

Then open `http://localhost:8000` in **Microsoft Edge** and check the affected pages.

**For a copy change:** view the page. Confirm the text renders and that no tag was
broken. Confirm no em dash was introduced:

```bash
grep -n "—" *.html && echo "FAIL" || echo "clean"
```

**For a nav, header, aside, or footer change:** confirm all nine files carry it.

```bash
grep -c "the-new-string" *.html    # nine files, all reporting 1 or more
grep -l "the-old-string" *.html    # should return nothing
```

Then open at least three pages, including the homepage (which has no `.entryHeader`)
and one guide sub-page (which sets the Guides item active).

**For a CSS or layout change:** check three viewport widths in Edge's device toolbar:
375px, 768px, and 1280px. Below 1200px both drawers must open from their hamburgers,
the overlay must appear, and clicking outside must close them. At 1280px both
sidebars must be permanently visible, the hamburgers hidden, and no overlay present.

**For a JavaScript change:** additionally confirm the Guides sub-menu expands on tap
below 1200px and navigates on click above it, and that the scroll-to-top button
appears past 300px and returns the page to the top.

**For an image change:** check the file size before committing, and confirm the
rendered dimensions in DevTools match roughly what the file provides.

### What to update afterwards

1. **PATCHNOTES.md.** Add an entry at the top with the next version number, today's
   date in `YYYY-MM-DD`, and the change under Added, Changed, Fixed, or Removed, in
   past tense. Every change gets an entry; the project spends version numbers
   freely.
2. **DESIGN.md**, if a colour, size, spacing value, breakpoint, component pattern, or
   motion timing changed.
3. **This document**, if a dependency, integration, technical debt item, constraint,
   public surface item, or retired item changed.
4. **This document's Documentation Versus Reality table**, if a discrepancy was
   resolved. Update the resolution column; do not delete the row.
5. **This document's Risks and Open Questions**, if an open question was answered.
   Fold the answer into the relevant section and mark the question answered.
6. **Commit** with the convention read from the history:
   `v<MAJOR>.<MINOR> - <short description>`.

---

## Press Release

*Written as if the product has just launched publicly. The customer quote is
fictional. Intended for a general audience.*

### Headline

**Clan B5TA launches a rebuilt website that gets RuneScape players from "what is this
clan?" to "I'm in the Discord" in under a minute.**

### Subheadline

The new site is fast, free, works on a phone, and needs no account, and it carries
the community's own guides to bossing, money making, questing, and skilling.

### Dateline

**Toronto, 30 September 2026.**

### Opening

Clan B5TA, a RuneScape community founded on 30 September 2014, today launched its
rebuilt official website. The site gives current members, prospective recruits, and
any RuneScape player who stumbles across it a single place to learn what the clan is,
read its rules, reach its Discord, and find guides written by members. It launches on
the clan's twelfth anniversary and replaces an ageing WordPress installation that had
gone unmaintained. There is no login, no download, and nothing to install: it is a
web page, and it opens.

### The problem

Finding a clan in RuneScape is harder than it should be. Someone hears a clan name in
a chat channel, or sees a friend wearing the cape, and then has nowhere to go.
Everything a clan actually is (its culture, its rules, whether it is still active,
whether the people in it are pleasant to play with) lives inside a Discord server
they cannot see until they have already joined it. Asking a stranger in-game "what is
your clan like?" is an awkward first move, and most people do not make it. Clans lose
recruits who never introduced themselves, and players stay solo in a game that is
better with other people.

### The solution

The B5TA website answers those questions before anyone has to ask them. The homepage
says what the clan plays and how it behaves. The About page carries the clan's rules
in full, in the founder's own words, along with what it takes to get promoted and
what it takes to get removed. The Discord page is two steps: get Discord, click the
invite. And the Guides section collects what members have worked out over a decade of
playing, covering bosses, making money, quests, and levelling skills, so the site is
worth reading whether or not anyone ever joins.

It loads fast because there is almost nothing to it. There are no accounts, no
tracking, no cookies, and no adverts. It works the same on a phone as on a desktop.

### Customer quote

"I'd seen the B5TA cape around for years and never asked about it, because I didn't
want to be the person who starts a conversation with a question," said Marcus Delaney,
a returning RuneScape player from Leeds. "I found the site, read the rules page,
worked out in about a minute that these were people I'd actually want to play with,
and clicked the Discord link. Someone said hello within thirty seconds. I've been
capping at the citadel every week since."

### Call to action

Visit **azqato.github.io/B5TA** to read about the clan, then use the Discord page to
join. It takes two clicks and costs nothing.

### About Clan B5TA

Clan B5TA is a RuneScape community founded on 30 September 2014 by the player zoop.
It is a social, skilling, flipping, and bossing clan built around two rules: be
respectful of each other, and follow RuneScape's terms of service. Members also play
League of Legends, Summoners War, and Minecraft together. The clan is free to join,
runs no application process, and welcomes players at every level of experience.

---

## Frequently Asked Questions

### External FAQ

Questions a real visitor would ask.

**1. What is Clan B5TA?**
A RuneScape clan founded on 30 September 2014 by a player called zoop. It is a
social, skilling, flipping, and bossing community. Members also play League of
Legends, Summoners War, and Minecraft together.

**2. Who is this website for?**
Anyone deciding whether to join, anyone already in the clan who wants a link or a
guide, and any RuneScape player who finds the guides useful and never joins at all.
All three are welcome and the site does not treat them differently.

**3. How do I join?**
Two steps. Open the Discord page, download Discord if you do not have it, then click
the clan invite link. There is no application form, no waiting list, and no interview.

**4. What does it cost?**
Nothing. The clan is free to join and the website is free to use. There is an
optional merchandise store on Zazzle selling branded items; buying anything is never
required and is unrelated to membership.

**5. Do I need an account to use the site?**
No. There is no login, no registration, and no cookie banner, because the site sets
no cookies.

**6. What data does the site collect about me?**
None. The site has no forms, no analytics, no tracking scripts, and no cookies. It
stores nothing in your browser. The web host, GitHub, records standard server access
logs for any website request, which the clan cannot see or configure. If you click an
external link (Discord, Google Docs, Zazzle, RunePixels), that site sees you as a
normal visitor and applies its own policies.

**7. Is this for Old School RuneScape or RuneScape 3?**
RuneScape 3. OSRS players are welcome in the community, but the guides and the clan's
in-game activity reflect RS3.

**8. How do I use the site, step by step?**
Open the homepage to see what the clan is about. Read the About page for the rules
and the promotion path. Open the Guides page and pick a category, or follow one of
the longer community guides linked there. When you want in, open the Discord page and
use the invite. Every page carries the same navigation, so you can get to any of
those from anywhere.

**9. What are the clan's rules?**
Two: be respectful of each other, and follow RuneScape's terms of service. In
practice that means anything violating RuneScape's code of conduct results in
removal, including threatening behaviour, harassment, botting, luring, and scamming.
The full statement is on the About page, quoted from the founder.

**10. Can I be removed for not playing?**
Yes, but only under a specific condition: members under 1,500 total level who go
inactive for more than six months may be removed. Above that total level, inactivity
is not grounds for removal.

**11. How do I get promoted?**
Be active, cap at the Clan Citadel weekly, and invite other qualified members into
the clan. That is the stated path on the About page.

**12. How current are the guides?**
They reflect what members knew when they wrote them. RuneScape updates frequently, so
cross-reference anything time-sensitive against the RuneScape wiki. The clan Discord
is the fastest place to check whether a method still works.

**13. What is the Flip Chart page?**
A placeholder. A Grand Exchange flipping tracker is planned but not built. The page
currently points at the community Flipping Guide instead. It is not in the site
navigation and is reachable from the Money Making guide.

**14. What browsers and devices does the site work on?**
Any modern browser on any device. The layout switches to a single column with
slide-out menus below 1200px wide, so phones and tablets are fully supported.
JavaScript is required for the menus to open on narrow screens.

**15. Is it accessible with a screen reader or keyboard?**
Partially, and this is stated plainly rather than glossed over. Page content uses
proper headings and landmarks and all images have alternative text. However, the two
menu buttons cannot currently be operated by keyboard, and the link colour does not
meet the WCAG AA contrast threshold for body text. Both are known and scheduled. See
DESIGN.md.

**16. What does "B5TA" stand for?**
Not documented anywhere. The name has been in use since 2014 and the meaning, if
there is one, has not been written down.

**17. How is this different from just joining the Discord directly?**
It is not a competitor to the Discord; it is the door to it. The Discord is invisible
from outside and requires an invite. This site is public, indexed by search engines,
and answers the questions people have before they are willing to click an invite.

**18. How is this different from a RuneScape clan directory listing?**
A directory gives you a name, a member count, and a recruitment blurb written to
attract everyone. This site gives you the actual rules in the founder's words, the
actual removal criteria, and a decade of guides you can judge for yourself. It is
also under the clan's control, so it does not disappear when a directory does.

**19. What does the site not do?**
It does not show live Grand Exchange prices, track your XP, host a forum, run a
leaderboard, or let you post anything. It has no search. There are no member profiles
and no login. All of that is deliberate: see Non-Goals.

**20. Where do I get help if the Discord invite does not work?**
Use the Official Clan Page link in the navigation, which goes to the RuneScape clan
home page, or search "B5TA" in the in-game clan finder. Both are in the site's
sidebar on every page.

**21. Can I contribute a guide?**
Yes. The site is open source at github.com/Azqato/B5TA. Submit a pull request, or ask
a clan member with repository access to add your content for you. Guide content is
the thing the site most needs and least has.

**22. Is the site finished?**
The core is finished and live. Planned work is listed in the Roadmap section of the
PRD: reducing image sizes, fixing the accessibility gaps, adding analytics, expanding
the guides, and eventually a dedicated Join page.

**23. Who runs this?**
Clan leadership. The repository is owned by Azqato, and changes to the live site come
from commits to that repository.

**24. What happens if the website goes down?**
The whole site is a GitHub repository, so it can be re-published anywhere that serves
static files with no code changes at all. Nothing about the clan depends on the
website being up; the Discord is where the clan actually lives.

### Internal stakeholder FAQ

**Q. Why rebuild as static HTML instead of keeping WordPress?**
WordPress needs a PHP host, a database, plugin updates, and ongoing security patching,
all for a site whose content changes a few times a year. GitHub Pages is free, has no
attack surface beyond static files, and needs no maintenance beyond pushing commits.
The return on the migration is the elimination of a recurring cost and a recurring
risk, permanently.

**Q. What is the ROI rationale for the work in this repository?**
Direct cost is zero: no hosting fee, no domain cost beyond one already owned, no
tooling. The cost is maintainer time. The return is recruitment reach (a public,
indexable presence the Discord cannot provide) and retention of institutional
knowledge (guides that survive members leaving). Neither is currently measured, which
is the honest weakness in this answer and the reason milestone v2.4 exists.

**Q. What is the single number that tells us this is working?**
Discord invite clicks per month. Everything else on the site exists to produce that
click or to be useful to someone who has already made it. Target: establish a
baseline in the first 30 days after analytics, then 20 or more clicks per month by
day 60.

**Q. Why Bootstrap 3.3.6 and not something modern?**
It was already in the codebase and the WikiWP design was built against it. Upgrading
means reworking selectors and layout across nine pages for no user-visible
improvement. The right moment to upgrade is during a planned visual redesign, not
before one. Worth noting: `js/bootstrap.js` is loaded on every page and used by none
of them, so 71 KB of that dependency can be dropped today.

**Q. What is the biggest actual problem with the site right now?**
Image weight. The homepage is roughly 1.4 MB and the Discord page roughly 2.9 MB
against a stated 500 KB target, driven by an 891 KB logo displayed at 60 pixels tall,
a 144 KB favicon, and a 1.5 MB GIF. It is a half-day of work on four files and it is
milestone v2.2.

**Q. What is the biggest risk to the site's value?**
Content staleness, not technical failure. The infrastructure cannot really break. But
a visitor who follows outdated money-making advice loses trust in everything else on
the page, and stale guides are worse than no guides. Guide freshness depends entirely
on clan members contributing, which is an assumption, not a plan.

**Q. How do we update navigation across all pages?**
By editing all nine HTML files. This is the primary known technical debt. The correct
long-term fix is a static site generator with shared partials. It is deliberately
deferred: introducing a build step means every future contributor must install and
learn it before changing a paragraph of text, and tenet 5 judges that a worse trade
at this size.

**Q. Is there a staging environment?**
No. Production is the only environment. Changes are verified locally with
`python -m http.server 8000` in Microsoft Edge, then pushed. Given that a bad deploy
is recoverable in one `git revert` and about 30 seconds, a staging environment would
cost more than it saves.

**Q. Who is responsible for content?**
Any clan member can submit a pull request. Clan leadership controls merges. There is
no CMS and no admin panel; content changes are git commits. In practice that means
one person, which is a bus-factor risk worth naming.

**Q. What must remain true for this to keep working?**
Four things. The Discord invite stays permanent. GitHub Pages stays free. Members
contribute guide content. The clan stays active enough to be worth linking to. If any
of the four fails, the site's value degrades and no amount of technical polish
compensates.

**Q. What is the roadmap direction?**
Not features. The next three milestones are all quality: image weight (v2.2),
accessibility (v2.3), and measurement (v2.4). Only after those does anything new get
built, and the first new thing is a Join page, which is content rather than
engineering. That ordering follows directly from tenets 1 and 2.

---

## The Documentation Audit Process

This section records how this audit was performed and how documentation should be
handled from here. It exists because the process is repeatable and because doing it
differently next time would produce a document that cannot be compared to this one.

### What was done, in order

1. **The codebase was scanned in full before any document was opened.** Every file in
   the repository was enumerated. All nine HTML pages, both hand-written CSS and JS
   files, the vendored dependency headers, the `LICENSE`, the git history, the branch
   list, the working tree state, and the extracted text of `MVP.docx` were read.
   Asset sizes and reference counts were measured rather than estimated. Tooling
   availability on the maintenance machine (Node, Python, Git, Edge) was verified by
   invocation, not assumed.
2. **Every document in `/docs` was read in full**, one at a time: DESIGN.md,
   METRICS.md, PATCHNOTES.md, PRD.md, PRFAQ.md, ROADMAP.md, RUNBOOK.md, SECURITY.md,
   TENETS.md, TRD.md, and the root README.md. Ten documents, 1,383 lines.
3. **Each document was compared against the code** and every disagreement recorded.
   Sixteen were found and are in the Documentation Versus Reality table above.
4. **Documents were merged, not overwritten.** Where a document already covered a
   topic and the code agreed, the original text was kept. Every tenet, every
   assumption, every deferred item, and every metric target from the v2.0.0
   documents survives in this one. Where the code contradicted a document, the
   original claim was preserved alongside the observed reality and marked as a
   discrepancy rather than silently corrected, because code can be wrong just as
   easily as a document can be stale.
5. **Ten documents were consolidated into four:** `README.md` at the root, and
   `PRD.md`, `DESIGN.md`, `PATCHNOTES.md` in `/docs`.
6. **Three policies were adopted** where the project stated none: writing style,
   browser testing, and deprecation and removal. Each is marked in the patch notes as
   newly adopted. Where the project already had a rule, that rule was kept: the
   commit message convention, the vendoring policy, and the deferral of a build step
   are all the project's own, read from the code and the history, and none was
   replaced with a default.
7. **The writing style was applied to every document written**, then swept across the
   rest of the project. Thirteen em dashes were found and fixed outside `/docs`: six
   HTML files and five section-header comments in `css/site.css`. Forty-seven were
   replaced inside PATCHNOTES.md.

### Rules for handling documentation from here

**Which document gets what:**

| Content | Goes in |
|---|---|
| What the site is, for a non-technical reader | `README.md` |
| Anything a developer needs: architecture, setup, deploy, security, conventions, roadmap, decisions | `docs/PRD.md` |
| Anything visual: colour, type, spacing, breakpoints, components, motion, accessibility measurements | `docs/DESIGN.md` |
| What changed, when, and why | `docs/PATCHNOTES.md` |

**Do not create a fifth document.** Three plus the README is the structure. The
v2.0.0 audit produced ten documents and they contradicted each other within eight
weeks (see D8), because a fact recorded in two places drifts in one of them. If a new
topic needs covering, it becomes a section in `PRD.md`.

**`README.md` never moves into `/docs`.** It belongs at the repository root, because
that is where GitHub renders it and where a first-time visitor lands.

**The README carries no commands, no version numbers, no ports, no environment
variables, and no install steps.** All of that lives in the PRD's Runbook. The README
is read by people deciding whether to care; brevity wins ties there and nowhere else.

**Everywhere else, completeness beats brevity.** A reader may arrive at any section
directly and should not have to assemble an answer from three others. Restating
context to make a section stand alone is the section doing its job. This is not
licence for filler: more facts, not more words around the same facts.

**Record uncertainty as uncertainty.** If something could not be verified, say so in
the text and add a numbered open question. A confident sentence outlives the session
that produced it, and every guess presented as a fact in a document like this becomes
someone's false premise months later.

**Never delete a resolved discrepancy or an answered question.** Mark it resolved or
answered and leave the row. The record of what was found and decided is worth more
than a tidy table.

**Never rewrite a historical patch note.** It describes its own moment, not the
present.

### When to run this again

Run a full audit when any of these is true:

- A structural change lands: a new page, a removed page, a dependency change, a host
  change, a build step.
- More than one open question in Risks and Open Questions has been answered, since
  each answer usually invalidates text in several sections.
- Six months have passed with commits in between.
- Anyone finds a documented statement that the code contradicts. That is evidence of
  drift, and drift is rarely isolated.

A full audit means repeating steps 1 through 7 above in that order. Do not skip the
codebase scan on the grounds that the code has not changed much; the entire value of
the exercise is that the claims are re-verified rather than re-copied.
