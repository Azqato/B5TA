# Patch Notes

---

## v1.5 — 2026-06-07

### Navigation Updates

- **Added Support link** to left nav on all pages — positioned above Merchandise, links to `https://azqato.github.io/support.html`
- **Removed Flip Chart** from left nav and right aside Pages widget on all pages (page `flip-chart.html` itself is preserved)
- **Removed search bar** from all pages (`.meta.clearfix` block) — search was non-functional

---

## v1.4 — 2026-06-07

### Image Consolidation — All Assets into `img/`

Restored all previously deleted image assets and consolidated every image directory (`Logos/`, `Design/`, `Gameplay/`, `images/`) into a single `img/` folder.

- **Restored** `Design/` assets (17 files: header/footer/sidebar images, sprites, banners, branding)
- **Restored** `Gameplay/` assets (7 files: in-game screenshots and clips)
- **Moved** all `Logos/` files into `img/` (14 files including logos, favicon, wfbCHon.gif)
- **Moved** all `images/` files into `img/` (b5talogo.png, discord.jpg)
- **Deduplicated:** `Design/anim_banner_1_black.gif` skipped (identical to `Logos/` copy)
- `img/` now contains 40 files — all project image assets in one place

Updated all HTML page references from `Logos/` to `img/`. Updated `ReadMe.md`, `TRD.md`, `Design.md`, `PatchNotes.md`.

---

## v1.3 — 2026-06-07

### Repository Cleanup — ipage Merge and Asset Consolidation

Merged the `ipage/` directory into the main repository and removed all duplicate and obsolete files, resulting in a clean, flat file structure.

**ipage/ directory removed:**
- Deleted 4 WordPress archive HTML pages (content fully migrated to main site)
- Deleted 4 `*_files/` directories (~30 files each: WordPress theme CSS, Jetpack JS, portal pages, duplicate images)
- Moved `wfbCHon.gif` → `img/wfbCHon.gif` (only unique asset referenced by main site)
- Moved `MVP.docx` and `Screenshot.JPG` to repository root

**Stale CSS removed** (unreferenced by any page):
- `css/bootstrap-theme.css` + `.min.css` + `.map` files
- `css/bootstrap.min.css` + `.map`
- `css/dropdownhover.css`, `css/dropdownmenu.css`, `css/externalstyle.css`

**Stale JS removed** (unreferenced by any page):
- `js/bootstrap.min.js`, `js/jquery.js`, `js/npm.js`, `js/destroyvid.js`

**Empty directories removed:**
- `img/`, `img/`, `img/`, `includes/`

**`discord.html` updated:**
- `ipage/discord_files/wfbCHon.gif` → `img/wfbCHon.gif`

**Documentation updated:** `ReadMe.md`, `TRD.md`, `Design.md`, `PRD.md`

---

## v1.2 — 2026-06-07

### Guide Pages — Content Complete

Rewrote all four guide category stub pages with real content sourced from the original `b5ta.com` ipage archive and homepage.

| Page | Content Added |
|---|---|
| `guides-bossing.html` | Bossing intro, conduct rules, Dark Beasts Guide link, New Member Guide link |
| `guides-money-making.html` | GP/day intro, GE flipping section, Flip Chart link, Flipping Guide, Free Runecoins Guide |
| `guides-quests.html` | Quest tips, How To Not Be A N00B guide, New Member Guide link |
| `guides-skilling.html` | Skilling intro, Clan Citadel capping section, leveling tips, New Member Guide |

All pages include structured headings, "What We Offer" lists, community guide links, and a back-link to the Guides index.

---

## v1.1 — 2026-06-07

### Link Updates and Missing Pages

- **Replaced Runeclan → RunePixels** across all 8 HTML pages (nav and aside): `http://www.runeclan.com/clan/B5TA` → `https://runepixels.com/clans/b5ta/about`, label changed from "Runeclan" to "RunePixels"
- **Created `flip-chart.html`** — Flip Chart page was missing despite being linked in every page's nav. Stub page created with ipage article layout, "coming soon" message, and link to community Flipping Guide
- **Wired Flip Chart nav links** — updated `href="#"` to `href="flip-chart.html"` in nav and aside across all 8 existing pages
- Updated `PRD.md`, `TRD.md`, `ReadMe.md` to reflect RunePixels and Flip Chart stub completion

---

## v1.0 — 2026-06-07

### Major Release — Full ipage Migration to Static HTML

This is the first complete release of the rebuilt B5TA website. The site has been fully migrated from the original Bootstrap PHP shell to a static HTML implementation based on the original `b5ta.com` ipage design. The site now runs on GitHub Pages with no server-side dependencies.

---

### Architecture

**PHP → Static HTML**
- Converted all pages from `.php` to `.html`
- Removed `includes/header.php` and `includes/footer.php` PHP includes
- Inlined header and footer HTML directly into each page
- Per-page active navigation state hardcoded in each file (replaces PHP `$activePage` variable)
- Removed all `$scrollspy`, inline `<style>` blocks, and Bootstrap colored section markup

**GitHub Pages Ready**
- Added `.nojekyll` to disable Jekyll processing
- All asset paths are relative — works locally and at `azqato.github.io/B5TA/`
- No PHP server required

