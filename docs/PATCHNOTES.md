# Patch Notes

All versions follow semantic versioning (MAJOR.MINOR.PATCH).  
Sections per entry: **Added**, **Changed**, **Fixed**, **Removed**.

---

## v2.1.0 - 2026-08-25

Second full documentation audit. The codebase was scanned in its entirety before any
document was opened, every document in `/docs` was read in full, and each was
compared against the code. Documentation was consolidated from ten files into three,
plus the root README. No site behaviour changed; the only non-documentation edits
were punctuation fixes required by the writing style rule adopted in this release.

### Added
- Writing Style section in `docs/PRD.md` recording the project's prose rule for
  documentation, UI copy, and code comments. The rule prohibits em dashes in all
  three forms (the Unicode character, the `&mdash;` entity, and a double hyphen used
  as punctuation) and permits the single hyphen. This is a newly adopted default;
  the project previously stated no prose rule.
- Browser Testing section in `docs/PRD.md`. Microsoft Edge is the browser to drive
  for any automated or ad hoc headless testing, never Chrome. The resolved Edge
  binary path on the maintenance machine is recorded in the Runbook section. This is
  a newly adopted default; the project previously stated no rule.
- Deprecation and Removal section in `docs/PRD.md`, including an item-by-item list of
  the site's public surface, the deploy-boundary rule for deciding whether a removal
  needs a redirect, a statement that the project has no redirect mechanism and what
  it does instead, and a Retired Items table. This is a newly adopted default; the
  project previously stated no removal rule, though the v1.5.0 handling of
  `flip-chart.html` was consistent with it.
- Documentation Versus Reality table in `docs/PRD.md` recording sixteen discrepancies
  found between the documentation and the code, each with a note on which source was
  trusted and why. Resolved entries are retained rather than deleted.
- Risks and Open Questions section in `docs/PRD.md`, including eight numbered open
  questions for the author and an inventory of fragile areas.
- Working Practice section in `docs/PRD.md` giving a table that maps each kind of
  change to the file to open first, a list of things never to do in this repository
  with reasons attached, and the verification steps for a change.
- Conventions section in `docs/PRD.md` derived from the code and the git history
  rather than from any style guide, covering naming, formatting, organisation,
  comment density, error handling, and commit message style.
- Imagery and Media section in `docs/DESIGN.md` recording that `img/` holds 40 files
  totalling ~9.1 MB of which four are referenced, with the size of each referenced
  file and rules for adding new ones.
- z-index layer table in `docs/DESIGN.md`. Five stacking layers exist and no comment
  in the CSS explained them.
- Measured contrast ratios in `docs/DESIGN.md` for every text and icon colour against
  the background it renders on, replacing a table that measured two colours.
- "What an AI Model Should Know Before Changing the Design" section in
  `docs/DESIGN.md`.

### Changed
- `README.md` rewritten for a general reader. It now describes what the site is, what
  each section offers, who it is for, and its status. All install steps, commands,
  ports, tech stack tables, and version numbers were moved into `docs/PRD.md`.
- `docs/PRD.md` rewritten and expanded from a requirements document into the single
  technical and product reference for the project, absorbing the content of the seven
  documents removed below.
- `docs/DESIGN.md` expanded from 17 colour tokens to the complete palette, with
  missing tokens added (`#dddddd`, `#777777`, `#555555`, `#383838`, `#f7f7f7`,
  `#ebebeb`, `#999999`, `#333333` hover, `#666666` hover) and each mapped to where it
  is actually used.
- `docs/DESIGN.md` accessibility section corrected. The link contrast ratio was
  recorded as 3.87:1; recomputation gives approximately 3.80:1. Both readings fail
  WCAG AA for normal text, so the original conclusion stands. The keyboard
  navigation row was changed from "not tested" to a confirmed failure: both
  hamburger toggles are `<div>` elements with click-only handlers and cannot be
  reached by keyboard.
- `docs/DESIGN.md` breakpoint section now records that the 768px to 1199px media
  query duplicates the base rule and changes nothing, and that the 1200px threshold
  is hardcoded in both `css/site.css` and `js/site.js` with no shared constant.
