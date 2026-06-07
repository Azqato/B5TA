# B5TA Clan Website

**Live Site:** [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/)
**Primary Domain:** [b5ta.com](https://www.b5ta.com)

---

## Project Status

**Migration complete.** The site has been fully rebuilt using the original `b5ta.com` design (WordPress/WikiWP theme, circa 2020) as the design priority. It runs as static HTML served via GitHub Pages — no PHP server required. The ipage archive has been merged into the main repository and removed; all unique assets have been consolidated.

See [`PRD.md`](PRD.md), [`Design.md`](Design.md), [`TRD.md`](TRD.md), and [`PatchNotes.md`](PatchNotes.md) for full plans and history.

---

## Design

The site reproduces the layout of the original `b5ta.com` WordPress/WikiWP theme: a 3-column desktop layout with a fixed left navigation, article content area, and right aside. Bootstrap 3 provides the base framework; `css/site.css` defines the ipage layout system.

### Layout Structure

```
┌─────────────────────────────────────────────────────┐
│  HEADER (.headerMain)  — fixed 100px                 │
│  [0jK9PZV.png banner]  Founded September 30th, 2014  │
├─────────────────────────────────────────────────────┤
│  META BAR (.meta)  — search field                    │
├──────────────┬──────────────────────┬────────────────┤
│ LEFT NAV     │  PAGE CONTENT        │  RIGHT ASIDE   │
│ 215px fixed  │  (.pageContainer)    │  300px fixed   │
│              │                      │                │
│ .primary-    │  <article>           │  Pages widget  │
│  menu        │    entryHeader       │                │
│              │    entryContent      │  External      │
│ Home         │  </article>          │  Links widget  │
│ About        │                      │                │
│ Discord      │                      │                │
│ Guides ▸     │                      │                │
│ Flip Chart   │                      │                │
├──────────────┴──────────────────────┴────────────────┤
│  FOOTER — © Clan B5TA | Founded September 30th, 2014 │
└─────────────────────────────────────────────────────┘
```

Mobile (`< 1200px`): both sidebars collapse to off-canvas; hamburger buttons toggle them.

---

## Site Pages

| Page | File | Status |
|---|---|---|
| Homepage | `index.html` | ✅ Live |
| About | `about.html` | ✅ Live |
| Discord | `discord.html` | ✅ Live |
| Guides index | `guides.html` | ✅ Live |
| Bossing | `guides-bossing.html` | ✅ Live |
| Money Making | `guides-money-making.html` | ✅ Live |
| Quests | `guides-quests.html` | ✅ Live |
| Skilling | `guides-skilling.html` | ✅ Live |
| Flip Chart | `flip-chart.html` | ✅ Live |

---

## Repository Structure

```
B5TA/
├── index.html
├── about.html
├── discord.html
├── guides.html
├── guides-bossing.html
├── guides-money-making.html
├── guides-quests.html
├── guides-skilling.html
├── flip-chart.html
│
├── css/
│   ├── site.css                ← ipage 3-column layout CSS (custom)
│   └── bootstrap.css
│
├── js/
│   ├── site.js                 ← mobile nav/aside toggle (custom)
│   ├── jquery.min.js
│   ├── bootstrap.js
│   └── externalscript.js
│
├── img/
│   ├── 0jK9PZV.png             ← header banner logo
│   ├── clan.png                ← homepage float-right image
│   ├── favicon.png             ← browser tab icon
│   ├── wfbCHon.gif             ← Discord page animated banner
│   └── [other logo variants and branding assets]
│
├── fonts/                      ← Bootstrap Glyphicons
│
├── .nojekyll                   ← disables Jekyll processing on GitHub Pages
├── MVP.docx
├── Screenshot.JPG
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
| Markup | HTML5 |
| Styling | CSS3 — Bootstrap 3 + `css/site.css` |
| Interactivity | JavaScript + jQuery |
| Framework | Bootstrap 3 |
| Hosting | GitHub Pages (static) |
| Original CMS | WordPress + WikiWP *(reference — ipage design archived and merged)* |

---

## CSS (`css/`)

| File | Purpose |
|---|---|
| `site.css` | ipage 3-column layout: fixed header, off-canvas sidebars, article styles |
| `bootstrap.css` | Bootstrap 3 core |

## JavaScript (`js/`)

| File | Purpose |
|---|---|
| `site.js` | Mobile sidebar toggles, overlay, sub-menu expand, scroll-to-top |
| `jquery.min.js` | jQuery library |
| `bootstrap.js` | Bootstrap interactive components |
| `externalscript.js` | External behaviors |

---

## About Clan B5TA

Clan B5TA is a RuneScape community founded on **September 30, 2014**. What began as a casual group has grown into an active and organized clan built around three core areas of gameplay: **skilling**, **bossing**, and **Grand Exchange flipping**.

The clan is known for its laid-back, drama-free atmosphere. Members are expected to be respectful to one another and abide by RuneScape's Terms of Service. Actions such as botting, luring, scamming, and harassment are strictly against clan rules.

B5TA is also a **Twitch streaming community**, maintaining a network of member streamers who support each other. Discord bots within the clan server automatically announce when members go live.

Active participation is a core part of membership — capping in the Clan Citadel weekly and helping recruit new members are both recognized paths to promotion.

For more information, visit [b5ta.com](https://www.b5ta.com) or join the community on [Discord](https://discord.gg/0qfZioFZLSnmWMs7).

---

*Licensed under the [MIT License](LICENSE).*
