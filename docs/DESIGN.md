# Design Document — B5TA Clan Website

**Version:** 2.0.0
**Date:** 2026-06-08
**Reference:** Original `b5ta.com` WordPress/WikiWP theme, circa 2020

---

## Design Philosophy

The ipage/WikiWP aesthetic is the design authority: white background, readable body text, sidebar navigation, and no heavy visuals competing with content. Every design decision defers to the original `b5ta.com` appearance. The site communicates information clearly and loads fast — it does not showcase design ambition.

---

## Color Palette

All values sourced from `css/site.css`.

| Token | Hex | Use |
|---|---|---|
| Primary accent | `#2487d7` | Links, active nav text (desktop), button backgrounds |
| Primary accent hover | `#1a5fa0` | Link hover, active nav text hover |
| Body text | `#333333` | Default text; mobile nav background |
| Secondary text | `#4d4d4d` | Aside text, footer text |
| Muted text | `#666666` | Widget title text |
| Hamburger bars | `#888888` | Nav hamburger icon color |
| Faint text | `#aaaaaa` | Header tagline ("Founded September 30th, 2014") |
| Aside hamburger dots | `#bbbbbb` | Aside toggle icon color |
| Page background | `#ffffff` | Body, header, aside, footer backgrounds |
| Border / divider | `#e5e5e5` | All borders: header bottom, pageContainer, widgetTitle, entryTitle |
| Widget list separator | `#f5f5f5` | Thin line between sidebar list items |
| Active nav background | `#e8e8e8` | Current page item background (desktop nav) |
| Active nav border | `#d0d0d0` | Left border of current page item (desktop nav) |
| Nav hover background | `#f0f0f0` | Nav link hover state (desktop) |
| Mobile nav item active | `#444444` | Active and hovered nav item bg (mobile) |
| Sub-menu background | `#2a2a2a` | Guides sub-menu background (mobile) |
| Overlay | `rgba(0,0,0,0.4)` | Dim backdrop when sidebar is open on mobile |

---

## Typography

Font family (body): `"Helvetica Neue", Helvetica, Arial, sans-serif` (Bootstrap 3 default)  
Base font size: 14px (Bootstrap 3 default)

| Role | Size | Weight | Color | Notes |
|---|---|---|---|---|
| Entry title (h1) | 1.8em (~25px) | Bold | `#333` | `line-height: 1.3`; bottom border `#e5e5e5` |
| Content h2 | Bootstrap h2 (~21px) | Bold | `#333` | Bottom border `#e5e5e5`; `margin-top: 1.5em` |
| Content h3 | Bootstrap h3 (~17px) | Bold | `#333` | `margin-top: 1.4em` |
| Body text | 14px (1em) | Normal | `#333` | Bootstrap default |
| Nav links (desktop) | 0.88em (~12px) | Normal | `#2487d7` | |
| Sub-menu links | 0.85em (~12px) | Normal | `#2487d7` | `padding-left: 28px` |
| Nav links (mobile) | 0.9em (~13px) | Normal | `#ddd` | |
| Widget title | 0.95em (~13px) | Bold | `#666` | Uppercase; `letter-spacing: 0.03em` |
| Widget list item | 0.88em (~12px) | Normal | `#2487d7` | |
| Header tagline | 0.78em (~11px) | Normal | `#aaa` | `text-align: center` |
| Footer / entry meta | 0.82em (~11px) | Normal | `#4d4d4d` | |

No custom web fonts. Bootstrap Glyphicons are available (loaded from `fonts/`) but not actively used in content.

---

## Spacing System

No formal base unit. Spacing values are inherited from Bootstrap 3 (8px increments in Bootstrap grid) and the original ipage CSS, applied consistently to specific components.

| Component | Spacing |
|---|---|
| Header height | 100px |
| Container-fluid margin-top | 113px (100px header + ~13px visual gap) |
| Entry header padding | 20px 30px 12px |
| Entry content padding | 20px 30px 30px |
| Entry content max-width | 974px |
| Nav link padding | 9px 15px |
| Nav link left border width | 4px |
| Sub-menu link left padding | 28px |
| Nav section divider margin | 8px 15px |
| Aside container padding-top | 110px (clears fixed header) |
| Widget margin-bottom | 25px |
| Widget title margin-bottom | 10px |
| Widget title padding-bottom | 8px |
| Widget list item padding | 5px 0 |

---

## Breakpoints