- Em dashes replaced throughout `docs/PATCHNOTES.md` (47 instances) under the writing
  style rule adopted in this release. Version heading dates now use a single hyphen;
  descriptive dashes became colons. No historical fact was altered.

### Fixed
- Em dashes removed from six HTML files and one CSS file, 13 instances in total, none
  of which changed rendering or behaviour: `flip-chart.html` (1), `guides.html` (1),
  `guides-bossing.html` (2), `guides-money-making.html` (1), `guides-quests.html` (1),
  `guides-skilling.html` (2), and `css/site.css` (5, all in section-header comments).
  Prose instances became colons, semicolons, or parentheses; heading and comment
  instances became single hyphens.
- Documentation claim that `js/externalscript.js` is a placeholder with no active
  behaviours. It is not a placeholder: it contains four jQuery handlers bound to
  `.tutorials-div`, `.review-div`, `.impression-div`, and `#Top`, none of which exist
  in any page. It is dead code, and it is now documented as such.
- Documentation claim that the site is live at `b5ta.com`. No CNAME file exists in
  this repository, and `guides.html` links to `https://b5ta.com/new-member-guide/`,
  a WordPress-style path this repository does not serve. The author confirmed during
  the audit that the domain does not point here yet and that the cutover is planned
  for later, so the v2.0.0 documents were stating an intention as a fact. Every
  reference now gives `azqato.github.io/B5TA/` as the live address and `b5ta.com` as
  planned. Open question Q1 is marked answered; Q8 stays open as a v2.6 dependency.
- Documentation claim that total page weight is under 500 KB. Measured homepage
  weight is approximately 1.4 MB and the Discord page is approximately 2.9 MB, driven
  by an 891 KB logo, a 144 KB favicon, and a 1.5 MB GIF. The target was retained as
  a target and the measured figures recorded alongside it.
- Setup instructions recommending `npx serve`. Node.js is not installed on the
  maintenance machine. Python 3.14.3 is present and `python -m http.server` is now
  documented as the primary method, with the Node option marked as conditional.

- Roadmap milestone v2.6, the custom domain cutover to `b5ta.com`, in `docs/PRD.md`.
  The author confirmed on 2026-08-25 that the domain does not point at this
  repository yet and that pointing it here is planned for later. The milestone
  records the GitHub Pages and DNS steps, the HTTPS enforcement wait, and the
  blocking dependency: four pages link to `https://b5ta.com/new-member-guide/`, a
  path this repository does not serve, so those links break on the day the domain
  moves unless the guide is built here or the links are repointed first.

### Removed
- `docs/TRD.md`, merged into the Technical Requirements section of `docs/PRD.md`
- `docs/RUNBOOK.md`, merged into the Runbook section of `docs/PRD.md`
- `docs/SECURITY.md`, merged into the Security section of `docs/PRD.md`
- `docs/METRICS.md`, merged into the Metrics section of `docs/PRD.md`
- `docs/ROADMAP.md`, merged into the Roadmap section of `docs/PRD.md`
- `docs/TENETS.md`, merged into the Tenets section of `docs/PRD.md`
- `docs/PRFAQ.md`, merged into the Press Release and Frequently Asked Questions
  sections of `docs/PRD.md`

All seven were deleted outright rather than left as stub files. Under the removal
policy adopted in this release they are internal source, not public surface: nothing
links to them, no page imports them, and no published address depends on them. See
Deprecation and Removal in `docs/PRD.md`.

---

## v2.0.0 - 2026-06-08

### Added
- `/docs/` directory containing all project documentation
- `docs/PRD.md`: product requirements, user stories, goals, non-goals, constraints, success criteria
- `docs/TRD.md`: technical architecture, tech stack with versions, internal data flow, state management, known debt
- `docs/DESIGN.md`: full design system covering color palette, typography, spacing, breakpoints, component patterns, accessibility, animation
- `docs/PATCHNOTES.md`: version history in semantic versioning format (this file)
- `docs/PRFAQ.md`: press release and internal/external FAQ
- `docs/TENETS.md`: product and design principles
- `docs/METRICS.md`: north star, acquisition, engagement, retention, and performance metrics
- `docs/ROADMAP.md`: milestone plan and deferred features
- `docs/SECURITY.md`: security posture, data handling, dependency policy
- `docs/RUNBOOK.md`: local setup, deploy, rollback, common errors, monitoring

