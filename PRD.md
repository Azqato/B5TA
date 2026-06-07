# Product Requirements Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Status:** Planning

---

## 1. Overview

### Product

The B5TA clan website is the public-facing home for Clan B5TA, a RuneScape community founded September 30, 2014. The site serves as the primary information hub for current and prospective members.

### Goal

Rebuild the site using the original `b5ta.com` design (archived in `ipage/`) as the design priority, running on the existing Bootstrap 3 + jQuery codebase rather than WordPress. The result should be a maintainable, static-friendly PHP site that matches the look and feel of the original.

### Success Criteria

- All four ipage pages (Home, About, Discord, Guides) are live and visually match the ipage design
- The left sidebar navigation is functional on all pages
- All existing real guide links from `ipage/guides.html` are preserved
- The site renders correctly in a modern browser without a WordPress backend
- Files are organized to allow easy future addition of new pages and content

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

### 3.1 Homepage (`index.php`)

**Priority:** P0

**Content (from `ipage/homepage.html`):**
- Welcome heading + `clan.png` image
- Clan description ("drama-free community")
- Discord join CTA (centered)
- Founded date callout (centered)
- RuneScape section: teach bosses, gp/day, efficient leveling, conduct rules
- League of Legends section: normal games, ranked duos, clash
- Summoners War section: labyrinth, guild wars, raids
- Minecraft section: factions, survival

**Layout:** ipage article layout (white background, left sidebar, right aside)

---

### 3.2 About (`about.php`)

**Priority:** P0

**Content (from `ipage/about.html`):**
- Founding: September 30th, 2014 by zoop
- Community type: skilling, flipping, bossing
- Drama-free mission statement
- Rules: respect + follow RS ToS
- Promotion path: active + cap citadel + invite members
- Inactivity policy: kicked after 6 months if under 1,500 total level
- Conduct policy quote from zoop (Threatening Behavior, Harassment, Botting, Luring, Scamming)

**Layout:** ipage article layout

---

### 3.3 Discord (`discord.php`)

**Priority:** P0

**Content (from `ipage/discord.html`):**
- Step 1: Download Discord link
- Step 2: B5TA invite link *(invite URL needs to be updated — original is expired)*
- `wfbCHon.gif` animated banner centered below

**Layout:** ipage article layout

---

### 3.4 Guides (`guides.php`)

**Priority:** P0

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

**Priority:** P1

Four pages, one per category:

| Page | File | Status |
|---|---|---|
| Bossing | `guides-bossing.php` | Stub — content TBD |
| Money Making | `guides-money-making.php` | Stub — content TBD |
| Quests | `guides-quests.php` | Stub — content TBD |
| Skilling | `guides-skilling.php` | Stub — content TBD |

Each stub should display a "coming soon" message and a back link to Guides. Content to be filled in by clan members.

---

### 3.6 Flip Chart (`flip-chart.php`)

**Priority:** P2

Grand Exchange item flipping tracker. Referenced in the Bootstrap navbar. Details TBD.

---

### 3.7 Contact (`contact.php`)

**Priority:** P2

Contact form or redirect to Discord. Details TBD.

---

### 3.8 Future Pages (referenced in ipage aside widget)

| Page | Notes |
|---|---|
| Join (`join.php`) | Join form or instructions |
| New Member Guide (`new-member-guide.php`) | Dedicated guide page |
| User EXP Tracker (`exp-tracker.php`) | RS XP tracking tool |

---

## 4. Navigation

### Primary Navigation (Left Sidebar — ipage style)

Required links for the rebuild:

| Label | Destination | Type |
|---|---|---|
| Home | `index.php` | Internal |
| About | `about.php` | Internal |
| Discord | `discord.php` | Internal |
| Guides | `guides.php` | Internal |
| Flip Chart | `flip-chart.php` | Internal (stub) |
| Official Clan Page | RS clan page URL | External |
| Runeclan | runeclan.com/clan/B5TA | External |
| Donate | Patreon link | External |

### Mobile Navigation

The ipage design uses a mobile hamburger ("Menu" label, 3 `<hr>` bars) to toggle the sidebar. This behavior must be preserved for mobile viewports.

---

## 5. Non-Functional Requirements

| Requirement | Detail |
|---|---|
| Browser support | Modern evergreen browsers (Chrome, Firefox, Edge, Safari) |
| Mobile responsiveness | Must work on phones and tablets; sidebar collapses on mobile |
| GitHub Pages compatibility | Static output (no server-side PHP execution) OR PHP server required |
| No WordPress dependency | The ipage CSS/JS from WordPress is for reference only; rebuild without Jetpack, W3TC, etc. |
| Asset self-hosting | All fonts, images, CSS, JS served locally (no CDN dependencies) |
| Preserve ipage archive | `ipage/` folder stays in the repo as a reference; not served to end users |

---

## 6. Out of Scope (v1)

- User login / accounts
- Database integration
- Dynamic content (blog posts, news feed)
- Search functionality
- Analytics integration
- Email subscription (replace Jetpack subscribe widget with a placeholder or remove)
- Merchandise store (external link only)

---

## 7. Open Questions

| Question | Owner |
|---|---|
| What is the current B5TA Discord invite link? | Clan owner |
| Should the site be PHP (b5ta.com server) or static HTML (GitHub Pages)? | Clan owner |
| What content goes in Bossing / Quests / Skilling guide pages? | Clan members |
| Should Merchandise and Donate links be kept in the sidebar? | Clan owner |
| Is the Patreon link still active? | Clan owner |
