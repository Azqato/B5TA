# Design Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Reference:** `ipage/` archive (saved from b5ta.com, WikiWP theme, circa 2020)

---

## 1. Design Philosophy

The ipage design takes priority. It is a clean, content-first layout inspired by the Wikipedia/WikiWP aesthetic: white background, readable text, sidebar navigation, no heavy visuals competing with content. The rebuild preserves this look using Bootstrap 3 as the underlying grid instead of WordPress.

---

## 2. Page Layout

### 2.1 Full-Page Structure

```
┌─────────────────────────────────────────────────────┐
│  HEADER (.headerMain)                                │
│  [logo image]  Founded September 30th, 2014          │
├─────────────────────────────────────────────────────┤
│  META BAR (.meta.clearfix)                           │
│  [Search form]                                       │
├────────────┬────────────────────────┬────────────────┤
│ LEFT NAV   │  PAGE CONTENT          │  RIGHT ASIDE   │
│ (.primary- │  (.pageContainer)      │  (.aside-      │
│  menu-side)│                        │   container)   │
│            │  <article>             │                │
│  About     │    <h1 class=          │  Subscribe     │
│  Discord   │      "entryTitle">     │  widget        │
│  Guides    │    <div class=         │                │
│  ...       │      "entryContent">   │  Pages list    │
│            │    </article>          │                │
├────────────┴────────────────────────┴────────────────┤
│  FOOTER                                              │
│  © Clan B5TA | Founded September 30th, 2014          │
└─────────────────────────────────────────────────────┘
```

### 2.2 Column Widths (Bootstrap 3 grid)

| Column | Class | Approx width |
|---|---|---|
| Left sidebar nav | `col-sm-2` | ~16% |
| Main content | `col-sm-7` or `col-sm-8` | ~58–66% |
| Right aside | `col-sm-2` or `col-sm-3` | ~16–25% |

On mobile (`< 768px`): all columns stack vertically. Left nav collapses behind a hamburger toggle.

---

## 3. Header

### 3.1 Markup

```html
<header class="headerMain">
  <div class="header-content">
    <div id="logo">
      <a href="index.php" id="site-logo" title="Clan B5TA" rel="home">
        <img class="logo-img" src="Logos/0jK9PZV.png" alt="Clan B5TA">
      </a>
      <span class="blog-description">Founded September 30th, 2014</span>
    </div>
  </div>
</header>
```

### 3.2 Styles

| Property | Value |
|---|---|
| Background | `#ffffff` (white) |
| Logo image | `Logos/0jK9PZV.png` — wide horizontal banner |
| Tagline font | Inherits body font, smaller size, below logo |
| Height | Determined by logo image natural height |

**Logo files available:**
- `Logos/0jK9PZV.png` — primary wide banner (used in ipage header)
- `Logos/NTjJFV8.png` — alternate wide banner
- `Logos/0jK9PZV-1024x461.png` — 1024px wide version
- `images/b5talogo.png` — current Bootstrap shell logo (to be replaced)

---

## 4. Left Sidebar Navigation

### 4.1 Markup

```html
<div class="primary-menu primary-menu-side">
  <div class="primary-menu-container">
    <div class="navMenuButton">
      <header class="navMenuButtonTitle">Menu</header>
      <div class="navMenuButtonContent">
        <hr><hr><hr>
      </div>
    </div>
    <nav class="nav-container">
      <ul class="main-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="discord.php">Discord</a></li>
        <li class="dropdown"><a href="guides.php">Guides</a>
          <ul class="dropdown-menu">
            <li><a href="guides-bossing.php">Bossing</a></li>
            <li><a href="guides-money-making.php">Money Making</a></li>
            <li><a href="guides-quests.php">Quests</a></li>
            <li><a href="guides-skilling.php">Skilling</a></li>
          </ul>
        </li>
        <li><a href="flip-chart.php">Flip Chart</a></li>
        <li><a href="[RS clan URL]" target="_blank">Official Clan Page</a></li>
        <li><a href="http://www.runeclan.com/clan/B5TA" target="_blank">Runeclan</a></li>
        <li><a href="[Patreon URL]" target="_blank">Donate</a></li>
      </ul>
    </nav>
  </div>
</div>
```

### 4.2 Active State

The current page's nav item gets the `current-menu-item` and `current_page_item` classes (matching ipage convention).

### 4.3 Mobile Behavior

- The `.navMenuButton` div (3 `<hr>` bars) is the mobile toggle
- On mobile, the sidebar collapses; clicking the button reveals it
- Bootstrap `collapse` or a small jQuery toggle handles this

---

## 5. Main Content Area

### 5.1 Markup

```html
<div class="pageContainer">
  <article class="entry entryTypePost">
    <header class="entryHeader">
      <h1 class="entryTitle">Page Title</h1>
    </header>
    <div class="entryContent">
      <!-- page content -->
    </div>
    <footer class="entryMeta"></footer>
  </article>
</div>
```

### 5.2 Content Styles

| Element | Style |
|---|---|
| Background | `#ffffff` |
| Text color | `#000000` |
| `h1.entryTitle` | Large, bold page title |
| `h2`, `h3` in content | Section headings within article |
| `ul`, `ol` | Standard list formatting |
| `strong` | Bold text (used extensively in ipage content) |
| Images | `float: right` with margin, responsive max-width |
| `.entryContent` max-width | `974px` (from ipage CSS) |

