# Design Document - B5TA Clan Website

**Version:** 2.1.0
**Date:** 2026-08-25
**Reference:** Original `b5ta.com` WordPress/WikiWP theme, circa 2020
**Source of truth for every value below:** `css/site.css`, `css/bootstrap.css` (Bootstrap 3.3.6), and the inline styles in the nine HTML files.

---

## Design Philosophy

The ipage/WikiWP aesthetic is the design authority: white background, readable body
text, sidebar navigation, and no heavy visuals competing with content. Every design
decision defers to the original `b5ta.com` appearance. The site communicates
information clearly and loads fast, and it does not showcase design ambition.

Two consequences follow from that, and they are worth stating because they are the
ones that get argued with:

1. **Nothing is themed.** There is no dark mode, no CSS custom properties, and no
   design token layer. Colours are literal hex values written where they are used.
   This is deliberate: the site is small enough that indirection costs more than it
   saves, and a contributor should be able to change a colour by finding it in
   `site.css` and typing over it.
2. **Bootstrap supplies defaults, `site.css` supplies the layout.** `bootstrap.css`
   loads first and is never edited. `site.css` loads second and overrides it.
   Anything you want to change belongs in `site.css`.

---

## Colour Palette

Every colour in the project, read from `css/site.css` and the inline `#scrollTop`
style in each HTML file. There are no unused tokens in this table and no tokens
defined in the CSS that this table omits.

### Brand and interactive

| Token | Hex | Use |
|---|---|---|
| Primary accent | `#2487d7` | Links, desktop nav link text, aside widget links, footer links, search input focus border, scroll-to-top button background |
| Primary accent hover | `#1a5fa0` | Link hover, desktop nav hover and active text |

### Text

| Token | Hex | Use |
|---|---|---|
| Body text | `#333333` | Default body colour; also the mobile off-canvas nav background |
| Secondary text | `#4d4d4d` | Aside body text, footer text |
| Muted text | `#666666` | Widget title text; aside hamburger dot hover |
| Faint text | `#999999` | `.entryMeta` colour (rule exists, no page uses `.entryMeta`) |
| Very faint text | `#aaaaaa` | Header tagline, "Founded September 30th, 2014" |
| Mobile nav link | `#dddddd` | Nav link text inside the dark mobile drawer |
| Mobile sub-menu link | `#bbbbbb` | Sub-menu link text inside the dark mobile drawer |
| White | `#ffffff` | Page, header, aside and footer backgrounds; nav link text on hover in the mobile drawer; scroll-to-top glyph |

### Surfaces and borders

| Token | Hex | Use |
|---|---|---|
| Border / divider | `#e5e5e5` | Every structural border: header bottom, `.pageContainer`, `.entryTitle` underline, `.entryContent h2` underline, `.entryMeta` top, widget title underline, aside left border, footer border, desktop nav right border, desktop nav section divider |
| Widget list separator | `#f5f5f5` | Thin rule between aside list items |
| Nav hover background (desktop) | `#f0f0f0` | Desktop nav link hover |
| Sub-menu background (desktop) | `#f7f7f7` | Guides sub-menu background at 1200px and up |
| Sub-menu hover (desktop) | `#ebebeb` | Guides sub-menu link hover at 1200px and up |
| Active nav background (desktop) | `#e8e8e8` | Current page item background; also the nav hover border colour |
| Active nav border (desktop) | `#d0d0d0` | 4px left border on the current page item |
| Mobile nav active/hover | `#444444` | Active and hovered nav item background in the mobile drawer |
| Mobile nav active border | `#777777` | 4px left border on the current item in the mobile drawer |
| Mobile nav hover border | `#666666` | 4px left border on a hovered item in the mobile drawer |
| Mobile sub-menu background | `#2a2a2a` | Guides sub-menu background below 1200px |
| Mobile sub-menu hover | `#383838` | Guides sub-menu link hover below 1200px |
| Mobile nav divider | `#555555` | Section divider inside the dark drawer |

### Icons and overlay