---

### Files Created

| File | Description |
|---|---|
| `index.html` | Homepage — ipage article layout with welcome, RuneScape, LoL, SW, Minecraft sections |
| `about.html` | About page — 8-item clan founding/rules/conduct list |
| `discord.html` | Discord page — download + invite links + animated banner |
| `guides.html` | Guides index — category links + community guides |
| `guides-bossing.html` | Bossing guides stub |
| `guides-money-making.html` | Money Making guides stub |
| `guides-quests.html` | Quest guides stub |
| `guides-skilling.html` | Skilling guides stub |
| `.nojekyll` | Disables GitHub Pages Jekyll processing |

---

### Files Removed

| File | Reason |
|---|---|
| `index.php` | Replaced by `index.html` |
| `about.php` | Replaced by `about.html` |
| `discord.php` | Replaced by `discord.html` |
| `guides.php` | Replaced by `guides.html` |
| `guides-bossing.php` | Replaced by `guides-bossing.html` |
| `guides-money-making.php` | Replaced by `guides-money-making.html` |
| `guides-quests.php` | Replaced by `guides-quests.html` |
| `guides-skilling.php` | Replaced by `guides-skilling.html` |
| `includes/header.php` | Inlined into each HTML page |
| `includes/footer.php` | Inlined into each HTML page |

---

### Documentation Updated

- `ReadMe.md` — Updated to reflect completed migration, static HTML architecture, GitHub Pages deployment, new file structure, and accurate page status table
- `PRD.md` — Updated status to Complete; all success criteria checked; file references updated from `.php` to `.html`; open question on PHP vs static resolved
- `Design.md` — Updated markup examples to use `.html` links; updated layout diagram with accurate column widths; added desktop/mobile breakpoint details; updated active state notes for static HTML
- `TRD.md` — Complete rewrite: PHP include architecture replaced with static HTML architecture; deployment section updated to GitHub Pages; migration steps marked complete; known issues documented

---

### Open Items

- ~~Discord invite URL~~ — confirmed: `https://discord.gg/0qfZioFZLSnmWMs7` is permanent, already set correctly
- Guide sub-pages (Bossing, Money Making, Quests, Skilling) are content stubs
- Flip Chart page referenced in nav but not yet created

---

## v0.5 — 2026-06-07

### ipage Migration — Page Rewrites

All pages rewritten to use the ipage article layout (`pageContainer` / `entry entryTypePost` / `entryHeader` / `entryContent`). Old Bootstrap scrollspy, coloured sections, inline `<style>` blocks, and `container page-content` wrappers removed.

#### Pages Rewritten

- **`index.php`** — Removed `$scrollspy`, inline `<style>`, scrollspy nav, Bootstrap grid. Homepage content in `.entryContent`.
- **`about.php`** — `.pageContainer` + `entryHeader` + 8-item about list.
- **`discord.php`** — Article layout; updated Discord download URL to `discord.com`.
- **`guides.php`** — Article layout; category + community guide links with `rel="noopener"`.
- **`guides-bossing.php`**, **`guides-money-making.php`**, **`guides-quests.php`**, **`guides-skilling.php`** — Updated to article layout.

---

## v0.4 — 2026-06-07

### Migration Planning

- Analyzed `ipage/` archive (4 HTML saves of the original b5ta.com WordPress site) and documented full structure, layout, and content
- Rewrote `ReadMe.md` to reflect both the ipage design target and the current Bootstrap shell
- Created `PRD.md` — Product Requirements Document
- Created `Design.md` — Design specification
- Created `TRD.md` — Technical Requirements Document

### Infrastructure (v0.4)

- Created `css/site.css` — full ipage 3-column layout CSS (fixed header, off-canvas sidebars, article styles)
- Created `js/site.js` — mobile sidebar toggles, overlay, sub-menu, scroll-to-top
- Rewrote `includes/header.php` — fixed header with logo banner, hamburger buttons, left sidebar nav, overlay, container-fluid open
- Rewrote `includes/footer.php` — site footer, right aside with Pages/External Links widgets, scroll-to-top button, JS loading
- Renamed `ipage Migration/` → `ipage/`

---

## v0.3 — 2026-06-06

### Documentation

- Rewrote `README.md` with two clearly separated sections
- **Website Overview** — documents every file in the repository
- **About Clan B5TA** — standalone informational summary of the clan

---

## v0.2 — 2017-07-01

### Homepage

- Overhauled `index.php` with expanded layout
- Added fixed responsive navbar with Home, Discord, Guides dropdown, Flip Chart, Contact, Log In
- Added blue header banner displaying the B5TA clan logo
- Added scrollspy sidebar with links to five content sections
- Added semi-transparent navbar that becomes fully opaque on hover
- Added responsive mobile support

---

## v0.1 — 2017-05-23

### Initial Release

- Initial project setup with `README.md` and `LICENSE` (MIT)
- Added `index.php` as the main entry point
- Added Bootstrap 3 framework
- Added jQuery library
- Added Bootstrap JS plugins
- Added `dropdown.js`, `externalscript.js`, `destroyvid.js`
- Added Glyphicons web fonts
- Added `img/b5talogo.png` and `img/discord.jpg`
