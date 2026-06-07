# Patch Notes

---

## v0.5 — 2026-06-07

### ipage Migration — Execution Complete

All pages have been rewritten to use the ipage article layout (`pageContainer` / `entry entryTypePost` / `entryHeader` / `entryContent`). The old Bootstrap scrollspy, coloured sections, inline `<style>` blocks, and `container page-content` wrappers have been removed from every page.

#### Pages Rewritten

- **`index.php`** — Removed `$scrollspy`, inline `<style>`, scrollspy nav, Bootstrap grid wrappers, and 5 coloured `<div id="...">` sections. All homepage content from `ipage/homepage.html` preserved inside `.entryContent`. Welcome h2 with `clan.png` float-right, RuneScape/LoL/SW/Minecraft sections.
- **`about.php`** — Rewritten with `.pageContainer` / `entryHeader` / `entryContent`. 8-item `<ul>` about founding, rules, promotion, conduct preserved. "Join our Discord" link replaces Bootstrap button.
- **`discord.php`** — Rewritten with article layout. Updated Discord download URL to `discord.com/download`. `wfbCHon.gif` preserved. Discord invite link preserved pending update.
- **`guides.php`** — Rewritten with article layout. Category links and community guide links preserved with `rel="noopener"`.
- **`guides-bossing.php`** — Updated to article layout.
- **`guides-money-making.php`** — Updated to article layout.
- **`guides-quests.php`** — Updated to article layout.
- **`guides-skilling.php`** — Updated to article layout.

### Migration Status

The full ipage 3-column layout is now live across all pages:
- Fixed 100px header with logo banner (`Logos/0jK9PZV.png`)
- Left sidebar nav (off-canvas mobile / always-on 1200px+)
- Right aside with Pages and External Links widgets (off-canvas mobile / always-on 1200px+)
- All content in `pageContainer` / article structure matching ipage design

### Next Steps

- Test site on a PHP server (XAMPP / WAMP)
- Update Discord invite URL in `discord.php` and `includes/header.php` once current link is confirmed
- Commit and push all changes to GitHub

---

## v0.4 — 2026-06-07

### Migration Planning

- Analyzed `ipage/` archive (4 HTML saves of the original b5ta.com WordPress site) and documented full structure, layout, and content
- Rewrote `ReadMe.md` to reflect both the ipage design target and the current Bootstrap shell, with a clear migration status table, full repository structure, and asset inventory
- Created `PRD.md` — Product Requirements Document covering all target pages, user types, navigation requirements, non-functional requirements, and open questions
- Created `Design.md` — Design specification documenting the ipage layout (3-column header/sidebar/content/aside), HTML markup patterns, color palette, typography, asset reference, CSS extraction strategy, and responsive breakpoints
- Created `TRD.md` — Technical Requirements Document covering file structure, PHP include architecture, CSS extraction plan, JavaScript changes, page-by-page implementation steps, deployment options, and ordered migration execution steps

### Files Created (Draft — pending migration rewrite)

- `about.php` — About page with ipage content
- `discord.php` — Discord invite page with ipage content
- `guides.php` — Guides index with ipage community guide links
- `guides-bossing.php`, `guides-money-making.php`, `guides-quests.php`, `guides-skilling.php` — Category stubs
- `includes/header.php` — Shared Bootstrap-based header + navbar (draft, to be rewritten per TRD)
- `includes/footer.php` — Shared footer (draft, to be rewritten per TRD)

### `index.php` Changes (Draft — to be rewritten)

- Replaced 5 placeholder Bootstrap sections with real homepage content from `ipage/homepage.html`
- Renamed scroll sections: welcome, runescape, games, discord, about
- Connected scrollspy sidebar labels to new section IDs
- Added `Logos/clan.png` to welcome section

### Next Step

Execute the migration plan defined in `TRD.md` §9: extract ipage CSS into `css/site.css`, rebuild `includes/header.php` and `includes/footer.php` with the ipage 3-column layout, and rewrite all pages to use the ipage article structure. ipage design takes full priority.

---

## v0.3 — 2026-06-06

### Documentation

- Rewrote `README.md` with two clearly separated sections
- **Website Overview** section now accurately documents every file in the repository (JS, CSS, images, fonts) based directly on source code
- **About Clan B5TA** section added as a standalone informational summary of the clan — covering its founding, core activities, community values, Twitch streaming network, and membership system
- Added live site link to [azqato.github.io/b5ta-website](https://azqato.github.io/b5ta-website) at the top of the README

---

## v0.2 — 2017-07-01

### Homepage

- Overhauled `index.php` with an expanded and restructured layout
- Added fixed responsive navbar with Home, Discord, Guides dropdown (Bossing, Money Making, Quests, Skilling), Flip Chart, Contact, and Log In links
- Added blue header banner displaying the B5TA clan logo
- Added scrollspy sidebar with links to five content sections
- Added semi-transparent navbar that becomes fully opaque on hover
- Added responsive mobile support — dropdown hover disabled and carets hidden on screens under 767px

---

## v0.1 — 2017-05-23

### Initial Release

- Initial project setup with `README.md` and `LICENSE` (MIT)
- Added `index.php` as the main entry point
- Added Bootstrap 3 framework (`bootstrap.css`, `bootstrap.min.css`, `bootstrap-theme.css`)
- Added `dropdownhover.css` and `dropdownmenu.css` for navbar dropdown styling
- Added `externalstyle.css` for custom site styles including navbar opacity, tab panels, and responsive breakpoints
- Added jQuery library (`jquery.js`, `jquery.min.js`)
- Added Bootstrap JS plugins (`bootstrap.js`, `bootstrap.min.js`)
- Added `dropdown.js` for hover-activated dropdown behavior
- Added `externalscript.js` for tab switching (Tutorials, Reviews, Impressions) and scroll-to-top
- Added `destroyvid.js` to stop and reset up to 14 embedded YouTube players on modal close
- Added `npm.js` as Bootstrap's npm entry point
- Added Glyphicons web fonts (`.eot`, `.woff`, `.woff2`, `.ttf`, `.svg`)
- Added `images/b5talogo.png` and `images/discord.jpg`
