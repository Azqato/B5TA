# Product Requirements Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Status:** Complete

---

## 1. Overview

### Product

The B5TA clan website is the public-facing home for Clan B5TA, a RuneScape community founded September 30, 2014. The site serves as the primary information hub for current and prospective members.

### Goal

Rebuild the site using the original `b5ta.com` design (archived in `ipage/`) as the design priority, running as static HTML on GitHub Pages. The result matches the look and feel of the original WikiWP/WordPress site without any server-side dependencies.

### Success Criteria

- ✅ All four ipage pages (Home, About, Discord, Guides) are live and visually match the ipage design
- ✅ The left sidebar navigation is functional on all pages with correct active states
- ✅ All existing real guide links from `ipage/guides.html` are preserved
- ✅ The site renders correctly in a modern browser
- ✅ Files are organized to allow easy future addition of new pages and content
- ✅ Site is hosted on GitHub Pages — no PHP server required

---

## 2. Users

| User | Description | Primary Need |
|---|---|---|
| Prospective member | Someone considering joining B5TA | Understand what the clan is and how to join |
| Current member | Active clan member | Quick access to Discord and guides |
| Returning member | Someone who was in the clan before | Reconnect via Discord, check current status |
| Visitor | General RuneScape player | Browse guides and clan info |

---

## 3. Pages and Features

### 3.1 Homepage (`index.html`)

**Priority:** P0 — **Status: Complete**

**Content (from `ipage/homepage.html`):**
- Welcome heading + `clan.png` image floated right
- Clan description ("drama-free community")
- Discord join CTA
- Founded date
- RuneScape section: teach bosses, gp/day, efficient leveling, conduct rules
- League of Legends section: normal games, ranked duos, clash
- Summoners War section: labyrinth, guild wars, raids
- Minecraft section: factions, survival

**Layout:** ipage article layout — `.pageContainer` / `article.entry.entryTypePost` / `.entryContent`

---

### 3.2 About (`about.html`)

**Priority:** P0 — **Status: Complete**

**Content (from `ipage/about.html`):**
- Founding: September 30th, 2014 by zoop
- Community type: skilling, flipping, bossing
- Drama-free mission statement
- Rules: respect + follow RS ToS
- Promotion path: active + cap citadel + invite members
- Inactivity policy: kicked after 6 months if under 1,500 total level
- Conduct policy quote from zoop

**Layout:** ipage article layout

---

### 3.3 Discord (`discord.html`)

**Priority:** P0 — **Status: Complete**

**Content (from `ipage/discord.html`):**
- Step 1: Download Discord link
- Step 2: B5TA invite link — `https://discord.gg/0qfZioFZLSnmWMs7` (permanent)
- `wfbCHon.gif` animated banner centered below

**Layout:** ipage article layout

---

### 3.4 Guides (`guides.html`)

**Priority:** P0 — **Status: Complete**

**Content (from `ipage/guides.html`):**
- Category links: Bossing, Money Making, Quests, Skilling
- Community guides list:
  - B5TA New Member Guide
  - Dark Beasts Guide (Google Docs)
  - Flipping Guide (Google Docs)
  - Free Runecoins Guide
  - How To Not Be A N00B (Google Docs)

**Layout:** ipage article layout

---

### 3.5 Guide Category Pages

**Priority:** P1 — **Status: Stub (content TBD)**

| Page | File | Status |
|---|---|---|
| Bossing | `guides-bossing.html` | Stub |
| Money Making | `guides-money-making.html` | Stub |
| Quests | `guides-quests.html` | Stub |
| Skilling | `guides-skilling.html` | Stub |

Each stub displays a "coming soon" message with a back link to Guides. Content to be filled in by clan members.

---

### 3.6 Flip Chart

**Priority:** P2 — **Status: Not started**

Grand Exchange item flipping tracker. Nav link exists but page not yet created.

---

### 3.7 Future Pages

| Page | Notes |
|---|---|
| Join | Join form or instructions |
| New Member Guide | Dedicated guide page |
| User EXP Tracker | RS XP tracking tool |
| Contact | Contact form or Discord redirect |

---

## 4. Navigation

### Primary Navigation (Left Sidebar)

| Label | Destination | Type |
|---|---|---|
| Home | `index.html` | Internal |
| About | `about.html` | Internal |
| Discord | `discord.html` | Internal |
| Guides | `guides.html` | Internal (with sub-menu) |
| Flip Chart | — | Internal (stub) |
| Official Clan Page | RS clan page URL | External |
| Runeclan | runeclan.com/clan/B5TA | External |
| Merchandise | zazzle.com/clanb5ta | External |

### Mobile Navigation

Hamburger buttons (`.navMenuButton` / `.asideMenuButton`) toggle the left and right sidebars. Implemented in `js/site.js` with `.is-open` class toggling and an overlay.

---

## 5. Non-Functional Requirements

| Requirement | Status |
|---|---|
| Modern browser support (Chrome, Firefox, Edge, Safari) | ✅ |
| Mobile responsive — sidebars collapse on mobile | ✅ |
| GitHub Pages compatible — no PHP required | ✅ |
| No WordPress dependency | ✅ |
| All assets self-hosted | ✅ |
| ipage archive preserved in repo | ✅ |

---

## 6. Out of Scope (v1.0)

- User login / accounts
- Database integration
- Dynamic content (blog posts, news feed)
- Functional search
- Analytics integration
- Email subscription widget
- Merchandise store (external link only)

---

## 7. Open Questions

| Question | Status |
|---|---|
| What is the current B5TA Discord invite link? | **Resolved** — `https://discord.gg/0qfZioFZLSnmWMs7` (permanent) |
| What content goes in Bossing / Quests / Skilling guide pages? | **Open** — awaiting clan member contributions |
| Should Merchandise and Donate links be kept in the sidebar? | **Open** |
| Is the Patreon link still active? | **Open** — Donate link removed from v1.0 nav |