Bootstrap 3 breakpoints apply; the site defines one additional custom threshold at 1200px for the 3-column layout.

| Breakpoint | Range | Layout behavior |
|---|---|---|
| Mobile | < 768px | Single column. Both sidebars off-canvas. Hamburger buttons visible. Transitions active. |
| Tablet | 768px – 1199px | Single column. Both sidebars off-canvas (250px wide). Hamburger buttons visible. Transitions active. |
| Desktop | ≥ 1200px | 3-column: left nav 215px fixed + fluid content + right aside 300px fixed. Hamburgers hidden. Transitions removed. Overlay disabled. |

At 1200px+:
- `.container-fluid` gets `margin-left: 215px; margin-right: 300px`
- `.primary-menu` switches from dark (`#333`) to transparent with a right border
- `aside.site-aside` is always visible (`right: 0`, no transition)
- `.navMenuButton` and `.asideMenuButton` are hidden via `display: none`

---

## Component Patterns

### Page Article

Every page wraps its content in the same structure:

```html
<div class="pageContainer">
  <article class="entry entryTypePost">
    <header class="entryHeader">            <!-- omitted on homepage -->
      <h1 class="entryTitle">Page Title</h1>
    </header>
    <div class="entryContent">
      <!-- page content -->
    </div>
  </article>
</div>
```

The homepage omits `.entryHeader` and opens `.entryContent` directly with an `<h2>`.

### Left Navigation

```html
<ul class="main-menu">
  <li class="menu-item [current-menu-item current_page_item]">
    <a href="page.html">Label</a>
  </li>
  <li class="menu-item menu-item-has-children">
    <a href="guides.html">Guides</a>
    <ul class="sub-menu">
      <li class="menu-item"><a href="guides-bossing.html">Bossing</a></li>
    </ul>
  </li>
  <div class="menu-section-divider"></div>
  <li class="menu-item">
    <a href="[url]" target="_blank" rel="noopener">External Link</a>
  </li>
</ul>
```

Active state: `current-menu-item current_page_item` on the `<li>`. Hardcoded per page.  
All guide sub-pages set the Guides `<li>` as active.

### Right Aside Widget

```html
<div class="widget">
  <h4 class="widgetTitle">Widget Title</h4>
  <ul>
    <li class="page_item [current_page_item]"><a href="page.html">Label</a></li>
  </ul>
</div>
```

### Scroll-to-Top Button

Inline-styled `<a id="scrollTop">` fixed at `bottom: 20px; right: 20px`. Background `#2487d7`, circular, 36px. Shown/hidden via jQuery after 300px scroll.

---

## Accessibility Standards

No formal WCAG level has been targeted. Current state:

| Item | Status |
|---|---|
| Alt text on images | Provided on all `<img>` elements |
| Hamburger button labels | `aria-label` and `title` attributes present |
| Keyboard navigation | Not tested; no focus trap management on sidebar open |
| Skip navigation link | Not implemented |
| Color contrast — links (`#2487d7` on `#fff`) | 3.87:1 — fails WCAG AA for normal text (requires 4.5:1); passes for large text (requires 3:1) |
| Color contrast — body text (`#333` on `#fff`) | 12.6:1 — passes WCAG AAA |
| Semantic HTML | `<header>`, `<nav>`, `<article>`, `<aside>`, `<footer>` used correctly |

Known gaps to address for WCAG AA compliance:
- Link color `#2487d7` fails contrast for body-size text; use `#1c6eb5` or darker
- Add a skip-to-content link before the header
- Implement focus management when sidebars open (trap and restore focus)

---

## Animation and Motion

All motion is functional — it communicates state change and has no decorative purpose.

| Element | Effect | Duration | Easing |
|---|---|---|---|
| Left sidebar slide | `left` property transition | 250ms | ease |
| Right aside slide | `right` property transition | 250ms | ease |
| Nav link hover (bg + border) | CSS transition | 150ms | (default ease) |
| Hamburger bar color | CSS transition | 200ms | (default ease) |
| Scroll-to-top button show | jQuery `fadeIn` | 200ms | (jQuery default) |
| Scroll-to-top button hide | jQuery `fadeOut` | 200ms | (jQuery default) |
| Scroll-to-top scroll | jQuery `animate scrollTop` | 400ms | (jQuery swing) |

Sidebar transitions are disabled at 1200px+ (`transition: none`) since they are always visible and should not animate on page load or resize.

Rule: add motion only when it reinforces user interaction feedback. Do not add transitions to static content.
