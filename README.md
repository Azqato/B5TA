# B5TA Clan Website

**Live Site:** [b5ta.com](https://www.b5ta.com) · [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/)

A static clan website for Clan B5TA — a RuneScape community founded September 30, 2014. Built as a faithful recreation of the original `b5ta.com` WordPress/WikiWP design, served via GitHub Pages with no server-side dependencies.

---

## About Clan B5TA

Clan B5TA is a RuneScape community founded **September 30, 2014** by zoop. What started as a casual group has grown into an organized clan built around three pillars of gameplay:

- **Skilling** — efficient leveling, Clan Citadel capping, and skill-progression guides
- **Bossing** — learning all bosses, finding teams, and mentoring newer players
- **Grand Exchange Flipping** — daily GP strategies, community flip charts, and money-making guides

The clan runs on a simple code: be respectful and follow RuneScape's Terms of Service. Botting, luring, scamming, harassment, and toxic behavior are grounds for removal. Members looking for promotion are expected to cap in the Citadel weekly, stay active, and help recruit.

The community extends beyond RuneScape — with active groups for **League of Legends**, **Summoners War**, and **Minecraft**. B5TA is also a **Twitch streaming community**; Discord bots automatically announce when members go live.

---

## Purpose of This Website

The website is the public-facing home for Clan B5TA. It serves four distinct audiences:

| Audience | What They Get |
|---|---|
| Prospective members | Clear picture of the clan, its culture, rules, and how to join via Discord |
| Current members | Quick access to Discord, guides, and external clan tools (RunePixels, Official Clan Page) |
| Returning members | Reconnect via Discord, find out what's current |
| Visitors | Browse community guides and learn about the clan |

The site preserves the look and feel of the original `b5ta.com` (WikiWP theme, circa 2020) — a clean, content-first layout that matches what longtime members remember.

---

## Pages

| Page | File | Description |
|---|---|---|
| Homepage | `index.html` | Welcome, clan overview, game sections (RS, LoL, SW, Minecraft) |
| About | `about.html` | Founding story, rules, promotion path, inactivity policy, conduct quote |
| Discord | `discord.html` | Step-by-step join instructions with permanent invite link |
| Guides | `guides.html` | Index linking all guide categories and community guides |
| Bossing | `guides-bossing.html` | Bossing intro, conduct rules, Dark Beasts guide, New Member guide |
| Money Making | `guides-money-making.html` | GP/day strategies, GE flipping, Flip Chart link, community guides |
| Quests | `guides-quests.html` | Quest tips, "How To Not Be A N00B" guide, New Member guide |
| Skilling | `guides-skilling.html` | Leveling tips, Citadel capping, community skilling resources |
| Flip Chart | `flip-chart.html` | GE flipping tracker page with link to community Flipping Guide |

---

## Design

The layout reproduces the original `b5ta.com` WikiWP theme: a 3-column desktop layout with a fixed header, left navigation sidebar, central article content area, and right aside.

```
┌──────────────────────────────────────────────────────┐
│  HEADER (.headerMain) — fixed 100px                  │
│  [banner logo]  Founded September 30th, 2014         │
├──────────────┬───────────────────────┬───────────────┤
│ LEFT NAV     │  PAGE CONTENT         │  RIGHT ASIDE  │
│ 215px fixed  │  (.pageContainer)     │  300px fixed  │
│              │                       │               │
│ Home         │  <article>            │  Pages        │
│ About        │    .entryHeader       │               │
│ Discord      │    .entryContent      │  External     │
│ Guides ▸     │  </article>           │  Links        │
│  Bossing     │                       │               │
│  Money…      │                       │               │
│  Quests      │                       │               │
│  Skilling    │                       │               │
│ — divider —  │                       │               │
│ Clan Page    │                       │               │
│ RunePixels   │                       │               │
│ Support      │                       │               │
│ Merchandise  │                       │               │
├──────────────┴───────────────────────┴───────────────┤
│  FOOTER — © Clan B5TA | Founded September 30th, 2014 │
└──────────────────────────────────────────────────────┘
```

**Mobile (< 1200px):** both sidebars collapse off-canvas; hamburger buttons toggle them with a dimming overlay.

See [Design.md](Design.md) for full design specification (color palette, typography, breakpoints, markup patterns).

---

## Tech Stack

| Layer | Technology | Notes |
|---|---|---|
| Markup | HTML5 | Static files — no templating or build step |
| Styling | Bootstrap 3 + `css/site.css` | `site.css` implements the custom ipage 3-column layout |
| Interactivity | jQuery + `js/site.js` | Mobile nav toggle, sub-menu expand, scroll-to-top |
| Hosting | GitHub Pages | Served from `master` branch root, no server required |

---

## Repository Structure

```
B5TA/
├── index.html                  — Homepage
├── about.html                  — About page
├── discord.html                — Discord join page
├── guides.html                 — Guides index
├── guides-bossing.html         — Bossing guides
├── guides-money-making.html    — Money Making guides
├── guides-quests.html          — Quest guides
├── guides-skilling.html        — Skilling guides
├── flip-chart.html             — Flip Chart / GE flipping
│
├── css/
│   ├── site.css                — Custom ipage 3-column layout CSS
│   └── bootstrap.css           — Bootstrap 3 core
│
├── js/
│   ├── site.js                 — Mobile nav/aside toggle, scroll-to-top
│   ├── jquery.min.js
│   ├── bootstrap.js
│   └── externalscript.js
│
├── img/                        — All image and media assets (40 files)
│   ├── 0jK9PZV.png             — Header banner logo
│   ├── clan.png                — Homepage float-right image (280×126)
│   ├── favicon.png             — Browser tab icon
│   └── wfbCHon.gif             — Discord page animated banner
│
├── fonts/                      — Bootstrap Glyphicons
│
├── .nojekyll                   — Disables Jekyll processing on GitHub Pages
│
├── ReadMe.md                   — This file
├── PRD.md                      — Product Requirements Document
├── Design.md                   — Design specification
├── TRD.md                      — Technical Requirements Document
└── PatchNotes.md               — Version history
```

---

## Local Development

No build process required. Open any `.html` file directly in a browser, or serve locally for correct relative paths:

```bash
# Python
python -m http.server 8000
# then open http://localhost:8000

# Node.js
npx serve .
```

All asset paths are relative — the site works both locally and when served from `azqato.github.io/B5TA/`.

---

## Deployment

Hosted on **GitHub Pages** from the `master` branch root.

1. Push to `master` → site updates automatically (no CI required)
2. Primary domain: [b5ta.com](https://www.b5ta.com) (custom CNAME pointing to GitHub Pages)
3. GitHub Pages URL: [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/)
4. `.nojekyll` at the repo root disables Jekyll so Bootstrap's `fonts/` directory is served correctly

See [TRD.md](TRD.md) for full technical details and deployment setup.

---

## Documentation

| Document | Purpose |
|---|---|
| [PRD.md](PRD.md) | Product requirements, per-page content specs, navigation structure, open questions |
| [Design.md](Design.md) | Layout, color palette, typography, responsive breakpoints, markup patterns |
| [TRD.md](TRD.md) | Technical architecture, CSS/JS breakdown, GitHub Pages deployment, known issues |
| [PatchNotes.md](PatchNotes.md) | Full version history from v0.1 (2017) through current |

---

## Future Work

| Item | Priority | Notes |
|---|---|---|
| Guide content additions | Medium | Bossing, Quests, Skilling pages have starter content; clan members can expand |
| Join page | Low | Structured join flow beyond the Discord redirect |
| XP Tracker | Low | RuneScape XP tracking tool for members |
| Shared nav component | Low | Nav duplication across 9 HTML files; any nav change requires updating all |

---

## Repository History

The project began in 2017 as a PHP-based Bootstrap shell. In June 2026 it was fully migrated to static HTML based on the archived `b5ta.com` WordPress/WikiWP design. The `ipage/` archive (saved copies of the original site) has been merged into the repository; all unique assets are consolidated in `img/`.

*Licensed under the [MIT License](LICENSE).*