### Changed
- `README.md` rewritten as a developer reference: tech stack with versions, prerequisites, installation, local dev commands, env vars, build, deploy, and docs index
- `PRD.md`, `TRD.md`, `Design.md`, `PatchNotes.md` moved from repository root into `/docs/` and renamed to uppercase

### Removed
- `PRD.md` from repository root (moved to `docs/PRD.md`)
- `TRD.md` from repository root (moved to `docs/TRD.md`)
- `Design.md` from repository root (moved to `docs/DESIGN.md`)
- `PatchNotes.md` from repository root (moved to `docs/PATCHNOTES.md`)

---

## v1.9.0 - 2026-06-08

### Added
- v1.9.0 patch note entry

### Changed
- `ReadMe.md` rewritten as comprehensive GitHub reference: clan description, website purpose and audience table, all pages with descriptions, layout diagram, tech stack, repo structure, local dev instructions, deployment details, docs index, and future work backlog
- `Design.md` layout diagram updated to remove the `.meta` search bar row (removed from site in v1.5.0); left nav markup example updated to include all current items
- `PRD.md` guide category pages status updated from Stub to Complete; Flip Chart status clarified; nav table updated with current items (Support added, Flip Chart removed, divider noted)
- `TRD.md` guide sub-pages known issue marked resolved; nav items list updated

---

## v1.8.0 - 2026-06-07

### Fixed
- Extra top margin on the first child element inside `.entryContent`. Pages whose content began directly with `h2` had a larger visual gap than pages using `.entryHeader`. Added `.entryContent > *:first-child { margin-top: 0; }` to `css/site.css`

---

## v1.7.0 - 2026-06-07

### Fixed
- Content rendering under the fixed header after search bar removal in v1.5.0. Added `margin-top: 113px` to `.container-fluid` in `css/site.css` (100px header + ~13px gap)

### Removed
- Unused `.meta` left/right margin rule from the desktop 1200px+ media query in `css/site.css`

---

## v1.6.0 - 2026-06-07

### Added
- Support link to right aside External Links widget on all 9 pages (above Merchandise), linking to `https://azqato.github.io/support.html`

---

## v1.5.0 - 2026-06-07

### Added
- Support link to left nav on all 9 pages (above Merchandise), linking to `https://azqato.github.io/support.html`

### Removed
- Flip Chart from left nav and right aside Pages widget on all 9 pages (page `flip-chart.html` preserved)
- Search bar (`.meta.clearfix` block) from all 9 pages: search was non-functional

---

## v1.4.0 - 2026-06-07

### Added
- Restored `Design/` assets (17 files: header/footer/sidebar images, sprites, banners, branding)
- Restored `Gameplay/` assets (7 files: in-game screenshots)
- Moved all `Logos/` files (14 files) into `img/`
- Moved all `images/` files into `img/`

### Changed
- All HTML page references updated from `Logos/` to `img/`
- `img/` now contains ~40 files: all project image assets consolidated

---

## v1.3.0 - 2026-06-07

### Removed
- `ipage/` directory (4 WordPress archive HTML pages and associated `*_files/` directories; ~120 files total)
- `wfbCHon.gif` moved to `img/` before directory removal
- `MVP.docx` and `Screenshot.JPG` moved to repository root
- Stale CSS files unreferenced by any page: `bootstrap-theme.css`, `bootstrap.min.css`, `dropdownhover.css`, `dropdownmenu.css`, `externalstyle.css`, and associated map files
- Stale JS files unreferenced by any page: `bootstrap.min.js`, `jquery.js`, `npm.js`, `destroyvid.js`

---

## v1.2.0 - 2026-06-07

