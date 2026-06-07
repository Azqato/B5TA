# B5TA Clan Website

**Live Site:** [azqato.github.io/B5TA/](https://azqato.github.io/B5TA/)
**Primary Domain:** [b5ta.com](https://www.b5ta.com)

---

## Project Status

**Migration complete.** The site has been fully rebuilt using the original `b5ta.com` design (archived in `ipage/`) as the design priority. It is now a static HTML site served via GitHub Pages — no PHP server required.

See [`PRD.md`](PRD.md), [`Design.md`](Design.md), [`TRD.md`](TRD.md), and [`PatchNotes.md`](PatchNotes.md) for full plans and history.

---

## Design — ipage Archive

The `ipage/` folder contains four HTML saves of the original `b5ta.com` pages (WordPress/WikiWP theme, circa 2020). These define the structure, layout, and content that was reproduced.

### ipage Pages

| File | Origin URL | Content |
|---|---|---|
| `ipage/homepage.html` | `b5ta.com/` | Welcome message, clan.png, RuneScape / LoL / Summoners War / Minecraft sections |
| `ipage/about.html` | `b5ta.com/about-us/` | Founding story, rules, promotion path, conduct policy |
| `ipage/discord.html` | `b5ta.com/discord/` | Discord download link, invite link, animated banner gif |
| `ipage/guides.html` | `b5ta.com/guides/` | Community guides list with external Google Docs and RS links |

Each page has a matching `*_files/` directory containing the original CSS, JS, and image assets.

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

| Page | File | Status | Source |
|---|---|---|---|
| Homepage | `index.html` | ✅ Live | `ipage/homepage.html` |
| About | `about.html` | ✅ Live | `ipage/about.html` |
| Discord | `discord.html` | ✅ Live | `ipage/discord.html` |
| Guides index | `guides.html` | ✅ Live | `ipage/guides.html` |
| Bossing | `guides-bossing.html` | ✅ Stub | — |
| Money Making | `guides-money-making.html` | ✅ Stub | — |
| Quests | `guides-quests.html` | ✅ Stub | — |
| Skilling | `guides-skilling.html` | ✅ Stub | — |
| Flip Chart | `flip-chart.html` | ✅ Stub | — |

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
│
├── css/
│   ├── site.css                ← ipage layout CSS (custom)
│   ├── bootstrap.css
│   ├── bootstrap.min.css
│   ├── bootstrap-theme.css
│   └── [other Bootstrap CSS]
│
├── js/
│   ├── site.js                 ← mobile nav/aside toggle (custom)
│   ├── jquery.min.js
│   ├── bootstrap.js
│   └── externalscript.js
│
├── Logos/
│   ├── 0jK9PZV.png             ← header banner logo
│   ├── clan.png                ← homepage float-right image
│   ├── favicon.png             ← browser tab icon
│   └── [other logo variants]
│
├── ipage/                      ← original site archive (design reference)
│   ├── homepage.html
│   ├── about.html
│   ├── discord.html
│   ├── guides.html
│   ├── homepage_files/
│   ├── about_files/
│   ├── discord_files/
│   └── guides_files/
│
├── Design/                     ← design assets (sprites, header/footer images)
├── Gameplay/                   ← gameplay media assets
├── images/                     ← legacy images
├── fonts/                      ← Bootstrap Glyphicons
│
├── .nojekyll                   ← disables Jekyll processing on GitHub Pages
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
| Original CMS | WordPress + WikiWP *(reference only — ipage archive)* |

---

## CSS (`css/`)

| File | Purpose |
|---|---|
| `site.css` | ipage 3-column layout: fixed header, off-canvas sidebars, article styles |
| `bootstrap.css` | Bootstrap 3 core |
| `bootstrap.min.css` | Bootstrap 3 minified |
| `bootstrap-theme.css` | Bootstrap default theme |
| `dropdownhover.css` | Hover dropdown styles |
| `dropdownmenu.css` | Dropdown menu layout |
| `externalstyle.css` | Legacy custom overrides |

## JavaScript (`js/`)

| File | Purpose |
|---|---|
| `site.js` | Mobile sidebar toggles, overlay, sub-menu expand, scroll-to-top |
| `jquery.min.js` | jQuery library |
| `bootstrap.js` | Bootstrap interactive components |
| `externalscript.js` | Scroll-to-top (legacy) |
| `dropdown.js` | Hover dropdown behavior |
| `destroyvid.js` | Stops YouTube players on modal close |

---

## About Clan B5TA

Clan B5TA is a RuneScape community founded on **September 30, 2014**. What began as a casual group has grown into an active and organized clan built around three core areas of gameplay: **skilling**, **bossing**, and **Grand Exchange flipping**.

The clan is known for its laid-back, drama-free atmosphere. Members are expected to be respectful to one another and abide by RuneScape's Terms of Service. Actions such as botting, luring, scamming, and harassment are strictly against clan rules.

B5TA is also a **Twitch streaming community**, maintaining a network of member streamers who support each other. Discord bots within the clan server automatically announce when members go live.

Active participation is a core part of membership — capping in the Clan Citadel weekly and helping recruit new members are both recognized paths to promotion.

For more information, visit [b5ta.com](https://www.b5ta.com) or join the community on [Discord](https://b5ta.com/discord/).

---

*Licensed under the [MIT License](LICENSE).*
