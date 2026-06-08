# B5TA Clan Website

Static clan website for Clan B5TA, served via GitHub Pages.

**Live:** https://www.b5ta.com · https://azqato.github.io/B5TA/

---

## Tech Stack

| Layer | Technology | Version |
|---|---|---|
| Markup | HTML5 | — |
| CSS Framework | Bootstrap | 3.3.6 |
| JavaScript Library | jQuery | 1.12.3 |
| Custom CSS | css/site.css | — |
| Custom JS | js/site.js | — |
| Hosting | GitHub Pages | — |

No build system, package manager, or Node.js required.

---

## Prerequisites

- Git
- A modern browser (Chrome, Firefox, Edge, Safari)
- Python 3 or Node.js — optional, only needed for a local HTTP server

No Node version requirement. No `.env` file. No package manager.

---

## Installation

```bash
git clone https://github.com/Azqato/B5TA.git
cd B5TA
```

No `npm install` or build step.

---

## Running Locally

Open any `.html` file directly in a browser. For correct relative paths across all pages, serve from an HTTP server:

```bash
# Python (recommended)
python -m http.server 8000
# Open http://localhost:8000

# Node.js (no install required)
npx serve .
# Open http://localhost:3000
```

---

## Environment Variables

None. This is a fully static site with no server, no secrets, and no `.env` file.

---

## Build

No build step. Source files are the production files.

---

## Deploy

The site deploys automatically on push to `master`.

1. Commit and push changes to `master` at `github.com/Azqato/B5TA`
2. GitHub Pages serves the updated site within ~30 seconds

**Custom domain:** `b5ta.com` points to GitHub Pages via a CNAME DNS record.  
**GitHub Pages URL:** `azqato.github.io/B5TA/`  
**Jekyll:** Disabled via `.nojekyll` at the repo root (required for Bootstrap's `fonts/` directory to be served correctly).

---

## Documentation

Full documentation is in [`/docs`](docs/):

| Document | Description |
|---|---|
| [PRD.md](docs/PRD.md) | Product requirements, user stories, goals, and constraints |
| [TRD.md](docs/TRD.md) | Technical architecture, data flow, third-party integrations, known debt |
| [DESIGN.md](docs/DESIGN.md) | Color palette, typography, spacing, breakpoints, component patterns |
| [PATCHNOTES.md](docs/PATCHNOTES.md) | Full version history |
| [PRFAQ.md](docs/PRFAQ.md) | Press release and internal/external FAQ |
| [TENETS.md](docs/TENETS.md) | Product and design principles |
| [METRICS.md](docs/METRICS.md) | Success metrics and measurement plan |
| [ROADMAP.md](docs/ROADMAP.md) | Milestone plan and deferred features |
| [SECURITY.md](docs/SECURITY.md) | Security posture, data handling, and dependency policy |
| [RUNBOOK.md](docs/RUNBOOK.md) | Local setup, deploy, rollback, and troubleshooting |
