# Technical Requirements Document — B5TA Clan Website

**Version:** 2.0.0
**Date:** 2026-06-08
**Status:** Active

---

## System Architecture

Fully static HTML. No server-side processing, no build step, no database, no API.

All 9 pages are self-contained `.html` files with header, footer, and navigation inlined directly. CSS and JavaScript are loaded from local files. The site is served as-is from a GitHub Pages repository — the source files are the production files.

```
Browser
  └── requests .html file
        ├── loads css/bootstrap.css
        ├── loads css/site.css
        ├── loads js/jquery.min.js      (in <head>)
        ├── loads js/bootstrap.js       (in <head>)
        ├── loads js/site.js            (before </body>)
        └── loads js/externalscript.js  (before </body>)
```

No client-server communication at runtime. All content is pre-rendered HTML.

---

## Tech Stack

| Layer | Technology | Version | Notes |
|---|---|---|---|
| Markup | HTML5 | — | Static, no templating |
| CSS Framework | Bootstrap | 3.3.6 | Grid, components, responsive utilities |
| JavaScript Library | jQuery | 1.12.3 | Required by Bootstrap and site.js |
| Custom CSS | css/site.css | — | ipage 3-column layout, overrides Bootstrap |
| Custom JS | js/site.js | — | Mobile nav toggle, sub-menu, scroll-to-top |
| Bootstrap JS | js/bootstrap.js | 3.3.6 | Dropdown and component plugins |
| External JS | js/externalscript.js | — | Placeholder; no active behaviors |
| Icon Font | Bootstrap Glyphicons | 3.3.6 | Served from fonts/ |
| Hosting | GitHub Pages | — | Static serving from master branch root |

---

## Folder Structure

```
B5TA/
├── index.html                  — Homepage
├── about.html                  — About page
├── discord.html                — Discord join page
├── guides.html                 — Guides index
├── guides-bossing.html         — Bossing guides
├── guides-money-making.html    — Money Making guides
├── guides-quests.html          — Quest guides
├── guides-skilling.html        — Skilling guides
├── flip-chart.html             — Flip Chart / GE flipping
│
├── css/
│   ├── site.css                — Custom ipage 3-column layout (loads after bootstrap.css)
│   └── bootstrap.css           — Bootstrap 3.3.6 core
│
├── js/
│   ├── site.js                 — Mobile nav/aside toggles, scroll-to-top
│   ├── jquery.min.js           — jQuery 1.12.3
│   ├── bootstrap.js            — Bootstrap 3.3.6 JS plugins
│   └── externalscript.js       — Placeholder (no active behaviors)
│
├── img/                        — All image and media assets (~40 files)
│   ├── 0jK9PZV.png             — Header banner logo
│   ├── clan.png                — Homepage float-right image (280×126)
│   ├── favicon.png             — Browser tab icon
│   └── wfbCHon.gif             — Discord page animated banner
│
├── fonts/                      — Bootstrap Glyphicons web fonts
│
├── docs/                       — All project documentation
│   ├── PRD.md
│   ├── TRD.md
│   ├── DESIGN.md
│   ├── PATCHNOTES.md
│   ├── PRFAQ.md
│   ├── TENETS.md
│   ├── METRICS.md
│   ├── ROADMAP.md
│   ├── SECURITY.md
│   └── RUNBOOK.md
│
├── .nojekyll                   — Disables Jekyll on GitHub Pages
├── README.md                   — Developer reference
├── MVP.docx                    — Original planning document
└── Screenshot.JPG              — Reference screenshot
```

---

## Data Models

This project has no data models. All content is static HTML. There is no database, no JSON data store, and no structured data beyond what is marked up in HTML.

The closest analog to a "data model" is the page structure pattern every HTML file follows:

```
Page
├── title: string               — <title> element (e.g. "B5TA | About")
├── activeNavItem: string       — hardcoded current-menu-item class on one <li>
├── activeAsideItem: string     — hardcoded current_page_item class on one <li>
└── content: HTML               — inner HTML of .entryContent
```

Active nav and aside states are hardcoded per file (no server variable).

---

## Internal Data Flow

