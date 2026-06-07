# Design Document — B5TA Clan Website

**Version:** 1.0
**Date:** 2026-06-07
**Reference:** `ipage/` archive (saved from b5ta.com, WikiWP theme, circa 2020)

---

## 1. Design Philosophy

The ipage design takes priority. It is a clean, content-first layout inspired by the Wikipedia/WikiWP aesthetic: white background, readable text, sidebar navigation, no heavy visuals competing with content. The rebuild reproduces this look using Bootstrap 3 as the underlying framework with a custom `css/site.css` replacing the WordPress-dependent `73795.css`.

---

## 2. Page Layout

### 2.1 Full-Page Structure

```
┌─────────────────────────────────────────────────────┐
│  HEADER (.headerMain)  — fixed 100px                 │
│  [logo image]  Founded September 30th, 2014          │
├─────────────────────────────────────────────────────┤
│  META BAR (.meta.clearfix)                           │
│  [Search form]                                       │
├──────────────┬──────────────────────┬────────────────┤
│ LEFT NAV     │  PAGE CONTENT        │  RIGHT ASIDE   │
│ 215px fixed  │  (.pageContainer)    │  300px fixed   │
│              │                      │                │
│ .primary-    │  <article>           │  Pages widget  │
│  menu        │    .entryHeader      │                │
│              │    .entryContent     │  External      │
│ Home         │  </article>          │  Links widget  │
│ About        │                      │                │
│ Discord      │                      │                │
│ Guides ▸     │                      │                │
│ Flip Chart   │                      │                │
├──────────────┴──────────────────────┴────────────────┤
│  FOOTER (.site-footer)                               │
│  © Clan B5TA | Founded September 30th, 2014          │
└─────────────────────────────────────────────────────┘
```

### 2.2 Column Widths

| Column | Width | Behavior |
|---|---|---|
| Left sidebar nav | 215px fixed | Always visible at 1200px+; off-canvas below |
| Main content | fluid (minus 215px left + 300px right) | Fills remaining space |
| Right aside | 300px fixed | Always visible at 1200px+; off-canvas below |

Mobile (`< 1200px`): both sidebars slide in from their respective edges via `.is-open` toggle. A `.site-overlay` dims the page behind an open sidebar.

---

## 3. Header

### 3.1 Markup

```html
<header class="headerMain">
  <div class="header-content">
    <div id="logo">
      <a href="index.html" id="site-logo" title="Clan B5TA" rel="home">
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
| Position | `fixed`, `z-index: 1000` |
| Height | `100px` |
| Background | `#ffffff` |
| Border | `1px solid #e5e5e5` (bottom) |
| Logo image | `Logos/0jK9PZV.png` — wide horizontal banner, `max-height: 60px` |
| Tagline | `font-size: 0.78em`, `color: #aaa`, centered below logo |

---

## 4. Left Sidebar Navigation

### 4.1 Markup

```html
<div class="primary-menu" id="primaryMenu">
  <div class="primary-menu-container">
    <nav class="nav-container">
      <ul class="main-menu">
        <li class="menu-item current-menu-item current_page_item">
          <a href="index.html">Home</a>
        </li>
        <li class="menu-item">
          <a href="about.html">About</a>
        </li>
        <li class="menu-item menu-item-has-children">
          <a href="guides.html">Guides</a>
          <ul class="sub-menu">
            <li class="menu-item"><a href="guides-bossing.html">Bossing</a></li>
            ...
          </ul>
        </li>
        ...
        <div class="menu-section-divider"></div>
        <li class="menu-item">
          <a href="[RS clan URL]" target="_blank" rel="noopener">Official Clan Page</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
```

### 4.2 Active State

The current page's nav item carries `current-menu-item current_page_item` classes (hardcoded per page in static HTML, previously set via `$activePage` PHP variable).

### 4.3 Desktop (1200px+)

- Background: `transparent` (white page shows through)
- Nav links: `color: #2487d7`
- Active link: `background: #e8e8e8; border-left: 4px solid #d0d0d0`
- Hamburger button: hidden

### 4.4 Mobile/Tablet (< 1200px)

- Background: `#333` (dark panel)
- Slides in from `left: -265px` to `left: 0` on `.is-open`
- Nav links: `color: #ddd`
- Hamburger button: fixed top-left, 3 `<span>` bars

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
  </article>
