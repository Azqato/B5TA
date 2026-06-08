# Roadmap — B5TA Clan Website

---

## Current Phase: v1.x — Production (Complete)

The site is live at `b5ta.com` and `azqato.github.io/B5TA/`. All core pages are built, guide content is populated, and the site is fully deployed on GitHub Pages. No active development is underway.

---

## Milestone Table

| Milestone | Target | Status |
|---|---|---|
| v1.0 — Static site launch | 2026-06-07 | ✅ Complete |
| v1.x — Nav and content polish | 2026-06-07 | ✅ Complete |
| v2.0 — Documentation audit | 2026-06-08 | ✅ Complete |
| v2.1 — Analytics setup | When prioritized | Planned |
| v2.2 — Guide content expansion | When clan members contribute | Planned |
| v3.0 — Join page | When prioritized | Planned |
| v3.x — XP Tracker | Future | Planned |
| v4.0 — Templating / SSG | When nav duplication becomes painful | Planned |

---

## Feature Breakdown by Milestone

### v1.0 — Static Site Launch ✅
- Homepage, About, Discord, Guides index
- Four guide category pages (Bossing, Money Making, Quests, Skilling)
- Flip Chart page
- Left nav with active state, sub-menu, hamburger toggle
- Right aside with Pages and External Links widgets
- Mobile responsive layout with off-canvas sidebars
- GitHub Pages deployment

### v1.x — Nav and Content Polish ✅
- Guide pages filled with real content (v1.2.0)
- ipage/ archive merged and removed (v1.3.0)
- Image assets consolidated into `img/` (v1.4.0)
- Nav updated: Flip Chart removed, Support added (v1.5.0–v1.6.0)
- Header spacing and content spacing fixes (v1.7.0–v1.8.0)

### v2.0 — Documentation Audit ✅
- All existing docs rewritten and moved to `/docs/`
- Six new documentation files created (PRFAQ, TENETS, METRICS, ROADMAP, SECURITY, RUNBOOK)
- README rewritten as developer reference

### v2.1 — Analytics Setup
- Install Plausible Analytics or Google Analytics 4
- Configure outbound click tracking for Discord invite link
- Establish baseline metrics per METRICS.md

### v2.2 — Guide Content Expansion
- Bossing page: add boss-specific sections, team-finding tips, gear recommendations
- Skilling page: expand with skill-by-skill leveling paths
- Quests page: add priority quest list for new members
- All content to be contributed by clan members via pull requests

### v3.0 — Join Page
- Dedicated page explaining how to join (beyond the Discord redirect)
- Membership requirements, what to expect, how promotion works
- Replaces or supplements the current Discord page's CTA

### v3.x — XP Tracker
- Simple tool for members to track or share RuneScape XP milestones
- Scope TBD; could be a static form linking to an external tool, or a lightweight JS-based tracker

### v4.0 — Templating / SSG
- Introduce a static site generator (Eleventy recommended) to eliminate nav/header/footer duplication across 9 HTML files
- Single source of truth for nav markup
- Prerequisite: team is comfortable with a build step in the deploy workflow

---

## Explicitly Deferred Items

| Feature | Reason Deferred |
|---|---|
| User accounts / login | No use case justifies the infrastructure cost for a static clan site |
| Dynamic GE price data | Would require a backend or client-side API call; complexity outweighs value |
| Real-time XP leaderboard | Same as above; static alternative (manually updated table) is sufficient |
| Functional search | Non-functional search was already removed (v1.5.0); the site is small enough to navigate without search |
| Merchandise store | External link to Zazzle is sufficient; no reason to build in-house e-commerce |
| Forum / community posting | Discord already serves this purpose |
| Blog / news feed | No regular content publishing cadence; would require CMS or build pipeline |
| Bootstrap 5 upgrade | Requires reworking CSS across all pages; acceptable to defer until a planned visual refresh |