| Token | Hex | Use |
|---|---|---|
| Nav hamburger bars | `#888888` | Three bars of `.navMenuButton` |
| Nav hamburger bars hover | `#333333` | `.navMenuButton:hover span` |
| Aside hamburger dots | `#bbbbbb` | Three dots of `.asideMenuButton` |
| Overlay | `rgba(0, 0, 0, 0.4)` | Dim backdrop while a drawer is open below 1200px |

---

## Typography

Font family (body): `"Helvetica Neue", Helvetica, Arial, sans-serif`, set explicitly
on `body` in `site.css` and identical to the Bootstrap 3 default.
Base font size: 14px, inherited from Bootstrap 3. `site.css` does not override it.

No web fonts are loaded. The `fonts/` directory contains only the Bootstrap
Glyphicons icon font, which `bootstrap.css` references and which no page currently
uses, so in practice the browser downloads it only if a `.glyphicon` class appears.

Every `em` size below is relative to the 14px base unless the element sits inside
another sized element. The pixel figures are computed, not authored.

| Role | Size | Weight | Colour | Notes |
|---|---|---|---|---|
| Entry title (h1) | 1.8em (~25px) | Bold | `#333` | `line-height: 1.3`; 10px bottom padding above an `#e5e5e5` rule |
| Content h2 | Bootstrap h2 (~21px) | Bold | `#333` | `line-height: 1.4`; `margin-top: 1.5em`; 6px bottom padding above an `#e5e5e5` rule |
| Content h3 | Bootstrap h3 (~17px) | Bold | `#333` | `margin-top: 1.4em`; no rule |
| Body text | 14px (1em) | Normal | `#333` | Bootstrap default `line-height: 1.428571429` (20px) |
| Nav link (desktop) | 0.88em (~12px) | Normal | `#2487d7` | 9px 15px padding, 4px transparent left border |
| Nav link (mobile) | 0.9em (~13px) | Normal | `#dddddd` | Same box, dark drawer |
| Sub-menu link | 0.85em (~12px) | Normal | `#2487d7` desktop / `#bbbbbb` mobile | `padding-left: 28px` |
| Widget title | 0.95em (~13px) | Bold | `#666` | Uppercase, `letter-spacing: 0.03em` |
| Widget list item | 0.88em (~12px) | Normal | `#2487d7` | Bold when `.current_page_item` |
| Header tagline | 0.78em (~11px) | Normal | `#aaa` | Centred under the logo |
| Footer | 0.82em (~11px) | Normal | `#4d4d4d` | |
| Entry meta | 0.82em (~11px) | Normal | `#999` | Rule exists in CSS; no page renders it |
| Meta search input | inherits the 0.85em bar | Normal | inherited | Rule exists in CSS; the markup was removed in v1.5.0 |
| Scroll-to-top glyph | 18px | Normal | `#fff` | Inline style, `line-height: 36px` |

**Bold is the site's emphasis mechanism and it is overused.** Most body copy on the
homepage, About page, and guide pages is wrapped in `<strong>`. This is inherited
from the original WordPress content, not a deliberate typographic rule. It is
recorded here as observed reality; a future content pass should decide whether to
keep it. Do not extend the pattern to new copy without that decision being made.

---

## Spacing System

There is no formal base unit and no spacing scale. Values were carried over from the
original ipage CSS and applied per component. The dominant increments in practice
are **5px and 10px**, with 15px and 30px for horizontal padding, but that is a
description of what exists rather than a rule anyone followed.

**Default for new work:** match the nearest existing value in the table below rather
than introducing a new one. Adding a fourth padding value to a site that has three
is a net loss.

