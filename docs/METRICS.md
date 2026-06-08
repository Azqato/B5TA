# Metrics — B5TA Clan Website

**Current status:** No analytics tool is installed. All metrics below are targets and measurement plans for when analytics are implemented. Recommended tool: [Plausible Analytics](https://plausible.io) (privacy-first, no cookies, lightweight script) or Google Analytics 4.

---

## North Star Metric

**Discord invite link clicks per month**

A click on the Discord invite link is the clearest signal that the site is doing its primary job: connecting a visitor to the clan community. Everything else on the site — guides, about page, external links — is supporting content. If this number is healthy, the site is delivering value.

| Target | Timeframe |
|---|---|
| Establish baseline | First 30 days after analytics install |
| 20+ clicks/month | 60 days after analytics install |

---

## Acquisition Metrics

How visitors find and arrive at the site.

| Metric | Description | Target | Timeframe |
|---|---|---|---|
| Monthly unique visitors | Distinct users per month | Establish baseline | 30 days |
| Search engine referrals | Visitors arriving from Google/Bing | Establish baseline | 30 days |
| Direct traffic | Visitors who typed the URL or used a bookmark | Establish baseline | 30 days |
| Referral traffic | Visitors from Discord, Reddit, RuneScape forums | Establish baseline | 30 days |

**Measurement method:** Analytics tool with referrer tracking (Plausible or GA4).

---

## Engagement Metrics

How visitors interact with the site.

| Metric | Description | Target | Timeframe |
|---|---|---|---|
| Most-visited pages | Which pages receive the most views | Identify top 3 pages | 30 days |
| Guide page views | Views on Bossing, Money Making, Quests, Skilling pages | > 30% of total page views | 60 days |
| Discord link clicks | Clicks on the Discord invite link across all pages | See north star | — |
| Bounce rate on homepage | % of visitors who leave from the homepage without navigating | < 60% | 90 days |

**Measurement method:** Pageview tracking + outbound link click events in analytics tool.

---

## Retention Metrics

Whether visitors return to the site.

| Metric | Description | Target | Timeframe |
|---|---|---|---|
| Returning visitor rate | % of monthly visitors who have visited before | > 20% | 90 days |
| Repeat guide views | Whether guide pages receive repeat visits (indicator of reference use) | Establish baseline | 60 days |

**Note:** Retention measurement requires a session-identifying analytics tool. Plausible provides returning visitor data without cookies using hashing; GA4 uses cookies. Choose based on privacy preference.

**Measurement method:** Analytics tool returning visitor dimension.

**Reporting cadence:** Monthly.

---

## Performance Metrics

Technical health of the site.

| Metric | Description | Target | Measurement Method |
|---|---|---|---|
| Lighthouse performance score | Automated performance audit | ≥ 85 | Chrome DevTools / Lighthouse CLI |
| First Contentful Paint (FCP) | Time until first visible content | < 1.5 seconds | Lighthouse / PageSpeed Insights |
| Total page weight (homepage) | Combined size of all homepage resources | < 500 KB | Browser DevTools Network tab |
| Uptime | GitHub Pages availability | 99.9% | GitHub Status / UptimeRobot (free tier) |
| Broken links | Internal links that return 404 | 0 | Manual check or a link checker tool quarterly |

**Reporting cadence:** Quarterly Lighthouse audit; uptime monitored continuously if UptimeRobot is configured.

---

## Reporting Cadence Summary

| Metric group | Review frequency |
|---|---|
| North star (Discord clicks) | Monthly |
| Acquisition and engagement | Monthly |
| Retention | Monthly |
| Performance (Lighthouse) | Quarterly |
| Broken link check | Quarterly |
