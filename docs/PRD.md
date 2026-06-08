# Product Requirements Document — B5TA Clan Website

**Version:** 2.0.0
**Date:** 2026-06-08
**Status:** Active

---

## Problem Statement

Clan B5TA is a RuneScape community that has been active since 2014. The original clan website (`b5ta.com`, WordPress/WikiWP) is no longer actively maintained and relies on server-side infrastructure that introduces maintenance overhead, hosting costs, and downtime risk. Members and prospective members have no reliable, permanent public home to find clan information, join the Discord, or access community guides.

This project rebuilds the clan website as a fully static site that requires no server, no database, and no ongoing maintenance — just a GitHub repository.

---

## Target Users

| Persona | Context | Primary Need |
|---|---|---|
| Prospective member | Has heard of B5TA in-game or through a friend; wants to learn about the clan before committing | Understand the clan's culture, rules, and how to join without asking in chat |
| Current member | Already in the clan; visits the site to access guides or Discord links | Fast access to specific content — Discord, Bossing guide, Flip Chart — with no friction |
| Returning member | Was in the clan previously; wants to reconnect after inactivity | Find the Discord invite link and confirm the clan is still active |
| Casual visitor | RuneScape player who found the site via search; not committed to joining | Browse guides (bossing, money making, skilling) for useful content |

---

## Goals

- Provide a permanent, always-accessible public home for Clan B5TA
- Match the look and feel of the original `b5ta.com` WordPress design
- Require zero server-side infrastructure — deployable and maintainable via GitHub alone
- Give current members fast access to Discord and guide content
- Host community-authored guides for new and returning players

---

## Non-Goals

The following are explicitly out of scope for this project:

- User authentication or member accounts
- Database integration or dynamic content generation
- Functional search (site-wide)
- Real-time data (Grand Exchange prices, live XP tracking, clan activity feeds)
- Forum or community posting features
- Analytics or user tracking (currently unimplemented)
- Email subscription or newsletter
- Merchandise store functionality (external link only)
- Mobile app

---

## User Stories

**Prospective member**
- As a prospective member, I want to read what Clan B5TA is about so I can decide if the culture and gameplay focus is a good fit for me.
- As a prospective member, I want a working Discord invite link so I can join the community immediately without asking someone in-game.
- As a prospective member, I want to read the clan rules so I understand what's expected before joining.

**Current member**
- As a current member, I want to find the bossing guide quickly so I can reference it during a session.
- As a current member, I want the Discord link always available so I can share it with recruits.
- As a current member, I want the Flip Chart page so I have a starting point for GE flipping strategies.

**Returning member**
- As a returning member, I want to see that the site is active and the Discord link still works so I know the clan is still running.

**Casual visitor**
- As a visitor, I want to browse money-making and skilling guides so I can get useful RuneScape tips even if I don't join the clan.

---

## Feature List

### MVP (Shipped — v1.0.0)

- Homepage with clan overview and game sections (RuneScape, LoL, Summoners War, Minecraft)
- About page with founding history, rules, promotion path, and conduct policy
- Discord page with step-by-step join instructions and permanent invite link
- Guides index linking all categories and community guides
- Four guide category pages: Bossing, Money Making, Quests, Skilling
- Flip Chart page linking to community Flipping Guide
- Left sidebar navigation with active state per page
- Right aside with Pages and External Links widgets
- Mobile-responsive layout with off-canvas sidebars and hamburger toggles
- Scroll-to-top button

### Future (Post-Launch)

- Dedicated Join page with structured join instructions
- New Member Guide as a full page (currently linked to external Google Doc)
- XP tracker tool for RuneScape members
- Content contributions from clan members expanding guide pages
- Shared nav component to eliminate per-file duplication

---

## Constraints

| Constraint | Description |
|---|---|
| Static HTML only | GitHub Pages does not support server-side code. All pages are self-contained HTML files. |
| Bootstrap 3.3.6 locked | Upgrading Bootstrap would require reworking CSS and layout across all 9 pages. |
| No build tooling | No bundler, preprocessor, or template engine. Content changes require editing raw HTML. |
| Nav duplication | Header, footer, and nav are inlined in all 9 HTML files. Any nav change requires 9 edits. |
| No analytics | Currently no measurement tool is installed. Usage data is unavailable. |

---

## Assumptions

- The Discord invite URL (`discord.gg/0qfZioFZLSnmWMs7`) is permanent and will remain valid.
- The RuneScape clan page URL (`services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA`) remains stable.
- GitHub Pages remains a free, available hosting option.
- Clan members will contribute guide content over time.
- The WikiWP/ipage design is the correct visual reference and should not be significantly altered.

---

## Success Criteria

| Criterion | Measure |
|---|---|
| All pages load without errors | Manual QA in Chrome, Firefox, Edge |
| Discord link is reachable and valid | Manual verification of invite URL |
| Site loads in under 3 seconds | Lighthouse performance score ≥ 85 |
| Mobile sidebars function correctly | Manual test at 375px and 768px viewport widths |
| Left nav shows correct active item per page | Manual review of all 9 pages |
| No broken internal links | Manual link check across all pages |