| Component | Spacing |
|---|---|
| Header height | 100px (fixed at every breakpoint) |
| Header content padding | 10px 60px (the 60px sides reserve room for the hamburger buttons) |
| `.container-fluid` margin-top | 113px (100px header plus a ~13px gap) |
| Entry header padding | 20px 30px 12px |
| Entry content padding | 20px 30px 30px |
| Entry content max-width | 974px |
| Entry meta padding | 10px 30px |
| Footer padding | 15px 30px |
| Nav link padding | 9px 15px |
| Nav link left border | 4px |
| Sub-menu link left padding | 28px |
| Nav section divider margin | 8px 15px |
| Nav drawer container padding | 105px 0 30px (mobile); padding-top becomes 110px at 1200px and up |
| Aside container padding | 110px 15px 30px |
| Widget margin-bottom | 25px |
| Widget title margin-bottom | 10px |
| Widget title padding-bottom | 8px |
| Widget list item padding | 5px 0 |
| Content paragraph and list margin-bottom | 1em |
| List item margin-bottom | 0.3em |
| Float-right image margin | 0 0 15px 20px |
| Hamburger bar gap | 5px |
| Scroll-to-top offset | 20px from bottom and right |

---

## Breakpoints

Bootstrap 3's breakpoints are available but the site only acts on one of them. The
layout has exactly two states, and the switch is at 1200px.

| Breakpoint | Range | Layout behaviour |
|---|---|---|
| Mobile | Below 768px | Single column. Both drawers off-canvas at 250px wide. Hamburgers visible. Slide transitions active. Overlay active. |
| Tablet | 768px to 1199px | Identical to mobile in every respect. A media query at this range re-states `width: 250px; left: -265px`, which duplicates the base rule and changes nothing. |
| Desktop | 1200px and up | Three columns: 215px nav, fluid content, 300px aside. Hamburgers hidden. Transitions removed. Overlay disabled with `!important`. |

What changes at 1200px, precisely:

- `.container-fluid` gains `margin-left: 215px; margin-right: 300px`
- `.primary-menu` moves to `left: 0`, narrows from 250px to 215px, drops its `#333`
  background for `transparent`, gains a `1px solid #e5e5e5` right border, and loses
  its transition
- Nav links switch from the dark palette (`#ddd` on `#333`) to the light palette
  (`#2487d7` on transparent), and the sub-menu switches from `#2a2a2a` to `#f7f7f7`
- `aside.site-aside` moves to `right: 0` and loses its transition
- `.navMenuButton` and `.asideMenuButton` are set to `display: none`
- `.site-overlay` is forced to `display: none !important`

The JavaScript uses the same 1200px threshold twice, checked at click time via
`$(window).width()`: below it the Guides parent link has its navigation prevented so
the tap expands the sub-menu instead, and the outside-click handler that closes the
drawers returns early at 1200px and above. **If the breakpoint ever changes, it must
change in both `css/site.css` and `js/site.js`.** There is no shared constant, and
nothing will warn you.

---

## Component Patterns

### Page article

Every page wraps its content in the same structure:

```html
<div class="pageContainer">
  <article class="entry entryTypePost">
    <header class="entryHeader">            <!-- omitted on the homepage -->
      <h1 class="entryTitle">Page Title</h1>
    </header>
    <div class="entryContent">
      <!-- page content -->
    </div>
  </article>
</div>
```

`index.html` is the only page that omits `.entryHeader`; it opens `.entryContent`
directly with an `<h2>`. The `.entryContent > *:first-child { margin-top: 0 }` rule
exists specifically so that page does not sit lower than the others. It was added in
v1.8.0 for exactly that reason.

### Left navigation

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

Rules for this block:

- Active state is `current-menu-item current_page_item` on the `<li>`, hardcoded per
  file. Exactly one `<li>` per page carries it.
- All four guide sub-pages set the **Guides** `<li>` active, not their own sub-item.
- Internal links come first, then `.menu-section-divider`, then external links.
- Every external link carries `target="_blank" rel="noopener"`. This is not optional.
- A `>` chevron pseudo-element is appended to any `.menu-item-has-children` link and
  rotated 90 degrees when `.sub-open` is present.

**Known markup defect:** `.menu-section-divider` is a `<div>` placed as a direct
child of a `<ul>`, which is invalid HTML. It renders correctly in every browser
observed and is present identically in all nine files. It is recorded rather than
fixed, because changing it means nine edits for no visible gain. See the Known
Technical Debt table in [PRD.md](PRD.md).

### Right aside widget

```html
<div class="widget">
  <h4 class="widgetTitle">Widget Title</h4>
  <ul>
    <li class="page_item [current_page_item]"><a href="page.html">Label</a></li>
  </ul>
</div>
```

