# Tenets — B5TA Clan Website

These tenets are ordered by priority. When two tenets conflict, the higher-numbered one does **not** automatically win — the lower number takes precedence. They exist to resolve real tradeoffs, not to describe values everyone already agrees with.

---

## 1. Content before chrome

The website exists to deliver clan information, not to showcase design craft. When a design decision competes with the speed or clarity of accessing content — a heavier layout, an animated entrance, a visual flourish — the content wins. A visitor who finds the Discord link in three seconds is more valuable than one who admires the homepage.

*Tradeoff this resolves:* Choosing between a more visually polished feature and a simpler, faster implementation. Default to the simpler one.

---

## 2. Static is a feature, not a constraint

Avoiding server-side infrastructure means no maintenance overhead, no downtime from backend failures, and no attack surface beyond static files. Resist pressure to add dynamic features. The value must clearly and substantially outweigh the operational cost of maintaining a server, a database, or a build pipeline. "It would be cool to have" is not sufficient justification.

*Tradeoff this resolves:* Whether to add a feature that requires a backend (live GE prices, user profiles, a contact form). Default answer is no.

---

## 3. Loyal to the original design

The original `b5ta.com` WordPress/WikiWP site is the design authority. Long-time members have a mental model of what the site looks like. Deviation from that reference — colors, layout, navigation structure — requires explicit justification and team agreement. Keeping up with current design trends is not a valid reason to change.

*Tradeoff this resolves:* Whether to modernize a visual pattern because it "looks dated." Defer to the original unless there is a clear functional reason to change.

---

## 4. Current members before prospective members

When two design choices conflict, optimize for the person who already knows what they're looking for — opening the Bossing guide, finding the Discord link — over someone discovering the clan for the first time. The site's primary job is to serve the community it already has. Recruitment copy is secondary.

*Tradeoff this resolves:* Navigation depth vs. quick access, homepage marketing copy vs. direct links, SEO-friendly content vs. member-useful content.

---

## 5. Durability over elegance

A repeated nav block that works forever beats a clever templating system that requires specialized knowledge to maintain or can silently break. Prefer redundant but obvious solutions over abstractions. Any contributor should be able to understand and edit the site by reading a single HTML file with no prior context.

*Tradeoff this resolves:* Whether to introduce a build step, an SSG, or shared partials to eliminate nav duplication. The correct time to do this is when the duplication burden is actively costing the team — not as a preemptive architectural improvement.
