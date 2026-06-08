# Runbook — B5TA Clan Website

---

## Local Setup

Complete steps from a fresh machine:

1. **Install Git**  
   https://git-scm.com/downloads

2. **Clone the repository**
   ```bash
   git clone https://github.com/Azqato/B5TA.git
   cd B5TA
   ```

3. **Open the site**  
   Option A — Open `index.html` directly in a browser (simplest; relative paths work for single-page viewing).  
   Option B — Start a local HTTP server for correct relative paths when navigating between pages:

   ```bash
   # Python 3 (recommended — no install required if Python is present)
   python -m http.server 8000
   # Open http://localhost:8000

   # Node.js (npx, no global install required)
   npx serve .
   # Open http://localhost:3000
   ```

No npm install. No build step. No environment variables.

---

## Build

No build step. Source files are the production files. What you see in the repository is exactly what gets served.

---

## Deploy

### Production (GitHub Pages)

The site deploys automatically from the `master` branch.

1. Make changes to HTML, CSS, JS, or image files
2. Stage and commit:
   ```bash
   git add <changed-files>
   git commit -m "description of change"
   ```
3. Push to master:
   ```bash
   git push origin master
   ```
4. GitHub Pages rebuilds and serves the updated site within ~30 seconds
5. Verify at https://azqato.github.io/B5TA/ or https://www.b5ta.com

**Note on nav changes:** Any change to the navigation requires updating all 9 HTML files. Use find-and-replace across all `.html` files to avoid missed occurrences.

### First-Time GitHub Pages Setup (if re-deploying from scratch)

1. Push repository to `github.com/Azqato/B5TA`
2. In GitHub → repo Settings → Pages → Source: `master` branch, `/ (root)` folder
3. Site becomes available at `azqato.github.io/B5TA/` within a few minutes
4. Custom domain `b5ta.com`: set in Settings → Pages → Custom domain. DNS must have a CNAME record for `www.b5ta.com` pointing to `azqato.github.io`

---

## Rollback

To revert to a previous working version:

**Option A — Revert the last commit (safe, preserves history):**
```bash
git revert HEAD
git push origin master
```

**Option B — Reset to a specific commit (rewrites history — use only if the bad commit is not yet widely distributed):**
```bash
git log --oneline         # find the target commit hash
git reset --hard <hash>
git push --force origin master
```

**Option C — Deploy a previous commit directly (GitHub UI):**
In GitHub → Actions or Deployments, there is no one-click rollback for GitHub Pages. Use git revert (Option A) instead.

After rollback, verify the live site reflects the intended state.

---

## Environment Configs

| Environment | URL | Source |
|---|---|---|
| Local | http://localhost:8000 | Files in working directory |
| Production | https://www.b5ta.com / https://azqato.github.io/B5TA/ | `master` branch root on GitHub |

No staging environment. Test locally before pushing to production.

There are no environment-specific config files, feature flags, or `.env` files. All configuration is hardcoded in the HTML (nav links, Discord invite URL, etc.).

---

## Common Errors

| Error | Likely Cause | Fix |
|---|---|---|
| Images not loading when opening `index.html` directly (file://) | Browser security blocks relative paths for some assets at file:// protocol | Use a local HTTP server (`python -m http.server 8000`) instead of opening the file directly |
| Sidebar not sliding open on mobile | JavaScript not loading (ad blocker, JS disabled) or jQuery failing to load | Check browser console for errors; confirm `js/jquery.min.js` loads before `js/site.js` |
| Active nav item wrong on a page | `current-menu-item current_page_item` class set on wrong `<li>` | Locate the `<li>` for the current page in the file's `<ul class="main-menu">` and ensure only that item has the active classes |
| Page not updating after push | GitHub Pages cache (CDN) | Wait 1–2 minutes; hard-refresh (Ctrl+Shift+R) in browser |
| Custom domain `b5ta.com` not working | CNAME DNS record missing or propagating | Check DNS settings; CNAME for `www.b5ta.com` should point to `azqato.github.io`; propagation can take up to 48 hours |
| 404 on GitHub Pages after fresh deploy | `.nojekyll` file missing from repo root | Ensure `.nojekyll` exists at root: `touch .nojekyll && git add .nojekyll && git commit && git push` |
| Bootstrap fonts (Glyphicons) returning 404 | Jekyll processing the `fonts/` directory | Confirm `.nojekyll` exists; Jekyll is supposed to be disabled |
| Content appearing under the fixed header | `.container-fluid` `margin-top` removed or overridden | Confirm `css/site.css` has `.container-fluid { margin-top: 113px; }` |

---

## Monitoring

| What | Where | Access |
|---|---|---|
| Site uptime | GitHub Pages Status: https://www.githubstatus.com | Public |
| Site uptime (alerting) | UptimeRobot (free tier) — configure a monitor for https://www.b5ta.com | Requires free account |
| Error logs | Not available — GitHub Pages provides no server logs to site owners | N/A |
| Analytics | Not currently installed — see METRICS.md for recommended setup | N/A |
| Build status | GitHub repo → Actions tab (shows Pages build success/failure) | Requires GitHub account with repo access |

To check if a recent push deployed successfully: visit GitHub repo → Settings → Pages → last deployment timestamp.