Two widgets exist on every page and their order is fixed: **Pages**, then
**External Links**. The Pages widget lists Home, About, Discord, Guides, and marks
the current one. Guide sub-pages mark **Guides** as current, matching the nav rule.

### Scroll-to-top button

An inline-styled `<a id="scrollTop">` immediately before the closing `</body>` of
every page: fixed at `bottom: 20px; right: 20px`, `z-index: 9998`, a 36px circle,
`#2487d7` background, white up-arrow glyph, `display: none` until scroll passes
300px.

This is the only component styled inline rather than in `site.css`. It is
inconsistent with the rest of the site, and moving it into `site.css` would be a
strict improvement, but it works and it is identical in all nine files.

### Buttons, cards, forms, modals

The site has **none of these**. Bootstrap's `.btn`, `.panel`, `.modal`, and form
component CSS is loaded but no page uses any of it. The only interactive controls
are links, the two hamburger toggles, and the scroll-to-top anchor.

If a button is ever needed, the rule is: use Bootstrap 3's `.btn .btn-primary` and
override only the background to `#2487d7` in `site.css`. Do not hand-roll a new
button style, and do not add a component library.

If a form is ever needed, note that there is no server to receive it. Any form must
post to a third-party endpoint, which is a decision that belongs in
[PRD.md](PRD.md) under Third-Party Integrations and Security, not a styling choice.

### z-index layers

Recorded here because there are five layers and no comment in the CSS explains them.

| Layer | Value | Element |
|---|---|---|
| Hamburger buttons | 100001 | `.navMenuButton`, `.asideMenuButton` |
| Drawers | 9999 | `.primary-menu`, `aside.site-aside` |
| Scroll-to-top | 9998 | `#scrollTop` (inline style) |
| Overlay | 9000 | `.site-overlay` |
| Header | 1000 | `.headerMain` |

The hamburgers sit above the drawers so the toggle stays clickable while a drawer is
open. The header sits *below* the overlay, so opening a drawer dims the header too.

---

## Accessibility Standards

**No formal WCAG level has been targeted.** That is the current state, not an
endorsement of it. The default this audit records for future work is **WCAG 2.1
Level AA**, because it is the common legal and practical baseline and the gaps
between here and there are small and enumerated below.

### Current state

| Item | Status |
|---|---|
| Alt text on images | Present on every `<img>` in every page |
| `lang` attribute | `<html lang="en">` on all nine pages |
| Hamburger labels | Both toggles carry `aria-label` and `title` |
| Semantic landmarks | `<header>`, `<nav>`, `<article>`, `<aside>`, `<footer>` used correctly |
| Keyboard operation of toggles | **Fails.** Both toggles are `<div>` elements with no `tabindex`, no `role="button"`, and a click-only handler. They cannot be reached or activated by keyboard. |
| Focus management on drawer open | Not implemented. No focus move, no trap, no restore. |
| Skip-to-content link | Not implemented |
| `aria-expanded` on the toggles or the Guides parent | Not present |
| Visible focus indicator | Browser default only. `site.css` styles `:focus` on nav links identically to `:hover` and never removes an outline. |
| Reduced motion | `prefers-reduced-motion` is not handled anywhere |

### Contrast measurements

Computed against the background each colour actually renders on, using the WCAG 2.x
relative luminance formula.

| Foreground | Background | Ratio | AA normal text (4.5:1) | AA large text (3:1) |
|---|---|---|---|---|
| `#333333` body | `#ffffff` | 12.6:1 | Pass | Pass |
| `#4d4d4d` footer and aside | `#ffffff` | 7.8:1 | Pass | Pass |
| `#666666` widget title | `#ffffff` | 5.7:1 | Pass | Pass |
| `#2487d7` links | `#ffffff` | ~3.8:1 | **Fail** | Pass |
| `#999999` entry meta | `#ffffff` | 2.9:1 | **Fail** | **Fail** |
| `#aaaaaa` header tagline | `#ffffff` | 2.3:1 | **Fail** | **Fail** |
| `#dddddd` mobile nav link | `#333333` | 9.3:1 | Pass | Pass |
| `#888888` hamburger bars | `#ffffff` | 3.5:1 | n/a (non-text, needs 3:1) | Pass |
| `#bbbbbb` aside dots | `#ffffff` | 1.9:1 | n/a (non-text, needs 3:1) | **Fail** |

