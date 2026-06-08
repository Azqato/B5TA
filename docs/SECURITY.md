# Security — B5TA Clan Website

**Summary:** This is a fully static, read-only HTML site. It collects no user data, has no authentication, runs no server-side code, and stores nothing. The attack surface is minimal.

---

## Authentication Model

None. The site has no user login, no sessions, and no authentication mechanism of any kind. All pages are publicly accessible to anyone.

---

## Authorization Model

Not applicable. There are no user roles, no restricted pages, and no content gated by identity or permission.

---

## Data Storage

| Data Type | Stored? | Where | Protection |
|---|---|---|---|
| User accounts | No | — | — |
| Visitor personal data | No | — | — |
| Cookies | No | — | — |
| LocalStorage / SessionStorage | No | — | — |
| Form submissions | No | — | — |
| Logs | No (GitHub Pages handles) | GitHub infrastructure | Not accessible to site owner |

No user data is collected, stored, or transmitted by this site.

---

## Environment Variables

None. This is a static site with no server, no build process, and no runtime configuration. There are no secrets, API keys, or credentials anywhere in the codebase.

Confirm: `git grep -r "key\|secret\|token\|password\|API_KEY"` returns no results in source files.

---

## Third-Party Trust

The site contains outbound links to external services. Clicking these links sends the user's browser directly to the external site. No user data is forwarded by this site; the user's browser handles the request independently.

| Service | URL | What data is received by them |
|---|---|---|
| Discord | discord.gg/0qfZioFZLSnmWMs7 | User IP, browser, device (standard HTTP request) |
| RunePixels | runepixels.com | User IP, browser, device |
| RuneScape Clan Home | services.runescape.com | User IP, browser, device |
| Zazzle | zazzle.com | User IP, browser, device |
| Support page | azqato.github.io/support.html | User IP, browser, device |
| Google Docs (guides) | docs.google.com | User IP, browser, device; Google may track via cookies |

All external links use `target="_blank" rel="noopener"` to prevent the linked page from accessing `window.opener`.

GitHub Pages (the hosting provider) may collect standard access logs (IP address, user agent, requested URL). This is outside the site owner's control and not configurable.

---

## Known Attack Surface

| Area | Risk | Mitigation |
|---|---|---|
| Static HTML files | Extremely low — read-only, no server execution | GitHub Pages serves files; no code runs server-side |
| Outbound links | Link rot or link hijacking (e.g. Discord invite expiring or being compromised) | Periodically verify that outbound links, especially the Discord invite, are valid and controlled by the clan |
| jQuery 1.12.3 | Known XSS-related CVEs exist in jQuery 1.x (primarily affecting jQuery.html() and DOM manipulation with untrusted input) | This site never uses jQuery to inject untrusted user input into the DOM. site.js only manipulates classes on known elements. Risk is effectively zero in this context. |
| Bootstrap 3.3.6 | EOL since 2019; no security patches | No server-side Bootstrap usage. Client-side risk is limited to XSS if Bootstrap JS processes untrusted input — which does not occur on this static site. |
| GitHub repository access | A contributor with push access could modify site content | Limit repository write access to trusted clan members. Review pull requests before merging. |
| GitHub Pages compromise | Hosting provider compromise would affect site availability and integrity | Outside site owner's control. GitHub Pages has a strong security track record. |

---

## Dependency Policy

This project uses pinned, vendored dependencies (files checked into the repository):

| File | Version | EOL? | Last checked |
|---|---|---|---|
| `css/bootstrap.css` + `js/bootstrap.js` | 3.3.6 | Yes (2019) | 2026-06-07 |
| `js/jquery.min.js` | 1.12.3 | Yes (security support ended ~2021) | 2026-06-07 |

**Policy:**
- Dependencies are vendored (not fetched from a CDN at runtime) — no supply chain risk from CDN compromise
- No automated dependency scanning is currently configured
- Bootstrap and jQuery are EOL but present negligible risk given the static, no-user-input nature of the site
- Upgrade path: Bootstrap 3 → Bootstrap 5 and jQuery → vanilla JS, deferred per the roadmap until a planned visual refresh

**Recommended:** Add a GitHub Dependabot configuration or periodic manual review when the site introduces a `package.json` or any CDN-fetched dependencies.