### Added
- Real content to all four guide category pages (previously "coming soon" stubs):
  - `guides-bossing.html`: bossing intro, conduct rules, Dark Beasts Guide link, New Member Guide link
  - `guides-money-making.html`: GP/day intro, GE flipping section, Flip Chart link, Flipping Guide, Free Runecoins Guide
  - `guides-quests.html`: quest tips, "How To Not Be A N00B" guide, New Member Guide link
  - `guides-skilling.html`: skilling intro, Clan Citadel capping section, leveling tips, New Member Guide link

---

## v1.1.0 - 2026-06-07

### Added
- `flip-chart.html`: Flip Chart page (was referenced in nav but missing)

### Changed
- All Flip Chart nav `href="#"` placeholders updated to `href="flip-chart.html"` across all 8 existing pages
- Runeclan links replaced with RunePixels across all 8 pages: `runeclan.com/clan/B5TA` → `runepixels.com/clans/b5ta/about`; label changed from "Runeclan" to "RunePixels"

---

## v1.0.0 - 2026-06-07

### Added
- `index.html`: Homepage with welcome, RuneScape, League of Legends, Summoners War, and Minecraft sections
- `about.html`: About page with 8-item founding/rules/conduct list
- `discord.html`: Discord page with download and invite links plus animated banner
- `guides.html`: Guides index with category links and community guide links
- `guides-bossing.html`, `guides-money-making.html`, `guides-quests.html`, `guides-skilling.html`: Guide category stubs
- `.nojekyll`: Disables GitHub Pages Jekyll processing

### Changed
- All active nav states converted from PHP `$activePage` variable to hardcoded `current-menu-item current_page_item` classes per file

### Removed
- `index.php`, `about.php`, `discord.php`, `guides.php` and all guide `.php` files: replaced by static HTML equivalents
- `includes/header.php`, `includes/footer.php`: inlined into each HTML page
- Scrollspy markup, Bootstrap colored sections, inline `<style>` blocks from all pages

---

## v0.5.0 - 2026-06-07

### Changed
- All PHP pages rewritten to use the ipage article layout: `.pageContainer` / `article.entry.entryTypePost` / `.entryHeader` / `.entryContent`
- Discord download URL updated from `discordapp.com` to `discord.com`
- External guide links updated with `rel="noopener"`

### Removed
- Bootstrap scrollspy, colored sections, and inline `<style>` blocks from all pages

---

## v0.4.0 - 2026-06-07

### Added
- `css/site.css`: full ipage 3-column layout CSS (fixed header, off-canvas sidebars, article styles)
- `js/site.js`: mobile sidebar toggles, overlay, sub-menu expand, scroll-to-top
- `PRD.md`: Product Requirements Document
- `Design.md`: Design specification
- `TRD.md`: Technical Requirements Document

### Changed
- `includes/header.php` rewritten with ipage layout (fixed header, hamburger buttons, left sidebar nav, overlay)
- `includes/footer.php` rewritten with right aside, widgets, scroll-to-top button, JS loading
- `ipage Migration/` directory renamed to `ipage/`

---

## v0.3.0 - 2026-06-06

### Added
- `README.md` with two sections: Website Overview (all files documented) and About Clan B5TA (clan summary)

---

## v0.2.0 - 2017-07-01

### Added
- Fixed responsive navbar with Home, Discord, Guides dropdown, Flip Chart, Contact, Log In
- Blue header banner with B5TA clan logo
- Scrollspy sidebar linking to five homepage content sections
- Semi-transparent navbar that becomes opaque on hover
- Mobile responsive support

### Changed
- `index.php` overhauled with expanded layout

---

## v0.1.0 - 2017-05-23

### Added
- `README.md` and `LICENSE` (MIT)
- `index.php` as main entry point
- Bootstrap 3 framework
- jQuery library
- Bootstrap JS plugins
- `dropdown.js`, `externalscript.js`, `destroyvid.js`
- Bootstrap Glyphicons web fonts
- `img/b5talogo.png`, `img/discord.jpg`