---

## 6. Right Aside

### 6.1 Markup

```html
<aside>
  <div class="aside-container container-full">
    <div class="dynamicSidebar">
      <div class="widget">
        <h4 class="widgetTitle">Pages</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="discord.php">Discord</a></li>
          <li><a href="guides.php">Guides</a></li>
          <!-- additional pages as added -->
        </ul>
      </div>
    </div>
  </div>
</aside>
```

**Note:** The Subscribe widget from ipage (Jetpack) is removed. The Pages widget is kept as a secondary nav aid.

### 6.2 Mobile

The aside has its own mobile toggle (`.asideMenuButton`) matching the left nav pattern — "Sidebar" label, 3 `<hr>` bars.

---

## 7. Footer

```html
<footer class="container-fluid">
  <div class="content clearfix">
    <div class="col-md-12 copyright">
      <p>
        <strong>&copy; <a href="index.php">Clan B5TA</a></strong>
        &nbsp;|&nbsp; Founded September 30th, 2014
        &nbsp;|&nbsp; <a href="discord.php">Discord</a>
        &nbsp;|&nbsp; <a href="about.php">About</a>
      </p>
    </div>
  </div>
</footer>
```

---

## 8. Color Palette

| Role | Color | Notes |
|---|---|---|
| Page background | `#ffffff` | White — matches ipage |
| Body text | `#000000` | Black |
| Links (default) | Bootstrap default blue | `#337ab7` |
| Links (hover) | Bootstrap default | `#23527c` |
| Header background | `#ffffff` | White — ipage design |
| Footer background | `#f2f2f2` | Light grey |
| Nav active item | To be styled | From `73795.css` |

**Removed from Bootstrap shell:**
- Blue header `#0066ff` → replaced with white ipage header
- Section colors (`#1E88E5`, `#673AB7`, etc.) → removed (no colored sections in ipage design)

---

## 9. Typography

Inherits from Bootstrap 3 defaults plus WikiWP overrides:

| Element | Font |
|---|---|
| Body | Bootstrap default (Helvetica Neue / Arial) |
| Headings | Bootstrap default |
| Logo tagline | Smaller than logo, same family |

No custom web fonts beyond Bootstrap's Glyphicons (already in `fonts/`).

---

## 10. Assets Reference

### Logo Images

| File | Dimensions (approx) | Use |
|---|---|---|
| `Logos/0jK9PZV.png` | Wide banner | Header logo — primary |
| `Logos/NTjJFV8.png` | Wide banner | Alternate header logo |
| `Logos/clan.png` | 280×126 | Inline on homepage (float right) |
| `Logos/favicon.png` | Square | Browser tab favicon |
| `Logos/tnOKdrI.png` | Square | High-res favicon / Apple touch icon |
| `Logos/B5TA wolf vector.png` | Vector | Clan wolf logo |
| `images/b5talogo.png` | — | Bootstrap shell logo (to be replaced) |

### Media Assets

| File | Location | Use |
|---|---|---|
| `wfbCHon.gif` | `ipage/discord_files/` | Discord page animated banner |
| `images/discord.jpg` | `images/` | Discord icon in nav (Bootstrap shell) |
| `Design/spritesheet.png` | `Design/` | UI sprite sheet |
| `Design/headerimg.jpg` | `Design/` | Header image variant |
| `Design/footer.jpg` | `Design/` | Footer image |
| `Design/sidebarimg.png` | `Design/` | Sidebar image |
| `Gameplay/*.GIF` | `Gameplay/` | In-game clip assets |

---

## 11. CSS Strategy

### Phase 1 (ipage CSS extraction)
Extract the layout-critical rules from `ipage/homepage_files/73795.css` into a new `css/site.css`:

Key selectors to extract:
- `.headerMain`, `#logo`, `.logo-img`, `.blog-description`
- `.primary-menu`, `.primary-menu-side`, `.main-menu`
- `.navMenuButton`, `.navMenuButtonTitle`, `.navMenuButtonContent`
- `.pageContainer`, `.entry`, `.entryHeader`, `.entryTitle`, `.entryContent`
- `.asideMenuButton`, `.aside-container`, `.dynamicSidebar`, `.widget`, `.widgetTitle`
- `.container-fluid` footer styles

### Phase 2 (Bootstrap integration)
Keep existing Bootstrap CSS files untouched. `site.css` overrides or extends Bootstrap where needed.

### Phase 3 (cleanup)
Remove Bootstrap shell-specific overrides that no longer apply:
- `.head-format` (blue header)
- `#section1` through `#section5` (colored scrollspy sections)
- Scrollspy-specific affix + sidebar rules

---

## 12. Responsive Breakpoints

| Breakpoint | Behavior |
|---|---|
| `>= 768px` | 3-column layout: left nav + content + aside |
| `< 768px` | Stacked: header → menu toggle → content → sidebar toggle → aside → footer |

Mobile toggles use the ipage `.navMenuButton` / `.asideMenuButton` pattern (3 `<hr>` bars).
