# B5TA Clan Website

**Live Site:** [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/)
**Primary Domain:** [b5ta.com](https://www.b5ta.com)

---

## Project Status

The website is undergoing a migration. The `ipage/` folder contains a complete archive of the original live `b5ta.com` site (WordPress/WikiWP theme, saved circa 2020). This is the **design priority** for the rebuilt site. A Bootstrap 3 shell (`index.php`) was started independently and contains components worth keeping. The goal is to merge the two: ipage structure and content take priority, with Bootstrap 3 as the underlying framework.

See [`PRD.md`](PRD.md), [`Design.md`](Design.md), [`TRD.md`](TRD.md), and [`PatchNotes.md`](PatchNotes.md) for the full plan and history.

---

## Target Design — ipage Archive

The `ipage/` folder contains four HTML saves of the original `b5ta.com` pages. These define the structure, layout, and content to be reproduced.

### Pages

| File | Origin URL | Content |
|---|---|---|
| `ipage/homepage.html` | `b5ta.com/` | Welcome message, clan.png, RuneScape / LoL / Summoners War / Minecraft sections |
| `ipage/about.html` | `b5ta.com/about-us/` | Founding story, rules, promotion path, conduct policy |
| `ipage/discord.html` | `b5ta.com/discord/` | Discord download link, invite link, animated banner gif |
| `ipage/guides.html` | `b5ta.com/guides/` | Community guides list with external Google Docs and RS links |

Each page has a matching `*_files/` directory containing CSS, JS, and image assets captured with the save.

### Layout Structure

Every ipage page uses this layout:

```
<header class="headerMain">
  <div id="logo">
    <img class="logo-img" src="0jK9PZV.png">        ← wide banner logo
    <span class="blog-description">Founded September 30th, 2014</span>
  </div>
</header>

<div class="container-fluid">
  <div class="meta clearfix">                         ← search bar
  <div class="navMenuButton">                         ← mobile hamburger (Menu)
  <div class="primary-menu primary-menu-side">        ← LEFT sidebar navigation
  <div class="pageContainer">                         ← main content area
  <div class="asideMenuButton">                       ← mobile hamburger (Sidebar)
  <aside>                                             ← RIGHT sidebar widgets
</div>

<footer class="container-fluid">                      ← copyright line
```

### Left Sidebar Navigation

The primary navigation is a **left sidebar**, not a top navbar. Original links:

| Label | Destination |
|---|---|
| About | `b5ta.com/about-us/` |
| Discord | `b5ta.com/discord/` |
| Guides | external — runescape.guide |
| Merchandise | external — Zazzle store |
| Official Clan Page | external — RuneScape clan page |
| Runeclan | external — runeclan.com/clan/B5TA |
| Donate | external — Patreon |

### Header

- **Logo image:** `Logos/0jK9PZV.png` (wide horizontal banner)
- **Tagline:** `Founded September 30th, 2014` rendered below the logo
- **Background:** white (`#ffffff`)
- Logo links back to the homepage

### Main Content Area (`.pageContainer`)

Article layout per page:

```html
<article class="entry entryTypePost">
  <header class="entryHeader">
    <h1 class="entryTitle">Page Title</h1>
  </header>
  <div class="entryContent">
    <!-- page body: paragraphs, lists, images -->
  </div>
</article>
```

- Clean white background, black text
- Images float right within content (e.g. `clan.png` on the homepage)
- No colored section backgrounds

### Right Aside Widgets

1. **Subscribe** — email subscription form (to be replaced or removed in the rebuild)
2. **Pages** — list of site pages: About, Discord, Homepage, Guides, Join, New Member Guide, User EXP Tracker

### Footer

Original: `© Clan B5TA | powered by WikiWP theme and WordPress`
Rebuild target: `© Clan B5TA | Founded September 30th, 2014`

---

## ipage Key Assets

| Asset | Location | Use |
|---|---|---|
| `0jK9PZV.png` | `Logos/` and `ipage/*/` | Header logo — wide banner |
| `clan.png` | `Logos/` and `ipage/homepage_files/` | Inline image on homepage |
| `wfbCHon.gif` | `ipage/discord_files/` | Animated banner on Discord page |
| `tnOKdrI.png` | `Logos/` | Favicon |
| `NTjJFV8.png` | `Logos/` | Alternate logo (used in OG meta) |
| `73795.css` | `ipage/*/` | WikiWP theme stylesheet — primary layout CSS |
| `styles.css` | `ipage/*/` | Supplemental site styles |

---

## Current Bootstrap Shell

The independently-started Bootstrap 3 version (`index.php`). Components to carry forward:

- Bootstrap 3 grid and components
- jQuery
- Hover dropdown (`dropdown.js`)
- Responsive mobile collapse
- `externalscript.js` (tab switching, scroll-to-top)
- `destroyvid.js` (YouTube modal cleanup)
- `includes/header.php` and `includes/footer.php` (PHP include structure)

Components to **replace** with ipage equivalents:

| Bootstrap shell | ipage replacement |
|---|---|
| Top horizontal navbar | Left sidebar navigation |
| Blue header (`#0066ff`) | White header with logo + tagline |
| Scrollspy colored sections | Article layout on white background |
| Placeholder section content | Real content from ipage pages |

---

## Full Site Pages (Target)

| Page | File | Status | Source |
|---|---|---|---|
| Homepage | `index.php` | In progress | `ipage/homepage.html` |
| About | `about.php` | Draft | `ipage/about.html` |
| Discord | `discord.php` | Draft | `ipage/discord.html` |
| Guides index | `guides.php` | Draft | `ipage/guides.html` |
| Bossing | `guides-bossing.php` | Stub | — |
| Money Making | `guides-money-making.php` | Stub | — |
| Quests | `guides-quests.php` | Stub | — |
| Skilling | `guides-skilling.php` | Stub | — |
| Flip Chart | `flip-chart.php` | Not started | — |
| Contact | `contact.php` | Not started | — |
| Join | `join.php` | Not started | ipage referenced |
| New Member Guide | `new-member-guide.php` | Not started | ipage referenced |
| User EXP Tracker | `exp-tracker.php` | Not started | ipage referenced |

---

## Repository Structure

```
B5TA/
├── index.php
├── about.php
├── discord.php
├── guides.php
├── guides-bossing.php
├── guides-money-making.php
├── guides-quests.php
├── guides-skilling.php
├── includes/
│   ├── header.php
│   └── footer.php
├── css/
├── js/
├── fonts/
├── images/
├── Logos/
├── Design/
├── Gameplay/
├── ipage/                      ← original site archive (design reference, do not delete)
│   ├── homepage.html
│   ├── about.html
│   ├── discord.html
│   ├── guides.html
│   ├── homepage_files/
│   ├── about_files/
│   ├── discord_files/
│   └── guides_files/
├── ReadMe.md
├── PRD.md
├── Design.md
├── TRD.md
└── PatchNotes.md
```

---

## Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, JavaScript |
| Framework | Bootstrap 3 |
| Library | jQuery |
| Backend | PHP *(or static HTML for GitHub Pages)* |
| Original CMS | WordPress + WikiWP theme *(reference only — ipage archive)* |

---

## JavaScript (`js/`)

| File | Purpose |
|---|---|
| `jquery.js` / `jquery.min.js` | jQuery library |
| `bootstrap.js` / `bootstrap.min.js` | Bootstrap interactive components |
| `dropdown.js` | Hover-activated dropdown behavior |
| `externalscript.js` | Tab switching and scroll-to-top |
| `destroyvid.js` | Stops/resets up to 14 YouTube players on modal close |
| `npm.js` | Bootstrap npm entry point |

## CSS (`css/`)

| File | Purpose |
|---|---|
| `bootstrap.css` / `bootstrap.min.css` | Bootstrap core styles |
| `bootstrap-theme.css` / `bootstrap-theme.min.css` | Bootstrap default theme |
| `dropdownhover.css` | Hover effect styles for dropdown menus |
| `dropdownmenu.css` | Dropdown menu layout styles |
| `externalstyle.css` | Custom site styles — navbar opacity, tabs, responsive breakpoints |

---

## About Clan B5TA

Clan B5TA is a RuneScape community founded on **September 30, 2014**. What began as a casual group has grown into an active and organized clan built around three core areas of gameplay: **skilling**, **bossing**, and **Grand Exchange flipping**.

The clan is known for its laid-back, drama-free atmosphere. Members are expected to be respectful to one another and abide by RuneScape's Terms of Service. Actions such as botting, luring, scamming, and harassment are strictly against clan rules.

B5TA is also a **Twitch streaming community**, maintaining a network of member streamers who support each other. Discord bots within the clan server automatically announce when members go live.

Active participation is a core part of membership — capping in the Clan Citadel weekly and helping recruit new members are both recognized paths to promotion.

For more information, visit [b5ta.com](https://www.b5ta.com) or join the community on [Discord](https://b5ta.com/discord/).

---

*Licensed under the [MIT License](LICENSE).*