> **Discrepancy with the previous version of this document.** The v2.0.0 DESIGN.md
> recorded the `#2487d7` link ratio as 3.87:1. Recomputing gives approximately
> 3.80:1. The difference does not change the outcome (both fail AA for normal text
> and pass for large text), but the earlier figure should not be quoted as exact.
> The v2.0.0 document also did not measure `#aaa`, `#999`, or `#bbb`, all of which
> fail. Trust the table above; the original judgement that the link colour fails AA
> stands and was correct.

### Gaps to close for AA, in priority order

1. Make both hamburger toggles keyboard operable: `<button type="button">` with
   `aria-expanded` and `aria-controls`, or at minimum `role="button" tabindex="0"`
   plus a keydown handler. This is the only issue that makes part of the site
   unusable rather than merely harder to use.
2. Darken the link colour. `#1a5fa0`, already in the palette as the hover colour,
   measures 6.3:1 and would pass. Reusing the existing hover colour as the base
   colour costs nothing and adds no new token.
3. Darken the header tagline from `#aaa`. It is real visible text at 2.3:1.
4. Add a skip-to-content link before `.headerMain`.
5. Manage focus when a drawer opens and restore it on close.
6. Honour `prefers-reduced-motion` by disabling the slide and fade transitions.

Items 2 and 3 conflict with the "Loyal To The Original Design" tenet in
[PRD.md](PRD.md). The tenet ordering puts content and clarity above design
fidelity, so accessibility wins on that reading, but this is a decision the author
should confirm rather than one this document should make silently. It is logged as
open question Q6 in [PRD.md](PRD.md).

---

## Animation and Motion

All motion on the site is functional: it communicates a state change. Nothing is
decorative and nothing animates on load.

| Element | Effect | Duration | Easing | Defined in |
|---|---|---|---|---|
| Left drawer slide | `left` transition | 250ms | `ease` | `site.css` |
| Right drawer slide | `right` transition | 250ms | `ease` | `site.css` |
| Nav link hover | `background`, `border-color` | 150ms | browser default (`ease`) | `site.css` |
| Hamburger bar colour | `background` | 200ms | browser default (`ease`) | `site.css` |
| Aside dot colour | `background` | 200ms | browser default (`ease`) | `site.css` |
| Search input focus border | `border-color` | 200ms | browser default (`ease`) | `site.css` (rule is dead) |
| Scroll-to-top appear | jQuery `fadeIn` | 200ms | jQuery `swing` | `js/site.js` |
| Scroll-to-top hide | jQuery `fadeOut` | 200ms | jQuery `swing` | `js/site.js` |
| Scroll to top | jQuery `animate({scrollTop: 0})` | 400ms | jQuery `swing` | `js/site.js` |

Drawer transitions are removed entirely at 1200px and up (`transition: none`),
because the drawers are permanently visible there and would otherwise animate on
page load and on window resize.

**Rules for adding motion:**

- Motion is allowed only as feedback for a user action. If the user did not do
  something, nothing should move.
- Stay inside the existing durations: 150ms for hover-scale changes, 200ms to 250ms
  for element-scale changes, 400ms for scroll. Do not introduce a fourth.
- Use `ease` or the jQuery default. No custom cubic-bezier curves, no springs.
- Never animate `width`, `height`, `top`, or `left` on content. The drawers animate
  `left` and `right`, and that is a deliberate exception kept because it was already
  there and performs acceptably at this size.
- Any new motion must be wrapped so that `prefers-reduced-motion: reduce` disables
  it, even though no existing motion currently is.

---

## Imagery and Media

The `img/` directory holds 40 files totalling roughly 9.1 MB. **Four of them are
referenced by the site.**

