# Technical Requirements Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Status:** Planning — execution pending

---

## 1. Overview

This document defines the technical implementation plan for migrating the B5TA website from the Bootstrap shell (`index.php`) to the ipage-based design. The ipage structure and content take priority. Bootstrap 3 + jQuery remain the frontend framework.

---

## 2. Tech Stack

| Layer | Technology | Notes |
|---|---|---|
| Markup | HTML5 | Semantic structure per ipage conventions |
| Styling | CSS3 | Bootstrap 3 base + `css/site.css` (ipage layout extraction) |
| Interactivity | JavaScript / jQuery | Mobile nav toggle, dropdown hover |
| Framework | Bootstrap 3 | Grid, components, responsive breakpoints |
| Backend | PHP | `include` for shared header/footer; no database required |
| Deployment options | PHP server (b5ta.com) or static HTML (GitHub Pages) | See §8 |

---

## 3. File Structure (Target)

```
B5TA/
│
├── index.php                    ← Homepage
├── about.php                    ← About page
├── discord.php                  ← Discord page
├── guides.php                   ← Guides index
├── guides-bossing.php           ← Bossing stub
├── guides-money-making.php      ← Money Making stub
├── guides-quests.php            ← Quests stub
├── guides-skilling.php          ← Skilling stub
│
├── includes/
│   ├── header.php               ← Shared: <html> through end of left sidebar nav
│   └── footer.php               ← Shared: right aside + footer + </body></html>
│
├── css/
│   ├── site.css                 ← NEW: ipage layout CSS (extracted from 73795.css)
│   ├── bootstrap.css
│   ├── bootstrap.min.css
│   ├── bootstrap-theme.css
│   ├── bootstrap-theme.min.css
│   ├── dropdownhover.css
│   ├── dropdownmenu.css
│   └── externalstyle.css
│
├── js/
│   ├── jquery.min.js
│   ├── bootstrap.js
│   ├── bootstrap.min.js
│   ├── dropdown.js
│   ├── externalscript.js
│   ├── destroyvid.js
│   └── site.js                  ← NEW: mobile nav toggle for ipage sidebar
│
├── images/
│   ├── discord.jpg
│   └── [others]
│
├── Logos/                        ← Logo variants (0jK9PZV.png, clan.png, favicon, etc.)
├── Design/                       ← Design assets
├── Gameplay/                     ← Gameplay media
├── fonts/                        ← Glyphicons
│
└── ipage/                        ← Archive — reference only, not served
```

---

## 4. PHP Include Architecture

All pages follow this pattern:

```php
<?php
$pageTitle  = 'B5TA | Page Name';
$activePage = 'page-key';           // matches nav item key
include 'includes/header.php';
?>

<!-- page-specific content here -->

<?php include 'includes/footer.php'; ?>
```

### `includes/header.php` covers:
- `<!DOCTYPE html>` through `<body>`
- `<head>`: title, meta, CSS links, JS links
- `<header class="headerMain">` — logo + tagline
- `.meta.clearfix` — search bar
- `.navMenuButton` — mobile hamburger
- `.primary-menu.primary-menu-side` — left sidebar nav
  - Active item set via `$activePage` PHP variable
- Opening `<div class="container-fluid"><div class="row">`

### `includes/footer.php` covers:
- `.asideMenuButton` — mobile aside hamburger
- `<aside>` — right sidebar with Pages widget
- Closing `</div></div>` (container/row)
- `<footer>` — copyright line
- JS that must load at bottom (`site.js`, `externalscript.js`)
- `</body></html>`

### PHP Variables

| Variable | Type | Purpose |
|---|---|---|
| `$pageTitle` | string | `<title>` tag content |
| `$activePage` | string | Sets `current-menu-item` class on matching nav `<li>` |

---

## 5. CSS Plan

### 5.1 New file: `css/site.css`

Extract the following from `ipage/homepage_files/73795.css` and `ipage/homepage_files/styles.css`:

**Sections to extract:**

```
/* Header */
.headerMain, .header-content, #logo, .logo-img, .blog-description

/* Sidebar nav */
.primary-menu, .primary-menu-side, .primary-menu-container,
.nav-container, .main-menu, .main-menu li, .main-menu a,
.menu-item, .current-menu-item, .current_page_item

/* Mobile nav toggle */
.navMenuButton, .navMenuButtonTitle, .navMenuButtonContent,
.asideMenuButton, .asideMenuButtonTitle, .asideMenuButtonContent

/* Page container / article */
.pageContainer, .entry, .entryTypePost, .entryHeader,
.entryTitle, .entryContent, .entryMeta

/* Aside */
.aside-container, .customSidebar, .dynamicSidebar,
.sidebarContent, .widget, .widgetTitle

/* Footer */
footer.container-fluid, .content.clearfix, .copyright

/* Meta / search */
.meta.clearfix, .meta-search-form, .search-form,
.search-field, .search-submit
```

**Rules to override / remove from Bootstrap shell (`externalstyle.css` or inline):**
- `.head-format` (blue header — replaced by `.headerMain`)
- `.logo` (height: 100% — replaced by `.logo-img`)
- `.affix` + `.affix + .container-fluid` (scrollspy affix — removed)
- `#section1` through `#section5` (colored section backgrounds — removed)
- `ul.nav-pills` margin (scrollspy sidebar — removed)
- `.container-fluid` zero-padding (keep if still needed, review)

### 5.2 Load order in `<head>`

