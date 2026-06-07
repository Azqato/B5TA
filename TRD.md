# Technical Requirements Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Status:** Complete

---

## 1. Overview

This document defines the technical implementation of the B5TA website. The site has been migrated from a Bootstrap shell (`index.php`) to a static HTML implementation based on the ipage design. All pages are served via GitHub Pages — no PHP server required.

---

## 2. Tech Stack

| Layer | Technology | Notes |
|---|---|---|
| Markup | HTML5 | Semantic structure per ipage conventions |
| Styling | CSS3 | Bootstrap 3 base + `css/site.css` (ipage layout) |
| Interactivity | JavaScript / jQuery | Mobile nav toggle, sub-menu, scroll-to-top |
| Framework | Bootstrap 3 | Grid, components, responsive breakpoints |
| Backend | None | Static HTML — no server-side processing |
| Hosting | GitHub Pages | Served from `master` branch root |

---

## 3. File Structure

```
B5TA/
│
├── index.html                   ← Homepage
├── about.html                   ← About page
├── discord.html                 ← Discord page
├── guides.html                  ← Guides index
├── guides-bossing.html          ← Bossing guides
├── guides-money-making.html     ← Money Making guides
├── guides-quests.html           ← Quest guides
├── guides-skilling.html         ← Skilling guides
├── flip-chart.html              ← Flip Chart
│
├── css/
│   ├── site.css                 ← ipage layout CSS (custom, replaces WordPress 73795.css)
│   └── bootstrap.css
│
├── js/
│   ├── site.js                  ← mobile nav/aside toggle (custom)
│   ├── jquery.min.js
│   ├── bootstrap.js
│   └── externalscript.js
│
├── img/                       ← Logo/image assets (0jK9PZV.png, clan.png, favicon.png, wfbCHon.gif, etc.)
├── fonts/                       ← Bootstrap Glyphicons
│
├── .nojekyll                    ← Disables GitHub Pages Jekyll processing
├── MVP.docx
├── Screenshot.JPG
├── ReadMe.md
├── PRD.md
├── Design.md
├── TRD.md
└── PatchNotes.md
```

---

## 4. Static HTML Architecture

All pages are complete, self-contained HTML files. Header and footer markup is inlined directly — there is no server-side templating.

### Page Structure

Every page follows this pattern:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <title>B5TA | [Page Name]</title>
  <!-- meta, CSS, JS -->
</head>
<body>

  <!-- Fixed header with logo -->
  <header class="headerMain">...</header>

  <!-- Mobile hamburger buttons -->
  <div class="navMenuButton" id="navMenuButton">...</div>
  <div class="asideMenuButton" id="asideMenuButton">...</div>

  <!-- Left sidebar navigation (active item hardcoded per page) -->
  <div class="primary-menu" id="primaryMenu">...</div>

  <!-- Mobile overlay -->
  <div class="site-overlay" id="siteOverlay"></div>

  <!-- Main content wrapper -->
  <div class="container-fluid">
    <div class="meta clearfix"><!-- search bar --></div>

    <!-- Page content -->
    <div class="pageContainer">
      <article class="entry entryTypePost">
        <header class="entryHeader"><h1 class="entryTitle">...</h1></header>
        <div class="entryContent">...</div>
      </article>
    </div>

    <!-- Footer inside container -->
    <footer class="site-footer">...</footer>
  </div>

  <!-- Right aside (active item hardcoded per page) -->
  <aside class="site-aside" id="siteAside">...</aside>

  <!-- Scroll-to-top button -->
  <a href="#" id="scrollTop">↑</a>

  <script src="js/site.js"></script>
  <script src="js/externalscript.js"></script>