| File | Size | Used by |
|---|---|---|
| `img/0jK9PZV.png` | ~891 KB | Header logo on all nine pages, rendered at `max-height: 60px` |
| `img/favicon.png` | ~144 KB | `<link rel="icon">` on all nine pages |
| `img/clan.png` | ~45 KB | Homepage, floated right at 280x126 |
| `img/wfbCHon.gif` | ~1.5 MB | Discord page banner, capped at `max-width: 500px` |

The remaining 36 files are historical assets kept from the WordPress era and the
2017 repository: alternative logos, banners, in-game screenshots, and superseded
header images. They are not referenced by any HTML or CSS file. They are retained
deliberately as a brand archive, not by oversight, and consolidating them into
`img/` was the explicit purpose of v1.4.0.

**This is the site's largest measurable design problem.** A 891 KB PNG displayed at
60px tall and a 144 KB favicon are both roughly two orders of magnitude larger than
they need to be, and the Discord page ships a 1.5 MB GIF. Rules going forward:

- Any new image must be sized to its rendered dimensions before being committed.
- Prefer PNG for flat art and logos. Prefer a still image over an animated GIF
  unless the animation carries meaning.
- A favicon should be under 10 KB. Ship an ICO or a small PNG, not a full-resolution
  export.
- Do not add to `img/` without first checking whether an existing file serves.

Global image behaviour: `img { max-width: 100%; height: auto }` in `site.css` makes
every image responsive by default. `.alignright` and `.pull-right` float an image
right with `margin: 0 0 15px 20px`; both class names exist because the first is the
WordPress convention and the second is Bootstrap's.

---

## Writing Style in the Interface

UI copy follows the same rule as the documentation, recorded in full in
[PRD.md](PRD.md): **no em dashes**, in any of their three forms (the Unicode
character, the `&mdash;` entity, or a double hyphen used as punctuation). Use a
comma, a colon, a semicolon, parentheses, a full stop, or a single hyphen instead.
Single hyphens are permitted and are the preferred substitute in headings and
version lines.

Beyond that, page copy is direct and factual. It states what the clan does and what
the reader should do next. There is no marketing voice and no second-person sales
language, and the audience is assumed to already know what RuneScape is.

Two content conventions are observable in the existing copy and are worth keeping:

- **Rules are quoted, not paraphrased.** The conduct policy on the About page is
  reproduced as a direct quotation attributed to zoop. Do not reword it.
- **The founding date appears everywhere:** the header tagline, the footer, the
  homepage body, and the About page. That repetition is intentional. It is the
  clan's identity marker, and a reader landing on any page should see it.

One inconsistency is worth knowing about before you edit copy: the site mixes
British and American spelling. `guides-skilling.html` uses "recognised" while the
rest of the site uses American forms. American English is the dominant form and is
the one to match.

---

## What an AI Model Should Know Before Changing the Design

- **There are nine HTML files and they are near-identical.** Everything outside
  `.entryContent` is duplicated verbatim. Any header, nav, aside, footer, or
  scroll-to-top change is a nine-file change, and a change applied to eight files is
  a bug. Verify with `grep -c` across `*.html` before committing.
- **`css/bootstrap.css` and `js/bootstrap.js` are vendored and must not be edited.**
  Override in `site.css`, which loads after.
- **The 1200px breakpoint is duplicated in CSS and JS.** Change both or neither.
- **`site.css` contains dead rules for historical reasons, not by design:** `.meta`
  and `.meta-search-form` (the search bar was removed in v1.5.0) and `.entryMeta`
  (no page renders it). They are harmless, but they will mislead you into thinking
  those components exist. They do not.
- **`js/externalscript.js` is entirely dead.** It binds handlers to
  `.tutorials-div`, `.review-div`, `.impression-div`, and `#Top`, none of which
  exist in any page. It still loads on all nine pages. Do not build on it.
- **Do not introduce a build step, a preprocessor, or a token system** to solve a
  styling problem. The Durability Over Elegance tenet in [PRD.md](PRD.md) covers
  this, and it is a settled decision rather than an oversight.
- **When in doubt, match the original.** The visual reference is `Screenshot.JPG` in
  the repository root and the WikiWP theme it captures.
