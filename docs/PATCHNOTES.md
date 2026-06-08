# Patch Notes

All versions follow semantic versioning (MAJOR.MINOR.PATCH).  
Sections per entry: **Added**, **Changed**, **Fixed**, **Removed**.

---

## v2.0.0 — 2026-06-08

### Added
- `/docs/` directory containing all project documentation
- `docs/PRD.md` — product requirements, user stories, goals, non-goals, constraints, success criteria
- `docs/TRD.md` — technical architecture, tech stack with versions, internal data flow, state management, known debt
- `docs/DESIGN.md` — full design system: color palette, typography, spacing, breakpoints, component patterns, accessibility, animation
- `docs/PATCHNOTES.md` — version history in semantic versioning format (this file)
- `docs/PRFAQ.md` — press release and internal/external FAQ
- `docs/TENETS.md` — product and design principles
- `docs/METRICS.md` — north star, acquisition, engagement, retention, and performance metrics
- `docs/ROADMAP.md` — milestone plan and deferred features
- `docs/SECURITY.md` — security posture, data handling, dependency policy
- `docs/RUNBOOK.md` — local setup, deploy, rollback, common errors, monitoring

### Changed
- `README.md` rewritten as a developer reference: tech stack with versions, prerequisites, installation, local dev commands, env vars, build, deploy, and docs index
- `PRD.md`, `TRD.md`, `Design.md`, `PatchNotes.md` moved from repository root into `/docs/` and renamed to uppercase

### Removed
- `PRD.md` from repository root (moved to `docs/PRD.md`)
- `TRD.md` from repository root (moved to `docs/TRD.md`)
- `Design.md` from repository root (moved to `docs/DESIGN.md`)
- `PatchNotes.md` from repository root (moved to `docs/PATCHNOTES.md`)

---

## v1.9.0 — 2026-06-08

### Added
- v1.9.0 patch note entry

### Changed
- `ReadMe.md` rewritten as comprehensive GitHub reference: clan description, website purpose and audience table, all pages with descriptions, layout diagram, tech stack, repo structure, local dev instructions, deployment details, docs index, and future work backlog
- `Design.md` layout diagram updated to remove the `.meta` search bar row (removed from site in v1.5.0); left nav markup example updated to include all current items
- `PRD.md` guide category pages status updated from Stub to Complete; Flip Chart status clarified; nav table updated with current items (Support added, Flip Chart removed, divider noted)
- `TRD.md` guide sub-pages known issue marked resolved; nav items list updated

---

## v1.8.0 — 2026-06-07

### Fixed
- Extra top margin on the first child element inside `.entryContent` — pages whose content began directly with `h2` had a larger visual gap than pages using `.entryHeader`. Added `.entryContent > *:first-child { margin-top: 0; }` to `css/site.css`

---

## v1.7.0 — 2026-06-07

### Fixed
- Content rendering under the fixed header after search bar removal in v1.5.0. Added `margin-top: 113px` to `.container-fluid` in `css/site.css` (100px header + ~13px gap)

### Removed
- Unused `.meta` left/right margin rule from the desktop 1200px+ media query in `css/site.css`

---

## v1.6.0 — 2026-06-07

### Added
- Support link to right aside External Links widget on all 9 pages (above Merchandise), linking to `https://azqato.github.io/support.html`

---

## v1.5.0 — 2026-06-07

### Added
- Support link to left nav on all 9 pages (above Merchandise), linking to `https://azqato.github.io/support.html`

### Removed
- Flip Chart from left nav and right aside Pages widget on all 9 pages (page `flip-chart.html` preserved)
- Search bar (`.meta.clearfix` block) from all 9 pages — search was non-functional

---

## v1.4.0 — 2026-06-07

### Added
- Restored `Design/` assets (17 files: header/footer/sidebar images, sprites, banners, branding)
- Restored `Gameplay/` assets (7 files: in-game screenshots)
- Moved all `Logos/` files (14 files) into `img/`
- Moved all `images/` files into `img/`

### Changed
- All HTML page references updated from `Logos/` to `img/`
- `img/` now contains ~40 files — all project image assets consolidated

---

## v1.3.0 — 2026-06-07