</div>
```

The homepage omits `<header class="entryHeader">` — content begins directly in `.entryContent` with an `<h2>` welcome heading.

### 5.2 Content Styles

| Element | Style |
|---|---|
| `.pageContainer` | `border: 1px solid #e5e5e5; background: #fff; min-height: 400px` |
| `.entryTitle` | `font-size: 1.8em; border-bottom: 1px solid #e5e5e5` |
| `.entryContent` | `padding: 20px 30px 30px; max-width: 974px` |
| `h2` in content | `border-bottom: 1px solid #e5e5e5` |
| Links | `color: #2487d7` |
| `.alignright` / `.pull-right` | `float: right; margin: 0 0 15px 20px` |

---

## 6. Right Aside

### 6.1 Markup

```html
<aside class="site-aside" id="siteAside">
  <div class="aside-container">
    <div class="dynamicSidebar">
      <div class="widget">
        <h4 class="widgetTitle">Pages</h4>
        <ul>
          <li class="page_item current_page_item"><a href="index.html">Home</a></li>
          <li class="page_item"><a href="about.html">About</a></li>
          ...
        </ul>
      </div>
      <div class="widget">
        <h4 class="widgetTitle">External Links</h4>
        <ul>...</ul>
      </div>
    </div>
  </div>
</aside>
```

Active page marked with `current_page_item` class (hardcoded per page in static HTML).

**Note:** The Subscribe widget from ipage (Jetpack) was removed. Pages and External Links widgets are kept.

### 6.2 Desktop (1200px+)

- Always visible at `right: 0`
- `border-left: 1px solid #e5e5e5`
- Widget titles: uppercase, `color: #666`

### 6.3 Mobile/Tablet (< 1200px)

- Slides in from `right: -320px` to `right: 0` on `.is-open`
- Hamburger button: fixed top-right, 3 dot `<span>` elements

---

## 7. Footer

```html
<footer class="site-footer">
  <div class="content clearfix">
    <p class="copyright">
      <strong>&copy; <a href="index.html">Clan B5TA</a></strong>
      &nbsp;|&nbsp; Founded September 30th, 2014
      &nbsp;|&nbsp; <a href="discord.html">Discord</a>
      &nbsp;|&nbsp; <a href="about.html">About</a>
      &nbsp;|&nbsp; <a href="guides.html">Guides</a>
    </p>
  </div>
</footer>
```

---

## 8. Color Palette

| Role | Color |
|---|---|
| Page background | `#ffffff` |
| Body text | `#333333` |
| Links | `#2487d7` |
| Link hover | `#1a5fa0` |
| Header background | `#ffffff` |
| Borders / dividers | `#e5e5e5` |
| Left nav background (mobile) | `#333333` |
| Left nav active bg (desktop) | `#e8e8e8` |
| Meta bar background | `#ffffff` |
| Widget titles | `#666666` |

---

## 9. Typography

| Element | Style |
|---|---|
| Body | `"Helvetica Neue", Helvetica, Arial, sans-serif` |
| Headings | Bootstrap 3 defaults |
| Widget titles | `0.95em`, uppercase, `letter-spacing: 0.03em` |
| Blog description | `0.78em`, `color: #aaa` |
| Entry content text | Bootstrap body default |

No custom web fonts beyond Bootstrap's Glyphicons (in `fonts/`).

---

## 10. Responsive Breakpoints

| Breakpoint | Behavior |
|---|---|
| `>= 1200px` | 3-column layout: 215px left nav + fluid content + 300px right aside. Hamburgers hidden. |
| `768px – 1199px` | Tablet: content fills full width. Both sidebars off-canvas, hamburgers visible. |
| `< 768px` | Mobile: content fills full width. Both sidebars off-canvas, hamburgers visible. |

---

## 11. Assets Reference

### Logo Images

| File | Use |
|---|---|
| `Logos/0jK9PZV.png` | Header banner logo (primary) |
| `Logos/clan.png` | Homepage float-right image (280×126) |
| `Logos/favicon.png` | Browser tab favicon |
| `Logos/tnOKdrI.png` | High-res favicon / Apple touch icon |
| `Logos/NTjJFV8.png` | Alternate wide banner logo |
| `Logos/B5TA wolf vector.png` | Clan wolf logo vector |

### Media Assets

| File | Location | Use |
|---|---|---|
| `wfbCHon.gif` | `Logos/` | Discord page animated banner |