No API. All user interaction is DOM state managed via jQuery.

**Sidebar open/close:**
1. User clicks `#navMenuButton` or `#asideMenuButton`
2. `site.js` toggles `.is-open` on `#primaryMenu` or `#siteAside`
3. CSS transitions the element from its off-canvas position (left: -265px / right: -320px) to visible (left: 0 / right: 0)
4. `#siteOverlay` gets `.is-visible`, showing the dim backdrop
5. Closing: overlay click, outside-document click, or toggling the same button removes `.is-open` and `.is-visible`

**Sub-menu (Guides dropdown):**
1. User clicks the Guides nav link (mobile only — `$(window).width() < 1200`)
2. `site.js` toggles `.sub-open` on `.menu-item-has-children`
3. CSS shows/hides `.sub-menu` based on `.sub-open` presence

**Scroll-to-top:**
1. `$(window).scroll` fires; if `scrollTop > 300`, `#scrollTop` fades in
2. Clicking `#scrollTop` animates `scrollTop` to 0 over 400ms

**No state is persisted.** All UI state is lost on page navigation or refresh.

---

## State Management

Client-side only. State is stored as CSS classes on DOM elements:

| State | Element | Class |
|---|---|---|
| Left nav open | `#primaryMenu` | `.is-open` |
| Right aside open | `#siteAside` | `.is-open` |
| Overlay visible | `#siteOverlay` | `.is-visible` |
| Guides sub-menu expanded | `.menu-item-has-children` | `.sub-open` |
| Current page (nav) | `li.menu-item` | `.current-menu-item .current_page_item` |
| Current page (aside) | `li.page_item` | `.current_page_item` |

No localStorage, sessionStorage, cookies, or global JS state objects are used.

---

## Third-Party Integrations

All integrations are outbound links only. No API calls, no authentication, no user data is transmitted.

| Service | URL | Purpose | Auth |
|---|---|---|---|
| Discord | discord.gg/0qfZioFZLSnmWMs7 | Clan Discord invite | None — public invite link |
| RunePixels | runepixels.com/clans/b5ta/about | Clan stats and member list | None — public page |
| RuneScape Clan Home | services.runescape.com/m=clan-home/c=y7yVdRo3t4g/clan/B5TA | Official RS clan page | None — public page |
| Zazzle | zazzle.com/clanb5ta/products | Clan merchandise store | None — public page |
| Support page | azqato.github.io/support.html | Creator support page | None — public page |
| Google Docs (guides) | Various doc.google.com URLs | Community-authored guides | None — public docs |

---

## Performance Requirements

| Metric | Target |
|---|---|
| Page weight (HTML + CSS, no images) | < 100 KB |
| Total page weight (including images) | < 500 KB |
| Time to first contentful paint | < 2 seconds on standard broadband |
| Lighthouse performance score | ≥ 85 |
| JavaScript execution | jQuery init + site.js on DOMContentLoaded — no deferred or lazy loading needed |

No bundler, minification pipeline, or image optimization is currently in place. The site is small enough that raw file sizes are acceptable.

---

## Known Technical Debt

| Issue | Current Approach | Correct Solution |
|---|---|---|
| Nav/header/footer duplicated across 9 HTML files | Each file has the full markup inlined | Static site generator (Eleventy, Hugo) or simple HTML include script; one source of truth for nav |
| Bootstrap 3.3.6 (EOL since 2019) | Pinned to 3.3.6 | Upgrade to Bootstrap 5 or replace with custom CSS |
| jQuery 1.12.3 for ~50 lines of DOM logic | jQuery required by Bootstrap 3; also used in site.js | Vanilla JS; site.js logic is < 50 lines and has no jQuery-specific dependencies |
| Dead CSS: `.meta` and `.meta-search-form` rules | Search bar removed from HTML in v1.5 but CSS rules remain in site.css | Delete `.meta` and `.meta-search-form` blocks from site.css |
| No image optimization | Raw PNG/GIF files served directly | Run images through a compressor; consider WebP for modern browsers |
| `externalscript.js` has no active behaviors | File is loaded on every page | Remove the script tag or consolidate into site.js if behaviors are added |