### Removed
- `ipage/` directory (4 WordPress archive HTML pages and associated `*_files/` directories; ~120 files total)
- `wfbCHon.gif` moved to `img/` before directory removal
- `MVP.docx` and `Screenshot.JPG` moved to repository root
- Stale CSS files unreferenced by any page: `bootstrap-theme.css`, `bootstrap.min.css`, `dropdownhover.css`, `dropdownmenu.css`, `externalstyle.css`, and associated map files
- Stale JS files unreferenced by any page: `bootstrap.min.js`, `jquery.js`, `npm.js`, `destroyvid.js`

---

## v1.2.0 — 2026-06-07

### Added
- Real content to all four guide category pages (previously "coming soon" stubs):
  - `guides-bossing.html` — bossing intro, conduct rules, Dark Beasts Guide link, New Member Guide link
  - `guides-money-making.html` — GP/day intro, GE flipping section, Flip Chart link, Flipping Guide, Free Runecoins Guide
  - `guides-quests.html` — quest tips, "How To Not Be A N00B" guide, New Member Guide link
  - `guides-skilling.html` — skilling intro, Clan Citadel capping section, leveling tips, New Member Guide link

---

## v1.1.0 — 2026-06-07

### Added
- `flip-chart.html` — Flip Chart page (was referenced in nav but missing)

### Changed
- All Flip Chart nav `href="#"` placeholders updated to `href="flip-chart.html"` across all 8 existing pages
- Runeclan links replaced with RunePixels across all 8 pages: `runeclan.com/clan/B5TA` → `runepixels.com/clans/b5ta/about`; label changed from "Runeclan" to "RunePixels"

---

## v1.0.0 — 2026-06-07

### Added
- `index.html` — Homepage with welcome, RuneScape, League of Legends, Summoners War, and Minecraft sections
- `about.html` — About page with 8-item founding/rules/conduct list
- `discord.html` — Discord page with download and invite links plus animated banner
- `guides.html` — Guides index with category links and community guide links
- `guides-bossing.html`, `guides-money-making.html`, `guides-quests.html`, `guides-skilling.html` — Guide category stubs
- `.nojekyll` — Disables GitHub Pages Jekyll processing

### Changed
- All active nav states converted from PHP `$activePage` variable to hardcoded `current-menu-item current_page_item` classes per file

### Removed
- `index.php`, `about.php`, `discord.php`, `guides.php` and all guide `.php` files — replaced by static HTML equivalents
- `includes/header.php`, `includes/footer.php` — inlined into each HTML page
- Scrollspy markup, Bootstrap colored sections, inline `<style>` blocks from all pages

---

## v0.5.0 — 2026-06-07

### Changed
- All PHP pages rewritten to use the ipage article layout: `.pageContainer` / `article.entry.entryTypePost` / `.entryHeader` / `.entryContent`
- Discord download URL updated from `discordapp.com` to `discord.com`
- External guide links updated with `rel="noopener"`

### Removed
- Bootstrap scrollspy, colored sections, and inline `<style>` blocks from all pages

---

## v0.4.0 — 2026-06-07

### Added
- `css/site.css` — full ipage 3-column layout CSS (fixed header, off-canvas sidebars, article styles)
- `js/site.js` — mobile sidebar toggles, overlay, sub-menu expand, scroll-to-top
- `PRD.md` — Product Requirements Document
- `Design.md` — Design specification
- `TRD.md` — Technical Requirements Document

### Changed
- `includes/header.php` rewritten with ipage layout (fixed header, hamburger buttons, left sidebar nav, overlay)
- `includes/footer.php` rewritten with right aside, widgets, scroll-to-top button, JS loading
- `ipage Migration/` directory renamed to `ipage/`

---

## v0.3.0 — 2026-06-06

### Added
- `README.md` with two sections: Website Overview (all files documented) and About Clan B5TA (clan summary)

---

## v0.2.0 — 2017-07-01

### Added
- Fixed responsive navbar with Home, Discord, Guides dropdown, Flip Chart, Contact, Log In
- Blue header banner with B5TA clan logo
- Scrollspy sidebar linking to five homepage content sections
- Semi-transparent navbar that becomes opaque on hover
- Mobile responsive support

### Changed
- `index.php` overhauled with expanded layout

---

## v0.1.0 — 2017-05-23

### Added
- `README.md` and `LICENSE` (MIT)
- `index.php` as main entry point
- Bootstrap 3 framework
- jQuery library
- Bootstrap JS plugins
- `dropdown.js`, `externalscript.js`, `destroyvid.js`
- Bootstrap Glyphicons web fonts
- `img/b5talogo.png`, `img/discord.jpg`