</body>
</html>
```

### Active State (nav and aside)

Per-page active items are hardcoded with `current-menu-item current_page_item` (nav) and `current_page_item` (aside). No server-side variable needed.

| Page | Nav active | Aside active |
|---|---|---|
| `index.html` | Home | Home |
| `about.html` | About | About |
| `discord.html` | Discord | Discord |
| `guides.html` + all guide sub-pages | Guides | Guides |

Nav (left sidebar) items: Home, About, Discord, Guides ▸ (Bossing / Money Making / Quests / Skilling), Official Clan Page, RunePixels, Support, Merchandise

Aside (right sidebar) Pages widget: Home, About, Discord, Guides

---

## 5. CSS Architecture

### Load Order

```html
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/site.css">   <!-- loads after Bootstrap, overrides where needed -->
```

### `css/site.css` — Key Sections

| Section | Key Selectors |
|---|---|
| Header | `.headerMain`, `.header-content`, `#logo`, `.logo-img`, `.blog-description` |
| Meta bar | `.meta`, `.meta-search-form` |
| Left nav hamburger | `.navMenuButton` |
| Right aside hamburger | `.asideMenuButton` |
| Left sidebar | `.primary-menu`, `.primary-menu-container`, `.main-menu`, `.nav-container` |
| Active nav state | `.current-menu-item`, `.current_page_item` |
| Sub-menu | `.sub-menu`, `.menu-item-has-children`, `.sub-open` |
| Page content | `.pageContainer`, `.entry`, `.entryHeader`, `.entryTitle`, `.entryContent` |
| Right aside | `aside.site-aside`, `.aside-container`, `.dynamicSidebar`, `.widget`, `.widgetTitle` |
| Footer | `footer.site-footer`, `.copyright` |
| Overlay | `.site-overlay`, `.is-visible` |
| Desktop 3-column | `@media (min-width: 1200px)` — removes transitions, shows both sidebars |

---

## 6. JavaScript Architecture

### `js/site.js`

jQuery-based. Loaded before `</body>`.

| Feature | Implementation |
|---|---|
| Left nav toggle | `#navMenuButton` click → `.primary-menu.is-open`, overlay |
| Right aside toggle | `#asideMenuButton` click → `aside.site-aside.is-open`, overlay |
| Sub-menu | `.menu-item-has-children > a` click → `.sub-open` (mobile only) |
| Overlay close | `#siteOverlay` click → removes all `.is-open` / `.is-visible` |
| Outside-click close | `$(document)` click → closes any open panel |
| Scroll-to-top | `$(window).scroll` → shows/hides `#scrollTop`; click → animate to top |

### JS Load Order

In `<head>` (Bootstrap requires jQuery before DOM ready):

```html
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
```

Before `</body>`:

```html
<script src="js/site.js"></script>
<script src="js/externalscript.js"></script>
```

---

## 7. GitHub Pages Deployment

### Setup

1. Push to `master` branch at `github.com/Azqato/B5TA`
2. In GitHub repo Settings → Pages → set Source to `master` branch, `/ (root)`
3. Site serves at `azqato.github.io/B5TA/`

### `.nojekyll`

An empty `.nojekyll` file at the repo root disables GitHub Pages' Jekyll processing. Without it, Jekyll may ignore files and directories starting with `_` and could interfere with Bootstrap's `fonts/` directory.

### Relative Paths

All asset references use relative paths (e.g., `css/site.css`, `img/0jK9PZV.png`) so the site works both locally and when served from `azqato.github.io/B5TA/`.

---

## 8. Migration Execution Summary

All steps from the original plan are complete:

| Step | Status |
|---|---|
| Extract CSS from `73795.css` → `css/site.css` | ✅ Done |
| Create `js/site.js` — mobile nav toggle | ✅ Done |
| Build ipage 3-column layout | ✅ Done |
| Write all page HTML files (index, about, discord, guides, 4 stubs) | ✅ Done |
| Inline header/footer into every page | ✅ Done |
| Convert `.php` → `.html` | ✅ Done |
| Remove PHP files and `includes/` directory | ✅ Done |
| Add `.nojekyll` for GitHub Pages | ✅ Done |
| Update all documentation | ✅ Done |
| Commit and push to GitHub | ✅ Done |

---

## 9. Known Issues / Future Work

| Item | Priority | Notes |
|---|---|---|
| Discord invite URL | Resolved | `https://discord.gg/0qfZioFZLSnmWMs7` — confirmed permanent |
| Guide sub-pages are stubs | Medium | Fill in content as clan members contribute |
| Flip Chart page | Resolved | `flip-chart.html` stub created with link to community Flipping Guide |
| Search bar is decorative | Low | Static site can't process search queries |
| Duplicate maintenance across HTML files | Low | Any nav change requires updating all 8 files |

---

## 10. Risks and Notes

| Risk | Status |
|---|---|
| WordPress-specific CSS conflict | Resolved — `css/site.css` replaces `73795.css` entirely |
| Discord invite URL expired | Open — placeholder kept; needs update |
| Mobile nav toggle not working | Resolved — jQuery `.is-open` approach tested and implemented |
| GitHub Pages won't run PHP | Resolved — converted to static HTML |