```html
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/dropdownhover.css">
<link rel="stylesheet" href="css/site.css">        ← ipage layout, loads after Bootstrap
```

---

## 6. JavaScript Plan

### 6.1 Existing scripts to keep

| Script | Keep | Reason |
|---|---|---|
| `jquery.min.js` | Yes | Required by Bootstrap + custom scripts |
| `bootstrap.js` | Yes | Collapse, dropdown, affix components |
| `dropdown.js` | Yes | Hover dropdown behavior on Guides nav item |
| `externalscript.js` | Yes | Scroll-to-top; keep for future tab use |
| `destroyvid.js` | Yes | Future YouTube embeds |
| `jquery.js` (non-min) | Remove | Duplicate of `jquery.min.js` |
| `npm.js` | Remove | Not needed outside a build pipeline |

### 6.2 New file: `js/site.js`

Mobile sidebar toggle for the ipage `.navMenuButton` / `.asideMenuButton` pattern.

```javascript
$(document).ready(function() {
  $('.navMenuButton').on('click', function() {
    $('.primary-menu').toggleClass('open');
  });
  $('.asideMenuButton').on('click', function() {
    $('aside').toggleClass('open');
  });
});
```

### 6.3 Load order

JS in `<head>` (required for Bootstrap affix/collapse to initialize before scroll):

```html
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/dropdown.js"></script>
```

JS before `</body>` (non-blocking):

```html
<script src="js/site.js"></script>
<script src="js/externalscript.js"></script>
```

---

## 7. Page-by-Page Implementation

### 7.1 `index.php` (Homepage)

**Content source:** `ipage/homepage.html` — `<div class="entryContent">` block

**Steps:**
1. Set `$pageTitle = 'B5TA | Home'`, `$activePage = 'home'`
2. Include `includes/header.php`
3. Render `<article class="entry entryTypePost">` with:
   - `<h1 class="entryTitle">` (blank — homepage has no visible title in ipage)
   - `<div class="entryContent">` containing the homepage content
4. Image: `<img src="Logos/clan.png">` float right
5. Discord link → `discord.php`
6. Include `includes/footer.php`

**Remove from current `index.php`:**
- Scrollspy `data-spy` attributes
- Section IDs (`#welcome`, `#runescape`, etc.)
- Colored `<div>` section backgrounds
- Left scrollspy nav panel

---

### 7.2 `about.php`

**Content source:** `ipage/about.html` — `<div class="entryContent">` block

**Steps:**
1. `$pageTitle = 'B5TA | About'`, `$activePage = 'about'`
2. Include header
3. Article with title "About" + `<ul>` content from ipage
4. Include footer

---

### 7.3 `discord.php`

**Content source:** `ipage/discord.html` — `<div class="entryContent">` block

**Steps:**
1. `$pageTitle = 'B5TA | Discord'`, `$activePage = 'discord'`
2. Include header
3. Article with `<ol>` steps + `wfbCHon.gif`
4. **Update Discord invite URL** — current link is expired
5. Include footer

---

### 7.4 `guides.php`

**Content source:** `ipage/guides.html` — `<div class="entryContent">` block

**Steps:**
1. `$pageTitle = 'B5TA | Guides'`, `$activePage = 'guides'`
2. Include header
3. Article with title "Guides" + category links + community guide `<ul>`
4. Include footer

---

### 7.5 Guide stubs (`guides-*.php`)

No content change needed. Just update `$activePage = 'guides'` and ensure include paths are correct.

---

## 8. Deployment

### Option A: PHP Server (b5ta.com)

- Upload all `.php` files and assets
- Requires PHP 7+ on the server
- `.php` extension works as-is

### Option B: GitHub Pages (static)

- GitHub Pages does not execute PHP
- Convert all `.php` files to `.html`
- Replace `<?php include ... ?>` with copy-paste or a static site generator step
- `index.html` works as default; other pages need explicit `.html` links

**Recommended:** Build and test with PHP locally (XAMPP/MAMP/Laragon), then decide on deployment target. If GitHub Pages is the target, a build step to flatten PHP includes into static HTML is needed.

---

## 9. Migration Execution Steps (Ordered)

1. **Extract CSS** from `ipage/homepage_files/73795.css` → create `css/site.css`
2. **Create `js/site.js`** with mobile nav toggle
3. **Rewrite `includes/header.php`** using ipage layout (`.headerMain`, `.primary-menu-side`)
4. **Rewrite `includes/footer.php`** with ipage aside + footer markup
5. **Rewrite `index.php`** — ipage homepage content inside article layout
6. **Rewrite `about.php`** — ipage about content
7. **Rewrite `discord.php`** — ipage discord content (update invite URL)
8. **Rewrite `guides.php`** — ipage guides content
9. **Update guide stubs** — fix include paths, confirm active nav state
10. **Test in browser** — verify layout, nav active states, mobile toggle, all links
11. **Commit and push** — push to GitHub, verify GitHub Pages render (or deploy to PHP server)

---

## 10. Risks and Mitigations

| Risk | Mitigation |
|---|---|
| `73795.css` is the full WikiWP theme (large, complex) | Extract only the selectors listed in §5.1; do not include the full file |
| WordPress-specific CSS classes may conflict with Bootstrap | Prefix or scope ipage CSS classes if conflicts arise |
| Discord invite URL is expired | Confirm current invite before launch |
| GitHub Pages won't run PHP | Test static output; convert to `.html` if needed |
| Mobile nav toggle not working | Test `.navMenuButton` jQuery toggle; fallback to Bootstrap collapse if needed |
